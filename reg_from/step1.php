<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UBank: Account Opening Form - Step 1</title>
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
        
    <!-- Ubank Logo with Zoom Animation -->
        <div class="flex justify-center">
            <img src="./img/update logo.png" alt="Ubank Logo" class="w-32 h-32 logo-animation">
        </div>

        <!-- Title -->
        <h2 class="text-3xl font-bold text-center mb-2 text-gray-800">Account Opening Form</h2>
        <!-- Scrolling Bank Info -->
        <div class="marquee-container">
            <span class="marquee-text">UBank is Bangladesh's most innovative and technologically advanced bank. UBank stands to give the most innovative and affordable banking products to Bangladesh.</span>
        </div>


        <!-- Step 1: Applicant Information -->
        <h3 class="text-xl font-semibold mt-6 mb-4">Step 1: Applicant Information</h3>

        <form action="step2.php" method="POST" class="space-y-4">
            
            <!-- Branch Dropdown with Regions -->
            <label class="block">
                    <span class="text-gray-700 font-medium">Branch</span>
                    <select class="select select-bordered w-full">
                        <option>Select Branch</option>

                        <optgroup label="Dhaka Region">
                            <option>Local Office</option>
                            <option>Banani Branch</option>
                            <option>Nababpur Branch</option>
                            <option>Motijheel Foreign Exchange Branch</option>
                            <option>Kawran Bazar Branch</option>
                            <option>Shantinagar Branch</option>
                            <option>Dhanmondi Branch</option>
                            <option>Mohakhali Branch</option>
                            <option>Mirpur Branch</option>
                            <option>Gulshan Branch</option>
                            <option>Uttara Branch</option>
                            <option>Islampur Branch</option>
                            <option>Dania Branch</option>
                            <option>Dhaka EPZ Branch</option>
                            <option>Elephant Road Branch</option>
                            <option>Joypara Branch</option>
                            <option>Nayabazar Branch</option>
                            <option>Savar Bazar Branch</option>
                            <option>Imamganj Branch</option>
                            <option>Bashundhara Branch</option>
                            <option>Shyamoli Branch</option>
                            <option>Bandura Branch</option>
                            <option>Mirpur Circle-10 Branch</option>
                            <option>Satmosjid Road Branch</option>
                            <option>Rampura Branch</option>
                        </optgroup>

                        <optgroup label="Chittagong Region">
                            <option>Agrabad Branch</option>
                            <option>Patherhat Branch</option>
                            <option>Hathazari Branch</option>
                            <option>O.R. Nizam Road Branch</option>
                            <option>Muradpur Branch</option>
                            <option>Jubilee Road Branch</option>
                        </optgroup>

                        <optgroup label="Sylhet Region">
                            <option>Sylhet Branch</option>
                            <option>Biswanath Branch</option>
                            <option>Golapganj Branch</option>
                            <option>Goala Bazar Branch</option>
                        </optgroup>

                        <optgroup label="Khulna Region">
                            <option>Khulna Branch</option>
                            <option>Daulatpur Branch</option>
                            <option>Boro Bazar Branch</option>
                            <option>Bagerhat Branch</option>
                        </optgroup>

                        <optgroup label="Rajshahi Region">
                            <option>Rajshahi Branch</option>
                            <option>Chapai Nawabganj Branch</option>
                            <option>Joypurhat Branch</option>
                            <option>Naogaon Branch</option>
                        </optgroup>

                        <optgroup label="Barisal Region">
                            <option>Barishal Branch</option>
                            <option>Bhola Branch</option>
                            <option>Jhalokati Branch</option>
                            <option>Patuakhali Branch</option>
                        </optgroup>

                        <optgroup label="Rangpur Region">
                            <option>Rangpur Branch</option>
                            <option>Dhap Branch</option>
                            <option>Dinajpur Branch</option>
                            <option>Gobindaganj Branch</option>
                        </optgroup>

                        <optgroup label="Mymensingh Region">
                            <option>Mymensingh Branch</option>
                            <option>Master Bari Branch</option>
                            <option>Seed Store Bazar Branch</option>
                            <option>Mymensingh Station Road Branch</option>
                        </optgroup>
                    </select>
                </label>


            <label class="block">
                <span class="text-gray-700 font-medium">Full Name</span>
                <input type="text" name="full_name" class="input input-bordered w-full mt-1" placeholder="Enter your full name" pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" required>
            </label>

            <label class="block">
                <span class="text-gray-700 font-medium">Father’s/Husband’s Name</span>
                <input type="text" name="father_or_husband_name" class="input input-bordered w-full mt-1" placeholder="Enter Father/Husband's Name" pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" required>
            </label>

            <label class="block">
                <span class="text-gray-700 font-medium">Mother’s Name</span>
                <input type="text" name="mother_name" class="input input-bordered w-full mt-1" placeholder="Enter Mother's Name" pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed" required>
            </label>

            <label class="block">
                <span class="text-gray-700 font-medium">Date of Birth</span>
                <input type="date" name="date_of_birth" class="input input-bordered w-full mt-1" required>
            </label>

            <!-- Next Button -->
            <button type="submit" class="btn btn-primary w-full mt-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg">
                Next
            </button>

        </form>
    </div>

</body>
</html>
