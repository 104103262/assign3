document.addEventListener("DOMContentLoaded", function() {
    // Retrieve and set the job reference number for apply.php
    const jobRef = localStorage.getItem("jobRef");
    if (jobRef && document.getElementById("jobid")) {
        document.getElementById("jobid").value = jobRef;
    }

    // Populate form fields from sessionStorage
    const fields = ["given_name", "family_name", "street_address", "suburb", "state", "post", "email", "phone"];
    fields.forEach(field => {
        const value = sessionStorage.getItem(field);
        if (value && document.getElementById(field)) {
            document.getElementById(field).value = value;
        }
    });

    // Event listeners for apply.php
    if (document.getElementById('otherSkillsCheckbox')) {
        document.getElementById('otherSkillsCheckbox').addEventListener('click', toggleOtherSkillsRequired);
    }

    if (document.getElementById('applicationForm')) {
        document.getElementById('applicationForm').addEventListener('submit', function(event) {
            if (!storeFormData()) {
                event.preventDefault();
            } else {
                localStorage.removeItem("jobRef"); // Clear the jobRef after form submission
            }
        });
    }

    // Event listener for jobs.php
    const applyButtons = document.querySelectorAll('.apply-btn');
    applyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const jobRef = this.getAttribute('data-jobref');
            storeJobRef(jobRef);  // Store the job reference number
        });
    });
});

// Functions
function storeJobRef(jobRef) {
    localStorage.setItem("jobRef", jobRef);
}

function displayError(message) {
    const errorContainer = document.getElementById("errorContainer");
    errorContainer.textContent = message;
    errorContainer.style.display = "block";
}

function validateDOB() {
    const dob = document.getElementById("birthday").value;
    const dobPattern = /^(\d{2})\/(\d{2})\/(\d{4})$/;
    const dobMatch = dob.match(dobPattern);
    if (!dobMatch) {
        displayError("Invalid date format. Use dd/mm/yyyy.");
        return false;
    }

    const dobDate = new Date(dobMatch[3], dobMatch[2] - 1, dobMatch[1]);
    const currentDate = new Date();
    const age = currentDate.getFullYear() - dobDate.getFullYear();

    if (age < 15 || age > 80) {
        displayError("Age should be between 15 and 80.");
        return false;
    }

    return true;
}

function validateStateAndPostcode() {
    const state = document.getElementById("state").value;
    const postcode = document.getElementById("post").value;
    const firstDigit = postcode.charAt(0);
    const stateMapping = {
        "vic": ["3", "8"],
        "nsw": ["1", "2"],
        "qld": ["4", "9"],
        "nt": ["0"],
        "wa": ["6"],
        "sa": ["5"],
        "tas": ["7"],
        "act": ["0"]
    };

    if (!stateMapping[state].includes(firstDigit)) {
        displayError("Postcode doesn't match the selected state.");
        return false;
    }

    return true;
}

function toggleOtherSkillsRequired() {
    const checkbox = document.getElementById('otherSkillsCheckbox');
    const textarea = document.getElementById('otherskills');

    if (checkbox.checked) {
        textarea.required = true;
    } else {
        textarea.required = false;
        textarea.value = '';
    }
}

function storeFormData() {
    // Clear previous errors
    document.getElementById("errorContainer").style.display = "none";

    if (!validateDOB()) {
        return false;
    }

    if (!validateStateAndPostcode()) {
        return false;
    }

    const checkbox = document.getElementById('otherSkillsCheckbox');
    const textarea = document.getElementById('otherskills');
    if (checkbox.checked && !textarea.value.trim()) {
        displayError('Please describe your other skills.');
        return false;
    }

    const fields = ["given_name", "family_name", "street_address", "suburb", "state", "post", "email", "phone"];
    fields.forEach(field => {
        const value = document.getElementById(field).value;
        if (value) {
            sessionStorage.setItem(field, value);
        }
    });

    return true;
}
