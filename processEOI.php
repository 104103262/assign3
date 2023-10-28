<?php
include 'settings.php'; // Include the database connection settings

// Check if form data is set
if (!isset($_POST['jobid']) || empty($_POST['jobid'])) {
    header('Location: apply.php'); // Redirect if accessed directly
    exit;
}

// Sanitize the data
$jobid = trim($_POST['jobid']);
$given_name = trim($_POST['given_name']);
$family_name = trim($_POST['family_name']);
$birthday = trim($_POST['birthday']);
$gender = trim($_POST['gender']);
$street_address = trim($_POST['street_address']);
$suburb = trim($_POST['suburb']);
$state = trim($_POST['state']);
$post = trim($_POST['post']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$skill = trim($_POST['skill']);
$otherskills = isset($_POST['otherskillsCheckbox']) ? trim($_POST['otherskills']) : '';

// Validate formats
$errors = [];

if (!preg_match("/^[a-zA-Z0-9]{5}$/", $jobid)) {
    $errors[] = "Invalid Job reference number format.";
}
if (strlen($given_name) > 20 || !preg_match("/^[a-zA-Z]+$/", $given_name)) {
    $errors[] = "Invalid Given name format.";
}
if (strlen($family_name) > 20 || !preg_match("/^[a-zA-Z]+$/", $family_name)) {
    $errors[] = "Invalid Family name format.";
}
if (!preg_match("/^(\d{4})-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/", $birthday, $matches)) {
    $errors[] = "Invalid Birthday format.";
}

if (!in_array($gender, ['male', 'female'])) {
    $errors[] = "Invalid Gender selection.";
}
if (strlen($street_address) > 40) {
    $errors[] = "Street Address is too long.";
}
if (strlen($suburb) > 40) {
    $errors[] = "Suburb/town is too long.";
}
if (!in_array($state, ['vic', 'nsw', 'qld', 'nt', 'wa', 'sa', 'tas', 'act'])) {
    $errors[] = "Invalid State selection.";
}
if (!preg_match("/^\d{4}$/", $post)) {
    $errors[] = "Invalid Post code format.";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid Email format.";
}
if (!preg_match("/^\d{8,12}$/", str_replace(' ', '', $phone))) {
    $errors[] = "Invalid Phone number format.";
}
if (isset($_POST['otherskillsCheckbox']) && empty($otherskills)) {
    $errors[] = "Other skills should not be empty if checkbox is selected.";
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
    exit;
}

// Insert the data into the table
$sql = "INSERT INTO eoi (jobid, given_name, family_name, birthday, gender, street_address, suburb, state, post, email, phone, skill, otherskills) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssssss", $jobid, $given_name, $family_name, $birthday, $gender, $street_address, $suburb, $state, $post, $email, $phone, $skill, $otherskills);
$stmt->execute();

echo "EOI submitted successfully! Your EOI number is: " . $stmt->insert_id;

$stmt->close();
$conn->close();
?>
