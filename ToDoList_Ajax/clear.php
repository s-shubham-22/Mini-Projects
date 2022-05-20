<?php

include 'include/conn.php';
$sql = "TRUNCATE TABLE `tasks`";
$result = mysqli_query($conn, $sql);
if($result) {
  echo "success";
} else {
  echo "error";
}

?>