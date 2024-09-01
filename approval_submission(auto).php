<?php

include('inc/connection.php');

$approval_id = $_POST['id'];
$approval_comment = $_POST['approval_comment'];
$action = $_POST['action']; 


$sql = "UPDATE autoloan_applications
        SET approval_comment='$approval_comment', status='$action'
        WHERE id='$approval_id'";

if ($config->query($sql) === TRUE) {
    echo "Loan application " . ($action == 'approve' ? "approved" : "rejected") . " successfully!";
    header('Location:approve_person_page.html');
    exit(); 
} else {
    echo "Error: " . $sql . "<br>" . $config->error;
}

$config->close();
?>
