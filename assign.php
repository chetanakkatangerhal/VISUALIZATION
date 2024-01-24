<?php
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// API endpoint for fetching data based on filters
if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
    $value = $_GET['value'];
    $query = "SELECT * FROM data WHERE $filter = '$value'";
} else {
    $query = "SELECT * FROM data";
}

$result = $conn->query($query);

// Convert result to JSON
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);

$conn->close();
?>
