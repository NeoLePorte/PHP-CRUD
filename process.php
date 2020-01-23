<?php

session_start();

// connects to database
$mysqli = new mysqli('localhost', 'root', '1234', 'crud') or die(mysqli_error($mysqli));

// checks for save button
if (isset($_POST['save'])){
    $BookTitle = $_POST['BookTitle'];
    $BookDescription = $_POST['BookDescription'];

    $mysqli->query("INSERT INTO data (book_title, book_description) VALUES('$BookTitle', '$BookDescription')") or die($mysqli->error());

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}
?>