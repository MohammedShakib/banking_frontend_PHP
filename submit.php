<?php
session_start();
include 'db_config.php';

// Function to generate a random 10-digit account number
function generateAccountNumber() {
    return rand(1000000000, 9999999999); // 10-digit random number
}

$account_number = generateAccountNumber();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['nominee_name'] = $_POST['nominee_name'] ?? '';
    $_SESSION['nominee_relation'] = $_POST['nominee_relation'] ?? '';
    $_SESSION['nominee_address'] = $_POST['nominee_address'] ?? '';
    $_SESSION['nominee_dob'] = $_POST['nominee_dob'] ?? '';

    // Ensure "uploads/" directory exists
    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // File Upload Handling
    $target_file = $upload_dir . basename($_FILES["applicant_signature"]["name"]);
    if (move_uploaded_file($_FILES["applicant_signature"]["tmp_name"], $target_file)) {
        $file_upload_msg = "File uploaded successfully!";
    } else {
        die("File upload failed!<br>");
    }

    // Insert Data into Database
    $stmt = $conn->prepare("INSERT INTO account_openings 
        (branch, full_name, father_or_husband_name, mother_name, date_of_birth, mobile_number, national_id_passport, nominee_name, nominee_relation, nominee_address, nominee_dob, applicant_signature, account_number)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssssssssss",
        $_SESSION['branch'],
        $_SESSION['full_name'],
        $_SESSION['father_or_husband_name'],
        $_SESSION['mother_name'],
        $_SESSION['date_of_birth'],
        $_SESSION['mobile_number'],
        $_SESSION['national_id_passport'],
        $_SESSION['nominee_name'],
        $_SESSION['nominee_relation'],
        $_SESSION['nominee_address'],
        $_SESSION['nominee_dob'],
        $target_file,
        $account_number
    );

    if ($stmt->execute()) {
        $success_msg = "Account application submitted successfully!";
        session_destroy();
    } else {
        die("Database Error: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Successful</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Fade-in Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        .fade-in {
            animation: fadeIn 1s ease-in-out forwards;
        }

        /* Auto Redirect */
        .redirect {
            opacity: 0;
            animation: fadeIn 2s ease-in-out forwards;
        }
    </style>
    <script>
        // Redirect after 5 seconds
        setTimeout(function() {
            window.location.href = "index.php";
        }, 5000);
    </script>
</head>
<body class="bg-green-100 flex justify-center items-center min-h-screen p-4">

    <div class="w-full max-w-lg bg-white shadow-lg p-8 rounded-xl text-center fade-in">
        <h2 class="text-3xl font-bold text-green-600 mb-4">🎉 Success!</h2>
        <p class="text-gray-700 text-lg"><?= $file_upload_msg ?? '' ?></p>
        <p class="text-gray-800 text-lg font-semibold mt-2"><?= $success_msg ?? '' ?></p>
        
        <!-- Account Number Display -->
        <p class="text-gray-900 text-xl font-bold mt-4">Your Account Number:</p>
        <p class="text-2xl font-semibold text-blue-600"><?= $account_number ?></p>

        <p class="text-gray-600 mt-4 redirect">Redirecting to home in <span id="countdown">5</span> seconds...</p>
    </div>

    <script>
        // Countdown Timer
        let count = 5;
        setInterval(() => {
            count--;
            document.getElementById("countdown").innerText = count;
        }, 1000);
    </script>

</body>
</html>
