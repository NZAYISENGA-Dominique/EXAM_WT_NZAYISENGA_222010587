<?php
session_start();
//--NZAYISENGA-->

// Connect to database (replace dbuserid, useruserid, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    
    $user_id = $_POST['user_id'];
    $assignment_id = $_POST['assignment_id'];
    $submission_date = $_POST['submission_date'];
    $grade = $_POST['grade'];
   

    $sql = "INSERT INTO submissions ( user_id,assignment_id,submission_date,grade) VALUES (?,?,? ,?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssss",$user_id,$assignment_id,$submission_date,$grade);

    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['submission_id'];
   
    $newuser_id = $_POST['newuser_id'];
   
    $newassignment_id = $_POST['newassignment_id'];
     $newsubmission_date = $_POST['newsubmission_date'];
      $newgrade = $_POST['newgrade'];
   
    $sql = "UPDATE submissions SET  user_id=?, assignment_id=?,submission_date=?,grade=?  WHERE submission_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssi", $newuser_id, $newassignment_id,$newsubmission_date,$newgrade,$id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['submission_id'];

    $sql = "DELETE FROM submissions WHERE submission_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains submission_id
    $id = $_POST['submission_id'];

    // Select user_submissions's information from the database
    $sql = "SELECT * FROM submissions WHERE submission_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display user_submissions information
        $row = $result->fetch_assoc();
        echo "submission_id: " . $row["submission_id"] . "<br>";
        echo "user_id: " . $row["user_id"] . "<br>";
        echo "assignment_id: " . $row["assignment_id"] . "<br>";
        echo "submission_date: " . $row["submission_date"] . "<br>";
        echo "grade: " . $row["grade"] . "<br>";
        
    } else {
        echo "No user found with the provided ID.";
    }
}


?>