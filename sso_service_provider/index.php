<?php
session_start();
require_once 'saml/lib/_autoload.php';
$as = new \SimpleSAML_Auth_Simple('default-sp');
if ($as->isAuthenticated()) {
	echo '<a href="logout.php">Logout</a>';
	echo '<pre>';
	print_r($_SESSION['sso-code-example']);
	echo '</pre>';
} else {
	echo '<a href="login.php">Login</a>';
}