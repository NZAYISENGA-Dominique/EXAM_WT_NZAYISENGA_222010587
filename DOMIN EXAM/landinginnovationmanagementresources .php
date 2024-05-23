<?php
session_start();
//-dominique nzayisenga222010587--->

// Connect to database (replace dbuserid, useruserid, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    
    $title = $_POST['title'];
    $description = $_POST['description'];
   $link = $_POST['link'];

    $sql = "INSERT INTO innovationmanagementresources ( title, description,link) values (?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss",$title, $description,$link);

    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['resource_id'];
   
    $newtitle = $_POST['newtitle'];
   
    $newdescription = $_POST['newdescription'];
    $newlink = $_POST['newlink'];
   
    $sql = "UPDATE innovationmanagementresources SET  title=?, description=? ,link=? WHERE resource_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssi", $newtitle, $newdescription,$link,$id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['resource_id'];

    $sql = "DELETE FROM innovationmanagementresources WHERE resource_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains resource_id
    $id = $_POST['resource_id'];

    // Select user_innovationmanagementresources's information from the database
    $sql = "SELECT * FROM innovationmanagementresources WHERE resource_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display user_innovationmanagementresources information
        $row = $result->fetch_assoc();
        echo "resource_id: " . $row["resource_id"] . "<br>";
        echo "title: " . $row["title"] . "<br>";
        echo "description: " . $row["description"] . "<br>";
         echo "link: " . $row["link"] . "<br>";
        
    } else {
        echo "No user found with the provided ID.";
    }
}


?>