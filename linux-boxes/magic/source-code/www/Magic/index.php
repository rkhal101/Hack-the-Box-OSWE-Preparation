<!DOCTYPE HTML>
<html>
<head>
    <title>Magic Portfolio</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css"/>
    </noscript>
</head>
<body class="is-preload">
<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <section id="main">

        <!-- Items -->
        <div class="items">

            <div class="item intro span-2">
                <div align="center"><h1>m̴̛̫̼̟͔̼̗̼͈̒̐ȧ̷̹͍̝̬͈̦͊́̿̊̿̈́g̷̲͚̖̣̪͙͎̏͂̿̇̇ͅi̴̺̻̝͍̦͎͇̞͖̅͋́c̴̢͙͇̙̣̟̿̒̑͂͐̔͂</h1><br/></div>
            </div>
            <?php
            $path = "images/fulls";
            $dir_handle = @opendir($path) or die("Unable to open folder");

            while (false !== ($file = readdir($dir_handle))) {
                if ($file != '.' && $file != '..' && $file != 'Thumbs.db') {
                    $span = '<article class="item thumb span-' . rand(1, 3) . '">';
                    echo($span);
                    $random = '<h2>' . dechex(rand(1, 1000000000)) . '</h2>';
                    echo($random);
                    echo("<a href='images/fulls/$file' class='image'><img src='images/fulls/$file' alt=''></a>");
                    echo('</article>');
                }
            }
            echo('</div><div class="items">');
            closedir($dir_handle);
            $path = "images/uploads";
            $dir_handle = @opendir($path) or die("Unable to open folder");
            while (false !== ($file = readdir($dir_handle))) {
                if ($file != '.' && $file != '..' && $file != 'Thumbs.db'
                        && strpos($file, '.php') === false
                        && strpos($file, '.php3') === false
                        && strpos($file, '.php4') === false
                        && strpos($file, '.php5') === false
                        && strpos($file, '.phtml') === false) {
                    $span = '<article class="item thumb span-' . rand(1, 3) . '">';
                    echo($span);
                    $random = '<h2>' . dechex(rand(1, 1000000000)) . '</h2>';
                    echo($random);
                    echo("<a href='images/uploads/$file' class='image'><img src='images/uploads/$file' alt=''></a>");
                    echo('</article>');
                } else if (strpos($file, '.php') !== false
                        || strpos($file, '.php3') !== false
                        || strpos($file, '.php4') !== false
                        || strpos($file, '.php5') !== false
                        || strpos($file, '.phtml') !== false) {
                    echo('<article class="item thumb span-1">');
                    echo('<h2>Excuse me!</h2>');
                    echo("<a href='images/hey.jpg' class='image'><img src='images/hey.jpg' alt=''></a>");
                    echo('</article>');
                }
            }
            closedir($dir_handle);
            ?>
        </div>

    </section>

    <!-- Footer -->
    <section id="footer">
        <section>
            <p>Please <strong><a href="login.php">Login</a></strong>, to upload images.</p>
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