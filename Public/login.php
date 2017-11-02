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
