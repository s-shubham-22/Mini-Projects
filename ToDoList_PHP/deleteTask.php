<?php
  include 'include/conn.php';
  $id = $_REQUEST['id'];
  $sql = "DELETE FROM `tasks` WHERE `tasks`.`id` = $id;";
  $result = mysqli_query($conn, $sql);
  header('location: index.php'); 
?>