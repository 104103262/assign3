document.addEventListener("DOMContentLoaded", function() {
    // Enhancement: Dark Mode Toggle
    initializeDarkMode();

});

/**
 * Enhancement: Dark Mode Toggle
 * This function initializes the dark mode based on user preferences or previous selections.
 * It also sets up an event listener for the dark mode toggle button.
 */
function initializeDarkMode() {
    const darkModeToggle = document.createElement("button");
    darkModeToggle.id = "darkModeToggle";
    darkModeToggle.innerText = "Dark Mode";
    darkModeToggle.style.position = "fixed";
    darkModeToggle.style.bottom = "10px";
    darkModeToggle.style.right = "10px";
    darkModeToggle.style.padding = "10px";
    darkModeToggle.style.zIndex = "1000";
    document.body.appendChild(darkModeToggle);

    const darkModeEnabled = localStorage.getItem("darkModeEnabled") === "true";
    if (darkModeEnabled) {
        document.body.classList.add("dark-mode");
    }

    darkModeToggle.addEventListener("click", function() {
        document.body.classList.toggle("dark-mode");
        const darkModeEnabled = document.body.classList.contains("dark-mode");
        localStorage.setItem("darkModeEnabled", darkModeEnabled);
    });
}
