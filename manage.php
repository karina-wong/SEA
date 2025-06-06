<?php
    session_start();
    require_once("settings.php");

    //Variables passed in from prior = email, pwd & db-email

    $is_invalid = false;
    $invalid_email = false;
    $position_search = false;
    $application_search = false;
    $invalid_status_query = false;

    $email = $_SESSION['email']; //so it can be used w/in the $query
    $password = $_SESSION['password']; //so it can be used to validate

    $query = "SELECT * FROM manager WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    //Validates email & password, so even if they get one right & get to this page via URL still won't be logged in
    if (isset($email, $password)){
        $stmt = $conn->prepare("SELECT * FROM manager WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    }

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
        if ($user && $_POST['form_id'] === 'total_delete'){
            if (isset($_POST['delete_button'])){
                $_SESSION['delete_ids'] = $_POST['delete_ids'];
                $_SESSION['update'] = "delete";
                header("Location: update.php");
                exit();   
            } else {
                $is_invalid = true;
            }
            if (isset($_POST['status_button'])){
                $_SESSION['change_ids'] = $_POST['delete_ids'];
                $_SESSION['status_selected'] = $_POST["status"];
                $_SESSION['update'] = "status";
                header("Location: update.php");
                exit();  
            }
            
        } 
    }
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['form_id'])){
        
        if ($user && $_GET['form_id'] === 'position_search'){
            $position_search = true;
            if (isset($_GET['delete_button'])){
                $_SESSION['delete_ids'] = $_GET['delete_ids'];
                $_SESSION['update'] = "delete";
                header("Location: update.php");
                exit();   
            }
            if (isset($_GET['status_button'])){
                $_SESSION['change_ids'] = $_GET['delete_ids'];
                $_SESSION['status_selected'] = $_GET["status"];
                $_SESSION['update'] = "status";
                header("Location: update.php");
                exit();  
            }
            
        } 
        
        if ($user && $_GET['form_id'] === 'application_search'){
            $application_search = true;
            if (isset($_GET['delete_button'])){
                $_SESSION['delete_ids'] = $_GET['delete_ids'];
                $_SESSION['update'] = "delete";
                header("Location: update.php");
                exit();   
            } 

            if (isset($_GET['status_button'])){
                $_SESSION['change_ids'] = $_GET['delete_ids'];
                $_SESSION['status_selected'] = $_GET["status"];
                $_SESSION['update'] = "status";
                header("Location: update.php");
                exit();  
            }
            
        } 
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

    .buttons {
        display: flex;
    }

    .checkbox_applicants{
        position: sticky;
        left: 0;
        background: rgba(32, 43, 56, 0.7);
        border-radius: 4px; 
        z-index: 2;

    }
</style>
</head>
<body>
    <h1>Profile Page</h1>

    <?php if ($user && password_verify($password, $user['password_hash'])): //changed to run validation again?> 

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
                ?>
                </tbody>
            </table>
            <input type="hidden" name="form_id" value="total_delete">
            <?php include('buttons.inc');?>
            
        </form>
        <?php if ($is_invalid): ?>
            <p>❌ Cannot Delete Record</p>  
        <?php endif; ?>
        <div>
            <h4>Search for Position</h4>
            <form method="get" action="">
                <input type="text" name="position_search" id="position_search">
                <input type="submit" value="Search">
            <input type="hidden" name="form_id" value="position_search">
            </form>
            <?php if ($position_search): 
                if (isset($_GET['position_search'])) {
                    $applicants = mysqli_real_escape_string($conn, $_GET['position_search']);
                    $sql = "SELECT * FROM eoi WHERE JobReferenceNumber LIKE '%$applicants%'";
                    $result = mysqli_query($conn, $sql);
                
                    if (mysqli_num_rows($result) > 0) {
                        echo "<form>";
                        echo "<table>";
                        include("table_head.inc");
                        echo "<tbody>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            include("result_table.inc");
                        }
                        echo "</tbody>";
                        echo "</table>";
                        include('buttons.inc');
                        echo '<input type="hidden" name="form_id" value="position_search">';
                        echo "</form>";

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
                    
                    $result = mysqli_query($conn, $sql);
                
                    if (mysqli_num_rows($result) > 0) {
                        echo "<form>";
                        echo "<table>";
                        include("table_head.inc");
                        echo "<tbody>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            include("result_table.inc");
                        }
                        echo "</tbody>";
                        echo "</table>";
                        include('buttons.inc');
                        echo '<input type="hidden" name="form_id" value="application_search">';
                        echo "</form>";
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
        <!-- Display for Existing Jobs  -->
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
            <form action="signup.php" method="get"> <!-- goes to signup.php which is manager registration??-->
                <button type="submit">Register a Manager</button>
            </form>
        </div>
            <div><a href="logout.php">Log out</a></div>

 <?php else: ?>
     <div>Please login first</div>
    <div><a href="admin_login.php">Login Page</a></div>
<?php endif; ?>


</body>
</html>
<!--- ABCD1234 karina@gmail.com (test log in)!>