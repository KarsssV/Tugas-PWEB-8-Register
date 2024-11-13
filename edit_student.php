<?php
include 'db_connection.php';

$nrp = $_GET['nrp'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $birthplace = $_POST['birthplace'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $religion = $_POST['religion'];
    $school_origin = $_POST['school_origin'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE students SET 
            name='$name', 
            address='$address', 
            birthplace='$birthplace', 
            birthdate='$birthdate', 
            gender='$gender', 
            religion='$religion', 
            school_origin='$school_origin', 
            email='$email', 
            phone='$phone' 
            WHERE nrp='$nrp'";

    if ($conn->query($sql) === TRUE) {
        echo "Data updated successfully!";
        header("Location: students.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$sql = "SELECT * FROM students WHERE nrp='$nrp'";
$result = $conn->query($sql);
$student = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Siswa</title>
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
        <div class="form-container">
            <h2>Edit Data Siswa</h2>
            <form action="" method="post">
                <input type="text" name="name" value="<?php echo $student['name']; ?>" required>
                <input type="text" name="address" value="<?php echo $student['address']; ?>" required>
                <input type="text" name="birthplace" value="<?php echo $student['birthplace']; ?>" required>
                <input type="date" name="birthdate" value="<?php echo $student['birthdate']; ?>" required>
                <select name="gender" required>
                    <option value="Male" <?php if($student['gender'] == 'Male') echo 'selected'; ?>>Laki-Laki</option>
                    <option value="Female" <?php if($student['gender'] == 'Female') echo 'selected'; ?>>Perempuan</option>
                </select>
                <input type="text" name="religion" value="<?php echo $student['religion']; ?>" required>
                <input type="text" name="school_origin" value="<?php echo $student['school_origin']; ?>" required>
                <input type="email" name="email" value="<?php echo $student['email']; ?>" required pattern=".+@gmail\.com">
                <input type="text" name="phone" value="<?php echo $student['phone']; ?>" required>
                <button type="submit">Update</button>
                <button type="button" onclick="window.location.href='students.php'">Cancel</button>
            </form>
        </div>
    </div>
</body>
</html>
