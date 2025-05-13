<?php
session_start();
require_once("settings.php");

//i_love_web_development@swinburne.co
//105750708@student.swin.edu.au

$invalid_email = false;
// database connection from ChatGPT

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_records'])) {
    if ($_SESSION['username'] === "karina" && !empty($_POST['ids_to_delete'])) {
        $ids = explode(',', $_POST['ids_to_delete']);
        $ids = array_filter(array_map('trim', $ids), 'is_numeric');

        if (!empty($ids)) {
            // Create a dynamic list of placeholders
            $placeholders = implode(',', array_fill(0, count($ids), '?'));

            $stmt = $pdo->prepare("DELETE FROM records WHERE id IN ($placeholders)");
            $stmt->execute($ids);

            echo "<div>✅ Deleted selected records.</div>";
        } else {
            echo "<div>⚠️ Invalid ID format.</div>";
        }
    }
}

?>
