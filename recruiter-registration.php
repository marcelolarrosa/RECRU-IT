<?php 

require_once 'includes/head.php';
require_once 'includes/sql-connection.php';
require_once 'includes/helpers.php';

session_unset();

  $name = isset($_POST['name']) ? mysqli_real_escape_string($database_connection, $_POST['name']) : false;
  $pass = isset($_POST['pass']) ? mysqli_real_escape_string($database_connection, $_POST['pass']) : false;
  $email = isset($_POST['email']) ? mysqli_real_escape_string($database_connection, $_POST['email']) : false;
  $confirmpass = isset($_POST['confirmpass']) ? mysqli_real_escape_string($database_connection, $_POST['confirmpass']) : false;

  // Array of errors that will be used to check if there are any errors in any of the form fields. If the array is empty there are no errors. If the array has at least 1 value, there's at least 1 error/bad user input on the form fields. For example, a name that has numbers in it.
  $errors = array();
  


// NAME VALIDATION
  if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
    $name_validated = true;
  } else {
    $name_validated = false;
    $errors['name'] = "The name is empty or invalid";
  }

  // PASSWORD VALIDATION
  if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_validated = true;
  } else {
    $email_validated = false;
    $errors['email'] = "The email is empty or invalid";
  }

// PASSWORD VALIDATION
  if(!empty($pass)){
    $pass_validated = true;
  } else {
    $pass_validated = false;
    $errors['pass'] = "The password is empty";
  }

if ($pass == $confirmpass) {
      $confirmpass_validated = true;
    }else{
      $confirmpass_validated = false;
      $errors['confirmpass'] = "The two passwords don't match";
    }




  // If there are no errors while validating the form data, save the user in the database.
  if(count($errors) == 0){
      sessionDeleteErrors();
      $save_user = true;
      // Encrypt the user password
      $safe_password = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 4]);
      
      // Write query to add user to the database, and run the query on the database.
      $sql_query = "INSERT INTO users VALUES(null, '$name', '$email', '$safe_password')";
      $sql_create_new_user = mysqli_query($database_connection, $sql_query);

      if($sql_create_new_user){
        $_SESSION['usersaved'] = "The user has been saved in the database";
        header('Refresh:5; URL=login.php');
      }else{
        $_SESSION['errors'] = "Error saving the user in the database";
      }
    } else {
      // If any error is encountered, store the array of $errors within the $_SESSION variable.
      $_SESSION['errors'] = $errors;
  }


// Start a session where the errors will be stored and later displayed to the user using the value of the superglobal $_SESSION variable.


?>

  <div id="register-main-container">
    <div id="wrapper">
      <div id="box-wrapper">
        <img src="img/recru-it-logo-blanco.png" alt="" style="width:150px;margin:0 auto;float:none;display:block;margin-bottom:40px;">
        <div id="box">
          <div id="top_header">
            <h3>Register</h3>
            <h5>Sign up as a recruiter.</h5>
            <h5>(This actually works, try it out!)</h5>

            <?php if(isset($_SESSION['usersaved'])) : ?>
              <div class="alert alert-success">
                <?php echo "You have registered succesfully, you will be redirected to the Login page in 5 seconds" ?>
              </div>
            <?php endif; ?>

            <?php if(isset($_SESSION['errors'])) : ?>
              <div class="alert alert-danger" style="display:block;">
                <?php
                    foreach($errors as $error => $value)
                    {
                      echo $value. "<br>";
                    }
                ?>
              </div>
            <?php endif; ?>

          </div>
          <div id="inputs">
            <form id='login' action='' method='post' accept-charset='UTF-8' style="margin-left:6px;">

              <input type='hidden' name='submitted' id='submitted' value='1' />

              <div class='register-container'>
                <input type='text' name='name' id='name' value='' maxlength="50" size="30" placeholder="Your Name" /><br />
              </div>

              <div class='register-container'>
                <input type='text' name='email' id='email' value='' maxlength="50" size="30" placeholder="Your Email" /><br />
              </div>

              <div class='register-container'>
                <input type='text' name='pass' id='pass' maxlength="50" size="30" placeholder="Password" /><br />
              </div>

              <div class='register-container'>
                <input type='text' name='confirmpass' id='confirmpass' maxlength="50" size="30" placeholder="Confirm Password" /><br />
              </div>

              <div class='register-container'>
                <input type='submit' name='Submit' value='Register' />
              </div>

            </form>

            <div id="bottom">
              <a href="#">Create an account</a>
              <a class="right_a" href="#">Forgot password</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php require_once 'includes/footer.php' ?>