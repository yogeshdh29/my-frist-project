<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <title></title>
  </head>
  <body>
<ul class="nav">
  <li class="nav-item">
    <a class="nav-link" href="/">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/contact">Contact</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/about">About</a>
  </li>
  <li class="nav-item"> 
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>
<div class="container">
@yield('content')
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $( "#state" ).change(function() {
              var state_id = $(this).val();
              if(state_id) {
                $.ajax({
                  type: 'GET',              
                  url: '/getCity/'+state_id,
                  success: function(data) {
                    $('#city').empty();
                    $.each(data, function (key,value) {
                      $('#city').append('<option value="'+key+'">'+ value +'</option>');
                    });
                  }
                });
              }
            });

            var html = '<div class="form-group pb-2"><label for="education">Education</label> <input type="text" name="education" id="education"> <label for="year">Year Complete</label> <input type="number" placeholder="YYYY" min="1900" max="2020" name="year_complete" id="year_complete"> <input type="button" name="add_edu" id="add_edu" class="btn btn-warning" value="+"><input type="button" name="del_edu" id="del_edu" class="btn btn-danger" value="-"> </div>';

            var max = 5;
            var x = 1;

            $('#add_edu').click(function(){
              if(x <= max){
                $('#ed').append(html);
                x++;
              } 
            });
            $('#ed').on('click','#del_edu', function(){
              $(this).closest('div').remove();
              x--;
            });
           $('#image').on('change', function(){ //on file input change
              if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
              {
                  var data = $(this)[0].files; //this file data
                   
                  $.each(data, function(index, file){ //loop though each file
                      if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                          var fRead = new FileReader(); //new filereader
                          fRead.onload = (function(file){ //trigger function on successful read
                          return function(e) {
                              var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                              $('#preview_img').append(img); //append image to output element
                          };
                          })(file);
                          fRead.readAsDataURL(file); //URL representing the file's data.
                      }
                  });
                   
              }else{
                  alert("Your browser doesn't support File API!"); //if File API is absent
              }
           });
$('.js-example-basic-multiple').select2();
        });
    </script>
  </body>
</html>