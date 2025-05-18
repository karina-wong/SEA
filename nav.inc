    <header>
      <div class="nav-bar">
        <div class="nav-logo">
          <img
            src="images/Logo_idk.png"
            alt="SEA Company Logo"
            class="animate__lightSpeedInLeft animate__wobble"
          />
        </div>
        <div class="nav-links">
          <nav class="menu about">
            <ul>
              <li <?php echo ($page=="homePage")?"class='active-page'" : ""; ?>><a href="index.php" >Home</a></li>
              <li <?php echo ($page=="aboutPage")?"class='active-page'" : ""; ?>><a href="about.php" >Group Details</a></li>
              <li <?php echo ($page=="jobsPage")?"class='active-page'" : ""; ?>><a href="jobs.php"  >Job Positions</a></li>
              <li <?php echo ($page=="applyPage")?"class='active-page'" : ""; ?>><a href="apply.php" >Apply</a></li>
              <li <?php echo ($page=="managerPage")?"class='active-page'" : ""; ?>><a href="enhancements.php" >Manager</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>