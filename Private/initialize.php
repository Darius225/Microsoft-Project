<?php
    ob_start() ;
    session_start() ;

    require_once ( 'database.php' ) ;
    require_once ( 'query_functions.php' ) ;
    require_once ( 'auth_functions.php' ) ;
    require_once ( 'form_validation_functions.php' ) ;
    require_once ( 'javascript_functions.php' ) ;
    require_once ( 'RegularFunctions.php' ) ;

    $db = db_connect ( ) ;

    $result = dirname( __FILE__ , 2 ) ;
    $actual_link = ( isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"   ;


    define ( "ABSOLUTEPATH" , $result ) ;
    define ( "LAYOUTPATH" , $result . "/private/layout" ) ;
    define ( "PRIVATEPATH" , $result . "/private" ) ;
    define ( "UPLOAD_DIR" , $result . "/solutions " ) ;
 ?>
