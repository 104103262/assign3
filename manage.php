<?php
include 'settings.php'; // Include the database connection settings

date_default_timezone_set('Australia/Sydney'); // Set the timezone to Sydney, Australia

// Initialize variables
$jobidQuery = $givenNameQuery = $familyNameQuery = $deleteJobId = $eoiNumber = $status = "";
$results = [];

// Fetch all unique jobids for the dropdown
$sql = "SELECT DISTINCT jobid FROM eoi";
$jobids = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["jobidQuery"])) {
        $jobidQuery = $_POST["jobidQuery"];
        if ($jobidQuery == "allEOIs") {
            $sql = "SELECT * FROM eoi";
            $results = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
        } else {
            $sql = "SELECT * FROM eoi WHERE jobid = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $jobidQuery);
            $stmt->execute();
            $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
        }
    } elseif (isset($_POST["givenNameQuery"]) || isset($_POST["familyNameQuery"])) {
        $givenNameQuery = $_POST["givenNameQuery"];
        $familyNameQuery = $_POST["familyNameQuery"];
        $sqlGivenName = "%" . $givenNameQuery . "%";
        $sqlFamilyName = "%" . $familyNameQuery . "%";

        if (!empty($givenNameQuery) && !empty($familyNameQuery)) {
            $sql = "SELECT * FROM eoi WHERE given_name LIKE ? AND family_name LIKE ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $sqlGivenName, $sqlFamilyName);
        } elseif (!empty($givenNameQuery)) {
            $sql = "SELECT * FROM eoi WHERE given_name LIKE ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $sqlGivenName);
        } else {
            $sql = "SELECT * FROM eoi WHERE family_name LIKE ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $sqlFamilyName);
        }

        $stmt->execute();
        $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    } elseif (isset($_POST["deleteJobId"])) {
        $deleteJobId = $_POST["deleteJobId"];
        $sql = "DELETE FROM eoi WHERE jobid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $deleteJobId);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST["eoiNumber"]) && isset($_POST["status"])) {
        $eoiNumber = $_POST["eoiNumber"];
        $status = $_POST["status"];
        $sql = "UPDATE eoi SET Status = ? WHERE EOInumber = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $status, $eoiNumber);
        $stmt->execute();
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage EOIs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .home-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 20px 0;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<h2>HR Manager Queries</h2>

<p>Current Date and Time: <?php echo date('l, d F Y, h:i:s A'); ?></p> <!-- Display the current date and time -->

<a href="index.php" class="home-btn">Home</a>

<form action="manage.php" method="post">
    <label for="jobidQuery">List EOIs by Job ID:</label>
    <select name="jobidQuery" id="jobidQuery">
        <option value="allEOIs">All EOIs</option>
        <?php foreach ($jobids as $job) : ?>
            <option value="<?php echo $job["jobid"]; ?>"><?php echo $job["jobid"]; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Search">
</form>

<form action="manage.php" method="post">
    <label for="givenNameQuery">List EOIs by Applicant Name:</label>
    <input type="text" name="givenNameQuery" id="givenNameQuery" placeholder="Given Name" value="<?php echo $givenNameQuery; ?>">
    <input type="text" name="familyNameQuery" id="familyNameQuery" placeholder="Family Name" value="<?php echo $familyNameQuery; ?>">
    <input type="submit" value="Search">
</form>

<form action="manage.php" method="post">
    <label for="deleteJobId">Delete all EOIs with a specified job reference number:</label>
    <input type="text" name="deleteJobId" id="deleteJobId">
    <input type="submit" value="Delete">
</form>

<form action="manage.php" method="post">
    <label for="eoiNumber">Change the Status of an EOI:</label>
    <input type="number" name="eoiNumber" id="eoiNumber">
    <select name="status" id="status">
        <option value="New">New</option>
        <option value="Current">Current</option>
        <option value="Final">Final</option>
    </select>
    <input type="submit" value="Update">
</form>

<?php if (!empty($results)) : ?>
    <h2>Results</h2>
    <table>
        <thead>
        <tr>
            <th>EOI Number</th>
            <th>Job ID</th>
            <th>Given Name</th>
            <th>Family Name</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Street Address</th>
            <th>Suburb</th>
            <th>State</th>
            <th>Post</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Skill</th>
            <th>Other Skills</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($results as $eoi) : ?>
            <tr>
                <td><?php echo $eoi["EOInumber"]; ?></td>
                <td><?php echo $eoi["jobid"]; ?></td>
                <td><?php echo $eoi["given_name"]; ?></td>
                <td><?php echo $eoi["family_name"]; ?></td>
                <td><?php echo $eoi["birthday"]; ?></td>
                <td><?php echo $eoi["gender"]; ?></td>
                <td><?php echo $eoi["street_address"]; ?></td>
                <td><?php echo $eoi["suburb"]; ?></td>
                <td><?php echo $eoi["state"]; ?></td>
                <td><?php echo $eoi["post"]; ?></td>
                <td><?php echo $eoi["email"]; ?></td>
                <td><?php echo $eoi["phone"]; ?></td>
                <td><?php echo $eoi["skill"]; ?></td>
                <td><?php echo $eoi["otherskills"]; ?></td>
                <td><?php echo $eoi["Status"]; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

</body>
</html>
