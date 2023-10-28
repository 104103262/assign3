<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Assignment">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Le Minh">
    <title>About Me</title>
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
        <a href="phpenhancements.php">PHP Enhancements</a>
        <a href="manage.php">Manage</a>
    </nav>
</header>
    <fieldset>
        <legend>Personal Detail</legend>
        <img src="images/1672801871586.jpg" style="width: 200px;" alt="profile picture"/>
        <p><b>Full Name:</b> Le Minh</p>
        <p><b>Student Number:</b> 104103262</p>
        <p><b>Tutor's Name:</b> Bo Li</p>
        <p><b>Course:</b> Master of Information Technology - Information System.</p>
        <p><b>Email:</b><a href="mailto:104103262@student.swin.edu.au">104103262@student.swin.edu.au</a></p>
        <p><b>Hobby:</b>Playing games, listen to music and watching movies.</p>
    </fieldset>
    <h2>My timetable</h2>
    <table class="timetable">
        <thead>
            <tr>
                <th>Day</th>
                <th>Time</th>
                <th>Course</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th rowspan="2">Monday</th>
                <td><b>8:30 - 10:30</b></td>
                <td>COS60010 Technology Inquiry Project</td>
                <td>Room ATC625/ Workshop 1/ HAW</td>
            </tr>
            <tr>
                <td><b>17:30 - 18:30</b></td>
                <td>COS60010 Technology Inquiry Project</td>
                <td>Room Online/ Live Online Lecture/ HAW</td>
            </tr>
            <tr>
                <th>Tuesday</th>
                <td><b>12:30 - 14:30</b></td>
                <td>COS60004 Creating Web Applications</td>
                <td>Room Online/ Live Online Lecture/ HAW</td>
            </tr>
            <tr>
                <th>Wednesday</th>
                <td><b>16:30 - 18:30</b></td>
                <td>COS60009 Data Management for the Big Data Age</td>
                <td>Room Online/ Live Online Lecture/ HAW</td>
            </tr>
            <tr>
                <th>Thursday</th>
                <td><b>15:30 - 17:30</b></td>
                <td>INF60010 Requirements Analysis and Modelling</td>
                <td>Room EN103/ Class 1/ HAW</td>
            </tr>
            <tr>
                <th rowspan="2">Friday</th>
                <td><b>10:30 - 11:30</b></td>
                <td>COS60009 Data Management for the Big Data Age</td>
                <td>Room EN402/ Class 1/ HAW</td>
            </tr>
            <tr>
                <td><b>14:30 - 16:30</b></td>
                <td>COS60004 Creating Web Application</td>
                <td>Room TC230/ Class 1/ HAW</td>
            </tr>
        </tbody>
    </table>
    

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
      <script src="scripts/apply.js"></script>
      </body>
      </html>