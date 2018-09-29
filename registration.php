<?php
	require_once 'connect.php';

	$con = mysqli_connect($host, $user, $password, $db) or die ("Ошибка ". mysqli_error($con));

	if (isset($_POST['reg_button'])){


		if ((empty($_POST['name'])) or (empty($_POST['surname'])) or (empty($_POST['login'])) or (empty($_POST['password']))){

			$ei = 1;

			} 	elseif (preg_match("/^[а-яА-Я ]+$/i", $_POST['login'])){
					
					$en_login = 1;

				}	elseif (strlen($_POST['password']) < 5 ){

					$pass_length = 1;
				}
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Регистрация на сайте</title>
	<link href="css/reg.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div id="pagewarp">
		<div class="reg_block">
			<p>Регистрация</p>
			<form method="POST" action="">
				<div class="main_field">
					<div class="field">
						<label for="name">Имя:</label>
						<input class="input_text" type="text" name="name" id="name">
					</div>
					<div class="field">
						<label for="surname">Фамилия:</label>
						<input class="input_text" type="text" name="surname" id="surname">
					</div>
					<div class="field">
						<label for="login">Логин:</label>
						<input class="input_text" type="text" name="login" id="login">
					</div>
					<div class="field">
						<label for="password">Пароль:</label>
						<input class="input_text" type="password" name="password" id="password">
					</div>
					<div class="filed select_block">
						<label class="group_label" for="group">Группа:</label>
						<select class="select_text" name="group" id="group">
							<option>ЭКС - 181б</option>
							<option>ЭКС - 182</option>
							<option>БУР - 181б</option>
							<option>БУР - 182</option>
							<option>ГФ - 181б</option>
							<option>МЕХ - 181б</option>
							<option>ЭЛ - 181</option>
							<option>АВ - 181б</option>
							<option>СТ - 181б</option>
							<option>СТ - 182б</option>
							<option>СТ - 183</option>
							<option>АД - 181б</option>
							<option>ИС - 181б</option>
							<option>ИС - 182</option>
							<option>АМ - 181б</option>
							<option>АМ - 182</option>
							<option>СМ - 181б</option>
							<option>АП - 181</option>
							<option>БУХ - 181</option>
							<option>ЭКС1 - 183</option>
							<option>ЭЛ1 - 182б</option>
							<option>ЭКС - 171б</option>
							<option>ЭКС - 172</option>
							<option>БУР - 171б</option>
							<option>БУР - 172</option>
							<option>Гф - 171б</option>
							<option>МЕХ - 171б</option>
							<option>ЭЛ - 171</option>
							<option>АВ - 171б</option>
							<option>СТ - 171б</option>
							<option>СТ - 172б</option>
							<option>СТ - 173</option>
							<option>АД - 171б</option>
							<option>ИС - 171б</option>
							<option>ИС - 172</option>
							<option>АМ - 171б</option>
							<option>АМ - 172</option>
							<option>СМ - 171б</option>
							<option>БУХ - 171к</option>
							<option>ЭКС - 161б</option>
							<option>ЭКС - 162</option>
							<option>БУР - 161б</option>
							<option>БУР - 162</option>
							<option>Гф - 161б</option>
							<option>МЕХ - 161б</option>
							<option>ЭЛ - 161</option>
							<option>АВ - 161б</option>
							<option>СТ - 161б</option>
							<option>СТ - 162б</option>
							<option>СТ - 163б</option>
							<option>ИС - 161б</option>
							<option>ИС - 162</option>
							<option>АМ - 161б</option>
							<option>АМ - 162</option>
							<option>СМ - 161б</option>
							<option>БУХ - 161к</option>
							<option>ЭКС1 - 164</option>
							<option>Эл1 - 162б</option>
							<option>ЭКС - 151б</option>
							<option>ЭКС - 152</option>
							<option>ЭКС - 153</option>
							<option>БУР - 151б</option>
							<option>БУР - 152</option>
							<option>ГФ - 151б</option>
							<option>МЕХ - 151б</option>
							<option>ЭЛ - 151</option>
							<option>АВ - 151б</option>
							<option>СТ - 151б</option>
							<option>СТ - 152б</option>						
							<option>СТ - 153б</option>
							<option>ИС - 151б</option>
							<option>ИС - 152</option>
							<option>АМ - 151б</option>
							<option>АМ - 152</option>
							<option>СМ - 151б</option>
							<option>БУХ - 151к</option>
						</select>
					</div>
					<div class="reg_button_block">
						<input class="reg_button" type="submit" name="reg_button" value="Регистрация">
					</div>
					<div class="error_chek">
						<?php if ($ei == 1){
							echo "<span>Не все поля заполнены</span>";
						} elseif ($en_login == 1) {
							echo "<span>Некорректный логин</span>";
						} elseif ($pass_length == 1) {
							echo "<span>Пароль слишком короткий</span>";
						} ?>
					</div>
				</div>
			</form>
		</div>
		</div>
		<div class="footer">
			<div class="footer_text">
			<span>Внимание! Регистрация проиходит для сохранения результата тестов!</span>
		</div>
		</div>
	</div>
</body>
</html>