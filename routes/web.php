<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::view('contact', 'contact');
Route::view('about', 'about')->middleware('test');
/* 
Model - 
1. Represents a single row in the database
2. Responsible for saving, reading, deleting or anything for that particular row.
php artisan make:model Customers -m 
Create a migrate for that model to hold the data as well.
*/
Route::get('customers', 'CustomersController@index');
Route::get('customers/create', 'CustomersController@create');
Route::post('customers', 'CustomersController@store');

/*
Conditions for Route Model Binding: 

	Route::get('customers/{"customer"}', 'CustomersController@show');
	The {"customer"} variable show match exactly with that in show() method
If we simply typehint the show(Customer $"customer") Model - It is used to fetch record automatically
Through use of Route Model Binding , we dont have to fetch the record. Laravel will do it automatically for us, returns 404 if not found.

public function show(Customer $"customer") { 
	return view('show', '"customer"');
}
*/

Route::get('customers/{customer}', 'CustomersController@show');
Route::get('customers/{customer}/edit', 'CustomersController@edit');
Route::patch('customers/{customer}', 'CustomersController@update')->name('customers.update');

/*
Eloquent is a Database ORM that Laravel uses behind the scenes. Eloquent is able to handle many different drivers of databases. 
Have to learn only 1 Eloquent option that will give access to other drivers.

Scope - Scope is like a filter.
How to declare a Scope?
Model - Naming convention
public function starts with "scope" scopeActive($query)

*/

/* 
Accessor or Mutator - Interject any calls we want to do something about it before it either displays on a page or saves it back into the database.

public function getActiveAttribute($attribute) {
	
	return [
		'0' => 'Inactive',
		'1' => 'Active',
	][$attribute];
}

getColumnNameAttribute($attribute)
*/
Route::delete('customers/{customer}', 'CustomersController@destroy');


/* 
RESTful controller 
php artisan make:controller -r -m Customer
Creates all restful methods for us with Route Model binding as well.
*/
//Route::resource('customers', 'CustomersController');


/* 
Mailables - Template ready for you to start sending formatted emails
php artisan make:mail ContactFormMail -m=emails.contact.contact-form  
Markdown will actually create a view and tak a look in your browser
		store() {
    		Mail::to('test@test.com')->send(new ContactFormMail($data));

    		session()->flash('message', 'thank you'); //thank you message after mail sent

    		return redirect('contact');
    	}
Pass the user form data to the ContactFormMail.php file created after the php artisan make:mail ContactFormMail.php file    	
App/Mail/ContactFormMail.php

public $data;

__construct($data)

    public function build()
    {
        return $this->markdown('emails.contact.contact-form');
    }
The $data can be used in the view - emails/contact/contact-form.blade.php where template of mail is present. 

*/
Route::get('contact', 'ContactFormController@create');
Route::post('contact', 'ContactFormController@store')->name('contact.store');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/* 
A middleware stands in the middle. In middle of what? 
It stands in between a request and a response. It does that by executing a certain code. The code with either give it a green light or red light.
If middleware gives a greenlight it will execute a certain code and move on to the next middleware. 
If redlight - Execute some failsafe code.

2 Ways to apply a middleware 
1. Route level
Route::get('contact', 'ContactFormController@create')->middleware('auth');

2. Controller level 

__construct() {
	$this->middleware('auth');
	$this->middleware('auth')->only/except(['index','create']);	
}

Custom Middleware
1. Create - php artisan make:middleware TestMiddleware
2. Register - If we want to use the middleware, we have to register. App\Http\Kernel.php
	i. Global Middleware - Run at every single HTTP request coming to application
		protected $middleware = [ 

		];
	ii. Route - web.php or api.php. Applicable to all routes in web.php
	iii. RouteMiddleware - Specific routes in web.php
3. Use 
*/

/* 
URL Helpers - 
    <form action="/contact" method="POST">
We have the /contact address in the create.blade.php file which points to the route in web.php
Route::post('/contact', 'ContactsController@show');

What if for some reasons the /contact -> /contact-us
    <form action="/contact" method="POST">
We will have to make this change in all the forms.

Named routes - Assign names to all of our routes
Route::post('/contact', 'ContactsController@store')->name('contact.store');

    <form action="{{ route('contact.store') }}" method="POST">

If we use Route::resource('customers','CustomersController'); Laravel names all the routes for us automatically
php artisan route:list

		<form action="{{ route('customers.update',['*customer*' => $customer]) }}" method="POST" class="">
Route::patch('*customers*'/{customer}', 'CustomersController@update')->name('customers.update');

*/

/* 
Events - Something happened. When something happens, an event has occured. At that point we will have list of items that our application should respond with.
User Registration - 1. Welcome Email 
					2. Subscribe to newsletter
					3. Slack NOtifiy
All this can be done at Controller level and then can be clubbed inside an event.

    	$customer = Customer::create($this->validateRequest());
	
        Mail::to($customer->email)->send(new WelcomeNewUserMail());

        dump("Registed to newsletter");

        dump("Slack message here");

        event(new NewCustomerHasRegisteredEvent($customer));
        php artisan make:event NewCustomerHasRegisteredEvent
        App/Event/NewCustomerHasRegisteredEvent.php make $customer public

        Make a Listener
        php artisan make:listener WelcomeNewCustomerListener
        App/Listener/WelcomeNewCustomerListener

        public function handle($event) {
        	//Customer can be accessed because the event has $customer 
	        Mail::to($event->customer->email)->send(new WelcomeNewUserMail());	
        }
All the Events and Listeners are now standalone and are not talking to each other. 
A connection needs to be formed so that they talk to each other. 
Service Provider - Connect functionality in our app.
App/Provider/EventServiceProvider         

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];
Need to connect each event with listener

Automatic Way - Come to ServiceProvider and give it names that we want to make

    protected $listen = [
        \App\Events\NewCustomerHasRegisteredEvent::class => [
            \App\Listeners\WelcomeNewCustomerListener::class,
            \App\Listeners\RegisterCustomerToNewsletter::class,
            \App\Listeners\NotifyAdminViaSlack::class,
        ],
    ];
php artisan event:generate

Why does user needs to be made to wait till all events are executed like image resizing. 
We can use Queus so that application take its own time to execute.  

implements ShouldQueue

For every Queue a database entry is made and job is put in a queue.For every entry there needs to be something to process theq queue. In Dev we can start processing the Queue

php artisan queue:work 

Automate the queue with "&" and store the logs at 
php artisan queue:work > storage/logs/jobs.log &

*/
/* 
Generate Fake Data for a table
php artisan make:factory CompanyFactory -m Company

/database/CompanyFactory.php
refer the create_companies_table migration file for table columns 
    return [
        'ColumnName' => $faker->name,
        'ColumnName' => $faker->phoneNumber,
    ];
For primary key FK relation - Import Model instad of $faker
        'company_id' => factory(\App\Company::class)->create(),


At times after migrate:fresh all the data is lost from the tables What if we want to have fake data in tables after fresh migration

/database/seeds/DatabaseSeeder.php
This has a run() {
    $this->call(UsersTableSeeder::class);
    $this->call(CompaniesTableSeeder::class);
} which calls the seeder files
To create seeder files
php artisan make:seeder UsersTableSeeder
    run() { 
        factory(\App\User::class, 10)->create();
    }
php artisan make:seeder CompaniesTableSeeder
    run() { 
        factory(\App\Company::class, 10)->create();
    }
*/
/* 
php artisan storage:link - Create a symbolic link from "public/storage" to "storage/app/public"
*/
