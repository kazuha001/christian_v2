<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_POST["print"];

    $stmt = $conn->prepare("SELECT * FROM employees WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {

        $stmt_rows = $stmt_result->fetch_assoc();

        echo '
            <div style="width: 100%; height: auto; display: flex; justify-content: center; align-center: center;
                flex-flow: column;">
                <h1>Printed Personal Information</h1>
                <p>Name: ' . $stmt_rows["fname"] . '</p>
                <p>Email: ' . $stmt_rows["email"] .'</p>
                <p>Contacts: ' . $stmt_rows["contacts"] . '</p>
                <p>Position: ' . $stmt_rows["position"] . '</p>
                <p>Daily: ' . $stmt_rows["days"] . '</p>
                <p>Hourly: ' . $stmt_rows["hours"] . '</p>
                <p>Weekly: ' . $stmt_rows["weeks"] . '</p>
                <p>Monthly Salary: ' . $stmt_rows["salary"] . '</p>
                <p>ID: ' . $stmt_rows["id"] . '</p>
                <p></p>
                <p></p>
                <p>TIME: ' . $stmt_rows["time"] . '</p>
            </div>
        ';

        echo '
            <script>
                window.print();
            </script>
        ';

    }

}



?>