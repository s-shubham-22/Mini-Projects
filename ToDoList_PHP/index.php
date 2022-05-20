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
    <center><h1 class="mb-3">To Do List</h1></center>

    <div class="container">
      <form method="post" action="./insertTask.php">
        <div class="mb-3 form">
        <?php
          if(isset($_SESSION['err']) && $_SESSION['err'] ==1)
          {
            ?>
            <p class="text-danger">This Task Already Exist</p>
            <?php
            $_SESSION['err']='';
            unset($_SESSION['err']);
          }

          if(isset($_SESSION['err']) && $_SESSION['err'] ==0)
          {
            ?>
            <p class="text-success">Task Added Successfully!</p>
            <?php
            $_SESSION['err']='';
            unset($_SESSION['err']);
          }
        ?>
          <input type="text" class="form-control mb-3" id="task" aria-describedby="emailHelp" name="task" placeholder="Enter you Task">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>

      </form>
    </div>

    <form action="./index.php" method="post">
      <div class="tasks center mb-3">
        <ul class="list-group">
          <?php
            $sql = "SELECT * FROM tasks";
            $result = mysqli_query($conn, $sql);
            foreach($result as $row){
              ?>
              <li class="list-group-item list-task">
                <div class="task-text">
                  <input class="form-check-input me-1" type="checkbox" value="">
                  <?php echo $row['task']; ?>
                </div>
                <div class="manipulate-task">
                  <!-- Icon trigger modal -->
                  <a href="editTask.php?id=<?php echo $row['id'] ?>">
                    <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="18px"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z"/></svg>
                  </a>
                  <a id="delete-url-<?php echo $row['id'] ?>" href-url="deleteTask.php?id=<?php echo $row['id'] ?>" href="javascript:void(0);" onclick="confirmation(<?php echo $row['id'] ?>);">
                   <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="16px"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/></svg>
                  </a>
                </div>
              </li>
              <?php
            }
          ?>
        </ul>
      </div>
      <div class="manipulate mb-3">
        <center>
          <?php
            $sql = "SELECT * FROM tasks";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
              ?>
              <a href="./clearList.php"><button type="button" class="btn btn-success">Clear List</button></a>
              <?php
            }
          ?>
        </center>
      </div>
    </form>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script>
      function confirmation(id){
        var answer = confirm("Are you sure you want to delete this task?");
        if(answer){
          window.location = document.getElementById('delete-url-' + id).getAttribute('href-url'); 
        }
      }
    </script>
  </body>
  </html>
