<?php
require_once('../private/initialize.php') ;
$username = '' ;
$password = '' ;
$errors = [] ;
$register = '' ;
if(is_post_request())
{

       $username = $_POST['username'] ?? '' ;
       $password = $_POST['password'] ?? '' ;
       $register = $_POST['register'] ?? '' ;
       if ( $register != '' )
       {
         redirect_to ( "register.php" ) ;
       }
       else {
            if  ( is_blank ( $username ) )
            {
                 $errors[] = "Username field can not be left blank! " ;
             }
            if ( is_blank ( $password ) )
            {
                 $errors[] .= "Password field can not be left blank!" ;
            }
            if ( empty( $errors ) )
            {
                 $user = find_user_by_username ( $username ) ;
                 if ( isset ( $user ) )
                 {
                       if ( password_verify ( $password , $user ['password'] ) )
                       {
                         log_in_user ( $user ) ;
                       }
                       else
                       {
                          echo "The user exists but the login was unsucessful" ;
                       }
                  }
                  else
                  {
                    echo "The user does not exist." ;
                  }
              }
     }
}
?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <title>Voytech</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <style>

   .theblue {
     color: #1daef7;
   }

   .centered {
     position: relative;
     transform: translate(0, -50%);
     text-align: center;
    }

    .middle {
      top: 50%;
    }

  </style>

</head>

<body>
  <div class="container">
    <h1>Log in</h1>

    <div class="row">
      <form class="col s12" action = "" method="post">
        <div class="row">
          <div class="input-field col s6">
            <input id="username" name="username" type="text" class="validate">
            <label for="username">Username</label>
          </div>
          <div class="input-field col s6">
            <input id="password" name="password" type="text" class="validate">
            <label for="password">Password</label>
          </div>
        </div>
        <a class="waves-effect waves-light btn" type="submit">log in</a>
        <a class="waves-effect waves-light btn" type="submit" name="register">Register</a>
        <!-- <input class="waves-effect waves-light btn" type="submit" value="Login"/> -->
        <!-- <input type="submit" name="register" value="Register" /> -->
      </form>
    </div>

  </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
</body>
