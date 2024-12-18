<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll";

$conn = new mysqli($servername, $username, $password, $dbname);

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $deleteId = $_POST["delete"];

    $sql = $conn->prepare("DELETE FROM employees WHERE id = ?");
    $sql->bind_param("i", $deleteId);
    $sql->execute();
    $sql->close();

    header('Location: http://localhost/Christian-respo-main/retrieve.php');
}


$conn->close();


?>