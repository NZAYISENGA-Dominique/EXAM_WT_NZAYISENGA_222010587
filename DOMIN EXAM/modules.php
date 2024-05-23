<?php
//nzayisenga dominique 2024
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

$sql = "SELECT * FROM modules";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<title>The Information about modules</title>";
    echo "<h1>The Information about modules</h1>";
    echo "<table border='1'>
            <tr>
                <th>module_id</th>
                <th>course_id</th>
                <th>title</th>
                <th>description</th>
               <th>start_date</th>
               <th>end_date</th>

                
            </tr>";

     //habiyaremye daniel 222007495 april 2024

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["module_id"] . "</td>";
        echo "<td>" . $row["course_id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["start_date"] . "</td>";
        echo "<td>" . $row["end_date"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "no information found";
}

//habiyaremye daniel 222007495 april 2024

$conn->close();
?>
