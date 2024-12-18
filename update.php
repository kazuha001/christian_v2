<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Christian</title>

    <!-- CSS links -->

    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container">

        <?php
         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "payroll";

         $conn = new mysqli($servername, $username, $password, $dbname);

         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $update = $_POST["update"];

            $sql = $conn->prepare("SELECT * FROM employees WHERE id = ?");
            $sql->bind_param("i", $update);
            $sql->execute();

            $result = $sql->get_result();

            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {

                    echo '
                    
                    <form id="submit">
            <h1><u>Edit Salary Employees ID No. ' . $row["id"] . '</u></h1>
            <div>
                <label for="fname">Full Name: </label>
                <input type="text" name="fname" placeholder="Enter Full Name" value="' . $row["fname"] . '" required>
            </div>
            <div>   
                <label for="email">Email: </label>
                <input type="text" name="email" placeholder="Enter Your Gmail" value="' . $row["email"] . '" required>
            </div>
            <div>
                <label for="contacts">Contacts: </label>
                <input type="number" name="contacts" placeholder="Enter Your Number" value="' . $row["contacts"] . '" required>
            </div>
            <div>
                <label for="position">Job Position: </label>
                <select name="position" required>
                    <option value="' . $row["position"] . '">' . $row["position"] . ' AS Default</option>
                    <option value="Auto instructor">Auto instructor</option>
                    <option value="Car rental agent">Car rental agent</option>
                    <option value="Tire technician">Tire technician</option>
                    <option value="Car detailer">Car detailer</option>
                    <option value="Vehicle inspector">Vehicle inspector</option>
                    <option value="Auto body repair technician">Auto body repair technician</option>
                    <option value="Auto electrician">Auto electrician</option>
                    <option value="Auto mechanic">Auto mechanic</option>
                    <option value="Auto engineer">Auto engineer</option>
                    <option value="Car salesperson">Car salesperson</option>
                    <option value="Auto sales manager">Auto sales manager</option>
                    <option value="Tow truck driver">Tow truck driver</option>
                    <option value="Process engineer">Process engineer</option>
                    <option value="Quality testing engineer">Quality testing engineer</option>
                    <option value="Auto designer">Auto designer</option>
                </select>
            </div>
            
            <div>
                <label for="days">Daily wage: </label>
                <input id="daily" type="text" name="days" placeholder="Enter Amounts" value="' . $row["days"] . '" required>
            </div>
            
            <div>
                <button type="submit" onclick="calcu()">Submit</button>
            </div>
            

            <input type="hidden" id="hours" name="hours">

            <input type="hidden" id="weeks" name="weeks">

            <input type="hidden" id="salary" name="salary">

            <input type="hidden" name="updateS1" value="' . $row["id"] . '" required>

            </form>
                    
                    ';

                }

            }

         }

         $conn->close();
        
        ?>

        
    </div>
</body>
<script src="script4.js"></script>
<script src="script3.js"></script>
</html>