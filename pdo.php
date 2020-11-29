<?php
$hostname = 'sql1.njit.edu';
$username = 'jc2284_proj';
$password = 'w9hLvRFP';
$dsn = "mysql:host=$hostname;dbname=$username";
try {
    $db = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>