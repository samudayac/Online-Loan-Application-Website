<?php

include ('inc/connection.php');

if (isset($_POST['rgssubmit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $usertype = $_POST['user_type'];

    $select = "SELECT * FROM users WHERE email = '$email'";

    $result = mysqli_query($conn, $select);

    if($result && mysqli_num_rows($result) > 0){
        $error[] = 'User already exists!';
    } else {
        $insert = "INSERT INTO users (name, email, password, user_type) VALUES ('$name', '$email', '$password', '$usertype')";
        mysqli_query($conn, $insert);
        header('location:index.html');
    }
}
?>