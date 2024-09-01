<?php

include('inc/connection.php');

$loan_id = $_POST['id'];
$interest_rate = $_POST['interest_rate'];
$repayment_period = $_POST['repayment_period'];
$installment = $_POST['installment'];
$recommendation = $_POST['recommendation'];
$officer = $_POST['officer'];


    $sql = "UPDATE autoloan_applications
            SET interest_rate='$interest_rate', repayment_period='$repayment_period', installment='$installment', recommendation='$recommendation', officer='$officer'
            WHERE id='$loan_id'";


    if ($config->query($sql) === TRUE) {
        echo '<script>showApprovalSection();</script>';
        header('Location: loan_officer_page.html');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $config->error;
    }


$config->close();
?>





