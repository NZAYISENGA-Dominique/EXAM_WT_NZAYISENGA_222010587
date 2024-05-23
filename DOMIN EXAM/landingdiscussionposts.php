<?php
session_start();
//--dominique nzayisenga222010587--->

// Connect to database (replace dbuser_id   , useruser_id, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create'])) {
    $user_id = $_POST['user_id'];
    $course_id = $_POST['course_id'];
    $title= $_POST['title'];
   $content = $_POST['content'];
  
    $sql = "INSERT INTO discussionposts (user_id, course_id,title,content) values (?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssss", $user_id, $course_id , $title,$content);

    if ($stmt->execute()) {
        echo "Record added successfully.";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['post_id'];
    $newuser_id  = $_POST['newuser_id'];
    $newcourse_id = $_POST['newcourse_id'];
    $newtitle= $_POST['newtitle'];
    $newcontent = $_POST['newcontent'];
    
    $sql = "UPDATE discussionposts SET user_id  =?, course_id=?, title=?  ,content=? WHERE post_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssi", $newuser_id, $newcourse_id, $newtitle,$content,$id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['post_id'];

    $sql = "DELETE FROM discussionposts WHERE post_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains content
    $id = $_POST['post_id'];

    // Select user_discussionposts's information from the database
    $sql = "SELECT * FROM discussionposts WHERE post_id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display user_discussionposts information
        $row = $result->fetch_assoc();
        echo "post_id: " . $row["post_id"] . "<br>";
        echo "user_id: " . $row["user_id"] . "<br>";
        echo "course_id: " . $row["course_id"] . "<br>";
        echo "title: " . $row["title"] . "<br>";
        echo "content: " . $row["content"] . "<br>";
       
        
    } else {
        echo "No user found with the provided ID.";
    }
}


?>