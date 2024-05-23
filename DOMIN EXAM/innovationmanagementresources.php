<?php
//NZAYISENGA2024
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

$sql = "SELECT * FROM innovationmanagementresources";

$result = $conn->query($sql);
//<!--dominique nzayisenga222010587--->
if ($result->num_rows > 0) {
    echo "<title>The Information about innovationmanagementresources</title>";
    echo "<h1>The Information about innovationmanagementresources</h1>";
    echo "<table border='1'>
            <tr>
                <th>resource_id</th>
                <th>title</th>
               <th>description</th>
               <th>link</th>
                
            </tr>";

     //nzayisenga

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["resource_id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["link"] . "</td>";
        
       
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "no information found";
}

//nzayisenga2024

$conn->close();
?>
