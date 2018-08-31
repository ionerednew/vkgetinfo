<?php
header('Content-Type: text/html; charset=utf-8');
$wall = 0;                    #Кол-во записей   ср.(10)
$foto = 0;                     #Кол-во фото      ср.(15)
$info = 1;                       #Инфомация о себе ср.(10)
$friends = 1;                    #Кол-во друзей    ср.(100)
$audio = 1;                      #Открыты или закрыты аудиозаписи
$video = 0;                    #Кол-во видео     ср.(15)

function translate($x){
    if ($x >= 0.5){
        return 1;
    }
    else{
        return 0;
    }
}

     
function calculateNeiron($array){
	global $wall, $foto, $info, $friends, $audio, $video;
	$stats = array("wall", "foto", "info", "friends", "audio", "video");
	for ($i=0; $i<count($stats); $i++){
		if ($$stats[$i]){
			$out+=$array[$i];
		}
	}
	return $out;
}



$weights_input_to_hiden_1 = [0.2, 0.2, 0.2, 0.2, 0.1, 0.1]  ;                       # Степень открытости 1 - сангвиник или холерик, 0 - флегматик или меланхолик
$weights_input_to_hiden_2 = [0.1, 0.1, 0.1, 0, 0.2, 0.2]  ;                       # Степень неустойчивости 1 - холерик или меланхолик, 0 - сангвиник или флегматик
$weights_input_to_hiden_3 = [0.2,0.2,0.1,0,0,0];                                # Уровень самооценки 1 - выше среднего 0 - ниже среднего
$weights_input_to_hiden_4 = [0.2,0.2,0, 0, 0, 0.2];                               # Уровень интеллекта 1 - малолетние дебилы, 0 - ге(й)ний



$firstHidden = translate(calculateNeiron($weights_input_to_hiden_1));
$secondHidden = translate(calculateNeiron($weights_input_to_hiden_2));
$thirdHidden = translate(calculateNeiron($weights_input_to_hiden_3));
$fourthHidden = translate(calculateNeiron($weights_input_to_hiden_4));

switch($firstHidden){
		case 0:
			switch($secondHidden){
				case 0:
					$outStringTemper = "Флегматик";
					break;

				case 1:
					$outStringTemper ="Меланхолик";
					break;
			}
			break;

		case 1:
			switch($secondHidden){
				case 0:
					$outStringTemper = "Сангвиник";
					break;

				case 1:
					$outStringTemper ="Холерик";
					break;
			}
			break;
}

if($thirdHidden){
	$outStringSelf = "Самооценка выше среднего";
}
else {
	$outStringSelf = "Самооценка ниже среднего";
}

if($fourthHidden){
	$outStringIntel = "Не особо умные(малолетние дебилы. ©Кирилл КПРФ)";
}
else {
	$outStringIntel = "Умные(ге(й)ний. ©Кирик завоеватель царств)";
}
$stats = array("wall", "foto", "info", "friends", "audio", "video");
foreach ($stats as $stat){
	$siStat = $$stat;
	echo "$stat -> $siStat <br>";
}
echo "$firstHidden |  $secondHidden | $thirdHidden | $fourthHidden ";
echo "<br>";
echo "$outStringTemper | $outStringSelf | $outStringIntel";