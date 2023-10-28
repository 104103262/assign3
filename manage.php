<?php
include 'settings.php'; // Include the database connection settings

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'listAll':
        $sql = "SELECT * FROM eoi";
        $result = $conn->query($sql);
        displayResults($result);
        break;

    case 'listByJob':
        $jobid = $_GET['jobid'] ?? '';
        $sql = "SELECT * FROM eoi WHERE jobid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $jobid);
        $stmt->execute();
        $result = $stmt->get_result();
        displayResults($result);
        break;

    case 'listByApplicant':
        $given_name = $_GET['given_name'] ?? '';
        $family_name = $_GET['family_name'] ?? '';
        $sql = "SELECT * FROM eoi WHERE given_name = ? AND family_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $given_name, $family_name);
        $stmt->execute();
        $result = $stmt->get_result();
        displayResults($result);
        break;

    case 'deleteByJob':
        $jobid = $_GET['jobid'] ?? '';
        $sql = "DELETE FROM eoi WHERE jobid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $jobid);
        $stmt->execute();
        echo "Deleted EOIs with job reference number: " . $jobid;
        break;

    case 'changeStatus':
        $EOInumber = $_GET['EOInumber'] ?? '';
        $status = $_GET['status'] ?? '';
        $sql = "UPDATE eoi SET Status = ? WHERE EOInumber = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $status, $EOInumber);
        $stmt->execute();
        echo "Status updated for EOI number: " . $EOInumber;
        break;

    default:
        echo "Please select a valid action.";
        break;
}

function displayResults($result) {
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>EOInumber</th><th>Job ID</th><th>Given Name</th><th>Family Name</th><th>Status</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['EOInumber'] . "</td>";
            echo "<td>" . $row['jobid'] . "</td>";
            echo "<td>" . $row['given_name'] . "</td>";
            echo "<td>" . $row['family_name'] . "</td>";
            echo "<td>" . $row['Status'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
}

$conn->close();
?>
