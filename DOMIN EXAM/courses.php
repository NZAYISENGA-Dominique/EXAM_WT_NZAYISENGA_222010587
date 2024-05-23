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

$sql = "SELECT * FROM courses";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<title>The Information about courses</title>";
    echo "<h1>The Information about courses</h1>";
    echo "<table border='1'>
            <tr>
                <th>course_id</th>
                <th>title</th>
                <th>description</th>
                <th>instructor_id</th>
               <th>start_date</th>
               <th>end_date</th>
               <th>price</th>

                
            </tr>";

     //<!--dominique nzayisenga222010587---> 2024

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["course_id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["instructor_id"] . "</td>";
        echo "<td>" . $row["start_date"] . "</td>";
        echo "<td>" . $row["end_date"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "no information found";
}



$conn->close();
?>
