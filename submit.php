<?php
session_start();
include 'db_config.php'; // Ensure database connection

// Validate session data
$required_fields = ['branch', 'full_name', 'father_or_husband_name', 'mother_name', 'date_of_birth', 'mobile_number', 'national_id_passport', 'nominee_name', 'nominee_relation', 'nominee_address', 'nominee_dob'];

foreach ($required_fields as $field) {
    if (empty($_SESSION[$field])) {
        die("Error: Missing required field - " . ucfirst(str_replace("_", " ", $field)));
    }
}

// Retrieve session data
$branch = $_SESSION['branch'];
$full_name = $_SESSION['full_name'];
$father_or_husband_name = $_SESSION['father_or_husband_name'];
$mother_name = $_SESSION['mother_name'];
$date_of_birth = $_SESSION['date_of_birth'];
$mobile_number = $_SESSION['mobile_number'];
$national_id_passport = $_SESSION['national_id_passport'];
$nominee_name = $_SESSION['nominee_name'];
$nominee_relation = $_SESSION['nominee_relation'];
$nominee_address = $_SESSION['nominee_address'];
$nominee_dob = $_SESSION['nominee_dob'];

// Check if mobile number already exists
$check_stmt = $conn->prepare("SELECT * FROM account_openings WHERE mobile_number = ?");
$check_stmt->bind_param("s", $mobile_number);
$check_stmt->execute();
$result = $check_stmt->get_result();

if ($result->num_rows > 0) {
    die("Error: This mobile number is already registered!");
}
$check_stmt->close();

// Generate random account number
$account_number = 'UB' . rand(1000000000, 9999999999);

// Handle file upload securely
$upload_dir = "uploads/";
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

if (isset($_FILES["applicant_signature"]) && $_FILES["applicant_signature"]["error"] === 0) {
    $file_name = basename($_FILES["applicant_signature"]["name"]);
    $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allowed_types = ['jpg', 'jpeg', 'png', 'pdf'];

    if (!in_array($file_type, $allowed_types)) {
        die("Error: Only JPG, JPEG, PNG, and PDF files are allowed.");
    }

    $target_file = $upload_dir . uniqid() . "." . $file_type; // Unique filename
    if (!move_uploaded_file($_FILES["applicant_signature"]["tmp_name"], $target_file)) {
        die("Error: File upload failed.");
    }
} else {
    die("Error: No signature file uploaded.");
}

// Insert into database
$stmt = $conn->prepare("INSERT INTO account_openings 
    (branch, full_name, father_or_husband_name, mother_name, date_of_birth, mobile_number, national_id_passport, nominee_name, nominee_relation, nominee_address, nominee_dob, account_number, applicant_signature) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssssssssssss", $branch, $full_name, $father_or_husband_name, $mother_name, $date_of_birth, $mobile_number, $national_id_passport, $nominee_name, $nominee_relation, $nominee_address, $nominee_dob, $account_number, $target_file);

if ($stmt->execute()) {
    echo "<div id='success-message' class='success-box'>
            ✅ Account application submitted successfully!<br>
            🎉 Your Account Number: <span class='account-number'>$account_number</span>
          </div>";

    echo "<style>
            .success-box {
                text-align: center;
                font-size: 22px;
                color: green;
                font-weight: bold;
                padding: 20px;
                border: 2px solid green;
                background-color: #e8ffe8;
                border-radius: 10px;
                width: 50%;
                margin: 50px auto;
                animation: fadeIn 1s ease-in-out, fadeOut 3s ease-in-out 5s forwards;
            }
            .account-number {
                color: blue;
                font-size: 24px;
                font-weight: bold;
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(-20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            @keyframes fadeOut {
                from { opacity: 1; }
                to { opacity: 0; display: none; }
            }
          </style>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
