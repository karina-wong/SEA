<?php
$mysqli = require __DIR__ . "/settings.php";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM jobs ORDER BY name DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Job description of for SEA company" />
    <meta
      name="keywords"
      content="SEA, jobs, job position details, job details"
    />
    <meta name="author" content="Karina Wong" />
    <!--Include statement for all stylesheet links-->
    <?php include 'links.inc'; ?>
    <title>Job Position Description Page - SEA</title>
    <link href="styles/styles.css" rel="stylesheet" />
  </head>
  <body>
    
  <?php
  $page = "jobsPage";
  include_once "nav.inc";
?>
    <!-- The content below was created using GenAI. GenAI prompt:
  In the context of this company generate information for the following job decisions based on the following guidelines: Data analyst, Software developer Company’s position description reference number (5 alphanumeric characters)
• Position title
• Brief description of the position
• Salary range
• The title of the position to whom the successful applicant will report
• Key responsibilities. A list of the specific tasks that are to be performed
• Required qualifications, skills, knowledge and attributes. These should be divided into
“essential” and “preferable”. These requirements should include such things as
programming languages required, number-of-years of experience required, etc..”-->
    <main>
      <h1 class="job-page-title">Job Position Description</h1>
      <div class="job-description">
        <div class="jobs">
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<section class='job'>";
                        echo "<h2>" . $row['name'] . "</h2>";
                        echo "<h2>Reference Number: " . $row['id'] . "</h2>";
                        echo "<h3>Salary Range</h3>";
                        echo "<p>" . $row['salary'] . "</p>";
                        echo "<h3>Description</h3>";
                        echo "<p>" . $row['description'] . "</p>";
                        echo "<h3>Reports To: " . $row['report_to'] . "</h3>";
                        echo "<h3>Key Responsibilities</h3>";
                        echo "<ul><li>" . str_replace("//", "</li><li>", $row['responsibilities']) . "</li></ul>";
                        echo "<h3>Required Qualifications, Skills, Knowledge, and Attributes:</h3>";
                        echo "<h4>Essential:</h4><ul><li>" . str_replace("//", "</li><li>", $row['essential']) . "</li></ul>";
                        echo "<h4>Preferable:</h4><ul><li>" . str_replace("//", "</li><li>", $row['preferable']) . "</li></ul>";
                        echo "</section><hr />";
                    }
                } else {
                    echo "<p>No jobs available.</p>";
                }
                $conn->close();
                ?>
        </div>
        <aside class="how-to">
          <div>
            <h3>How to Apply</h3>
            <ol>
              <li>Go to Applications page</li>
              <li>Fill in your information</li>
              <li>Submit the form</li>
            </ol>
            <p>
              We will try and contact you within 5 business days, thank you!
            </p>
          </div>
        </aside>
      </div>
    </main>

    <div class="up-arrow"><a href="#">↑</a></div>
    <!--Include statement for footer-->
    <?php include 'footer.inc'; ?>
  </body>
</html>