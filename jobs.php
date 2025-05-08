<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
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
          <section class="data-analyst">
            <h2>Data Analyst</h2>
            <h2>Reference Number: DA102</h2>
            <h3>Salary Range</h3>
            <p>$75,000 - $95,000 per annum</p>
            <h3>Description</h3>
            <p>
              The Data Analyst will support SEA's data-driven decision-making by
              collecting, analyzing, and interpreting complex datasets. The
              successful candidate will generate actionable insights to guide
              our strategic initiatives, improve user experience, and support
              product and marketing teams.
            </p>
            <h3>Reports To: Lead Data Scientist</h3>

            <h3>Key Responsibilities</h3>
            <ul>
              <li>
                Collect, clean, and validate large datasets from internal
                systems and external sources
              </li>
              <li>
                Design and implement dashboards and reports using BI tools
                (e.g., Tableau, Power BI)
              </li>
              <li>
                Identify patterns, trends, and opportunities in SEA's product
                usage and member engagement
              </li>
              <li>
                Collaborate with software and marketing teams to optimize data
                collection and analysis
              </li>
              <li>
                Present findings to stakeholders and assist in strategic
                planning
              </li>
              <li>
                Automate repetitive data processes and build scalable data
                pipelines
              </li>
            </ul>
            <h3>Required Qualifications, Skills, Knowledge, and Attributes:</h3>
            <h4>Essential:</h4>
            <ul>
              <li>
                Bachelor's degree in Data Science, Statistics, Computer Science,
                or a related field
              </li>
              <li>
                Minimum 2 years' experience in a data analyst or similar role
              </li>
              <li>Proficiency in SQL and Python or R</li>
              <li>
                Strong knowledge of statistical techniques and data modeling
              </li>
              <li>
                Experience with data visualization tools (e.g., Tableau, Power
                BI)
              </li>
              <li>Excellent analytical and problem-solving skills</li>
              <li>Strong communication and presentation abilities</li>
            </ul>

            <h4>Preferable:</h4>
            <ul>
              <li>
                Experience with cloud platforms (AWS, Azure, or Google Cloud)
              </li>
              <li>Familiarity with machine learning algorithms</li>
              <li>
                Understanding of web analytics tools (Google Analytics,
                Mixpanel)
              </li>
            </ul>
          </section>
          <hr />
          <section class="software-developer">
            <h2>Software Developer</h2>
            <h2>Reference Number: SD309</h2>
            <h3>Salary Range</h3>
            <p>$85,000 - $110,000 per annum</p>
            <h3>Description</h3>
            <p>
              The Software Developer will play a crucial role in building and
              maintaining SEA's digital platforms. This role requires hands-on
              experience in full-stack development and a passion for creating
              clean, scalable, and secure software.
            </p>
            <h3>Reports To: Senior Software Engineer</h3>

            <h3>Key Responsibilities</h3>
            <ul>
              <li>
                Design, develop, test, and deploy web applications and backend
                services
              </li>
              <li>
                Collaborate with designers, data analysts, and other developers
                to deliver innovative solutions
              </li>
              <li>Write clean, efficient, and well-documented code</li>
              <li>
                Conduct code reviews and contribute to continuous integration
                pipelines
              </li>
              <li>Debug and resolve software defects and performance issues</li>
              <li>
                Participate in Agile development cycles and team stand-ups
              </li>
            </ul>
            <h3>Required Qualifications, Skills, Knowledge, and Attributes:</h3>
            <h4>Essential:</h4>
            <ul>
              <li>
                Bachelor's degree in Software Engineering, Computer Science, or
                related field
              </li>
              <li>Minimum 3 years' experience in software development</li>
              <li>
                Proficiency in one or more backend languages (e.g., Node.js,
                Python, Java)
              </li>
              <li>
                Strong knowledge of front-end frameworks (e.g., React, Vue.js)
              </li>
              <li>Familiarity with REST APIs and version control (Git)</li>
              <li>
                Solid understanding of software design patterns and architecture
              </li>
              <li>Excellent problem-solving and communication skills</li>
            </ul>

            <h4>Preferable:</h4>
            <ul>
              <li>
                Experience with DevOps practices and tools (Docker, Jenkins,
                CI/CD pipelines)
              </li>
              <li>Knowledge of database systems (PostgreSQL, MongoDB)</li>
              <li>
                Exposure to cybersecurity principles and secure coding practices
              </li>

              <li>Experience working with Agile/Scrum methodologies</li>
            </ul>
          </section>
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
