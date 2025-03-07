<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['branch'] = $_POST['branch'] ?? '';
    $_SESSION['full_name'] = $_POST['full_name'] ?? '';
    $_SESSION['father_or_husband_name'] = $_POST['father_or_husband_name'] ?? '';
    $_SESSION['mother_name'] = $_POST['mother_name'] ?? '';
    $_SESSION['date_of_birth'] = $_POST['date_of_birth'] ?? '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UBank: Contact & Identification Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animation for form sections */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 0.5s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Logo Animation (Smooth Zoom In & Out) */
        @keyframes zoomInOut {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        .logo-animation {
            animation: zoomInOut 3s infinite ease-in-out;
        }

        /* Button Hover Effect */
        .btn-primary {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Form Slide-In Effect */
        .slide-in {
            opacity: 0;
            transform: translateX(-50px);
            animation: slideIn 0.1s ease-in-out forwards;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Scrolling text animation */
        .marquee-container {
            overflow: hidden;
            white-space: nowrap;
            background-color: #ffffff; /* Light green background */
            padding: 10px;
            width: 100%;
            position: relative;
        }

        .marquee-text {
            display: inline-block;
            animation: marquee 25s linear infinite;
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        @keyframes marquee {
            from {
                transform: translateX(100%);
            }
            to {
                transform: translateX(-100%);
            }
        }
    </style>
</head>
<body class="bg-orange-400 flex justify-center items-center min-h-screen p-4">

    <div class="w-full max-w-2xl bg-white shadow-lg p-8 rounded-xl">
        
        <!-- UBank Logo -->
        <div class="flex justify-center mb-4">
            <img src="./img/update logo.png" alt="UBank Logo" class="w-20 h-20">
        </div>

        <!-- Title -->
        <h2 class="text-3xl font-bold text-center mb-2 text-gray-800">Account Opening Form</h2>
        <div class="marquee-container">
            <span class="marquee-text">UBank is Bangladesh's most innovative and technologically advanced bank. UBank stands to give the most innovative and affordable banking products to Bangladesh.</span>
        </div>

        <!-- Step 2: Contact & Identification Details -->
        <h3 class="text-xl font-semibold mt-6 mb-4">Step 2: Contact & Identification Details</h3>

        <form action="step3.php" method="POST" class="space-y-4">
            
        <label class="block">
                    <span class="text-gray-700">Mobile Number</span>
                    <input type="tel" class="input input-bordered w-full mt-1" pattern="[0-9]{11}" maxlength="11" minlength="11" title="Enter exactly 11-digit mobile number" required>


                </label>

                <label class="block">
                    <span class="text-gray-700">National ID/Passport Number</span>
                    <input type="text" class="input input-bordered w-full mt-1" pattern="[A-Za-z][0-9]{8}" maxlength="9" minlength="9" title="Enter a valid Bangladeshi passport number (1 letter + 8 digits, e.g., A12345678)" required>


                </label>


            <!-- Next Button -->
            <button type="submit" class="btn btn-primary w-full mt-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg">
                Next
            </button>

        </form>
    </div>

</body>
</html>
