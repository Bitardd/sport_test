<?php
$dbc = mysqli_connect('localhost', 'root', '', 'reg') OR DIE('Ошибка подключения к базе данных');
if(isset($_POST['submit'])){
	$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
	$grypa = mysqli_real_escape_string($dbc, trim($_POST['day_s']));
	$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
	$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
	if(!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
		$query = "SELECT * FROM `signup` WHERE username = '$username'";
		$data = mysqli_query($dbc, $query);
		if(mysqli_num_rows($data) == 0) {
			$query ="INSERT INTO `signup` (username, grypa, password) VALUES ('$username', '$grypa', SHA('$password2'))";
			mysqli_query($dbc,$query);
			echo 'Всё готово, можете авторизоваться';
			mysqli_close($dbc);
			exit();
		}
		else {
			echo 'Логин уже существует';
		}

	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="style/style.css" rel="stylesheet">
</head>
<body>
<style>
content {
	position: absolute;
	left: 500px;
}
content label {
	left: 400px;
}
</style>

<content>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<h1><label for="username">Введите ваш логин:</label></h1>
	<h1><input type="text" name="username"></h1>
	<h1><label for="password">Введите ваш пароль:</label></h1>
	<h1><input type="password" name="password1"></h1>
	<h1><label for="password">Введите пароль еще раз:</label></h1>
	<h1><input type="password" name="password2"></h1>
	<h1><button type="submit" name="submit">Регистрация</button></h1>
	<a href = "index.html">Назад</a>
	</form>
</content>

</body>

</html>