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
              <li><a href="index.html">Home</a></li>
              <li><a href="about.html" >Group Details</a></li>
              <li><a href="jobs.html" <?php echo ($page=="jobPage")?"class='active'" : ""; ?> >Job Positions</a></li>
              <li><a href="apply.html">Apply</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>