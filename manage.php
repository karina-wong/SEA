<?php
session_start();
require_once("settings.php");

$is_invalid = false;
$invalid_email = false;
$position_search = false;
$application_search = false;

$email = $_SESSION['db_email'];

$query = "SELECT * FROM manager WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

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

    <?php if ($_SESSION['email'] == $_SESSION['db_email']): ?>

        <div>Welcome, <?=htmlspecialchars($_SESSION['name']) ?> </div>
        <h3>Delete Records from Submissions</h3>

    <?php if (!empty($message)) echo "<p>$message</p>"; ?>

        <form method="post">
            <table>
                <?php include("table_head.inc"); ?>
                <tbody>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM eoi");
                    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
                    //should have fields for first/last name??
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