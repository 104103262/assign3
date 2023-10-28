<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Assignment">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Le Minh">
    <title>Enhancement #2</title>
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
<h2>Enhancement #2</h2>

<p>Dark Mode Toggle:<a href="https://www.w3schools.com/howto/howto_js_toggle_dark_mode.asp">https://www.w3schools.com/howto/howto_js_toggle_dark_mode.asp</a></p> 
<p>Implementing Dark Mode into your website:<a href="https://css-tricks.com/dark-modes-with-css/">https://css-tricks.com/dark-modes-with-css/</a></p>
<b>For the Dark Mode:</b>
<p>CSS Variables: I introduced CSS custom properties (variables) to easily switch between light and dark color schemes. This allows for a centralized place to define the colors for both themes.</p>
<p>Toggle Button: I added a button to the website that allows users to switch between light and dark modes. This button toggles the theme and provides visual feedback to the user about the current mode.</p>
<p>JavaScript Functionality: I implemented JavaScript functions to handle the theme switching. When the toggle button is clicked, the JavaScript checks the current theme and switches to the other theme. It also stores the user's theme preference in the browser's local storage, so the chosen theme persists across page reloads and sessions.</p>
<p>Local Storage: To remember the user's theme preference, I used the browser's local storage. When a user selects dark mode, this preference is saved. The next time the user visits the site, the JavaScript checks local storage and automatically sets the theme based on the saved preference.</p>
<p>Accessibility Considerations: I ensured that even in dark mode, the contrast ratios of text and background colors meet accessibility standards. This ensures that the content remains readable for all users, including those with visual impairments.</p>
<p>Testing: After implementing the dark mode, I tested the website in various browsers and devices to ensure consistent appearance and functionality.</p>
<p>Using CSS transition:<a href="https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Transitions/Using_CSS_transitions">https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Transitions/Using_CSS_transitions</a></p>
<p>Event listener for Java Script:<a href="https://www.w3schools.com/jsref/met_element_addeventlistener.asp">https://www.w3schools.com/jsref/met_element_addeventlistener.asp</a></p> 
<p>Transition Effect:<a href="https://www.w3schools.com/css/css3_transitions.asp">https://www.w3schools.com/css/css3_transitions.asp</a></p> 
<p>Hover Selector:<a href="https://www.w3schools.com/cssref/sel_hover.php">https://www.w3schools.com/cssref/sel_hover.php</a></p> 
<p>Smooth Transition:<a href="https://medium.com/the-web-tub/using-css3-transitions-for-smooth-animations-6295f3026df6">https://medium.com/the-web-tub/using-css3-transitions-for-smooth-animations-6295f3026df6</a></p>
<p>Content inside generated by:<a href="https://chat.openai.com/">ChatGPT</a></p>
<p>Redesign the website for more intuitive interaction</p>
    <script src="scripts/enhancements.js"></script>
    <script src="scripts/apply.js"></script>
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
</body>