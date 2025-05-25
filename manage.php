<?php
session_start();
require_once("settings.php");

$is_invalid = false;
$invalid_email = false;
$position_search = false;
$application_search = false;

$_SESSION['db_email']; = $email;

$query = "SELECT * FROM manager WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
    
// Handle job deletion
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_job_id'])) {
    $ref = mysqli_real_escape_string($conn, $_POST['delete_job_id']);
    mysqli_query($conn, "DELETE FROM jobs WHERE refnum = '$ref'");
}

// Handle job insertion
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add_job'])) {
    $ref = mysqli_real_escape_string($conn, $_POST['new_refnum']);
    $title = mysqli_real_escape_string($conn, $_POST['new_title']);
    $salary = mysqli_real_escape_string($conn, $_POST['new_salary']);
    $desc = mysqli_real_escape_string($conn, $_POST['new_description']);
    $report = mysqli_real_escape_string($conn, $_POST['new_report_to']);
    $resps = mysqli_real_escape_string($conn, $_POST['new_responsibilities']);
       $ess = mysqli_real_escape_string($conn, $_POST['new_essential']);
    $pref = mysqli_real_escape_string($conn, $_POST['new_preferable']);

    mysqli_query($conn, "INSERT INTO jobs (refnum, name, salary, description, report_to, responsibilities, essential, preferable)
        VALUES ('$ref', '$title', '$salary', '$desc', '$report', '$resps', '$ess', '$pref')");
}

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    if ($user && $_POST['form_id'] === 'total_delete') {
      $_SESSION['email'] = $_SESSION['db_email'];
      header("Location: update.php");
      exit();
    } 
    $is_invalid = true;
  }
  if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['form_id']) && $_GET['form_id'] === 'position_search'){
      $position_search = true;
  }
  if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['form_id']) && $_GET['form_id'] === 'application_search'){
    $application_search = true;

}
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
    <h1>Profile Page</h1>

    <?php if ($_SESSION['email'] == $_SESSION['db_email']): //issues?> 

        <div>Welcome, <?=htmlspecialchars($_SESSION['name']) //isues ?> </div>
        <h3>Delete Records from Submissions</h3>

    <?php if (!empty($message)) echo "<p>$message</p>"; ?>

        <form method="post">
            <table>
                <?php include("table_head.inc"); ?>
                <tbody>
                    <?php
                    $query = "SELECT * FROM eoi";
                    $result = mysqli_query($conn, $query);
                    
                    if ($result && mysqli_num_rows($result) > 0):
                        while ($row = mysqli_fetch_assoc($result)):
                            include("result_table.inc");
                        endwhile;
                    else:
                        echo "<tr><td colspan='3'>No records found.</td></tr>";
                    endif;
                    
                    if ($records):
                        foreach ($records as $row):
                    
                        include("result_table.inc");
                    
                        endforeach;
                    else:
                    ?>
                        <tr><td colspan="3">No records found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <input type="hidden" name="form_id" value="total_delete">
            <button type="submit" method="post"  name="delete_records">Delete Selected</button>
        </form>
        <div>
            <h4>Search for Position</h4>
            <form method="get" action="">
                <input type="text" name="position_search" id="position_search">
                <input type="submit" value="Search">
            <input type="hidden" name="form_id" value="position_search">
            </form>
            <?php 
            if ($position_search): 
                if (isset($_GET['position_search'])) {
                    $applicants = mysqli_real_escape_string($conn, $_GET['position_search']);
                    $sql = "SELECT * FROM eoi WHERE JobReferenceNumber LIKE '%$applicants%'";
                    $result = mysqli_query($conn, $sql);
                
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        include("table_head.inc");
                        echo "<tbody>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            include("result_table.inc");
                        }
                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "<p>🚫 No matching Applicants found.</p>";
                    }
                } else {
                    echo "<p>Please enter a position to search.</p>";
                }
             endif; 
             ?>
            <h4>Search for Applicant</h4>
            <form action="" method="get">
            <input type="text" name="application_search" id="application_search">
            <input type="submit" value="Search">
            <input type="hidden" name="form_id" value="application_search">
            </form>
            
            <?php if ($application_search): 
                if (isset($_GET['application_search'])) {
                    $applicants = mysqli_real_escape_string($conn, $_GET['application_search']);
                    $sql = "SELECT * FROM eoi WHERE FirstName LIKE '%$applicants%' OR LastName LIKE '%$applicants%'";
                    //should have fields for first/last name?? A bit redundant???
                    $result = mysqli_query($conn, $sql);
                
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        include("table_head.inc");
                        echo "<tbody>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            include("result_table.inc");
                        }
                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "<p>🚫 No matching Applicants found.</p>";
                    }
                } else {
                    echo "<p>Please enter a position to search.</p>";
                }
             endif; 
             ?>
        </div>

        <div>
        <hr>
        <h3>Manage Job Listings</h3>
        <!-- Display for Existing Jobs -->
        <table>
            <thead>
                <tr>
                    <th>Reference</th>
                    <th>Title</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $jobs_result = mysqli_query($conn, "SELECT * FROM jobs");
                while ($job = mysqli_fetch_assoc($jobs_result)):
                ?>
                <tr>
                    <td><?= htmlspecialchars($job['refnum']) ?></td>
                    <td><?= htmlspecialchars($job['name']) ?></td>
                    <td><?= htmlspecialchars($job['salary']) ?></td>
                    <td>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="delete_job_id" value="<?= $job['refnum'] ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Add New Job stuff-->
        <h4>Add New Job</h4>
        <form method="post">
            <label>Ref Number: <input type="text" name="new_refnum" required></label><br>
            <label>Title: <input type="text" name="new_title" required></label><br>
            <label>Salary: <input type="text" name="new_salary" required></label><br>
            <label>Description:<br><textarea name="new_description" rows="4" required></textarea></label><br>
            <label>Reports To: <input type="text" name="new_report_to" required></label><br>
            <label>Responsibilities (Use // between points):<br><textarea name="new_responsibilities" required></textarea></label><br>
            <label>Essential (Use // between points):<br><textarea name="new_essential" required></textarea></label><br>
            <label>Preferable (Use // between points):<br><textarea name="new_preferable" required></textarea></label><br>
            <button type="submit" name="add_job">Add Job</button>
        </form>
        </div>
        <div>
            <form action="signup.php" method="get">
                <button type="submit">Register a Manager</button>
            </form>
        </div>
            <div><a href="logout.php">Log out</a></div>

 <?php else: ?>
     <div>Please login first</div>
    <div><a href="admin_login.php">Login Page</a></div>
<?php endif; ?>

<?php if ($is_invalid): ?>
    <p>❌ Cannot Delete Record</p>  
<?php endif; ?>

</body>
</html>