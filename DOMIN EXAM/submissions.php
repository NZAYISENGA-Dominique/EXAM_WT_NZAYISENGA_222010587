<?php
//<!--dominique nzayisenga222010587--->april 2024
                // Database connection parameters
$servername = "localhost";
$username = "DOMINIQUE";
$password = "Nzayisenga12@";
$dbname = "virtual_innovation_management_courses_platform";


                // Create database connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check database connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

$sql = "SELECT * FROM submissions";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<title>The Information about submissions</title>";
    echo "<h1>The Information about submissions</h1>";
    echo "<table border='1'>
            <tr>
                <th>submission_id</th>
                <th>user_id</th>
               <th>assignment_id</th>
                <th>submission_date</th>
                 <th>grade</th>
                
            </tr>";

     //habiyaremye daniel 222007495 april 2024

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["submission_id"] . "</td>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["assignment_id"] . "</td>";
        echo "<td>" . $row["submission_date"] . "</td>";
        echo "<td>" . $row["grade"] . "</td>";
        
       
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "no information found";
}

//<!--dominique nzayisenga222010587---> april 2024

$conn->close();
?>
