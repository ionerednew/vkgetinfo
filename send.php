<meta charset="utf-8">
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
	if (!empty($result['error'])) {
		echo 'Пользователя с таким ID не существует';
		exit;
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
	/*****************************   Фотографии c профиля    ******************************/
	$requestParams = array(
                    'owner_id' => $idUserNumbers,
					'album_id' => 'profile',
					'count' => 1000,
                    'access_token' => 'f7622d3f6d2f59ecaa8b1ce02415fe1dac0fbafb41228db2fa9b900c3cbe6932bfe6856fb1b9b1cc63a36',
					'v' => '5.75'
            );
    $getParams = http_build_query($requestParams);
	$queryPhotos="https://api.vk.com/method/photos.get?".$getParams;
	$resultPhotos=json_decode(file_get_contents($queryPhotos), true); //массив фоток
	$counterPhotos = $resultPhotos['response']['count'];
	
	/**************************************************************************************/
	/**************************************************************************************/
	
	
	
	/**************************************************************************************/
	/*****************************         Сохраненки        ******************************/
	$requestParams = array(
                    'owner_id' => $idUserNumbers,
					'album_id' => 'saved',
					'count' => 1000,
                    'access_token' => 'f7622d3f6d2f59ecaa8b1ce02415fe1dac0fbafb41228db2fa9b900c3cbe6932bfe6856fb1b9b1cc63a36',
					'v' => '5.75'
            );
    $getParams = http_build_query($requestParams);
	$querySavedPhotos="https://api.vk.com/method/photos.get?".$getParams;
	$resultSavedPhotos=json_decode(file_get_contents($querySavedPhotos), true); //массив cохраненных фоток
	
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
	$resultGroups=json_decode(file_get_contents($queryGroups), true); //массив cохраненных фоток
	
	/**************************************************************************************/
	/**************************************************************************************/
	
	
	/*echo 'Личная информация:';
	echo '<br>';
	echo file_get_contents($query);
	echo '<br>';
	echo '<br>';
	foreach ($result['response'][0] as $singleResponse=>$key) {
		if(is_array($key)){
			foreach($key as $doubleSingleResponse=>$doubleKey){
				$name = $singleResponse.$doubleSingleResponse;
				echo "$name -> $doubleKey";
				echo "<br>";
			}
		}
		else{
			echo "$singleResponse -> $key";
			echo "<br>";
		}
	}
	echo '<br>';
	echo 'Посты:';
	echo '<br>';
	echo file_get_contents($queryPosts);
	
	echo '<br>';
	echo '<br>';
	echo '<br>';
	echo 'Друзей: '.$counterFriends;
	
	echo '<br>';
	echo '<br>';
	
	if ($result['response'][0]['can_see_audio']){
		echo 'Аудиозаписи открыты';
	}
	else {
		echo 'Аудиозаписи закрыты';
	}
	
	echo '<br>';
	echo '<br>';
	
	echo 'Фотографии:';
	echo '<br>';
	for($i=0; $i<$resultPhotos['response']['count']; $i++){

		if (!empty($resultPhotos['response']['items'][$i]['photo_2560'])){
			$href = $resultPhotos['response']['items'][$i]['photo_2560'];
		}
		else if (!empty($resultPhotos['response']['items'][$i]['photo_1280'])){
			$href = $resultPhotos['response']['items'][$i]['photo_1280'];
		}
		else if (!empty($resultPhotos['response']['items'][$i]['photo_807'])){
			$href = $resultPhotos['response']['items'][$i]['photo_807'];
		} 
		else if (!empty($resultPhotos['response']['items'][$i]['photo_604'])){
			$href = $resultPhotos['response']['items'][$i]['photo_604'];
		}
		else if (!empty($resultPhotos['response']['items'][$i]['photo_130'])){
			$href = $resultPhotos['response']['items'][$i]['photo_130'];
		}
		else if (!empty($resultPhotos['response']['items'][$i]['photo_75'])){
			$href = $resultPhotos['response']['items'][$i]['photo_75'];
		}
		$k=$i+1;
		echo "<a href='".$href."'>".$k." фотография.</a><br>";
	}
	
		echo '<br>';
	echo 'Сохраненные фотографии:';
	echo '<br>';
	for($i=0; $i<$resultSavedPhotos['response']['count']; $i++){

		if (!empty($resultSavedPhotos['response']['items'][$i]['photo_2560'])){
			$href = $resultSavedPhotos['response']['items'][$i]['photo_2560'];
		}
		else if (!empty($resultSavedPhotos['response']['items'][$i]['photo_1280'])){
			$href = $resultSavedPhotos['response']['items'][$i]['photo_1280'];
		}
		else if (!empty($resultSavedPhotos['response']['items'][$i]['photo_807'])){
			$href = $resultSavedPhotos['response']['items'][$i]['photo_807'];
		} 
		else if (!empty($resultSavedPhotos['response']['items'][$i]['photo_604'])){
			$href = $resultSavedPhotos['response']['items'][$i]['photo_604'];
		}
		else if (!empty($resultSavedPhotos['response']['items'][$i]['photo_130'])){
			$href = $resultSavedPhotos['response']['items'][$i]['photo_130'];
		}
		else if (!empty($resultSavedPhotos['response']['items'][$i]['photo_75'])){
			$href = $resultSavedPhotos['response']['items'][$i]['photo_75'];
		}
		$k=$i+1;
		echo "<a href='".$href."'>".$k." фотография.</a><br>";
	} */
	
	
	/*echo '<br>';
	echo 'Сообщества:';
	echo '<br>';
	for($i=0; $i<$resultGroups['response']['count']; $i++){
		echo "<a href='https://vk.com/wall-".$resultGroups['response']['items'][$i]['id']."'>".$resultGroups['response']['items'][$i]['name']."</a><br>";
	} */








//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////NEEEEEEEEEIIIIIIIRRRRRRROOOOOOOOOOO//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$wall = ($counterPosts>=10)?1:0;                    #Кол-во записей   ср.(10)
$foto = ($counterPhotos>=15)?1:0;                     #Кол-во фото      ср.(15)
$info = ($counterInfo>=10)?1:0;                       #Инфомация о себе ср.(10)
$friends = ($counterFriends>=100)?1:0;                    #Кол-во друзей    ср.(100)
$audio = $canSeeAudio?1:0;                      #Открыты или закрыты аудиозаписи
$video = ($counterVideos>=15)?1:0;                    #Кол-во видео     ср.(15)

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


$weights_input_to_hiden_1 = [0.2, 0.2, 0.2, 0.2, 0.1, 0.1] ;                       # Степень открытости 1 - сангвиник или холерик, 0 - флегматик или меланхолик
$weights_input_to_hiden_2 = [0.1, 0.1, 0.1, 0, 0.2, 0.3]  ;                       # Степень неустойчивости 1 - холерик или меланхолик, 0 - сангвиник или флегматик
$weights_input_to_hiden_3 = [0.4,0.1,0.1,0.1,0,0];                                # Уровень самооценки 1 - выше среднего 0 - ниже среднего
$weights_input_to_hiden_4 = [0.2,0.2,0.2, 0, 0, 0];                               # Уровень интеллекта 1 - малолетние дебилы, 0 - ге(й)ний



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

}

else {
	echo "Ничего не ввели :)";
}
?>