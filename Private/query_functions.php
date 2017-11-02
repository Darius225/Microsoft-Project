<?php
function find_user_by_username ( $username )
{
  global $db ;
  $sql = "SELECT * FROM users " ;
  $sql .= "WHERE username = '" . $username ."' " ;
  $sql .= "LIMIT 1" ;
  $result = mysqli_query( $db , $sql ) ;
  if ( $result )
  {
      $user = mysqli_fetch_assoc( $result ) ;
      return $user  ;
  }
}
function register_user ( $email , $username , $password )
{
  global $db ;
  $hashed_password = password_hash ( $password , PASSWORD_BCRYPT ) ;
  $sql = "INSERT INTO users ( email , username , password  ) " ;
  $sql .= "VALUES ( " ;
  $sql .= " '" . $email . "' , " ;
  $sql .= " '" . $username ."' , " ;
  $sql .= " '" . $hashed_password . "'  " ;
  $sql .= " )" ;
  $result = mysqli_query($db, $sql);
  if($result)
  {
     return true;
  }
  else
  {
     echo mysqli_error($db);
     db_disconnect($db);
     exit;
  }
}
function add_entry ( $title , $content , $tags , $category )
{
  global $db ;
  $sql = "INSERT INTO entries ( title , content , tags , category  ) " ;
  $sql .= "VALUES ( " ;
  $sql .= " '" . $title . "' , " ;
  $sql .= " '" . $content . "' , " ;
  $sql .= " '" . $tags ."' , " ;
  $sql .= " '" . $category . "'  " ;
  $sql .= " )" ;
  $result = mysqli_query($db, $sql);
  if($result)
  {
     return true;
  }
  else
  {
     echo mysqli_error($db);
     db_disconnect($db);
     exit;
  }
}
function get_entries ( )
{
  global $db ;
  $sql = "SELECT * FROM entries " ;
  $sql .= "ORDER BY id ASC" ;
  $result = mysqli_query( $db , $sql ) ;
  return $result ;
}
?>
