<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: apply.php");  // Redirect if accessed directly
    exit();
}

require_once("settings.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sanitize function
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Retrieve and clean data
$jobRef = clean_input($_POST["reference_number"]);
$fname = clean_input($_POST["first_name"]);
$lname = clean_input($_POST["last_name"]);
$dob = clean_input($_POST["dob"]);
$gender = clean_input($_POST["gender"] ?? '');
$street = clean_input($_POST["street_address"]);
$suburb = clean_input($_POST["suburb"]);
$state = clean_input($_POST["state"]);
$postcode = clean_input($_POST["postcode"]);
$email = clean_input($_POST["email"]);
$phone = clean_input($_POST["phone"]);
$otherSkills = clean_input($_POST["otherskills"]);

$skills = $_POST["tskills"] ?? [];
$skill1 = $skills[0] ?? null;
$skill2 = $skills[1] ?? null;
$skill3 = $skills[2] ?? null;
$skill4 = $skills[3] ?? null;
$skill5 = $skills[4] ?? null;

// Validation checks
$errors = [];

if (!preg_match("/^[a-zA-Z]{1,20}$/", $fname)) $errors[] = "Invalid first name.";
if (!preg_match("/^[a-zA-Z]{1,20}$/", $lname)) $errors[] = "Invalid last name.";
if (!DateTime::createFromFormat('Y-m-d', $dob)) $errors[] = "Invalid date format.";
if (!in_array($state, ['VIC','NSW','QLD','NT','WA','SA','TAS','ACT'])) $errors[] = "Invalid state.";
if (!preg_match("/^\d{4}$/", $postcode)) $errors[] = "Postcode must be 4 digits.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email.";
if (!preg_match("/^[0-9 ]{8,12}$/", $phone)) $errors[] = "Invalid phone number.";

if (!empty($errors)) {
    echo "<h2>Error</h2><ul>";
    foreach ($errors as $e) echo "<li>$e</li>";
    echo "</ul><a href='apply.php'>Back to form</a>";
    exit();
}


// Create table if not exists
$tableQuery = <<<SQL
CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    JobReferenceNumber VARCHAR(5) NOT NULL,
    FirstName VARCHAR(20) NOT NULL,
    LastName VARCHAR(20) NOT NULL,
    DOB DATE NOT NULL,
    Gender VARCHAR(6),
    StreetAddress VARCHAR(40) NOT NULL,
    Suburb VARCHAR(40) NOT NULL,
    State VARCHAR(3) NOT NULL,
    Postcode CHAR(4) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Phone VARCHAR(12) NOT NULL,
    Skill1 VARCHAR(30),
    Skill2 VARCHAR(30),
    Skill3 VARCHAR(30),
    Skill4 VARCHAR(30),
    Skill5 VARCHAR(30),
    OtherSkills TEXT,
    Status ENUM('New', 'Current', 'Final') DEFAULT 'New'
);
SQL;

mysqli_query($conn, $tableQuery);

// Insert record
$query = "INSERT INTO eoi (JobReferenceNumber, FirstName, LastName, DOB, Gender, StreetAddress, Suburb, State, Postcode, Email, Phone, Skill1, Skill2, Skill3, Skill4, Skill5, OtherSkills)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "sssssssssssssssss", $jobRef, $fname, $lname, $dob, $gender, $street, $suburb, $state, $postcode, $email, $phone, $skill1, $skill2, $skill3, $skill4, $skill5, $otherSkills);

if (mysqli_stmt_execute($stmt)) {
    $eoi_id = mysqli_insert_id($conn);
    echo "<h2>Application Successful</h2>";
    echo "<p>Your Expression of Interest number is: $eoi_id</p>";
} else {
    echo "<p>Error submitting EOI: " . mysqli_error($conn) . "</p>";
}

mysqli_close($conn);
?>
