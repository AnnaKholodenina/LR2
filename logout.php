<!DOCTYPE html>
<html lang="ru">
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta content="text/html; charset=utf-8">
</head>
<body>
<?php 
require "db.php";
unset($_SESSION['logged_user']);
header('Location: index.php');
?>
</body>
</html>