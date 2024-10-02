<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character encoding and viewport settings -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF token for security in forms (used in Laravel applications) -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Page Title -->
    <title>Video Vibe</title>
    <!-- Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <!-- Custom CSS -->
    <!-- <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"> -->
    <!-- Additional Styles -->
    <style>
        /* Body Styling */
        body {
            background-color: #f8f9fa; /* Light gray background color */
            font-family: 'Montserrat', sans-serif; /* Montserrat font family */
            font-size: 14px; /* Base font size */
            height: 100%; /* Full height */
            margin: 0; /* Remove default margin */
            padding-bottom: 60px; /* Space for the footer */
        }

        html {
            height: 100%; /* Full height */
        }

        /* Header Styling */
        .app-header {
            background-color: #264653; /* Dark teal background color */
            color: #ffffff; /* White text color */
            padding: 10px 0; /* Vertical padding */
            height: 220px; /* Fixed header height */
            display: flex;
            align-items: center; /* Center items vertically */
            justify-content: center; /* Center items horizontally */
            position: relative;
            z-index: 1; /* Stack order */
        }

        .container-fluid {
            height: 180px; /* Set container height */
        }

        /* Navigation Links */
        .header-links {
            position: absolute; /* Position over the header */
            top: 0; /* Align to top */
            width: 100%; /* Full width */
            display: flex;
            justify-content: center; /* Center links */
            padding: 10px 0; /* Vertical padding */
            background-color: #264653; /* Match header background */
            margin: 0; /* Remove default margin */
        }

        .header-links a {
            color: #ffffff; /* White text color */
            margin: 0 15px; /* Horizontal spacing */
            text-decoration: none; /* Remove underline */
            font-size: 16px; /* Link font size */
        }

        /* Logo and Title Section */
        .logo-title-section {
            position: relative;
            z-index: 2;
            margin-top: 0; /* Remove top margin */
            text-align: center; /* Center content */
        }

        .logo-title-section .logo {
            width: 60px; /* Logo width */
            height: 60px; /* Logo height */
        }

        .logo-title-section .app-title {
            font-size: 24px; /* Title font size */
            color: #ffffff; /* White text color */
        }

        /* Main Container Styling */
        .main-container {
            position: relative;
            z-index: 2;
            /* Remove fixed width to occupy full width */
            display: flex;
            justify-content: center; /* Center content horizontally */
            align-items: stretch; /* Stretch items to match height */
            width: 100%; /* Full width */
            padding: 0px 0; /* Vertical padding */
            box-sizing: border-box; /* Include padding in width */
        }

        /* Orange and Brown Divs */
        .side-div {
            width: 20%; /* 20% width */
            background-color: #FFA500; /* Default to orange, overridden in specific classes */
            min-height: 300px; /* Minimum height to make visible */
        }

        .orange-div {
            background-color: orange; /* Orange background */
            margin-right: 20px; /* Space between orange div and card */
        }

        .brown-div {
            background-color: brown; /* Brown background */
            margin-left: 20px; /* Space between brown div and card */
        }

        /* Card Styling */
        .card.emphasized-card {
            width: 40%; /* 60% width */
            max-width: none; /* Remove max-width */
            margin: 0 auto; /* Center horizontally */
        }

        .card-header {
            background-color: #264653; /* Match header color */
            color: #ffffff; /* White text color */
        }

        .card-header h3 {
            margin: 0; /* Remove default margin */
        }

        .card-body {
            padding: 20px; /* Inner padding */
            position: relative; /* For paste button positioning */
        }

        /* Input Field Styling */
        .rounded-input {
            border-radius: 30px; /* Rounded corners */
            padding-right: 80px; /* Space for paste button */
            border: 1px solid rgba(42, 157, 143, 0.8); /* Border color */
            height: 50px; /* Input height */
            width: 100%; /* Full width */
            box-sizing: border-box; /* Include padding in width */
        }

        /* Paste Button Styling */
        .paste-button {
            position: absolute; /* Position inside input */
            top: 50%; /* Center vertically */
            right: 10px; /* Align to right */
            transform: translateY(-50%); /* Adjust vertical position */
            padding: 5px 10px; /* Padding */
            margin: 0; /* No margin */
            display: flex;
            align-items: center; /* Center content */
            border-radius: 15px; /* Rounded corners */
            background-color: rgba(42, 157, 143, 0.8); /* Teal color */
            color: #ffffff; /* White text */
            border: none; /* No border */
            cursor: pointer; /* Pointer cursor */
        }

        /* Paste Button Icon Styling */
        .paste-button .fas {
            margin-right: 5px; /* Right margin */
        }

        /* Paste Button Focus and Active States */
        .paste-button:focus,
        .paste-button:active {
            outline: none; /* Remove outline */
            box-shadow: none; /* Remove shadow */
            background-color: rgba(42, 157, 143, 0.8); /* Teal color */
            color: #ffffff; /* White text */
        }

        /* Convert Button Styling */
        #convertButton {
            background-color: rgba(42, 157, 143, 0.8); /* Teal color */
            color: #ffffff; /* White text */
            border: none; /* No border */
            border-radius: 30px; /* Rounded corners */
            height: 50px; /* Button height */
            padding: 0 20px; /* Horizontal padding */
            min-width: 100px; /* Minimum width */
            font-size: 20px; /* Font size */
            font-weight: bold; /* Bold text */
            cursor: pointer; /* Pointer cursor */
            margin-left: 20px; /* Left margin */
            white-space: nowrap; /* Prevent text wrap */
        }

        /* Themed Button Hover Effect */
        .themed-button:hover {
            background-color: rgba(38, 70, 83); /* Darker teal on hover */
        }

        /* Primary Button Styling */
        .btn-primary {
            background-color: rgba(42, 157, 143, 0.8); /* Teal color */
            border-color: rgba(42, 157, 143, 0.8); /* Border color */
            margin-left: 10px; /* Left margin */
            font-size: 12px; /* Font size */
        }

        /* Primary Button Hover Effect */
        .btn-primary:hover {
            background-color: rgba(38, 70, 83, 0.8); /* Darker teal on hover */
            border-color: rgba(38, 70, 83, 0.8); /* Border color */
        }

        /* Disabled Button Styling */
        .btn-disabled {
            background-color: rgba(108, 117, 125, 0.8); /* Gray color */
            border-color: rgba(108, 117, 125, 0.8); /* Border color */
            color: #fff; /* White text */
            cursor: not-allowed; /* Change cursor */
            font-size: 12px; /* Font size */
        }

        /* Progress Bar Styling */
        .progress {
            height: 50px; /* Height of progress bar */
            background-color: #ffffff; /* Background color */
        }

        .progress-bar {
            width: 0%; /* Initial width */
            background-color: rgba(42, 157, 143, 0.8); /* Teal color */
        }

        /* Progress Text Styling */
        #progressText {
            padding-top: 10px;
            height: 30px;
            padding-bottom: 10px;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
        }

        /* Animated Text Styling */
        .animated-text {
            color: #e76f51; /* Orange color */
            font-weight: bold;
            font-size: 1rem;
            animation: pulse 1.5s infinite; /* Pulse animation */
            display: inline-block;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-align: center;
        }

        /* Keyframes for Pulse Animation */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        /* Information Section Styling */
        .info-section {
            margin-top: 30px; /* Top margin */
        }

        .info-section h4 {
            margin-bottom: 15px; /* Bottom margin */
            color: #264653; /* Dark teal color */
        }

        .info-section p {
            margin-bottom: 10px; /* Bottom margin */
            color: #264653; /* Dark teal color */
        }

        /* Video Item Styling */
        .video-item {
            padding: 10px; /* Padding */
            border-bottom: 1px solid #ccc; /* Bottom border */
            display: flex;
            align-items: center; /* Center items vertically */
        }

        .video-item img {
            margin-right: 15px; /* Right margin */
            width: 100px; /* Thumbnail width */
            height: 56px; /* Thumbnail height */
            object-fit: cover; /* Maintain aspect ratio */
        }

        .video-item h5 {
            flex-grow: 1; /* Take up remaining space */
            margin: 0; /* Remove default margin */
            color: #264653; /* Dark teal color */
            font-size: 14px; /* Font size */
        }

        .video-item .btn {
            float: right; /* Align to the right */
            margin-left: 10px; /* Left margin */
            font-size: 12px; /* Font size */
        }

        .video-item input[type="checkbox"] {
            margin-right: 15px; /* Right margin */
        }

        /* Button Container Styling */
        .btn-container {
            display: flex;
            justify-content: flex-end; /* Align buttons to the right */
        }

        /* Three Column Layout */
        .three-column-layout {
            display: flex;
            height: calc(100vh - 220px - 100px - 50px); /* Adjust height based on header, purple div, and footer */
        }

        .left-column {
            flex: 3;
            background-color: red;
            min-height: 400px; /* Ensure minimum height */
        }

        .middle-column {
            flex: 4;
            padding: 20px; /* Optional padding */
            overflow-y: auto; /* Scroll if content overflows */
            min-height: 400px; /* Ensure minimum height */
        }

        .right-column {
            flex: 3;
            background-color: green;
            min-height: 400px; /* Ensure minimum height */
        }

        /* Centered Purple Div */
        .centered-purple-div {
            width: 100%; /* 30% width for larger screens */
            background-color: purple; /* Purple background */
            margin: 20px auto; /* Center horizontally with vertical margin */
            height: 150px; /* Fixed height */
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff; /* White text color */
            font-size: 18px; /* Font size */
            border-radius: 10px; /* Rounded corners */
        }

        /* Floating Yellow Footer */
        .floating-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50px;
            background-color: yellow;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000; /* Ensure it's on top */
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1); /* Optional shadow */
        }

        /* Responsive Styling for Mobile Devices */
        @media (max-width: 768px) {
            .header-links {
                flex-direction: row;
                font-size: 10px; /* Smaller font size */
                margin-left: 5px; /* Left margin */
            }

            .header-links a {
                margin-left: 5px 0;
            }

            .logo-title-section {
                margin-top: 20px; /* Top margin */
            }

            .main-container {
                margin-top: -88px; /* Adjusted for smaller screens */
                flex-direction: column; /* Stack side divs vertically */
                align-items: center; /* Center side divs */
            }

            .side-div {
                width: 80%; /* Adjusted width for smaller screens */
                height: 80px; /* Fixed height */
                margin: 10px 0; /* Vertical margin */
            }

            .login-buttons {
                justify-content: center; /* Center buttons */
                margin-top: 10px; /* Top margin */
            }

            /* Floating Buttons at Bottom */
            .btn-container .btn {
                position: fixed;
                bottom: 0;
                left: 50%;
                transform: translateX(-50%); /* Center horizontally */
                width: 100%; /* Full width */
                margin: 0px; /* Remove margin */
                box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1); /* Shadow effect */
                z-index: 10; /* On top */
                font-size: 14px; /* Larger font size */
            }

            /* Adjust Centered Purple Div for Mobile */
            .centered-purple-div {
                width: 80%; /* Adjusted for smaller screens */
                height: 80px; /* Adjusted height */
                font-size: 16px; /* Adjusted font size */
            }

            /* Adjust Three Column Layout for Mobile */
            .three-column-layout {
                flex-direction: column; /* Stack columns vertically */
                height: auto; /* Adjust height */
            }

            .left-column,
            .middle-column,
            .right-column {
                width: 100%;
                min-height: 100px; /* Adjust minimum height */
            }
        }

        /* Restore Original Button Styles for Larger Screens */
        @media (min-width: 820px) {
            .btn-container {
                position: static; /* Default position */
                width: auto; /* Auto width */
                background-color: transparent; /* No background */
                padding: 0; /* No padding */
                box-shadow: none; /* No shadow */
            }

            .btn-container .btn {
                width: auto; /* Auto width */
                margin: 0 10px; /* Horizontal margin */
                font-size: 12px; /* Default font size */
            }

            /* Centered Purple Div */
            .centered-purple-div {
                width: 100%; /* 30% width */
                background-color: purple; /* Purple background */
                margin: 20px auto; /* Center horizontally with vertical margin */
                height: 100px; /* Fixed height */
                display: flex;
                align-items: center;
                justify-content: center;
                color: #ffffff; /* White text color */
                font-size: 18px; /* Font size */
                border-radius: 10px; /* Rounded corners */
            }
        }

        /* Ensure Action Buttons Have Consistent Sizing */
        .action-buttons .btn {
            min-width: 150px; /* Minimum width */
        }

        /* Adjust Margins for Action Buttons */
        .action-buttons .btn-secondary {
            margin-right: auto; /* Auto right margin */
        }

        .action-buttons .btn-primary {
            margin-left: auto; /* Auto left margin */
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="app-header">
        <div class="container-fluid">
            <!-- Navigation Links -->
            <div class="header-links text-center">
                <a href="#about">About Us</a>
                <a href="#faq">FAQ</a>
                <a href="#tandc">T&C</a>
            </div>
            <!-- Logo and Title -->
            <div class="logo-title-section text-center mt-4">
                <img src="{{ asset('assets/img/icon.png') }}" alt="Logo" class="logo">
                <h1 class="app-title mt-2">Video Vibe</h1>
            </div>
        </div>
    </header>

    <!-- Main Content Container -->
    <div class="main-container">
        <!-- Orange Div -->
        <div class="side-div orange-div"></div>

        <!-- Card Component -->
        <div class="card emphasized-card mt-5 mx-auto">
            <!-- Card Header -->
            <div class="card-header text-center">
                <h3>Download Your Favorite Playlist to MP3 or MP4</h3>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!-- Input Section -->
                <div id="inputSection">
                    <!-- Download Form -->
                    <form id="downloadForm" class="d-flex">
                        <!-- CSRF Token for security -->
                        @csrf
                        <!-- Input Group -->
                        <div class="position-relative flex-grow-1">
                            <!-- URL Input Field -->
                            <input type="url" class="form-control rounded-input pr-5" id="playlist_url" name="playlist_url" placeholder="https://youtube.com/watch?v=hWoz_svvMkA" required>
                            <!-- Paste Button inside Input Field -->
                            <button type="button" class="btn btn-primary paste-button" id="pasteButton">
                                <i class="fas fa-paste"></i> Paste
                            </button>
                        </div>
                        <!-- Convert Button -->
                        <button type="submit" class="btn themed-button ml-2" id="convertButton">
                            Convert
                        </button>
                    </form>
                </div>
                <!-- Progress Bar (Hidden Initially) -->
                <div class="progress mt-3" style="display:none; background-color: white;">
                    <div class="progress-bar progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    <div id="progressText" class="animated-text mt-2"></div>
                </div>
                <!-- Convert Next Button (Hidden Initially) -->
                <button id="convertNextButton" class="btn btn-primary btn-block mt-3" style="display:none;">Convert Next</button>
                <!-- Action Buttons (Hidden Initially) -->
                <div class="action-buttons mt-3">
                    <button id="selectAllButton" class="btn btn-primary" style="display:none;">Select All</button>
                    <button id="downloadSelectedButton" class="btn btn-primary" style="display:none;">Download Selected</button>
                </div>
            </div>
            <!-- End of Card Body -->
        </div>

        <!-- Brown Div -->
        <div class="side-div brown-div"></div>
    </div>
    <!-- End of Main Content Container -->

    <!-- Centered Purple Div -->
    <div class="centered-purple-div">
        <!-- You can add content here if needed -->
        <p>Centered Purple Div</p>
    </div>

    <!-- Three Column Layout -->
    <div class="three-column-layout">
        <!-- Left Column -->
        <div class="left-column"></div>
        <!-- Middle Column -->
        <div class="middle-column">
            <!-- Video List Section -->
            <div id="video-list" class="mt-4">
                <!-- Video List Table -->
                <table class="table table-bordered table-striped">
                    <!-- Table Header (Hidden Initially) -->
                    <thead style="display: none;" id="table-headers">
                        <tr>
                            <th scope="col">Select</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <!-- Table Body for Video Items -->
                    <tbody id="video-table-body">
                    </tbody>
                </table>
            </div>
            <!-- End of Video List Section -->

            <!-- Information Sections -->
            <div class="info-section">
                <h4>How to Download</h4>
                <p>1. Copy the URL of the YouTube playlist you want to download.</p>
                <p>2. Paste the URL into the input box above.</p>
                <p>3. Click on the "Fetch Playlist" button to fetch the video details.</p>
                <p>4. Select the videos you want to download and click on the "Download Selected" button to start the conversion process.</p>
            </div>
            <div class="info-section">
                <h4>About Us</h4>
                <p>Welcome to our YouTube Playlist to MP3 downloader. Our tool allows you to easily convert and download YouTube playlists to MP3 format. We are dedicated to providing a simple and efficient service to help you enjoy your favorite music offline.</p>
                <p>If you have any questions or feedback, please feel free to contact us. We are always here to help and improve our service.</p>
            </div>
        </div>
        <!-- Right Column -->
        <div class="right-column"></div>
    </div>
    <!-- End of Three Column Layout -->

    <!-- Floating Yellow Footer -->
    <footer class="floating-footer">
        <p>© 2024 Video Vibe. All rights reserved.</p>
    </footer>

    <!-- JavaScript Files -->
    <!-- jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Popper.js and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS Files -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/api.js') }}"></script>
    <script src="{{ asset('assets/js/ui.js') }}"></script>
    <script src="{{ asset('assets/js/events.js') }}"></script>
</body>
</html>
