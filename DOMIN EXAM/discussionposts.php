<?php
//<!--NZAYISENGA dominiquenzayisenga417@gmail.com 222010587--->
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

$sql = "SELECT * FROM discussionposts";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<title>The Information about discussionposts</title>";
    echo "<h1>The Information about discussionposts</h1>";
    echo "<table border='1'>
            <tr>
                <th>post_id</th>
                <th>user_id</th>
                <th>course_id</th>
                <th>title</th>
               <th>content</th>
              

                
            </tr>";

    //<!--NZAYISENGA dominiquenzayisenga417@gmail.com 222010587--->

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["post_id"] . "</td>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["course_id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["content"] . "</td>";
        
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "no information found";
}

//<!--NZAYISENGA dominiquenzayisenga417@gmail.com 222010587--->

$conn->close();
?>
