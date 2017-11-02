
<?php
  require_once('../private/initialize.php') ;
?>
<?php
if ( isset ( $_SESSION [ 'username' ] ) )
 {
     log_out_user ( ) ;
     include ( ABSOLUTEPATH .'/public/app.php' ) ;
 }
else
{
     include ( ABSOLUTEPATH . '/public/login.php') ;
}
?>
