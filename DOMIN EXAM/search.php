<?php
session_start();

// Connect to database (replace dbname, username, password with actual credentials)
require_once "databaseconnection.php";

if (isset($_GET['query'])) {
    $searchTerm = $_GET['query'];
    $output = "";

    $queries = [
        'users' => "SELECT user_id, username, password, firstname, lastname, role, email FROM users WHERE user_id LIKE ?",
        'assignments' => "SELECT assignment_id, course_id, title, description, due_date FROM assignments WHERE assignment_id LIKE ?",
        'courses' => "SELECT course_id, title, description, instructor_id, start_date, end_date, price FROM courses WHERE course_id LIKE ?",
        'discussionposts' => "SELECT post_id, user_id, course_id, title, content FROM discussionposts WHERE post_id LIKE ?",
        'enrollments' => "SELECT enrollment_id, course_id, user_id, enrollment_date FROM enrollments WHERE enrollment_id LIKE ?",
        'innovationmanagementresources' => "SELECT title, description, link FROM innovationmanagementresources WHERE resource_id LIKE ?",
        'submissions' => "SELECT submission_id, user_id, assignment_id, submission_date, grade FROM submissions WHERE submission_id LIKE ?",
        'instructors' => "SELECT instructor_id, user_id, bio, expertise FROM instructors WHERE instructor_id LIKE ?",
        'modules' => "SELECT module_id, course_id, title, description, start_date, end_date FROM modules WHERE module_id LIKE ?"
    ];

    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $searchTerm); // Assuming search term is a string, adjust "s" if necessary
        $stmt->execute();
        $result = $stmt->get_result();

        $output .= "<h3>Table of $table:</h3>";
        
        if ($result) {
            if ($result->num_rows > 0) {
                $output .= "<ul>";
                while ($row = $result->fetch_assoc()) {
                    $output .= "<li>";
                    foreach ($row as $key => $value) {
                        $output .= "$key: $value, ";
                    }
                    $output .= "</li>";
                }
                $output .= "</ul>";
            } else {
                $output .= "<p>No results found in $table matching the search term: '$searchTerm'</p>";
            }
        } else {
            $output .= "<p>Error executing query: " . $connection->error . "</p>";
        }
    }

    echo $output;

    $connection->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>
