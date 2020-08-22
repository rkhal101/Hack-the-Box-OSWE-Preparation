<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
$target_dir = "images/uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$allowed = array('2', '3');

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    // Allow certain file formats
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "<script>alert('Sorry, only JPG, JPEG & PNG files are allowed.')</script>";
        $uploadOk = 0;
    }

    if ($uploadOk === 1) {
        // Check if image is actually png or jpg using magic bytes
        $check = exif_imagetype($_FILES["image"]["tmp_name"]);
        if (!in_array($check, $allowed)) {
            echo "<script>alert('What are you trying to do there?')</script>";
            $uploadOk = 0;
        }
    }
    //Check file contents
    /*$image = file_get_contents($_FILES["image"]["tmp_name"]);
    if (strpos($image, "<?") !== FALSE) {
        echo "<script>alert('Detected \"\<\?\". PHP is not allowed!')</script>";
        $uploadOk = 0;
    }*/

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk === 1) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Magic Upload</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="stylesheet" href="assets/css/upload.css"/>
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css"/>
    </noscript>
    <style>
        .input {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0;
            color: #150C07;
        }
        .content {
            display: table-cell;
            vertical-align: middle;
        }
    </style>
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">
    <!-- Main -->
    <section id="" class="indent-1">
        <h1>Welcome Admin!</h1>
        <div class="frame">
            <div class="center">
                <div class="bar"></div>
                <div class="title">Select Image to Upload</div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="dropzone">
                        <div class="content">
                            <img src="https://100dayscss.com/codepen/upload.svg" class="upload">
                            <span class="filename"></span>
                            <input type="file" class="input" name="image">
                        </div>
                    </div>
                    <input class="upload-btn" type="submit" value="Upload Image" name="submit">
                </form>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <section id="footer">
        <section>
            <p><strong><a href="logout.php">Logout</a></strong></p>
        </section>
        <section>
            <ul class="icons">
                <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
                <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
            </ul>
            <ul class="copyright">
                <li>&copy; Magic</li>
                <li>4d61676963</li>
            </ul>
        </section>
    </section>

</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.poptrox.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/upload.js"></script>

</body>
</html>
