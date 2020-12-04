<?php 
$title="Парольная аутентификация";
require __DIR__ . '/header.php';
require "db.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta content="text/html; charset=utf-8">
</head>
<body>


<!--Форма-->
<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<h2>Вход</h2>
				<form action="login.php" method="post">
					<input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" required><br>
					<input type="password" class="form-control" name="password" id="pass" placeholder="Введите пароль" required><br>
					<button class="btn btn-success" name="action_login" type="submit">Войти</button>
				</form>
				<br>
			</div>
		</div>
	</div>
	</body>
</html>
<!--Проверка-->
<?php
$data = $_POST; 

if(isset($data['action_login'])) { 

	$errors = array();
	$user = R::findOne('users', 'login = ?', array($data['login']));

 	if($user) {
 		if(md5($data['password']) == $user->password) {
 			if (strtotime((date("Y-m-d"))) < strtotime($user->data) || strtotime((date("Y-m-d"))) == strtotime($user->data)) {
 				$_SESSION['logged_user'] = $user;
 				header('Location: index.php');
 			}
 			else {
 				$errors[] = 'Извините, но срок действия пароля подошел к концу';
 			}
 		}
	else {
    
    	$errors[] = 'Введенный пароль не верный, попробйте еще раз';
    }

 } 
 else {
 	$errors[] = 'Пользователь с таким логином не найден';
 }
//проверка на ошибки
if(!empty($errors)) {
	echo '<div align = "center" style="color: red; ">' . array_shift($errors). '</div><hr>';
}}
?>