<?php
include('inc/connection.php');

$name = $_POST['name'];
$nic = $_POST['nic'];
$phone = $_POST['phone'];
$complaint = $_POST['complaint'];

$sql = "INSERT INTO complaints (name, nic, phone, complaint)
        VALUES ('$name', '$nic', '$phone', '$complaint')";

if ($config->query($sql) === TRUE) {
    echo '<script>showAdminSection();</script>';
    header('location:user(customer)_page.html');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $config->error;
}

$config->close();
?>

