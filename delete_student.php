<?php
include 'db_connection.php';

$nrp = $_GET['nrp'];
$sql = "DELETE FROM students WHERE nrp='$nrp'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
header("Location: students.php");
exit();
?>
