<?php

include 'include/conn.php';
$task = $_POST['task'];
$sql = "SELECT * FROM tasks WHERE task = '$task'";
$result = mysqli_query($conn, $sql);
if(!($result && mysqli_num_rows($result) > 0)) {
  $sql = "INSERT INTO tasks (task) VALUES ('$task')";
  $result = mysqli_query($conn, $sql);
  echo json_encode(array('status' => 'success', 'message' => '<p class="text-success">Task Added Successfully!</p>'));
}
else{
  echo json_encode(array('status' => 'error', 'message' => '<p class="text-danger">This Task Already Exist</p>'));
}

?>