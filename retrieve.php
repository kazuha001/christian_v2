<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieve Database</title>

    <!-- CSS Links -->

    <link rel="stylesheet" href="tablestyle.css">

</head>
<body>
    
    <div class="container">
        <table class="tables_employees">
            <thead>
                <th>Employees Id</th>
                <th>Full Name</th>
                <th>Emails</th>
                <th>Contacts</th>
                <th>Position</th>
                <th>Days</th>
                <th>Hours</th>
                <th>Weeks</th>
                <th>Salary</th>
                <th>Action</th>
            </thead>
            <tbody>
            <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "payroll";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $stmt = $conn->prepare("SELECT * FROM employees");
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0) {

        $rows = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($rows as $row) {

            echo '
            
                <tr>
                    <td style="width: 100px;">' . $row["id"] . '</td>
                    <td style="width: 230px;">' . $row["fname"] . '</td>
                    <td style="width: 200px;">' . $row["email"] . '</td>
                    <td style="width: 120px;">' . $row["contacts"] . '</td>
                    <td style="width: 100px;">' . $row["position"] . '</td>
                    <td style="width: 80px;">' . $row["days"] . '</td>
                    <td style="width: 80px;">' . $row["hours"] . '</td>
                    <td style="width: 80px;">' . $row["weeks"] . '</td>
                    <td style="width: 80px;">' . $row["salary"] . '</td>
                    <td style="width: 250px; display: flex; justify-content: space-evenly; align-items: center; height: 200px; flex-flow: column;">
                        <form method="POST" action="update.php">
                            <button>update</button>
                            <input type="hidden" name="update" value="' . $row["id"] . '" required>
                        </form>
                        <form method="POST" action="delete.php">
                            <button onclick="deletes()">delete</button>
                            <input type="hidden" name="delete" value="' . $row["id"] . '" required>
                        </form>
                        <form method="POST" action="printf.php">
                            <button>Print</button>
                            <input type="hidden" name="print" value="' . $row["id"] . '" required>
                        </form>
                    </td>
                </tr>
            
            ';

        }

    }

    ?>
                
            </tbody>
        </table>
    </div>
</body>

<script src="script1.js"></script>


</html>