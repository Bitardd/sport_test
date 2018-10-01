<?php

$r=0;
$array = [];
$query = mysqli_query($conn, "SELECT COUNT(1) FROM athlet_questions");
$row = mysqli_fetch_array($query);
while ($r != $row[0]) {
$q = rand(1,$row[0]);
$str = "$q";
if (in_array($q, $array)) {

} else {
    $array[$r] = $q;
    $arrayr[$r] = $r;
    $name = (string) $arrayr[$r];
    $query2 = mysqli_query($conn, 'SELECT question FROM athlet_questions WHERE id ='.$q);
    $raw = mysqli_fetch_array($query2);
    $a= $r+1;
    $query3 = mysqli_query($conn, 'SELECT COUNT(1) FROM athlet_answers WHERE question_num = '. $q);
    $anslist = mysqli_fetch_array($query3);
    $query3 = mysqli_query($conn, 'SELECT id FROM athlet_answers WHERE question_num = '.$q);
    $ida = mysqli_fetch_array($query3);
    $k =1;
    $r = $r + 1;
    echo '<form  method="POST" action="chek.php">';
    echo  '<div id = "quest"><h3>'.strval($r).'. '.$raw[0].'</h3></div>';
    echo '<br>';
    $r = $r - 1;
    while ($k <= $anslist[0]) {
        $query4 = mysqli_query($conn, 'SELECT answer FROM athlet_answers WHERE id = '. $ida[0]);
        $res = mysqli_fetch_array($query4);
        $query5 = mysqli_query($conn, 'SELECT true_answer FROM athlet_answers WHERE id = '.$ida[0]);
        $result = mysqli_fetch_array($query5);
        if ($result[0] == 1){
        echo '<input class = "option-input" type = "radio" value='.$result[0].' name="'.$name.'"/>'.$res[0];
        echo '<br>';
        }
        if ($result[0] == 0) {
            echo '<input class = "option-input" type="radio" value='.$result[0].' name="'.$name.'"/>'.$res[0];
            echo '<br>';
        }
        $ida[0] = $ida[0]+1;
        $k++;
    }
    echo '<br>'; 
    $r++;
    echo '<br>';
    
} 
}
echo '<div class="test_end_block"><input class="test_end_button" type="submit" name="send" value="Я прошел!">
    </div>';
echo '</form>';
echo '<br>';








					// $query = "SELECT COUNT(1) FROM basket_questions";
					// $result = mysqli_query($conn, $query);

					// $data_count = mysqli_fetch_array($result);

					// for($i = 1; $i <= $data_count[0]; $i++){

					// 	echo $i;
					// 	echo '<br>';
					// }
						//$query = "SELECT question FROM basket_questions WHERE id='$random_question'";
						//$result = mysqli_query($conn, $query);

						//$row = mysqli_fetch_array($result);

						//echo '<div class="question_block">
							//<p>"'.$row['question'].'"</p>
							// </div>';

?>