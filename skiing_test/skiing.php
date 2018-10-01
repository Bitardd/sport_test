<?php

	include 'connect.php';

	$begin = 1;	

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="/css/test.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div id="pagewarp">
		<div class="header">
			<span>ТЕСТ ПО ЛЫЖНОМУ СПОРТУ</span>
		</div>
		<div class="footer">
			<span>После прохождения не забудьте показать преподавателю результат!</span>
		</div>
		<div class="content">
			<div class="test_block">
				<?php
					if (isset($_POST['begin_button'])){

						$begin = 0;

						require_once 'skiing_config.php';
					}
				?>
				<?php
					if ($_COOKIE['userlogin'] == ''){

						header('Location: index.php');

					}
					elseif ($begin == 1){

						echo '<div class="begin_button_block">
								<form method="POST" action="">
									<input class="begin_button" type="submit" value="Начать тест" name="begin_button">
								</form>
							  </div>';
					//require_once 'test_config.php';

					}
				?>
			</div>
		</div>
	</div>
</body>
</html>
