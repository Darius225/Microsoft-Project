<?php
function log_in_user ( $user )
{
    session_regenerate_id();
    $_SESSION['id'] = $user [ 'id' ] ;
    $_SESSION['last_login'] = time();
    $_SESSION['username'] = $user [ 'username' ] ;
    return true;
}
  function log_out_user ( )
   {
       unset ( $_SESSION [ 'solver_id' ] ) ;
       unset ( $_SESSION [ 'last_login' ] ) ;
       unset ( $_SESSION [ 'username' ] ) ;
       return true ;
   }
?>
