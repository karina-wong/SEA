<?php
include_once("settings.php");

if (empty($_POST["name"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}
if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Password must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);


$mysqli = mysqli_connect($host, $user, $pwd, $sql_db);

$sql = "INSERT INTO manager (name, email, password_hash)
        VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                    $_POST["name"],
                    $_POST["email"],
                    $password_hash);

if ($stmt->execute()) {
    echo "Registration Successful";
    echo "<p><a href='index.php'>Back to Home Page</a></p>";
} else {

    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
    die($mysqli->error . " " . $mysqli->errno);
    }
}
?>