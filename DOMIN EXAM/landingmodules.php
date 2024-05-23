<?php
session_start();
//----NZAYISENGA DOMINIQUE---->

// Connect to database (replace dbcourse_id   , usercourse_id, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $course_id = $_POST['course_id'];
    $title = $_POST['title'];
    $description= $_POST['description'];
   $start_date = $_POST['start_date'];
   $end_date = $_POST['end_date'];
    $sql = "INSERT INTO modules (course_id, title,description,start_date,end_date) values (?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssss", $course_id, $title , $description,$start_date,$end_date);

    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['module_id'];
    $newcourse_id  = $_POST['newcourse_id'];
    $newtitle = $_POST['newtitle'];
    $newdescription= $_POST['newdescription'];
    $newstart_date = $_POST['newstart_date'];
    $newend_date = $_POST['newend_date'];
    $sql = "UPDATE modules SET course_id  =?, title=?, description=?  ,start_date=?,end_date=? WHERE module_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssssi", $newcourse_id, $newtitle, $newdescription,$start_date,$end_date,$id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['start_date'];

    $sql = "DELETE FROM modules WHERE module_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains start_date
    $id = $_POST['module_id'];

    // Select user_modules's information from the database
    $sql = "SELECT * FROM modules WHERE module_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display user_modules information
        $row = $result->fetch_assoc();
        echo "module_id: " . $row["module_id"] . "<br>";
        echo "course_id: " . $row["course_id"] . "<br>";
        echo "title: " . $row["title"] . "<br>";
        echo "description: " . $row["description"] . "<br>";
        echo "start_date: " . $row["start_date"] . "<br>";
        echo "end_date: " . $row["end_date"] . "<br>";
        
    } else {
        echo "No user found with the provided ID.";
    }
}


?>