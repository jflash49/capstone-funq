<?php
// include the class
require ("PassHash.php");
 
 
 
 ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <div class="row">
      <div class="large-12 columns">
        <h1>Registration</h1>
      </div>
    </div>

    <div class="row">
      <div class="large-8 medium-8 columns">

       
        
      
        
        <hr />
                
        <h5>We&rsquo;ll just need a bit of information:</h5>
        <form>
				  <div class="row">
				    <div class="large-12 columns">
				      <label>First Name</label>
				      <input type="text" placeholder="John" />
				    </div>
				  </div>

          <div class="row">
            <div class="large-12 columns">
              <label>Last Name</label>
              <input type="text" placeholder="Doe" />
            </div>
          </div>
				  <div class="row">
				    <div class="large-4 medium-4 columns">
				      <label>Age</label>
				      <input type="text" placeholder="How old are you?" />
				    </div>
				    
				   
				  </div>
				  <div class="row">
				    <div class="large-12 columns">
				      <label>School</label>
				      <select>
				        <option value="school1">Sch 1</option>
				        <option value="school2">Sch 2</option>
				        <option value="school3">Sch 3</option>
				        <option value="school4">Sch 4</option>
				      </select>
				    </div>
				  </div>
				  <div class="row">
				    <div class="large-6 medium-6 columns">
				      <label>Are you a male or female?</label>
				      <input type="radio" name="male_option" value="Male" id="radio-male"><label for="radio-male">Male</label>
				      <input type="radio" name="female_option" value="Female" id="radio-female"><label for="radio-female">Female</label>
				    </div>
				    
				  </div>
				  
				</form>
        <a class="radius button" href="#">Submit</a>
      </div>     

      
    </div>
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  <?php
// read all form input from $_POST
// ...
 
// do your regular form validation stuff
// ...
 
// hash the password
$pass_hash = PassHash::hash($_POST['password']);
 
// store all user info in the DB, excluding $_POST['password']
// store $pass_hash instead
// ...
?>
</body>
</html>