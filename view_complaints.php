<?php require_once('inc/connection.php'); ?>
<?php

    $viewAL = "SELECT * FROM complaints";
    $result_set = mysqli_query($config, $viewAL);

    if($result_set){

        $table = '<table>';
        $table .= '<tr>
                        <th>Complaint <br>ID</th>
                        <th>Name</th>
                        <th>NIC No</th>
                        <th>Phone</th>
                        <th>Complaint</th>
                        <th>Action</th>
                    </tr>';

                    while ($record = mysqli_fetch_assoc($result_set)) {
                        $table .= '<tr>';
                        $table .= '<td>' . htmlspecialchars($record['complaint_id']) . '</td>';
                        $table .= '<td>' . htmlspecialchars($record['name']) . '</td>';
                        $table .= '<td>' . htmlspecialchars($record['nic']) . '</td>';
                        $table .= '<td>' . htmlspecialchars($record['phone']) . '</td>';
                        $table .= '<td>' . htmlspecialchars($record['complaint']) . '</td>';
                        $table .= '<td>' . htmlspecialchars($record['action']) . '</td>';
                        $table .='</tr>';
        }
        $table .= '</table';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Complaints</title>
    <link rel="Stylesheet" href="style.css">

    <style>

        .view_complaints{
            padding-left: 5%;
            padding-right: 5%;
            padding-top: 100px;
            padding-bottom: 100px;
            margin: 90px 300px 75px 300px;
            background-color: rgb(145, 151, 156);
        }

        .view_complaints h2{
            font-size: 30px;
            font-weight: 700;
            color: rgb(0, 0, 0);
            text-align: center;
        }   

        table {
            border-collapse: collapse;
            width: 0%;
            
        }

        th, td {
            border: 2px solid black;
            padding: 0px;
            text-align: center;
        }

        .records-found {
            text-align: center;
        }

    </style>
</head>

<body>

<header>
<h2 class="logo">
            <img class="image-logo" src="./Images/LOGO.png" alt="Logo">
        </h2>
        <nav class="navigation">
            <a href="view_complaints.php">Home<span></span></a>
            <a href="contact_us.html">Contact Us<span></span></a>
            <a href="index.html">Logout<span></span></a>
        </nav>
    </header>

    <div class="view_complaints">
        <h2>View All Complaints</h2><br><br>
        <p class="records-found"><?php echo mysqli_num_rows($result_set) . "Records Found. <hr>"; ?></p><br><br>
        <?php echo $table; ?>

    </div>


</body>
</html>
<?php mysqli_close($config); ?>