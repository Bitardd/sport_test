<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link href="chek.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="disable"><?php 
	include 'connect.php';
	include 'athlet_config.php';?>
	</div>
	<div class="white_layer">
		<div class="header">
			<span>Результат</span>
		</div>
	<div  class="result_block">
		<div class="result">
<?php
	date_default_timezone_set('UTC');
	if(isset($_POST['send'])){
		$query =mysqli_query($conn, 'SELECT COUNT(1) FROM athlet_questions');
		$row=mysqli_fetch_array($query);
		$i=0;
		$tru=0;
		$fls=0;
		while ($i <= $row[0] - 1) {
			$name = (string) $arrayr[$i];
		 	@$d = ($_POST[$name]);
		 	if ($d == 1) {
		 		$tru++;
		 	} 
		 	if ($d == 0){
		 		$fls++;
		 	}
		 $i++;

		 }
		 echo '<div class="user_result_block">
		 		<div class="name">
		 		<span class="username">'.$_COOKIE['username'].',</span><span class="span_text"><br> ваш результат теста:</span>
		 		</div>

				<div class="user_result">
				<div class="user_result_left">
				<span class="true_text">Правильные <br></span><p class="true">'.$tru.'</p>
				</div>
				<div class="user_result_right">
				<span class="true_text">Неправильные <br></span><p class="false">'.$fls.'</p>
		 		</div>
		 		</div>
		 		</div>';
	}
?>
</div>
	<div class="ocenka">
	<span>

	<?php

	$persent = ($tru*100)/$row[0];

	if ($persent <= 20){
		echo '<span class="two">2</span>';
	}
	elseif(($persent <= 40) and ($persent >= 21)) {
		echo '<span class="three">3</span>';
	}
	elseif(($persent <= 85) and ($persent >= 51)) {
		echo '<span class="four">4</span>';
	}
	elseif(($persent <= 100) and ($persent >= 86)) {
		echo '<span class="five">5</span>';
	}
	elseif($persent == 50){
		echo '<span class="three">3</span>';
	}

	?>
		
	</span>
	</div>
</div>
		<div class="result_footer">
			<a href="/index.php">На главную?</a>
		</div>
	</div>
</body>
</html>


