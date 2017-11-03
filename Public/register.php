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

  <style>

    .myunderline {
      border-bottom-color: #ffc107;
      -webkit-box-shadow-color: #ffc107;
      box-shadow: #ffc107;

    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Registration</h2>

      <div class="row">
      <form class="col s12" action = "" method="post">
        <div class="row">
          <div class="input-field col s6">
            <input id="email" name="email" type="text" class="validate">
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
       <input class="waves-light btn amber" type="submit" name="submit" value="Submit"  />
       <input class="waves-light btn amber" type="submit" name="Back_to_login" value="Back to login"  />
      </form>
    </div>
  </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
</body>
