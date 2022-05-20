<?php

include 'include/conn.php';
$id = $_POST['id'];
$newTask = $_POST['task'];
$sql = "SELECT * FROM tasks WHERE task = '$newTask'";
$result = mysqli_query($conn, $sql);
if(!($result && mysqli_num_rows($result) > 0)) {
  $sql = "UPDATE `tasks` SET `task` = '$newTask' WHERE `tasks`.`id` = $id;";
  $result = mysqli_query($conn, $sql);
  if($result){
    echo "success";
  }else{
    echo "error";
  }  
}else{
  echo "same";
}

?>