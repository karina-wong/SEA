<?php
session_start();
require_once("settings.php");

$invalid_email = false;

$query = "SELECT * FROM manager WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    if ($user) {
      $_SESSION['email'] = $_SESSION['db_email'];
      header("Location: update.php");
      exit();
    } 
    $is_invalid = true;
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

    <?php if (isset($_SESSION['username']) && $_SESSION['email'] = $_SESSION['db_email']): ?>

        <div>Welcome, <?=htmlspecialchars($_SESSION['name']) ?> </div>
        <h3>Delete Records from Submissions</h3>

<?php if (!empty($message)) echo "<p>$message</p>"; ?>

        <form method="post">
            <table>
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>EOInumber</th>
                        <th>Reference No.</th> 
                        <th>First name</th>
                        <th>Last name</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Street Address</th>
                        <th>Suburb</th>
                        <th>State</th>
                        <th>Postcode</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Skills</th>
                        <th>ENUM</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $pdo->query("SELECT * FROM eoi");
                    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if ($records):
                        foreach ($records as $row):
                    ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="delete_ids[]" value="<?= htmlspecialchars($row['id']) ?>">
                            </td>
                            <td><?= htmlspecialchars($row['EOInumber']) ?></td>
                            <td><?= htmlspecialchars($row['JobReferenceNumber']) ?></td>
                            <td><?= htmlspecialchars($row['FirstName']) ?></td>
                            <td><?= htmlspecialchars($row['LastName']) ?></td>
                            <td><?= htmlspecialchars($row['DOB']) ?></td>
                            <td><?= htmlspecialchars($row['Gender']) ?></td>
                            <td><?= htmlspecialchars($row['StreetAddress']) ?></td>
                            <td><?= htmlspecialchars($row['Suburb']) ?></td>
                            <td><?= htmlspecialchars($row['State']) ?></td>
                            <td><?= htmlspecialchars($row['Postcode']) ?></td>
                            <td><?= htmlspecialchars($row['Email']) ?></td>
                            <td><?= htmlspecialchars($row['Phone']) ?></td>
                            <td><?= htmlspecialchars($row['Skill1']) ?>,
                            <?= htmlspecialchars($row['Skill2']) ?>,
                            <?= htmlspecialchars($row['Skill3']) ?>
                            <?= htmlspecialchars($row['Skill4']) ?>
                            <?= htmlspecialchars($row['Skill5']) ?>
                            <?= htmlspecialchars($row['OtherSkills']) ?>
                            </td>
                            <td><?= htmlspecialchars($row['ENUM']) ?></td>
                        </tr>
                    <?php
                        endforeach;
                    else:
                    ?>
                        <tr><td colspan="3">No records found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <button type="submit" method="post"  name="delete_records">Delete Selected</button>
        </form>
        
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