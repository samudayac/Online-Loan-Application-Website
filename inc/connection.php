<?php
$conn = mysqli_connect('localhost', 'root', '', 'usersdb');
$config = mysqli_connect('localhost', 'root', '', 'loandb');

if(mysqli_connect_errno()) {
    die('Database connection failed' . mysqli_connect_error());
}

?>