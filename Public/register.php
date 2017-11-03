<?php
  require_once('../private/initialize.php') ;
  $email = '' ;
  $username = '' ;
  $password = '' ;
  $errors = array() ;
  if ( is_post_request () )
  {
       $email =$_POST [ 'email' ] ?? '' ;
       $username = $_POST [ 'username' ] ?? '' ;
       $password = $_POST [ 'password' ] ?? '' ;
       $login = $_POST [ 'Back_to_login' ] ?? '' ;
       if ( $login != '' )
       {
            redirect_to ( 'index.php' ) ;
       }
       else {
             if ( is_blank ( $email ) || !has_valid_email_format ( $email ) )
             {
                 $errors[] .= "You should submit a valid email !" ;
             }
             if ( is_blank ( $username ) )
             {
                 $errors[] .= "You can not leave the username field blank !" ;
             }
             if ( is_blank ( $password ) )
             {
                 $errors[] .= "You can not leave the password field blank !" ;
             }
             $user = find_user_by_username ( $username ) ?? '' ;
             if ( ! is_blank( $user ) )
             {
                $errors[] .= "There is already a user registered with the same username." ;
             }
             $user = find_user_by_username ( $email ) ?? '' ;
             if ( ! is_blank( $user ) )
             {
                $errors[] .= "There is already a user registered with the same email." ;
             }
             if ( empty ( $errors ) )
             {
                 if ( register_user ( $email , $username , $password ) )
                 {
                      redirect_to ( 'index.php' ) ;
                 }
             }
            }
 }
 ?>
 <?php
    if ( !empty($errors) )
    {
         redirect_to( 'register.php' ) ;
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
  <div class="container">
    <div class="row">
      <form class="col s12" action = "" method="post">
        <div class="row">
          <div class="input-field col s6">
            <input id="email" name="email" type="text" class="validate" autofocus>
            <label for="email">E-mail</label>
          </div>
          <div class="input-field col s6">
            <input id="username" name="username" type="text" class="validate myunderline">
            <label for="username">Username</label>
          </div>
          <div class="input-field col s6">
            <input id="password" name="password" type="text" class="validate">
            <label for="password">Password</label>
          </div>
        </div>
       <input class="waves-light btn amber" type="submit" name="submit" value="Register" style="color:black;">
       <input class="waves-light btn amber" type="submit" name="Back_to_login" value="Back to login" style="color:black;">
      </form>
    </div>
  </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
</body>
