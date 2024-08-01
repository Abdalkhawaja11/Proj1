<?php
session_start();
$conn = mysqli_connect("localhost", "root", "12345678", "todolist");


if (!$conn) {
    die("Connection error: " . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['title'])) {
    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));

    
    $sql = "INSERT INTO task (title) VALUES ('$title')";
   
$result = mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn) == 1) {
    $_SESSION['success'] = "data insertes successfully";
  
}
 header("location:../index.php ");
}

mysqli_close($conn);
?>
