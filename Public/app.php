<?php
$title = '' ;
$content = '' ;
$tags = '' ;
$category = '' ;
$errors = [] ;
$log_out = $_POST['log_out'] ?? '' ;
if ( $log_out != '' )
{
   log_out_user() ;
   redirect_to("index.php") ;
}
 if ( is_post_request() )
 {
    $title = $_POST['title'] ?? '' ;
    $content = $_POST['content'] ?? '' ;
  //  $tags = $_POST['tags'] ?? '' ;
  //  $category = $_POST['category'] ?? '' ;
    if ( is_blank( $title ) && is_blank( $content ) && is_blank( $tags ) && is_blank( $category )) {
      $errors[] = "The form cannot be left empty" ;
    }
    if ( empty ( $errors ) ) {
        add_entry ( $title , $content , $tags , $category ) ;
    }
 }
?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body class="grey lighten-4">
  <nav>
     <div class="nav-wrapper amber darken-1" style="color:black;">
       <span class="brand-logo" style="margin-left:15px; color:black;"><b>Keep</b></span>
       <div id="nav-mobile" class="right">
        <form method="post" action ="">
         <input class="waves-light btn amber" type="submit" name="log_out" value="log out" style="margin: 15px; color:black;">
        </form>
       </div>
     </div>
   </nav>
  <div class="container">
    <br><br>
    <form class="container" action="" method="post" style="width:500; line-height:1px" >
      <input class="waves-light btn amber right" type="submit" name="submit" value="save" style="color:black;">
      <input class="input-field inline" type="text" name="title" placeholder="Title" style="font-size:20px; font-weight:bold; border-bottom:0;">
      <input type="text" name="content" placeholder="Take a note..." style="font-size:16px; border-bottom:0;" autofocus>
     </form>

    <?php  $entries = get_entries_reverse () ; ?>
    <ul >
        <?php
            $array_length =mysqli_num_rows ( $entries ) ;
            $step = 3; $wid = 100/$step;
            for ( $i = 0 ; $i < $array_length ; $i +=  $step )
            {?>
               <div class="row">
                 <?php
                 for ( $j = 0 ; $j < $step ; $j ++)
                 {?>
                   <div class="col s12 " style="width:<?php echo $wid."%"?>;">
                     <div class="card" >
                       <div class="card-content white-text">
                         <span class="card-title" style="color:black;">
                           <?php
                             $entry = mysqli_fetch_array ( $entries ) ;
                             echo $entry [ 'title' ] ;
                           ?>
                         </span>
                         <p style="color:black;"> <?php echo $entry [ 'content' ] ; ?> </p>
                       </div>
                       <!-- <div class="card-action">
                           <input class="waves-light btn-flat" type="submit" name="delete" value="delete" style="color:#ffc107; font-weight:bold;">
                       </div> -->
                     </div>
                   </div>
           <?php }?>
               </div>
      <?php }?>
    </ul >
  </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
</body>
</html>
