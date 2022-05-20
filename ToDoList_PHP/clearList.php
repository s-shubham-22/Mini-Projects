<?php
include 'include/conn.php';
$sql = "TRUNCATE TABLE `tasks`";
$result = mysqli_query($conn, $sql);
// $result = $conn->query($sql);
if($result) {
  ?> <script>alert("Cleared List!");</script> <?php
} else {
  ?> <script>alert("Operation Unsuccessful!");</script> <?php
}
header('location: index.php');
?>