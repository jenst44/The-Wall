<?php 

define('DB_HOST', 'localhost');
define('DB_USERS', 'root');
define('DB_PASS', 'root');
define('DB_DATABASE', 'the_wall');

$connection = new mysqli(DB_HOST, DB_USERS, DB_PASS, DB_DATABASE);


if ($connection->connect_errno) 
{
   die("Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error);
}

function fetch_all($query){
  $data = array();
  global $connection;
  $result = $connection->query($query);

  while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
  }
  return $data;
}