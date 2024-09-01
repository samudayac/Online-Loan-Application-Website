<?php

include('inc/connection.php');

$complaint_id = $_POST['complaint_id'];
$action = $_POST['action'];

    $sql = "UPDATE complaints
            SET action='$action'
            WHERE complaint_id='$complaint_id'";

    if ($config->query($sql) === TRUE) {
        header('Location: admin_page.html');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $config->error;
    }


$config->close();
?>