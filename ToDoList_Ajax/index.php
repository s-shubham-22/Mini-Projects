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

    <title>To Do List</title>
  </head>
  <body>
    <center>
      <h1 class="mb-3">To Do List</h1>
      <div class="message"></div>
    </center>

    <div class="container">
      <form onsubmit="return insertTask();" id="insert-form">
        <div class="mb-3 form">
          <input type="text" class="form-control mb-3" id="task" aria-describedby="emailHelp" name="task" placeholder="Enter you Task" required >
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>

    <form action="./index.php" method="post">
      <div class="tasks center mb-3">
        <ul class="list-group" id="task-list">
        </ul>
      </div>
      <center>
        <div class="manipulate mb-3">
          <?php
            $sql = "SELECT * FROM tasks";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
              ?>
              <button type="button" class="btn btn-success" onclick="return clearList();">Clear List</button>
              <?php
            }
          ?>
        </div>
      </center>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./asset/js/script.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

  </body>
</html>
