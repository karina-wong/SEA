<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="Application page for jobs at SEA" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="SEA, application, jobs," />
    <meta name="author" content="Nathan Nguyen" />
    <title>SEA application page</title>
    <!--Include statement for all stylesheet links-->
    <?php include 'links.inc'; ?>
  </head>
  <body>
  <?php
  $page = "applyPage";
  include_once "nav.inc";
?>
    <main>
      <div class="form-container">
        <h1>Job Application Form</h1>
        <form
          method="post"
          action="process_eoi.php"
          novalidate ="novalidate"
        >
          <p>
            <label for="reference_number">Reference Number: </label>
            <select name="reference_number" id="reference_number">
              <option value="">Please Select</option>
              <option value="job1">Data analyst - DA102</option>
              <option value="job2">Software dev - SD309</option>
              <option value="other">Other</option>
            </select>
          </p>
          <p>
            <label for="first_name">First name: </label>
            <input
              type="text"
              name="first_name"
              id="first_name"
              maxlength="20"
              pattern="[A-Za-z]+"
              required="required"
            />
          </p>
          <p>
            <label for="last_name">Last name: </label>
            <input
              type="text"
              name="last_name"
              id="last_name"
              maxlength="20"
              pattern="[A-Za-z]+"
              required="required"
            />
          </p>
          <p>
            <label for="dob">Date of Birth: </label>
            <input
              type="date"
              name="dob"
              id="dob"
              size="10"
              required="required"
            />
          </p>
          <fieldset>
            <legend>Gender</legend>
            <div class="option-container">
              <input type="radio" name="gender" value="male" id="gender-male" />
              <label for="gender-male">Male</label>
            </div>
            <div class="option-container">
              <input
                type="radio"
                name="gender"
                value="female"
                id="gender-female"
              />
              <label for="gender-female">Female</label>
            </div>
            <div class="option-container">
              <input
                type="radio"
                name="gender"
                value="non-binary"
                id="gender-nonbinary"
              />
              <label for="gender-nonbinary">Non-binary</label>
            </div>
            <div class="option-container">
              <input
                type="radio"
                name="gender"
                value="unspecified"
                id="gender-unspecified"
              />
              <label for="gender-unspecified">Prefer not to say</label>
            </div>
          </fieldset>
          <p>
            <label for="street_address">Street Address: </label>
            <input
              type="text"
              name="street_address"
              id="street_address"
              maxlength="40"
              required="required"
            />
          </p>
          <p>
            <label for="suburb">Suburb/ town: </label>
            <input
              type="text"
              name="suburb"
              id="suburb"
              maxlength="40"
              required="required"
            />
          </p>
          <p>
            <label for="state">State: </label>
            <select name="state" id="state">
              <option value="select">Please Select</option>
              <option value="VIC">VIC</option>
              <option value="NSW">NSW</option>
              <option value="QLD">QLD</option>
              <option value="WA">WA</option>
              <option value="SA">SA</option>
              <option value="NT">NT</option>
              <option value="TAS">TAS</option>
              <option value="ACT">ACT</option>
            </select>
          </p>
          <p>
            <label for="postcode">Postcode: </label>
            <input
              type="text"
              name="postcode"
              id="postcode"
              maxlength="4"
              pattern="[0-9]{4}"
              required="required"
            />
          </p>
          <p>
            <label for="email">Email: </label>
            <input
              type="text"
              name="email"
              id="email"
              pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
              required="required"
            />
          </p>
          <p>
            <label for="phone">Phone Number: </label>
            <input
              type="text"
              name="phone"
              id="phone"
              pattern="[0-9]{8,12}"
              required="required"
            />
          </p>
          <fieldset>
            <legend>Required Technical Skills</legend>
            <div class="option-container">
              <input type="checkbox" name="tskills[]" value="HTML" id="html" />
              <label for="html">HTML</label>
            </div>
            <div class="option-container">
              <input type="checkbox" name="tskills[]" value="Ruby" id="ruby" />
              <label for="ruby">Ruby</label>
            </div>
            <div class="option-container">
              <input
                type="checkbox"
                name="tskills[]"
                value="Statistics"
                id="stats"
              />
              <label for="stats">Python</label>
            </div>
            <div class="option-container">
              <input
                type="checkbox"
                name="tskills[]"
                value="Java / Python"
                id="javapy"
              />
              <label for="javapy">Java</label>
            </div>
            <div class="option-container">
              <input
                type="checkbox"
                name="tskills[]"
                value="React / Vue.js"
                id="reactvue"
              />
              <label for="reactvue">React / Vue.js</label>
            </div>
          </fieldset>
          <fieldset>
            <div class="otherskills">
              <p>
                <label for="otherskills">Other Skills</label>
                <textarea
                  id="otherskills"
                  name="otherskills"
                  rows="10"
                  cols="1000"
                ></textarea>
              </p>
            </div>
          </fieldset>
          <input type="submit" value="Apply" />
          <input type="reset" value="Reset Form" />
        </form>
      </div>
    </main>
    <!--Include statement for footer-->
    <?php include 'footer.inc'; ?>
  </body>
</html>
