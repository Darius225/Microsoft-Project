
<?php
  require_once('../private/initialize.php') ;
?>
<?php
if ( isset ( $_SESSION [ 'username' ] ) )
<<<<<<< HEAD
 {
     log_out_user() ;
=======
{
     include ( ABSOLUTEPATH .'/public/app.php' ) ;
>>>>>>> 645a18946a1eb3c8dffa369ae53a98f96b2ea41d
 }
else
{
     include ( ABSOLUTEPATH . '/public/login.php') ;
}
?>
