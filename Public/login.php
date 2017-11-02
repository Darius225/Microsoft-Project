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
                 $errors[] = "Username field can not be left blank ! " ;
             }
            if ( is_blank ( $password ) )
            {
                 $errors[] .= "Password field can not be left blank !" ;
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
<!-- saved from url=(0021)https://gvoy.tech/ms/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <title>Voytech</title>
  <meta name="description" conent="My personal website summarising my projects, passions and achievements.">
  <meta name="keywords" content="computer science, games development, design, music">
  <meta name="author" content="Wojciech Golaszewski">
  <meta http-equiv="X-Ua-Compatible" content="IE=edge, chrome=1">

  <link href="./Voytech_files/css" rel="stylesheet">
  <link rel="stylesheet" href="./Voytech_files/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="./Voytech_files/msstyling.css">
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
  <div id="content">
    <h1>Log in</h1>

    <form action="" method="post">
      Username:<br />
      <input type="text" name="username" value="<?php $username; ?>" /><br />
      Password:<br />
      <input type="password" name="password" value="" /><br />
      <input type="submit" value="Login"  />
      <input type="submit" name="register" value="Register" />
    </form>

  </div>
</body>
