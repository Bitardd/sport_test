<?php
	
	if (isset($_POST['logout_button'])){

		unset($_COOKIE['userlogin']);
   	 	setcookie('userlogin', null, -1, '/');
   	 	unset($_COOKIE['username']);
   	 	setcookie('username', null, -1, '/');

	}
?>
<?php
	include 'connect.php';

	if (isset($_POST['login_button'])) {

		$userlogin = $_POST['login'];
		$userpassword = $_POST['pass'];

		$query = "SELECT id FROM userdata WHERE login = '$userlogin' AND password = md5('$userpassword')";
		$result = mysqli_query($conn,$query);
		$row = mysqli_num_rows($result);

		if ($row == 0){

			$bad_login = 1;

		}
		else{

			$query = "SELECT name FROM userdata WHERE login = '$userlogin'";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_array($result);
			setcookie("username", $row['name'], time() + 3600);
			setcookie("userlogin", $userlogin, time() + 3600);
			header('Location: index.php');

		}

	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>test</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
	<script type="text/javascript" src="https://yastatic.net/jquery/3.1.1/jquery.min.js" defer=""></script>
</head>
<body>



<style type="text/css">#hellopreloader>p{display:none;}#hellopreloader_preload{display: block;position: fixed;z-index: 99999;top: 0;left: 0;width: 100%;height: 100%;min-width: 1000px;background: #F89406 url(http://hello-site.ru//main/images/preloads/tail-spin.svg) center center no-repeat;background-size:78px;}</style>
<div id="hellopreloader"><div id="hellopreloader_preload"></div><p><a href="http://hello-site.ru"></a></p></div>
<script type="text/javascript">var hellopreloader = document.getElementById("hellopreloader_preload");function fadeOutnojquery(el){el.style.opacity = 1;var interhellopreloader = setInterval(function(){el.style.opacity = el.style.opacity - 0.05;if (el.style.opacity <=0.05){ clearInterval(interhellopreloader);hellopreloader.style.display = "none";}},16);}window.onload = function(){setTimeout(function(){fadeOutnojquery(hellopreloader);},1000);};</script>
<!-- HelloPreload http://hello-site.ru/preloader/ -->
	


	<div id="pagewarp">
		<div id="section1">
			<header>
				<div class="header">
					<div class="header_logo">
						<a href="#"><img src="img/logo.png" height="80px" width="80px"></a>
					</div>			
					<div class="header_logo_2">
						<a href="#"><img src="img/logo2.png" height="80px" width="80px"></a>
					</div>	
					<div class="page_name">
						<span class="page_name_text">Тесты по физической культуре</span>
					</div>
			</header>
			<div id="second_header">
				<div class="second_header_dark">
					<div class="desc_login">
						<span class="first_line_desc_login">Сайт,</span>
						<br>
						<span class="second_line_desc_login">где вы можете</span>
						<br>
						<span class="third_line_desc_login">проверить свои знания по</span>
						<br>
						<span class="fourth_line_desc_login"> физической культуре</span>
					</div>
					<div class="header_line">
					</div>
					<div class="login_form">
						<div class="login_form_center">
							<?php

							if ($_COOKIE['userlogin'] == "") {

							echo '<form method="POST" action="">
								<div class="main_field">
									<div class="field">
										<label for="login">Логин:</label>
										<input class="input_text" type="text" name="login" id="login">
									</div>
									<div class="field">
										<label for="pass">Пароль:</label>
										<input class="input_text" type="password" name="pass" id="pass">
									</div>
									<div class="field">
										<a class="reg_link" href="registration.php">Регистрация</a>
										<input class="login_button" type="submit" name="login_button" value="Вход">
									</div>
								</div>
							</form>';

								if ($bad_login == 1) {

									echo '
									<div class="bad_login">
									<p>Неверное имя пользователся или пароль</p>
									</div>';
								}

							} 
							else{

								echo '<form method="POST" action="">
								<div class="main_field_second">
									<div class="secon_field">
										<p class="in_system">Вы в системе, '.$_COOKIE['username'].'</p>
										<input class="login_button logout" type="submit" name="logout_button" value="Выход">
									</div>
								</div>
							</form>';

							}
							?>
						</div>
					</div>
				</div>
			</div>
		<div class="header_footer">
			<span class="developer_desk">Ainur Zaymanov</span>
		</div>
	</div>
	<div id="section2">
		<div class="content">
			<?php
			if ($_COOKIE['userlogin'] != ''){
				echo '
				<div class="test_block sport1">
					<a href="#">Баскетбол</a>
				</div>
				<div class="test_block sport2">
					<a href="#">Гимнастика</a>
				</div>
				<div class="test_block sport3">
					<a href="#">Волейбол</a>
				</div>
				<div class="test_block sport4" >
					<a href="#">Лыжи</a>
				</div>
				<div class="test_block sport5">
					<a href="#">Атлетика</a>
				</div>
				<div class="test_block sport6">
					<a href="#">Скоро</a>
				</div>';
			}	else{

				echo '
				<div class="logout_content">
					<p><a href="#section1">Войдите</a> для прохождения тестов!</p>
				</div>';
			}
			?>
		</div>
	</div>
	</div>
</body>
</html>