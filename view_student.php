<?php
include 'db_connection.php';

$nrp = $_GET['nrp'];
$sql = "SELECT * FROM students WHERE nrp='$nrp'";
$result = $conn->query($sql);
$student = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <img src="sma_logo.png" alt="School Logo">
            <h2>SMAN 1 Ulubelu</h2>
            <a href="index.php">Home</a>
            <a href="students.php">Pendaftar</a>
        </div>
        <div class="card-container">
            <h2>Detail Siswa</h2>
            <div class="card">
                <p><strong>NRP:</strong> <?php echo $student['nrp']; ?></p>
                <p><strong>Nama:</strong> <?php echo $student['name']; ?></p>
                <p><strong>Alamat:</strong> <?php echo $student['address']; ?></p>
                <p><strong>Tempat Lahir:</strong> <?php echo $student['birthplace']; ?></p>
                <p><strong>Tanggal Lahir:</strong> <?php echo $student['birthdate']; ?></p>
                <p><strong>Jenis Kelamin:</strong> <?php echo $student['gender']; ?></p>
                <p><strong>Agama:</strong> <?php echo $student['religion']; ?></p>
                <p><strong>Asal Sekolah:</strong> <?php echo $student['school_origin']; ?></p>
                <p><strong>Email:</strong> <?php echo $student['email']; ?></p>
                <p><strong>No Telp:</strong> <?php echo $student['phone']; ?></p>
                <button onclick="window.location.href='students.php'">Back</button>
            </div>
        </div>
    </div>
</body>
</html>
