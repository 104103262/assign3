<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Assignment">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Le Minh">
    <title>Apply Form</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header class="header">
        <a href="index.php" class="logo">InnoTech</a>
        <nav class="nav-items">
          <a href="index.php">Home</a>
          <a href="jobs.php">Jobs</a>
          <a href="apply.php">Apply</a>
          <a href="about.php">About</a>
          <a href="enhancements.php">Enhancement #1</a>
          <a href="enhancements2.php">Enhancement #2</a>
        </nav>
    </header>
    <h1>Apply Form</h1>
    <!-- Updated the action attribute to point to processEOI.php -->
    <form method="post" action="processEOI.php" id="applicationForm" novalidate="novalidate">
        <fieldset>
            <legend>Detailed Information</legend>
            
            <p>
                <label for="jobid">Job reference number</label> 
                <input type="text" id="jobid" name="jobid" readonly />
            </p>
    
            <p>
                <label for="given_name">Given name</label> 
                <input type="text" name="given_name" id="given_name" maxlength="15" pattern="^[a-zA-z]+$" required="required"/>
            </p>
    
            <p>
                <label for="family_name">Family name</label> 
                <input type="text" name="family_name" id="family_name" maxlength="15" pattern="^[a-zA-z]+$" required="required"/>
            </p>

            <p>
                <label for="birthday">Birthday:</label>
                <input type="date" id="birthday" name="birthday" required>
            </p>
    
            <fieldset>
                <legend>Gender</legend>
                
                <p>
                    <label for="male">Male</label> 
                    <input type="radio" id="male" name="gender" value="male"/>
                </p>
    
                <p>
                    <label for="female">Female</label> 
                    <input type="radio" id="female" name="gender" value="female"/>
                </p>
            </fieldset>
        </fieldset>

        <fieldset>
            <legend>Contact Information</legend>
            <p><label for="street_address">Street Address</label> 
                <input type="text" name= "street_address" id="street_address" maxlength="40" required="required"/>
            </p>
            <p><label for="suburb">Suburb/town</label> 
                <input type="text" name= "suburb" id="suburb" maxlength="40" required="required"/>
            </p>
            <p><label for="state">State</label> 
                <select name="state" id="state">
                    <option value="vic">VIC</option>			
                    <option value="nsw">NSW</option>
                    <option value="qld">QLD</option>
                    <option value="nt">NT</option>
                    <option value="wa">WA</option>
                    <option value="sa">SA</option>
                    <option value="tas">TAS</option>
                    <option value="act">ACT</option>
                </select>
            </p>
            <p><label for="post">Post code</label> 
                <input type="text" id="post" name= "post" required pattern="\d{4,4}"/>
            </p>
            <p><label for="email">Email</label> 
              <input type="email" name= "email" id="email" required="required"/>
            </p>
            <p><label for="phone">Phone number</label> 
                <input type="text" name= "phone" id="phone" required pattern="\d{8,12}"/>
            </p>
        </fieldset>

        <fieldset>
            <legend>Skills</legend>
            <p><label for="skill">Skill</label> 
                <select name="skill" id="skill">
                    <option value="comm">Communication</option>			
                    <option value="solving">Problem-solving</option>
                    <option value="adapt">Adaptability</option>
                    <option value="collab">Collaboration</option>
                    <option value="time">Time management</option>
                    <option value="thinking">Critical thinking</option>
                    <option value="creative">Creativity</option>
                    <option value="leadership">Leadership</option>
                </select>
            </p>
            <p>
                <label for="otherSkillsCheckbox">Other Skills:</label>
                <input type="checkbox" id="otherSkillsCheckbox">
            </p>
            <p>
                <label for="otherskills">Describe Other Skills:</label>
                <textarea id="otherskills" name="otherskills" rows="4" cols="40"></textarea>
            </p>
        </fieldset>

        <div id="errorContainer" style="color: red; display: none;"></div>

        <input type="submit" value="Register"/>
        <input type="reset" value="Reset Form"/>
    </form>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>Follow me</h4>
                <a href="https://www.facebook.com/" class="fa fa-facebook"></a>
                <a href="https://au.linkedin.com/" class="fa fa-linkedin"></a>
                <a href="https://twitter.com/?lang=en" class="fa fa-twitter"></a>
                <a href="https://www.youtube.com/" class="fa fa-youtube"></a>
                <a href="https://www.snapchat.com/" class="fa fa-snapchat-ghost"></a>
            </div>
        </div>
        <div class="footer-bottom">
          <p>Email: <a href="mailto:104103262@student.swin.edu.au">104103262@student.swin.edu.au</a></p>
          <p>© Le Minh - 104103262</p>
        </div>
    </footer>
    <script src="scripts/enhancements.js"></script>
    <script src="scripts/apply.js" defer></script>
</body>
</html>
