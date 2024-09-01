<?php
require_once('inc/connection.php');

$viewAL = "SELECT * FROM microloan_applications";
$result_set = mysqli_query($config, $viewAL);

if ($result_set) {
    $table = '<table>';
    $table .= '<tr>
                    <th>Appraisal <br>ID</th>
                    <th>Name</th>
                    <th>NIC No</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Income</th>
                    <th>Occupation</th>
                    <th>Loan <br>Amount</th>
                    <th>Guarantor 1<br>Details</th>
                    <th>Guarantor 2<br>Details</th>
                    <th>Loan<br>Purpose</th>
                    <th>Mortgage<br>DEED & PLAN<br>Details</th>
                    <th>PDF</th>
                    <th>Interest<br>Rate</th>
                    <th>Repayment<br>Period</th>
                    <th>Installment</th>
                    <th>Recommendation</th>
                    <th>Officer<br>Name & ID</th>
                    <th>Approval <br>Comment</th>
                    <th>Status</th>
                </tr>';

    while ($record = mysqli_fetch_assoc($result_set)) {
        $pdf_path = htmlspecialchars($record['pdf_document']);
        $table .= '<tr>';
        $table .= '<td>' . htmlspecialchars($record['id']) . '</td>';
        $table .= '<td>' . htmlspecialchars($record['name']) . '</td>';
        $table .= '<td>' . htmlspecialchars($record['nic']) . '</td>';
        $table .= '<td>' . htmlspecialchars($record['phone']) . '</td>';
        $table .= '<td>' . htmlspecialchars($record['address']) . '</td>';
        $table .= '<td>' . htmlspecialchars($record['income']) . '</td>';
        $table .= '<td>' . htmlspecialchars($record['occupation']) . '</td>';
        $table .= '<td>' . htmlspecialchars($record['loan_amount']) . '</td>';
        $table .= '<td>' . htmlspecialchars($record['g1']) . '</td>';
        $table .= '<td>' . htmlspecialchars($record['g2']) . '</td>';
        $table .= '<td>' . htmlspecialchars($record['loan_purpose']) . '</td>';
        $table .= '<td>' . htmlspecialchars($record['mortgage_details']) . '</td>';
        $table .= '<td><a href="' . $pdf_path . '" target="_blank">View PDF</a></td>';
        $table .= '<td>' . htmlspecialchars($record['interest_rate']) . '</td>';
        $table .= '<td>' . htmlspecialchars($record['repayment_period']) . '</td>';
        $table .= '<td>' . htmlspecialchars($record['installment']) . '</td>';
        $table .= '<td>' . htmlspecialchars($record['recommendation']) . '</td>';
        $table .= '<td>' . htmlspecialchars($record['officer']) . '</td>';
        $table .= '<td>' . htmlspecialchars($record['approval_comment']) . '</td>';
        $table .= '<td>' . htmlspecialchars($record['status']) . '</td>';
        $table .= '</tr>';
    }
    $table .= '</table>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applied Loans</title>
    <link rel="Stylesheet" href="style.css">
    <style>
        .view_microloans {
            padding-left: -30px;
            padding-right: -30px;
            padding-top: 100px;
            padding-bottom: 100px;
            margin: 90px 300px 75px 300px;
            background-color: rgb(145, 151, 156);
        }

        .view_microloans h2 {
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
        <a href="view_microloan.php">Home<span></span></a>
        <a href="contact_us.html">Contact Us<span></span></a>
        <a href="index.html">Logout<span></span></a>
    </nav>
</header>
<div class="view_microloans">
    <h2>View All Inquiries</h2><br><br>
    <p class="records-found"><?php echo mysqli_num_rows($result_set) . " Records Found.<hr>"; ?></p><br><br>
    <?php echo $table; ?>
</div>
</body>
</html>
<?php mysqli_close($config); ?>

