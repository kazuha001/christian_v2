<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll";

$conn = new mysqli($servername, $username, $password, $dbname);


if($_SERVER["REQUEST_METHOD"] == "POST") {

    $update_id = $_POST["updateS1"];

    $fnameId = $_POST["fname"];
    $emailId = $_POST["email"];
    $genreId = $_POST["contacts"];
    $contactsId = $_POST["position"];
    $daysId = $_POST["days"];
    $hoursId = $_POST["hours"];
    $weeksId = $_POST["weeks"];
    $salaryId = $_POST["salary"];

    $sql = $conn->prepare("UPDATE employees SET fname = ?, email = ?, contacts = ?, position = ?, days = ?, hours = ?, weeks = ?, salary = ?
    WHERE id = ?");

    $sql->bind_param("ssssssssi", $fnameId, $emailId, $genreId, $contactsId, $daysId, $hoursId, $weeksId, $salaryId, $update_id);

    $sql->execute();

    $sql->close();


}




$conn->close();


?>