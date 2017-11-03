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
                              redirect_to("index.php") ;
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
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Voytech</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body class="grey lighten-4">
  <nav>
     <div class="nav-wrapper amber darken-1" style="color:black;">
       <span class="brand-logo" style="margin-left:15px; color:black;"><b>Keep</b></span>
       <div id="nav-mobile" class="right">
       </div>
     </div>
   </nav>
   <br><br>

  <div class="container ">

    <div class="row">
      <form class="col s12" action = "" method="post">
        <div class="row">
          <div class="input-field col s6">
            <input id="username" name="username" type="text" class="validate" autofocus>
            <label for="username">Username</label>
          </div>
          <div class="input-field col s6">
            <input id="password" name="password" type="password" class="validate">
            <label for="password">Password</label>
          </div>
        </div>
        <input class="waves-light btn amber" type="submit" value="log in" style="color:black;">
        <input class="waves-light btn amber" type="submit" name="register" value="Registration" style="color:black;">
      </form>
    </div>

  </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
</body>
