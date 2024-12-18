<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    echo "error";

} else {
    echo "Connected";
}

if ($_SERVER["REQUEST_METHOD"] = "POST") {

$fnameId = $_POST["fname"];
$emailId = $_POST["email"];
$contactsId = $_POST["contacts"];
$positionId = $_POST["position"];
$daysId = $_POST["days"];
$hoursId = $_POST["hours"];
$weeksId = $_POST["weeks"];
$salaryId = $_POST["salary"];

$sql = $conn->prepare("INSERT INTO `employees`(`fname`, `email`, `contacts`, `position`, `days`, `hours`, `weeks`, `salary`)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

$sql->bind_param("ssssssss", $fnameId, $emailId, $contactsId, $positionId, $daysId, $hoursId, $weeksId, $salaryId);

$sql->execute();

$sql->close();


}

$conn->close();

?>