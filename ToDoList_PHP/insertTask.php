<?php
include 'include/conn.php';
$task = $_POST['task'];
$sql = "SELECT * FROM tasks WHERE task = '$task'";
$result = mysqli_query($conn, $sql);
if(!($result && mysqli_num_rows($result) > 0)) {
  $sql = "INSERT INTO tasks (task) VALUES ('$task')";
  $result = mysqli_query($conn, $sql);
  $_SESSION['err']=0;
  header('location: index.php');
  exit;
}
else{
  $_SESSION['err']=1;
  header('location: index.php');
  exit;
}
?>