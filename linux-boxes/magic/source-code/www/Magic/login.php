<?php
session_start();
require 'db.php5';
if (!empty($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (strpos( strtolower($username), 'sleep') === false && strpos( strtolower($password), 'sleep') === false && strpos( strtolower($username), 'benchmark') === false && strpos( strtolower($password), 'benchmark') === false) {
        try {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $stmt = $pdo->query("SELECT * FROM login WHERE username='$username' AND password='$password'");
            $user = $stmt->fetch();
            $count = 0;
            foreach ($user as $value) {
                $count += 1;
            }
            Database::disconnect();
            if ($count > 0) {
                $_SESSION['user_id'] = $user->id;
                header("Location: upload.php");
            } else {
                print("<script>alert('Wrong Username or Password')</script>");
                //print('Wrong Username or Password');
            }
        } catch (PDOException $e) {
            //echo "Error: " . $e->getMessage();
            //echo "An SQL Error occurred!";
        }
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Magic Login</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css"/>
    </noscript>
    <style>
        #login-form {
            background: #969592;
            border: 3px solid #eeeee;
            padding: 9px 9px;
            width: 300px;
            border-radius: 5px;
            color: #1a1f2c;
        }

        input, select, textarea {
            color: #150C07;
            width: 180px;
        }
        input[type="submit"],
        input[type="reset"],
        input[type="button"],
        button {
            -moz-appearance: none;
            -webkit-appearance: none;
            -ms-appearance: none;
            appearance: none;
            -moz-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            -webkit-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            -ms-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            background-color: transparent;
            border-radius: 4px;
            border: 0;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.3);
            color: #ffffff !important;
            cursor: pointer;
            display: inline-block;
            font-weight: 300;
            height: 3em;
            line-height: 3em;
            padding: 0 2.25em;
            text-align: center;
            text-decoration: none;
            white-space: nowrap;
        }
        input[type="submit"]:hover, input[type="submit"]:active,
        input[type="reset"]:hover,
        input[type="reset"]:active,
        input[type="button"]:hover,
        input[type="button"]:active,
        button:hover,
        button:active {
            box-shadow: inset 0 0 0 1px #e44c65;
            color: #e44c65 !important;
        }
    </style>
</head>
<body class="is-preload">
<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <section id="main">
        <form id="login-form" method="POST" action="" onsubmit="">
            <table border="0.5">
                <tr>
                    <td><label for="username">Username </label></td>
                    <td><input type="text" name="username" id="username"></td>
                </tr>
                <tr>
                    <td><label for="password">Password </label></td>
                    <td><input type="password" name="password" id="password"></input></td>
                </tr>
                <tr>
                    <td><button class="button small" type="submit" value="Submit">Login</button></td>
                </tr>
            </table>
        </form>

    </section>

    <!-- Footer -->
    <section id="footer">
        <section>
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

</body>
</html>