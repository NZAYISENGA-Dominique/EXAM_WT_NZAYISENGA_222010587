<?php
//<!--dominique nzayisenga222010587 2024
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

$sql = "SELECT * FROM enrollments";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<title>The Information about enrollments</title>";
    echo "<h1>The Information about enrollments</h1>";
    echo "<table border='1'>
            <tr>
                <th>enrollment_id</th>
                <th>user_id</th>
                <th>course_id</th>
               <th>enrollment_date</th>
                
            </tr>";

     //nzayisenga dominique bit year two 2024

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["enrollment_id"] . "</td>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["course_id"] . "</td>";
        echo "<td>" . $row["enrollment_date"] . "</td>";
        
       
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "no information found";
}

//nzayisenga dominique 2024

$conn->close();
?>
