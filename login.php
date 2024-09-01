<?php

include ('inc\connection.php');

session_start();

if(isset($_POST['lgnsubmit'])){
        
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $select = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    $result = mysqli_query($conn, $select);

    if($result && mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);
            
        if($row['user_type'] == 'admin'){
            $_SESSION['admin_name'] = $row['name'];
            header('location: admin_page.html');
            exit();
        } elseif($row['user_type'] == 'approve_person') {
            $_SESSION['approve_person_name'] = $row['name'];
            header('location: approve_person_page.html');
            exit();
        } elseif($row['user_type'] == 'loan_officer') {
            $_SESSION['loan_officer_name'] = $row['name'];
            header('location: loan_officer_page.html');
            exit();
        } elseif($row['user_type'] == 'user(customer)') {
            $_SESSION['user(customer)_name'] = $row['name'];
            header('location: user(customer)_page.html');
            exit();
        } else {
            $error[] = 'Invalid user type!';
            header('location: index.html');
            exit();
        }

    } else {
        $error[] = 'Incorrect email or password!';
        header('location: index.html');
        exit();
    }
}
?>