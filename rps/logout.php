<?php
session_start();

// WA4E Rock Paper Scissors Logout
// Student: Riyana
// Required ID: e9605c3c

// Destroy the session
session_destroy();

// Redirect to index.php
header('Location: index.php');
exit();
?> 