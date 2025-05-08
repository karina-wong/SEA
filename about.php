<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="Job description of for SEA company" />
    <meta name="keywords" content="SEA, about us, about, team members" />
    <meta name="author" content="Karina Wong" />
    <!--Include statement for all stylesheet links-->
    <?php include 'links.inc'; ?>

    <title>About Us Page</title>
  </head>
  <body>
  <?php
  $page = "aboutPage";
  include_once "nav.inc";
?>
    <main class="about-us">
      <h1>About Us</h1>
      <div class="contribution">
        <div class="text-contribution">
          <h2>SEA</h2>
          <h3>Thursday 10:30am Razeen</h3>
          <h4>Member Contributions</h4>
          <dl>
            <dt>Nathan</dt>
            <dd>
              <ul>
                <li>Chief Communicator</li>
              </ul>
            </dd>

            <dt>Cee</dt>
            <dd>
              <ul>
                <li>Main Architect</li>
              </ul>
            </dd>
            <dt>Karina</dt>
            <dd>
              <ul>
                <li>Team Leader</li>
              </ul>
            </dd>
          </dl>
        </div>
        <div class="group-photo">
          <figure>
            <img
              src="images/group_photo.jpg"
              alt="Group photo of all members."
              class="aanimate__slideInRight"
            />
            <figcaption>Group photo of Cee, Nathan & Karina</figcaption>
          </figure>
        </div>
      </div>

      <div class="interests">
        <h5>Get to know our favourites!</h5>
        <div class="table-wrapper">
          <table class="favourite-table">
            <thead>
              <tr>
                <th>What is your favourite:</th>
                <th>Karina</th>
                <th>Nathan</th>
                <th>Cee</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Colour</td>
                <td class="karina-colour">#7d93ba</td>
                <td class="nathan-colour">#87CEEB</td>
                <td class="cee-colour">#22b9f5</td>
              </tr>
              <tr>
                <td>Animal</td>
                <td>Northern sandhill frog</td>
                <td>Penguin</td>
                <td>Capybara</td>
              </tr>
              <tr>
                <td>Movie</td>
                <td>Death becomes her</td>
                <td>The Greatest Showman</td>
                <td>The Minecraft Movie (A Silent Voice)</td>
              </tr>
              <tr>
                <td>Song/Artist</td>
                <td>Daniel Caesar</td>
                <td>Avicii</td>
                <td>Yung kai</td>
              </tr>
              <tr>
                <td>Game</td>
                <td>Solitaire</td>
                <td>Minecraft</td>
                <td>Minecraft</td>
              </tr>
              <tr>
                <td>Book/Author</td>
                <td>Fyodor Dostoevsky</td>
                <td>Brandon Sanderson</td>
                <td>Sugaru Miaki/Kanehito Yamada</td>
              </tr>
              <tr>
                <td>Food/cusine</td>
                <td>Cantonese</td>
                <td>Japanese</td>
                <td>Japanese/Thai food</td>
              </tr>
            </tbody>
          </table>
        </div>
        <h5>Get to know our interests!</h5>
        <div class="table-wrapper test">
          <table class="interest-table">
            <thead>
              <tr>
                <th>Top 5 Interests:</th>
                <th>Karina</th>
                <th>Nathan</th>
                <th>Cee</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1.</td>
                <td>Listening to music</td>
                <td>Playing Euphonium</td>
                <td>Drawing</td>
              </tr>
              <tr>
                <td>2.</td>
                <td>Reading</td>
                <td>Hiking/ Camping</td>
                <td>Cooking/Baking</td>
              </tr>
              <tr>
                <td>3.</td>
                <td>Pikmin</td>
                <td>Reading/ writing</td>
                <td>Singing/Playing acoustic guitar</td>
              </tr>
              <tr>
                <td>4.</td>
                <td>Playing guitar</td>
                <td>Swimming/ Cycling</td>
                <td>Writing stories (and poems every now and then)</td>
              </tr>
              <tr>
                <td>5.</td>
                <td>Cooking</td>
                <td>Gaming</td>
                <td>Gaming</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
    <aside>
      <section class="student-ids">
        <h3>ID Numbers</h3>
        <div>Nathan Nguyen: 106011846</div>
        <div>Karina Wong: 105750708</div>
        <div>Cee Chungyingruangrung: 105730412</div>
      </section>
    </aside>
    <!-- This content was made with the help of GenAI (ChatGPT). GenAI prompt: I'm building a site and I'm adding a jump to the top button, but I have an issue, after you click it once, you cannot click it again, is there a way to solve this without the use of javascript?-->
    <div class="up-arrow"><a href="#">↑</a></div>
    <!--Include statement for footer-->
    <?php include 'footer.inc'; ?>
  </body>
</html>
