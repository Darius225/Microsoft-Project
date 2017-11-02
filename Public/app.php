<?php
$title = '' ;
$content = '' ;
$tags = '' ;
$category = '' ;
$errors = [] ;
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
<body>


<<<<<<< HEAD
  <div class="container">
    <h1>Click me - Add a new entry to the notebook </h1>
    <form action="" method="post" >
      Title <br />
      <input type="text" name="title" value="<?php $title; ?>" /><br />
      Content <br />
      <input type="text" name="content" value="<?php $content; ?>" /><br />
      <!-- Tags <br />
      <input type="text" name="tags" value="<?php $tags; ?>" /><br />
      Category<br />
      <input type="text" name="category" value="<?php $category ?>" /> <br /> -->
      <input type="submit" name="submit" value="Submit"  />
     </form>

    <h1> Click me - Display Entries </h1>
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
                     <div class="card grey lighten-4" >
                       <div class="card-content white-text">
                         <span class="card-title" style="color:black;">
                           <?php
                             $entry = mysqli_fetch_array ( $entries ) ;
                             echo $entry [ 'title' ] ;
                           ?>
                         </span>
                         <p style="color:black;"> <?php echo $entry [ 'content' ] ; ?> </p>
                       </div>
                     </div>
                   </div>
           <?php }?>
               </div>
      <?php }?>
    </ul >
  </div>

=======
  <div data-role="main" class="ui-content">
    <div data-role="collapsible" id="add" >
      <h1>Click me - Add a new entry to the notebook </h1>
      <form action="" method="post" >
        Title <br />
        <input type="text" name="title" value="<?php $title; ?>" /><br />
        Content <br />
        <input type="text" name="content" value="<?php $content; ?>" /><br />
        Tags <br />
        <input type="text" name="tags" value="<?php $tags; ?>" /><br />
        Category<br />
        <input type="text" name="category" value="<?php $category ?>" /> <br />
        <input type="submit" name="submit" value="Submit"  />
       </form>
    </div>
  </div>

  <div data-role="main" class="ui-content">
    <div data-role="collapsible" id="display">
      <h1> Click me - Display Entries </h1>
      <?php  $entries = get_entries () ; ?>
      <ul >
>>>>>>> ec7440342981608c2239efc6f039c3ac1055eb84

  <div class="container">
    <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Card Title</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Card Title</span>
              <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
              </div>
              <div class="card-action">
              </div>
            </div>
          </div>
      </div>


  <div>

  <!-- <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.js"></script>
</body>
</html>
