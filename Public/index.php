
<?php
  require_once('../private/initialize.php') ;
?>
<?php
if ( isset ( $_SESSION [ 'username' ] ) )
 {
     log_out_user() ;
 }
else
{
     include ( ABSOLUTEPATH . '/public/login.php') ;
}
?>
