<?php
session_start();
require_once("settings.php");

$invalid_email = false;
// database connection from ChatGPT

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Profile Page</h1>

    <?php if (isset($_SESSION['username']) && in_array($_SESSION['username'], ["Karina", "Cee", "Nathan"])): ?>

        <div>Welcome, <?=htmlspecialchars($_SESSION['username']) ?> </div>
        <h3>Delete Records from Submissions</h3>

<?php if (!empty($message)) echo "<p>$message</p>"; ?>

    <form method="post" action="">
        <table>
            <thead>
                <tr>
                    <th>Select</th>
                    <th>ID</th>
                    <th>Reference No.</th> 
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM applications");
                $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($records):
                    foreach ($records as $row):
                ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="delete_ids[]" value="<?= htmlspecialchars($row['id']) ?>">
                        </td>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['reference_no']) ?></td>
                        <td><?= htmlspecialchars($row['first_name']) ?></td>
                        <td><?= htmlspecialchars($row['last_name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                    </tr>
                <?php
                    endforeach;
                else:
                ?>
                    <tr><td colspan="3">No records found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </form>
    <button type="submit" name="delete_records">Delete Selected</button>
        <div><a href="logout.php">Log out</a></div>
    <?php else: ?>
        <div>Please login first</div>
        <div><a href="admin_login.php">Login Page</a></div>
    <?php endif; ?>
</body>
</html>