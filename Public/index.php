
<?php
  require_once('../private/initialize.php') ;
?>
<?php
if ( isset ( $_SESSION [ 'username' ] ) )
{
     include ( ABSOLUTEPATH .'/public/app.php' ) ;
 }
else
{
     include ( ABSOLUTEPATH . '/public/login.php') ;
}
?>
