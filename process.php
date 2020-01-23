<?php
// connects to database
$mysqli = new mysqli('localhost', 'root', '1234', 'crud') or die(mysqli_error($mysqli));

// checks for save button
if (isset($_POST['save'])){
    $BookTitle = $_POST['BookTitle'];
    $BookDescription = $_POST['BookDescription'];

    $mysqli->query("INSERT INTO data (book_title, book_description) VALUES('$BookTitle', '$BookDescription')") or die($mysqli->error);
}
?>