<?php





if(!empty($_POST['id']) || !empty($_GET['id'])){
	
	/**************************************************************************************/
	/**********************Личная информация пользователя**********************************/
	if(!empty($_POST['id'])){
		$id = $_POST['id'];
	}

	else if(!empty($_GET['id'])){
		$id = $_GET['id'];
	}

	$requestParams = array(
                    'user_ids' => $id,
                    'fields' => 'photo_id,verified,sex,bdate,city,country,home_town,has_photo,photo_50,photo_100,photo_200_orig,photo_200,photo_400_orig,photo_max,photo_max_orig,online,domain,has_mobile,contacts,site,education,universities,schools,status,last_seen,followers_count,common_count,occupation,nickname,relatives,relation,personal,connections,exports,wall_comments,activities,interests,music,movies,tv,books,games,about,quotes,can_post,can_see_all_posts,can_see_audio,can_write_private_message,can_send_friend_request,is_favorite,is_hidden_from_feed,timezone,screen_name,maiden_name,crop_photo,is_friend,friend_status,career,military,blacklisted,blacklisted_by_me',
                    'access_token' => 'f7622d3f6d2f59ecaa8b1ce02415fe1dac0fbafb41228db2fa9b900c3cbe6932bfe6856fb1b9b1cc63a36',
					'v' => '5.62'
            );
    $getParams = http_build_query($requestParams);
	$query="https://api.vk.com/method/users.get?".$getParams;
	$result=json_decode(file_get_contents($query), true);     //массив данных

	if (!empty($result['error'])) {
		echo 'Пользователя с таким ID не существует';
		exit;
	}

		$city = $result['response'][0]['city'];

	if ($result['response'][0]['can_see_audio']){
		$canSeeAudio=true;
	}
	else {
		$canSeeAudio=false;
	}

	foreach ($result['response'][0] as $singleResponse=>$key) {
		if (!empty($key)){
			$counterInfo++;
		}
	}
	/**************************************************************************************/
	/**************************************************************************************/
	
	
	
	/**************************************************************************************/
	/*****************************           ПОСТЫ           ******************************/
	$idUserNumbers=$result['response'][0]['id'];
	
	
	$requestParams = array(
                    'owner_id' => $idUserNumbers,
					'domain' => $id,
                    'access_token' => 'f7622d3f6d2f59ecaa8b1ce02415fe1dac0fbafb41228db2fa9b900c3cbe6932bfe6856fb1b9b1cc63a36',
					'count' => 100,
					'filter' => "owner",
					'v' => '5.75'
            );
    $getParams = http_build_query($requestParams);
	$queryPosts="https://api.vk.com/method/wall.get?".$getParams;
	$resultPosts=json_decode(file_get_contents($queryPosts), true); //массив постов
	$counterPosts= $resultPosts['response']['count']; //количество постов
	
	
	/**************************************************************************************/
	/**************************************************************************************/


	/**************************************************************************************/
	/*****************************          ВИДЕО         ******************************/
	
	
	$requestParams = array(
                    'owner_id' => $idUserNumbers,
					'domain' => $id,
                    'access_token' => 'f7622d3f6d2f59ecaa8b1ce02415fe1dac0fbafb41228db2fa9b900c3cbe6932bfe6856fb1b9b1cc63a36',
					'v' => '5.84'
            );
    $getParams = http_build_query($requestParams);
	$queryVideos="https://api.vk.com/method/video.get?".$getParams;
	$resultVideos=json_decode(file_get_contents($queryVideos), true); //массив видосов
	$counterVideos = $resultVideos['response']['count']; // количество видосов
	/*Echo "Видосов:$counterVideos<br><br><br> ";*/
	
	/**************************************************************************************/
	/**************************************************************************************/
	
	
	
	/**************************************************************************************/
	/*****************************     Количество друзей     ******************************/
	$requestParams = array(
                    'user_id' => $idUserNumbers,
					'count' => 500,
                    'access_token' => 'f7622d3f6d2f59ecaa8b1ce02415fe1dac0fbafb41228db2fa9b900c3cbe6932bfe6856fb1b9b1cc63a36',
					'v' => '5.75'
            );
    $getParams = http_build_query($requestParams);
	$queryFriends="https://api.vk.com/method/friends.get?".$getParams;
	$resultFriends=json_decode(file_get_contents($queryFriends), true); //массив друзей
	$counterFriends = $resultFriends['response']['count'];            //количество друзей
	
	/**************************************************************************************/
	/**************************************************************************************/
	
	


	/**************************************************************************************/
	
	
	
	/**************************************************************************************/

	/**************************************************************************************/
	
	
	
	/**************************************************************************************/
	/*****************************         Сообщества        ******************************/
	$requestParams = array(
                    'user_id' => $idUserNumbers,
					'extended' => '1',
					'count' => 1000,
                    'access_token' => 'f7622d3f6d2f59ecaa8b1ce02415fe1dac0fbafb41228db2fa9b900c3cbe6932bfe6856fb1b9b1cc63a36',
					'v' => '5.75'
            );
    $getParams = http_build_query($requestParams);
	$queryGroups="https://api.vk.com/method/groups.get?".$getParams;
	$resultGroups=json_decode(file_get_contents($queryGroups), true); 
	$counterGroups = $resultGroups['response']['count'];


    $requestParams = array(
                    'owner_id' => $idUserNumbers,
                    'access_token' => 'f7622d3f6d2f59ecaa8b1ce02415fe1dac0fbafb41228db2fa9b900c3cbe6932bfe6856fb1b9b1cc63a36',
                    'v' => '5.85'
            );
    $getParams = http_build_query($requestParams);
    $queryAllPhotos='https://api.vk.com/method/photos.getAll?'.$getParams;
    $resultAllPhotos=json_decode(file_get_contents($queryAllPhotos), true); //массив фоток
    $counterAllPhotos = $resultAllPhotos['response']['count'];

	/**************************************************************************************/

$wall_empty = 1;                 # Всегда равна единице
$foto_empty = 1;
$groups_empty = 1;
$friends_empty = 1;
$video_empty = 1;

								//1 При =>
$wall_little = 0;                # Записей больше 3 (>3)
$wall_medium = 0;                # Записей больше 6 (>6)
$wall_excess = 0;				# Записей больше 50 (>50)

$foto_little = 0;                 # Фото больше 3 (>3)
$foto_medium = 0;                 # Фото больше 30 (>30)
$foto_excess = 0;  				# Фото больше 100 (>100)

$groups_little = 0;              # Групп больше 20 (>20)
$groups_medium = 0;               # Групп больше 70 (>70)
$groups_excess = 0;  			# Групп больше 120 (>120)

$friends_little = 0;             # Друзей больше 50 (>50)
$friends_medium = 0;              # Друзей больше 150 (>150)
$friends_excess = 0;              # Друзей больше 200 (>200)

$video_little = 0;                # Видео больше 3 (>3)
$video_medium = 0;                # Видео больше 10 (>10)
$video_excess = 0;                # Видео больше 50(>50)

if ($counterPosts>3){
	$wall_little = 1;
		if ($counterPosts>6){
			$wall_medium = 1;
				if ($counterPosts>50){
					$wall_excess = 1;
				}
		}
}

if ($counterAllPhotos>3){
	$foto_little = 1;
		if ($counterAllPhotos>30){
			$foto_medium = 1;
				if ($counterAllPhotos>100){
					$foto_excess = 1;
				}
		}
}

if ($counterGroups>20){
	$groups_little = 1;
		if ($counterGroups>70){
			$groups_medium = 1;
				if ($counterGroups>120){
					$groups_excess = 1;
				}
		}
}

if ($counterFriends>50){
	$friends_little = 1;
		if ($counterFriends>150){
			$friends_medium = 1;
				if ($counterFriends>200){
					$friends_excess = 1;
				}
		}
}

if ($counterVideos>3){
	$video_little = 1;
		if ($counterVideos>10){
			$video_medium = 1;
				if ($counterVideos>50){
					$video_excess = 1;
				}
		}
}

if ($canSeeAudio){
	$audio = 1;
	$audio_closed = 0;
}
else {
	$audio = 0;
	$audio_closed = 1;
}



function translateTemper($x){
    if ($x >= 0.8 && $x <= 1.1){
        return 0.3;        //Флегматик
    }
    else if ($x >= 1.2 && $x <= 2){
        return 0.6;        //Сангвиник
    }
    else if ($x >= 2.1){
        return 1;	      //Холерик
    }
    else {
    	return 0;		  //Меланхолик
    }
}

function translateSelfRating($x){
    if ($x >= 1.5 && $x <= 1.8){
        return 0.5;        //Низкая самооценка
    }
    else if ($x >= 1.9){
        return 1;        //Средняя самооценка
    }
    else {
    	return 0;		  //Высокая самооценка
    }
}

function translateIntelligence($x){
    if ($x >= 1.2 && $x <= 3.6){
        return 1;        // Высокий уровень интеллекта
    }
    else if ($x >= 3.7){
        return 0;        //Низкий уровень интеллекта
    }
    else {
    	return 0.5;		  //Средний уровень интеллекта
    }
}

     
function calculateNeiron($array){
	global $wall_empty, $wall_little, $wall_medium, $wall_excess,   $foto_empty, $foto_little, $foto_medium, $foto_excess, $groups_empty, $groups_little, $groups_medium, $groups_excess, 
		   $friends_empty, $friends_little, $friends_medium, $friends_excess,   $audio, $audio_closed,   $video_empty, $video_little, $video_medium, $video_excess;
	$stats = array("wall_empty", "wall_little", "wall_medium", "wall_excess",   "foto_empty", "foto_little", "foto_medium", "foto_excess",   "groups_empty", "groups_little", "groups_medium", "groups_excess",
                   "friends_empty", "friends_little", "friends_medium", "friends_excess",   "audio", "audio_closed",   "video_empty", "video_little", "video_medium", "video_excess");
	for ($i=0; $i<count($stats); $i++){
		if ($$stats[$i]){
			$out+=$array[$i];
		}
	}
	return $out;
}


$weights_input_to_hiden_1 = [0.1, 0.1, 0.2, 0.4, 0.2, -0.1, 0.3, 0.4, 0.1, 0.1, 0.2, 0.4, 0.1, 0.1, 0.6, -0.4, 0.2, 0.1, 0.1, 0.1, 0.2, 0.4];
$weights_input_to_hiden_2 = [0.1, 0, 0.3, 0.4, 0.2, -0.1, 0.7, 0, 0.1, 0.1, 0.2, 0, 0.2, 0, 0.6, -0.4, 0.2, 0.1, 0.1, 0.1, 0, 0.2];
$weights_input_to_hiden_3 = [0.1, 0.1, 0, 0.6, 0.2, -0.1, 0.7, 0, 0.1, 0.7, 0, 0, 0.1, 0, 0.1, 0.6, 0.2, 0.1, 0.1, 0, 0.3, 0.4];




$Temper = translateTemper(calculateNeiron($weights_input_to_hiden_1));
$SelfRating = translateSelfRating(calculateNeiron($weights_input_to_hiden_2));
$Intelligence = translateIntelligence(calculateNeiron($weights_input_to_hiden_3));


switch ($Temper){
	case 0.3:
		$outStringTemper = "Флегматик";
		break;

	case 0.6:
		$outStringTemper = "Сангвиник";
		break;

	case 1:
		$outStringTemper = "Холерик";
		break;

	case 0:
		$outStringTemper = "Меланхолик";
		break;
}

switch ($SelfRating){
	case 0.5:
		$outStringSelf = "Низкая самооценка";
		break;

	case 1:
		$outStringSelf = "Средняя самооценка";
		break;

	case 0:
		$outStringSelf = "Высокая самооценка";
		break;
}

switch ($Intelligence){
	case 0.5:
		$outStringIntel = "Средний уровень интеллекта";
		break;

	case 1:
		$outStringIntel = "Высокий уровень интеллекта";
		break;

	case 0:
		$outStringIntel = "Низкий уровень интеллекта";
		break;
}




$stats = array("wall", "foto", "info", "friends", "audio", "video");
/*foreach ($stats as $stat){
	$siStat = $$stat;
	echo "$stat -> $siStat <br>";
}
echo "$firstHidden |  $secondHidden | $thirdHidden | $fourthHidden ";
echo "<br>";*/
$firstName = $result['response'][0]['first_name'];
$lastName = $result['response'][0]['last_name'];
$sexString = $result['response'][0]['sex'];

    switch($sexString){
        case 0:
            $sex = "-";
            break;

        case 1:
            $sex = "Женский";
            break;

        case 2:
            $sex = "Мужской";
            break;
    }
$city = $result['response'][0]['city']['title'];
$bdate = $result['response'][0]['bdate'];
$avatar = $result['response'][0]['photo_200'];
$phoneNumber = $result['response'][0]['mobile_phone'];
$canSeeAudio = ($canSeeAudio==1) ? 'Открыты' : '-';
$status = $result['response'][0]['status'];
$site = $result['response'][0]['site'];
//echo "$firstName $lastName $outStringTemper | $outStringSelf | $outStringIntel";

/*
	$host='localhost:3306';
	$db = 'host1391106_4826';
	$user='host1391106_4826';
	$pswd='a1b2c3d4';
	
	$connection=mysql_connect($host, $user, $pswd);
	mysql_set_charset( 'utf8' );
	if(!$connection || !mysql_select_db($db,$connection)) {
		exit;
	}

	$ip = $_SERVER['REMOTE_ADDR'];
	$query = "SELECT * FROM vkstats WHERE vkid = '$idUserNumbers' ";
	$result=mysql_query($query);
	if(!mysql_num_rows($result)){
		mysql_query("INSERT INTO vkstats (ip, name, lastname, temp, self, intel, vkid) VALUES ('$ip', '$firstName', '$lastName', '$Temper' , '$SelfRating' ,'$Intelligence', '$idUserNumbers') ");
	}
*/

}

else {
	exit ("Ничего не ввели :)");
}
?>