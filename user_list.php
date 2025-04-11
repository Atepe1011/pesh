<?php
include 'db_connect.php';

// Fetch registered users from the database
$sql = "SELECT name, email FROM users ORDER BY id DESC";
$result = $conn->query($sql);

// Debugging: Check if the query runs successfully
if (!$result) {
    die("Query failed: " . $conn->error);
}

echo "<p>Users found: " . $result->num_rows . "</p>";

if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><strong>" . htmlspecialchars($row['name']) . "</strong> - " . htmlspecialchars($row['email']) . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No users found.</p>";
}

$conn->close();
?>
