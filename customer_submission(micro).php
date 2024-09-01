<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $income = $_POST['income'];
    $occupation = $_POST['occupation'];
    $loan_amount = $_POST['loan_amount'];
    $g1 = $_POST['g1'];
    $g2 = $_POST['g2'];
    $loan_purpose = $_POST['loan_purpose'];
    $mortgage_details = $_POST['mortgage_details'];

    include('inc/connection.php');

    
    if (isset($_FILES['pdf_document']) && $_FILES['pdf_document']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        $upload_file = $upload_dir . basename($_FILES['pdf_document']['name']);

        
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

       
        $file_type = mime_content_type($_FILES['pdf_document']['tmp_name']);
        if ($file_type == 'application/pdf') {
            if (move_uploaded_file($_FILES['pdf_document']['tmp_name'], $upload_file)) {
               
                $query = "INSERT INTO microloan_applications (name, nic, phone, address, income, occupation, loan_amount, g1, g2, loan_purpose, mortgage_details, pdf_document)
                          VALUES ('$name', '$nic', '$phone', '$address', '$income', '$occupation', '$loan_amount', '$g1', '$g2', '$loan_purpose', '$mortgage_details', '$upload_file')";

                if (mysqli_query($config, $query)) {
                    echo "Data successfully saved.\n";
                    header('Location: user(customer)_page.html');
                } else {
                    echo "Error: " . mysqli_error($config);
                }
            } else {
                echo "File upload failed.\n";
            }
        } else {
            echo "Uploaded file is not a PDF.\n";
        }
    } else {
        echo "No file uploaded or upload error.\n";
    }
}
?>









