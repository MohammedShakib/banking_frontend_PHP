<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['mobile_number'] = $_POST['mobile_number'] ?? '';
    $_SESSION['national_id_passport'] = $_POST['national_id_passport'] ?? '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UBank: Nominee Information</title>
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
            <span class="marquee-text">UBank stands to give the most innovative and affordable banking products to Bangladesh.</span>
        </div>
        <!-- Step 3: Nominee Information -->
        <h3 class="text-xl font-semibold mt-6 mb-4">Step 3: Nominee Information</h3>

        <form action="submit.php" method="POST" enctype="multipart/form-data" class="space-y-4">
            
            <label class="block">
                <span class="text-gray-700 font-medium">Nominee’s Name</span>
                <input type="text" name="nominee_name" class="input input-bordered w-full mt-1" placeholder="Enter nominee's name" pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" required>
            </label>

            <label class="block">
                <span class="text-gray-700 font-medium">Relation with Account Holder</span>
                <input type="text" name="nominee_relation" class="input input-bordered w-full mt-1" placeholder="Enter relation" pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" required>
            </label>

            <label class="block">
                <span class="text-gray-700 font-medium">Nominee’s Address</span>
                <textarea name="nominee_address" class="textarea textarea-bordered w-full mt-1" placeholder="Enter nominee's address"  required></textarea>
            </label>

            <label class="block">
                <span class="text-gray-700 font-medium">Nominee’s Date of Birth</span>
                <input type="date" name="nominee_dob" class="input input-bordered w-full mt-1" required>
            </label>

            <label class="block">
                <span class="text-gray-700 font-medium">Applicant’s Signature</span>
                <input type="file" name="applicant_signature" class="file-input file-input-bordered w-full mt-1" required>
            </label>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-full mt-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg">
                Submit
            </button>

        </form>
    </div>

</body>
</html>
