<?php
session_start();
require_once("settings.php");

$is_invalid = false;
$invalid_email = false;
$position_search = false;
$application_search = false;

$email = $_SESSION['email']; //so it can be used w/in the $query

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
<style>
    table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}
</style>
</head>
<body>
   <h1>PAGE TESTER</h1>
   <div>Welcome, <?=htmlspecialchars($_SESSION['name']) //isues ?> </div>
   <div>Welcome, <?=htmlspecialchars($_SESSION['db_email']) //isues ?> </div>
   <div>Welcome, <?=htmlspecialchars($_SESSION['email']) //isues ?> </div>
</body>
</html>
<!--- ABCD1234 karina@gmail.com (test log in)!>