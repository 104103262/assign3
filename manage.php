<?php
include 'settings.php'; // Include the database connection settings

// Initialize variables
$jobidQuery = $nameQuery = $deleteJobId = $eoiNumber = $status = "";
$results = [];

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["jobidQuery"])) {
        $jobidQuery = $_POST["jobidQuery"];
        $sql = "SELECT * FROM eoi WHERE jobid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $jobidQuery);
        $stmt->execute();
        $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    } elseif (isset($_POST["nameQuery"])) {
        $nameQuery = $_POST["nameQuery"];
        $sql = "SELECT * FROM eoi WHERE given_name LIKE ? OR family_name LIKE ?";
        $stmt = $conn->prepare($sql);
        $nameQuery = "%" . $nameQuery . "%";
        $stmt->bind_param("ss", $nameQuery, $nameQuery);
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

// Fetch all EOIs
$sql = "SELECT * FROM eoi";
$allEOIs = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

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

<a href="index.php" class="home-btn">Home</a>

<form action="manage.php" method="post">
    <label for="jobidQuery">List all EOIs for a particular position:</label>
    <input type="text" name="jobidQuery" id="jobidQuery" value="<?php echo $jobidQuery; ?>">
    <input type="submit" value="Search">
</form>

<form action="manage.php" method="post">
    <label for="nameQuery">List all EOIs for a particular applicant:</label>
    <input type="text" name="nameQuery" id="nameQuery" value="<?php echo $nameQuery; ?>">
    <input type="submit" value="Search">
</form>

<form action="manage.php" method="post">
    <label for="deleteJobId">Delete all EOIs with a specified job reference number:</label>
    <input type="text" name="deleteJobId" id="deleteJobId" value="<?php echo $deleteJobId; ?>">
    <input type="submit" value="Delete">
</form>

<form action="manage.php" method="post">
    <label for="eoiNumber">Change the Status of an EOI:</label>
    <input type="number" name="eoiNumber" id="eoiNumber" value="<?php echo $eoiNumber; ?>">
    <select name="status" id="status">
        <option value="New" <?php if ($status == "New") echo "selected"; ?>>New</option>
        <option value="Current" <?php if ($status == "Current") echo "selected"; ?>>Current</option>
        <option value="Final" <?php if ($status == "Final") echo "selected"; ?>>Final</option>
    </select>
    <input type="submit" value="Update">
</form>

<h2>All EOIs</h2>
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
    <?php foreach ($allEOIs as $eoi) : ?>
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

</body>
</html>
