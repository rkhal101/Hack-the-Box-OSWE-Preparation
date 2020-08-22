<?php
// page1.php

session_start();
if (!isset($_SESSION['user_id'])) {
	header("Location: page2.php");
	exit();
}

echo 'Welcome to page #1';



?>
