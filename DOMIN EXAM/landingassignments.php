<?php
session_start();
//----NZAYISENGA DOMINIQUE---->

// Connect to database (replace dbcourse_id   , usercourse_id, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $course_id = $_POST['course_id'];
    $title = $_POST['title'];
    $description= $_POST['description'];
   $due_date = $_POST['due_date'];
    $sql = "INSERT INTO assignments (course_id, title,description,due_date) values (?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssss", $course_id, $title , $description,$due_date);

    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['assignment_id'];
    $newcourse_id  = $_POST['newcourse_id'];
    $newtitle = $_POST['newtitle'];
    $newdescription= $_POST['newdescription'];
    $newdue_date = $_POST['newdue_date'];
    $sql = "UPDATE assignments SET course_id  =?, title=?, description=?  ,due_date=? WHERE assignment_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssi", $newcourse_id, $newtitle, $newdescription,$due_date,$id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['assignment_id'];

    $sql = "DELETE FROM assignments WHERE assignment_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains due_date
    $id = $_POST['assignment_id'];

    // Select user_assignments's information from the database
    $sql = "SELECT * FROM assignments WHERE assignment_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display user_assignments information
        $row = $result->fetch_assoc();
        echo "assignment_id: " . $row["assignment_id"] . "<br>";
        echo "course_id: " . $row["course_id"] . "<br>";
        echo "title: " . $row["title"] . "<br>";
        echo "description: " . $row["description"] . "<br>";
        echo "due_date: " . $row["due_date"] . "<br>";
      
        
    } else {
        echo "No user found with the provided ID.";
    }
}


?>