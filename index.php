<!doctype html>
<html lang="en">
  <head>
    <title>PHP-CRUD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php require_once 'process.php'; ?>
<div class="container">
  <?php 
    $mysqli = new mysqli('localhost', 'root', '1234', 'crud') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
    // pre_r($result);
    // pre_r($result->fetch_assoc());
    ?>


    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Book Description</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <?php 
                while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td scope="row"><?php echo $row['book_title']?></td>
                    <td scope="row"><?php echo $row['book_description']?></td>
                    <td></td>
                </tr>
                <?php endwhile; ?>
        </table>
    </div>



    <?php
    function pre_r( $array ) {
        echo '<pre>';
        print_r($array);
        echo '<pre>';
    }
  ?>

    <div class="row justify-content-center">
        <form action="process.php" method="POST">
            <div class="form-group">
                    <!-- Book Title Input -->
                <label for="BookTitle">Book Title</label>
                <input type="text"
                class="form-control" name="BookTitle" id="" aria-describedby="helpId" placeholder="Enter Book Here">
            </div>
            <div class="form-group">
                    <!-- Book Description Input -->
                <label for="BookDescription">Book Description</label>
                <textarea class="form-control" name="BookDescription" id="" rows="3" placeholder="Enter Description Here"></textarea>
                <small id="helpId" class="form-text text-muted">Enter the name of the book and a short description.</small>
            </div>
                    <!-- Save button -->
            <div class="form-group">
                <button type="submit" name="save" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    </div>

  
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>