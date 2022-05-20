<?php 
  include 'include/conn.php';
  $id = $_POST['id'];
  $newTask = $_POST['task'];
  $sql = "UPDATE `tasks` SET `task` = '$newTask' WHERE `tasks`.`id` = $id;";
  $result = mysqli_query($conn, $sql);
  header('location: index.php'); 
?>