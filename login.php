<?php 

require_once 'includes/head.php';
require_once 'includes/sql-connection.php';



  if(isset($_POST)) {
    $email = trim($_POST['email']);
    $pass = $_POST['pass'];
  
      // To verify the pass I use the PHP password_verify function, this function compares the two values. I compare the $pass that's stored in the $_POST variable, which is the pass that the user has typed, with the password that's stored in the database and that corresponds with the email that was also typed by the user that's trying to log in.

    // First I need to get the data that corresponds with the email submitted.
    $sql_query = "SELECT * FROM users WHERE email = '$email'";
    $get_user_data = mysqli_query($database_connection, $sql_query);

    // If the query was possible, meaning if there exists a user with that email in the database, I retrieve all the data from that row using mysqli_fetch_assoc, which will return an associative array with all the columns and values, id, name, email, pass. Then with the password_verify I compare the $pass submitted, with the $user_data['password'] (the value of the user password saved in the database).
    if($get_user_data && mysqli_num_rows($get_user_data) == 1){
      $user_data = mysqli_fetch_assoc($get_user_data);
      $verify_pass = password_verify($pass, $user_data['password']);

            if($verify_pass){
                $_SESSION['currentuser'] = $user_data;
                header('Location:index.php');
                if(isset($_SESSION['error_login'])){
                  session_unset($_SESSION['error_login']);
                } else {
                  $_SESSION['error_login'] = "Invalid username or password!";
                };
            };

    } else {
      $_SESSION['error_login'] = "Invalid username or password!";
    };
  };


?>



  <div id="login-main-container">
    <div id="wrapper">
      <div id="box-wrapper">
        <img src="img/recru-it-logo-blanco.png" alt="" style="width:150px;margin:0 auto;float:none;display:block;margin-bottom:40px;">
        <div id="box">
          <div id="top_header">
            <h3>Login</h3>
            <h5>Sign in to your recruiter backend.</h5>
          </div>
          <div id="inputs">
            <form id='login' action='' method='post' accept-charset='UTF-8'>

              <input type='hidden' name='submitted' id='submitted' value='1' />

              <div class='login-container'>
                <input type='text' name='email' id='email' value='' maxlength="50" size="30" placeholder="Email" /><br />
              </div>

              <div class='login-container'>
                <input type='password' name='pass' id='pass' maxlength="50" size="30" placeholder="Password" /><br />
              </div>

              <div class='login-container'>
                <input type='submit' name='submit' value='Login' />
              </div>

            </form>

            <div id="bottom">
              <a href="recruiter-registration.php">Create an account</a>
              <a class="right_a" href="#">Forgot password</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
