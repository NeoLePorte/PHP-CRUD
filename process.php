<?php

session_start();
$id = 0;
$update = false;
$BookTitle = "";
$BookDescription = "";


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

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());

    if ($result->num_rows){
        $row = $result->fetch_array();
        $BookTitle = $row['book_title'];
        $BookDescription = $row['book_description'];
    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $BookTitle = $_POST['book_title'];
    $BookDescription = $_POST['book_description'];

    $mysqli->query("UPDATE data SET book_title='$BookTitle', book_description='$BookDescription' WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
    header('location: index.php');
}
?>