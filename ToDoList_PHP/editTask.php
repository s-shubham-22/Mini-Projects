<?php include 'include/conn.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./asset/css/style.css">

    <!-- Font Awsome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css">

    <!-- JavaScript -->
    <script src="./asset/js/editTask.js"></script>

    <title>Edit Task</title>
  </head>
  <body>
    <center><h1 class="mb-3">Edit Task</h1></center>
    <?php
      $id = $_REQUEST['id'];
      $sql = "SELECT * FROM `tasks` WHERE `id` = $id";
      $result = mysqli_query($conn, $sql);
      if($result && mysqli_affected_rows($conn) > 0)
      {
        $row = mysqli_fetch_assoc($result);
        $task = $row['task'];
      } else {
        header('location: index.php');
        exit;
      }
    ?>
    
    <div class="container">
      <form method="post" action="./edit.php">
        <div class="mb-3 form">
          <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" hidd>
          <input type="text" class="form-control mb-3" id="task" aria-describedby="emailHelp" name="task" placeholder="Enter you Task" value="<?php echo $row['task'] ?>">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>

      </form>
    </div>
    
    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="./updateTask.php" method="post">
              <div class="form-group">
                <input type="text" class="form-control" id="task" aria-describedby="emailHelp" name="task" value="<?php echo $row['task']; ?>">
              </div>
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="editTask(<?php $row['id'] ?>, )">Save changes</button>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>