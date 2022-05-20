<?php

include 'include/conn.php';
$id = $_POST['id'];
$sql = "DELETE FROM `tasks` WHERE `tasks`.`id` = $id;";
$result = mysqli_query($conn, $sql);
if($result) {
  echo "success";
} else {
  echo "error";
}

?>