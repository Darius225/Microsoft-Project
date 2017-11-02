<?php
 if ( is_post_request() )
 {
    $title = $_POST['title'] ?? '' ;
    $content = $_POST['content'] ?? '' ;
    $tags = $_POST['tags'] ?? '' ;
    $category = $_POST['category'] ?? '' ;
    add_entry ( $title , $content , $tags , $category ) ;
 }
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>Collapsible Blocks</h1>
  </div>

  <div data-role="main" class="ui-content">
    <div data-role="collapsible">
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
    <div data-role="collapsible">
      <h1> Click me - Display Entries </h1>
      <?php  $entries = get_entries () ; ?>
      <ul >

          <?php
              while ($entry = mysqli_fetch_assoc ( $entries ))
              {
           ?>
                      <tr>
                       <td>     <?php echo $entry [ 'title' ] ; ?>  </td>
                      <td> <input type="button" name-"abc" id="abc" onclick="return Deleteqry(<?php echo $orderID ?>);"/> </td>
                     </tr>
                       </a>
              <?php
               }
               ?>
      </ul >
    </div>
  </div>

</body>
</html>
