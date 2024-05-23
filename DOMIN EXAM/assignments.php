<?php
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

$sql = "SELECT * FROM assignments";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<title>The Information about assignments</title>";
    echo "<h1>The Information about assignments</h1>";
    echo "<table border='1'>
            <tr>
                <th>assignment_id</th>
                <th>course_id</th>
                <th>title</th>
                <th>description</th>
               <th>due_date</th>
               

                
            </tr>";

     //nzayisenga dominique 2024

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["assignment_id"] . "</td>";
        echo "<td>" . $row["course_id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["due_date"] . "</td>";
       
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "no information found";
}

////nzayisenga dominique 2024

$conn->close();
?>
