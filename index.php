<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="Homepage for SEA" />
    <meta name="keywords" content="SEA, application, jobs," />
    <meta name="author" content="Cee Chungyingruangrung" />
    <title>SEA</title>
    <!--Include statement for all stylesheet links-->
    <?php include 'links.inc'; ?>
  </head>
  <body>

  <?php
  $page = "homePage";
  include_once "nav.inc";
?>

    <main class="home-page">
      <div class="about-company">
        <div class="company-pic">
          <img
            class="home-pic"
            src="images/homepic.jpg"
            alt="SEA's homepage picture"
          />
          
        </div>
        <div class="company-intro">
          <h2 class="company-paragraph">About The Company</h2>
          <p class="company-paragraph">
            At SEA, we’re a dynamic collective of software engineers,
            developers, and tech enthusiasts committed to innovation,
            collaboration, and continuous learning. We create a space where
            ideas turn into action — and code turns into impact. Whether you're
            a student, a professional, or just passionate about tech, there's a
            place for you in our community.
          </p>
          <a class="read-more" href="about.html">Read more</a>
        </div>
      </div>
      <div class="mission">
        <h2>Our Mission:</h2>
        <p>
          To empower software engineers at every level by fostering a culture of
          innovation, skill-building, and meaningful collaboration. We aim to
          shape the future of technology by providing opportunities for
          learning, networking, and real-world project experience.
        </p>

        <h2>Why Choose SEA:</h2>
        <ul>
          <li>
            💡 Innovative Community — Be part of a forward-thinking network of
            developers and creators.
          </li>
          <li>
            🚀 Career Development — Access workshops, mentorships, hackathons,
            and job connections.
          </li>
          <li>
            🌐 Real Impact — Collaborate on open-source and community-driven
            tech projects.
          </li>
          <li>
            🤝 Inclusive Culture — Join a diverse, welcoming environment where
            every voice matters.
          </li>
          <li>
            📚 Learning Resources — Stay on the cutting edge with curated
            courses, events, and tech talks.
          </li>
        </ul>
      </div>
      <div class="mission">
        <h2>Join Our Team</h2>
        <p>
          With the everchanging landscape of our domain, we are constantly in
          need of new talent and ideas. If you think you have what it takes to
          join us, check out the list of open job positions below!!
        </p>
        <a class="read-more" href="jobs.html">Read more</a>
      </div>
    </main>
    <!--Include statement for footer-->
    <?php include 'footer.inc'; ?>
  </body>
</html>
