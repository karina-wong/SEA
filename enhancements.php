<!-- Explained enhancements -->
 <!--
    • Created a manager registration page with server side validation requiring unique
    username and a password rule, and store this information in a table.

    • Controlled access to manage.php by checking username and password.
    admin_login.php & checks validation so if someone went to it via code it still wouldn't work

    • Created a manage job listings section in manage.php where an admin can add new job listings and delete existing ones, 
    this automatically updates on jobs.php and apply.php

-->
<?php
$page = "enhancementsPage";
include_once("nav.inc");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Enhancements</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">

        <meta charset="UTF-8" />
        <meta name="description" content="Enhancements details" />
        <meta name="keywords" content="SEA, enhancements" />
        <meta name="author" content="Cee Chungyingruangrung" />
    </head>
    <body>
    <main>
      <h1>Enhancements</h1>
      <div>
        <div>
          <section>
            <ul>
                <li>
                Created a manager registration page with server side validation requiring unique
                username and a password rule, and store this information in a table. 
                </li>
                <li>
                    Controlled access to manage.php by checking username and password.
                    admin_login.php & checks validation so if someone went to it via code it still wouldn't work 
                </li>
                <li>
                    Created a manage job listings section in manage.php where an admin can add new job listings and delete existing ones, 
                    this automatically updates on jobs.php and apply.php
                </li>

            
            </ul>
          </section>  
        </div>
        </div>
    </main>

    <div class="up-arrow"><a href="#">↑</a></div>
    <!--Include statement for footer-->
    <?php include 'footer.inc'; ?>
  </body>
</html>