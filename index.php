<?php
$title="Парольная аутентификация";
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

<?php if(isset($_SESSION['logged_user'])) : ?>
	<h1>Добро пожаловать, <?php echo $_SESSION['logged_user']->name;
	?></br></h1>
 <br>
<a href="logout.php" class="btn btn-success">Выйти</a>
<?php else : ?>
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
<?php endif; ?>
