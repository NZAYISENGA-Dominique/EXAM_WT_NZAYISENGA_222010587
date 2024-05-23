<?php
session_start();
//<!--dominique nzayisenga222010587--->

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to index.php
header("Location: index.html");
exit();
?>
