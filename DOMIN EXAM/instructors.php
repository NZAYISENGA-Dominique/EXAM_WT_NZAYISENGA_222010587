<?php
//<!--dominique nzayisenga222010587---> 2024
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

$sql = "SELECT * FROM instructors";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<title>The Information about instructors</title>";
    echo "<h1>The Information about instructors</h1>";
    echo "<table border='1'>
            <tr>
                <th>instructor_id</th>
                <th>user_id</th>
                <th>bio</th>
               <th>expertise</th>
                
            </tr>";

     //<!--dominique nzayisenga222010587---> 2024

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["instructor_id"] . "</td>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["bio"] . "</td>";
        echo "<td>" . $row["expertise"] . "</td>";
        
       
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "no information found";
}

//<!--dominique nzayisenga222010587--->

$conn->close();
?>
