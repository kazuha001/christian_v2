<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM admin1 WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {

        $admin = $stmt_result->fetch_assoc();

        if ($password === $admin["password"]) {

            echo '
                <script>
                    alert("Log In Succesfully")
                    window.location.href = "retrieve.php"
                </script>
            ';


        } else {

            echo '
                <script>
                    alert("Incorrect Username and Password")
                </script>
            ';


        }

    } else {

        echo '
            <script>
                alert("Username Not Existed")
            </script>
        ';


    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>

    <link rel="stylesheet" href="login.css">

</head>
<body>
    <div class="container">
        <div class="login">
            <form method="POST">
            <div class="login_content">
                <h1>Admin Log In</h1>
                <label for="username">
                    username: <input type="text" id="username" name="username" autocomplete="username" required>
                </label>
                <label for="password">
                    password: <input type="password" id="password" name="password" autocomplete="current-password" required>
                </label>
                <div class="buttons">
                    <button type="submit">Log In</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
</html>

