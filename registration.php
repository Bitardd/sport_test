<?php
	
//Подключение бд	
	
	include 'connect.php'; 	

	if (isset($_POST['reg_button'])){
												
// данные с формы

			$username = $_POST['name'];
			$usersurname = $_POST['surname'];
			$userlogin = $_POST['login'];
			$userpassword = $_POST['password'];
			$usergroup = $_POST['group'];

// запрос логина и его проверка на наличие

			$query = "SELECT * FROM userdata WHERE login='$userlogin'";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_array($result);

			if ($row['login']){

				$error_login = 1;

// проверка цифр в имени и фамилии

			}	else{							

			preg_match("/[\d]+/", $username, $er_name);
			preg_match("/[\d]+/", $usersurname, $er_sname);

// проверка на пустоту строк

		if ((empty($username)) or (empty($usersurname)) or (empty($userlogin)) or (empty($userpassword))){

				$ei = 1;

// проверка на наличие рус букв в логине

		} 	elseif (preg_match("/^[а-яА-Я ]+$/i", $userlogin)){	
					
				$en_login = 1;					

//проверка длины пароля, не меньше 3 символов

		}	elseif (strlen($userpassword) < 3 ){

				$pass_length = 1;

//Отправление данных в БД

				} else 

					$userpassword = $_POST['password'];

					$query = "INSERT INTO userdata (`name`, `surname`, `login`, `password`, `usergroup`) value ('".$username."', '".$usersurname."', '".$userlogin."', '".md5($userpassword)."', '".$usergroup."')";

					$result = mysqli_query($conn, $query);

// Запись в имени и логина в куки

					setcookie("username", $username, time() + 3600);
					setcookie("userlogin", $userlogin, time() + 3600);

//Редирект на главную страницу
					
					header('Location: index.php');

//Разрыв соединение и закрытие кода

					mysqli_close($conn);
					exit();
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

<!-- Варп страницы -->

	<div id="pagewarp">

<!-- Блок регистрации  -->

		<div class="reg_block">
			<p>Регистрация</p>

<!-- Форма регистрации -->

			<form method="POST">
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

<!-- Блок вывода ошибок -->

					<div class="error_chek">
						<?php

//Вывод всех выше описанных ошибок в форме

						if ($ei == 1) {

							echo "<span>Не все поля заполнены</span>";

						}	elseif ($en_login == 1) {

								echo "<span>Некорректный логин</span>";

						} 	elseif ($pass_length == 1) {

								echo "<span>Пароль слишком короткий</span>";

						}	elseif (($er_name[0] > 0) or ($er_sname[0] > 0)) {

								echo "<span>Некорректное Имя или Фамилия</span>";
								
						}	elseif ($error_login == 1) {

								echo "<span>Логин уже существует</span>";

						}

						?>
					</div>
				</div>
			</form>
		</div>
		</div>

<!-- Подвал  -->

		<div class="footer">
			<div class="footer_text">
			<span>Внимание! Регистрация проиходит для сохранения результата тестов!</span>
		</div>
		</div>
	</div>
</body>
</html>