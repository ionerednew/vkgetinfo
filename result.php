<?php

require 'vendor/autoload.php';
require 'send.php';
require 'checkColor.php';



function checkResultIcon($value) {
    if(!isset($value) || $value==''|| $value=='-') echo '<i class="ion ion-md-remove-circle"></i>';
    else echo '<i class="ion ion-md-checkmark-circle"></i>';
}





use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;
$image = $avatar;
$palette = Palette::fromFilename($image);

// an extractor is built from a palette
$extractor = new ColorExtractor($palette);

// it defines an extract method which return the most “representative” colors
$colors = $extractor->extract(5);

$main_color = Color::fromIntToHex($colors[0]);
$second_color = Color::fromIntToHex($colors[1]);
$third_color = Color::fromIntToHex($colors[2]);

$numcolor = FindColor($colors[0]);
$numcolor = preg_replace('/[0-9]+/', '', $numcolor);

foreach ($colorsName as $key => $value) {
    if ($numcolor==$key) {
        $analizeColor = $value[0];
        $analizeColordesc = $value[1];
        $analizeColortext = $value[2];
    }
}
?>


<!DOCTYPE html>
<!--
(C)2018 Antonenko A.
 -->
<html lang="ru">

<head>


	<meta charset="utf-8">

	<title>Результаты</title>
	<meta name="description" content="">

	<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">


	<link href="https://unpkg.com/ionicons@4.4.2/dist/css/ionicons.min.css" rel="stylesheet">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="libs/animate/animate.css">
	
	<link rel="stylesheet" href="css/main.css">

	<script src="libs/modernizr/modernizr.js"></script>
	<script src="libs/jquery/jquery-1.11.2.min.js"></script>


	<style>
		.main-block::before,.main-block::after {
			background-color: <?=$main_color?>;
		}
	</style>
</head>

<body style="background-color: <?=$main_color?>;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="main-block">
					<div class="row">
						<div class="col-md-12">
							<div class="nav-block-rounds">
								<div class="round"><a href="/3"><i class="ion ion-md-home"></i><span>Home</span></a></div>
								<div class="round "><a href=""><i class="ion ion-md-log-in"></i><span>Login</span></a></div>
								<div class="round active"><a href=""><i class="ion ion-md-checkmark-circle-outline"></i><span>Results</span></a></div>
							</div>
						</div>


						<div class="col-md-12">
							<div class="container profile">
								<div class="row">
									<!-- RIGHT SIDE PANEL -->
									<div class="col-md-3">
										<div class="profile__avatar">
											<img src="<?=$image?>">
										</div>
										
						        <div class="colors">
						          <?php
						          foreach($colors as $color)
						            printf('<div class="color" style="background-color: %s;"></div>',Color::fromIntToHex($color));
						          ?>
						        </div>

										<h3><a href="//vk.com/id<?=$idUserNumbers?>"><?=$firstName.' '.$lastName?></a></h3>
                                        <?php if($status) { ?>
                                        <span class="profile__span"><i class="ion ion-md-information-circle"></i>some info</span>
                                        <p class="profile__status"><?=$status?> </p>
                                        <?php } ?>

                                        <?php if($site) { ?>
                                        <span class="profile__span"><i class="ion ion-md-information-circle"></i>
                                        Веб-сайт:</span><br>
                                        <a href="<?=$site?>" class="profile__site"><?=$site?></a>
                                        <?php } ?>
										
										
										<!-- <button id="button">DONT PUSH</button> -->
									</div>
									<!-- MAIN CONTENT -->
									<div class="col-md-9">
										<div class="table_detail">
						                    <table>
						                        <tr class="t_head" style="background-color: <?=$second_color?>;">
						                            <td id="discr" colspan="3">Профиль <i class="ion ion-md-body"></i></td>
						                        </tr>
						                        <tr> 
						                            <td id="time">Имя Фамилия</td>
						                            <td id="discr" class="centrtable"><?=$firstName.' '.$lastName?></td>
						                            <td><?php checkResultIcon($firstName)?></td>
						                        </tr>
						                       <tr class="color">
						                           <td id="time">Пол</td>
						                           <td id="discr" class="centrtable"><?=$sex?></td>
						                           <td><?php checkResultIcon($sex)?></td>
						                        </tr>
						                       <tr> 
						                            <td id="time">Дата рожденья</td>
						                            <td id="discr" class="centrtable"><?=$bdate?></td>
						                            <td><?php checkResultIcon($bdate)?></td>
						                        </tr>
						                       <tr>
						                           <td id="time" class="rightable ">Локация</td>
						                           <td id="discr" class="rightable "><?=$city?></td>
						                           <td><?php checkResultIcon($city)?></td>
						                        </tr>
						                        <!-- <tr>
						                           <td id="time" class="rightable ">Телефон</td>
						                           <td id="discr" class="rightable "><?=$phoneNumber?></td>
						                           <td><?php checkResultIcon($phoneNumber)?></td>
						                        </tr> -->
						                        <tr>
						                           <td id="time" class="rightable ">Друзья</td>
						                           <td id="discr" class="rightable "><?=$counterFriends?></td>
						                           <td><?php checkResultIcon($counterFriends)?></td>
						                        </tr>
						                        <tr >
						                           <td id="time" class="rightable ">Посты</td>
						                           <td id="discr" class="rightable "><?=$counterPosts?></td>
						                           <td><?php checkResultIcon($counterPosts)?></td>
						                        </tr>
						                        <tr >
						                           <td id="time" class="rightable ">Фотографии</td>
						                           <td id="discr" class="rightable "><?=$counterAllPhotos?></td>
						                           <td><?php checkResultIcon($counterAllPhotos)?></td>
						                        </tr>
						                        <tr >
						                           <td id="time" class="rightable ">Видеозаписи</td>
						                           <td id="discr" class="rightable "><?=$counterVideos?></td>
						                           <td><?php checkResultIcon($counterVideos)?></td>
						                        </tr>
                                                <tr >
                                                   <td id="time" class="rightable ">Группы</td>
                                                   <td id="discr" class="rightable "><?=$counterGroups?></td>
                                                   <td><?php checkResultIcon($counterGroups)?></td>
                                                </tr>
                                                <tr >
                                                   <td id="time" class="rightable ">Аудиозаписи</td>
                                                   <td id="discr" class="rightable "><?=$canSeeAudio?></td>
                                                   <td><?php checkResultIcon($canSeeAudio)?></td>
                                                </tr>
						                    </table>
						                </div>
<br>
<br>
						                <div class="table_detail">
						                    <table>
						                        <tr class="t_head" style="background-color: <?=$third_color?>;">
						                            <td id="discr" colspan="2">Анализ <i class="ion ion-md-body"></i></td>
						                         </tr>
						                        <tr data-toggle="tooltip" data-placement="top" title="Темперамент — это определенный набор свойств психики индивида, которые имеют в качестве физиологического базиса тип высшей нервной деятельности. Согласно статистике, темперамент имеет прямую зависимость от количества фотографий, записей, сохранённых видеозаписей и количества друзей, начиная от самого замкнутого флегматика и заканчивая импульсивным экстравертным холериком."> 
						                            <td id="time">Тип темперамента:</td>
						                            <td id="discr" class="centrtable"><?=$outStringTemper?></td>
						                        </tr>
						                       <tr class="color" data-toggle="tooltip" data-placement="top" title="Самооценка человека предполагает оценку им себя в целом и отдельные составляющие своей личности, а именно свои поступки и действия, свои качества и отношения, свою направленность и убеждении и многое другое. Её уровень зависит от как от количества записей на стене, так и от количества загруженных фотографий.">
						                           <td id="time">Самооценка:</td>
						                           <td id="discr" class="centrtable"><?=$outStringSelf?></td>
						                        </tr>
						                       <tr data-toggle="tooltip" data-placement="top" title="Уровень интеллекта относительно уровня среднестатистического человека. Как правило, высокоинтеллектуальный человек более тщательно подходит к отбору полезной информации, а пользователь с низким интеллектом имеет у себя на странице огромное количество зачастую ненужной информации."> 
						                            <td id="time">Интеллект:</td>
						                            <td id="discr" class="centrtable"><?=$outStringIntel?></td>
						                        </tr>
						                       <tr data-toggle="tooltip" data-placement="top" title="<?=$analizeColortext?>">
						                           <td id="time" class="rightable ">Ваш цвет:</td>
						                           <td id="discr" class="rightable "><?=$analizeColor.' - '.$analizeColordesc ?></td>
						                        </tr>
						                    </table>
						                </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




	<div class="hidden"></div>

	<div class="loader">
		<div class="loader_inner"></div>
	</div>
	
	


	<script src="https://unpkg.com/ionicons@4.1.1/dist/ionicons.js"></script>
	<script src="libs/waypoints/waypoints.min.js"></script>
	<script src="libs/animate/animate-css.js"></script>
	<script src="libs/plugins-scroll/plugins-scroll.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
	
	<script src="js/common.js"></script>
	<script>
	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip();   
	});
    yourNumber = '16777215';
    hexString = yourNumber.toString(16);

    //console.log((16711680).toString(16));
    function myFunction(color) {
        $('body').css('background-color', "#" + color);
        //document.body.style.backgroundColor = "#" + color;
    }
    /*for(i=0; i < 16777215; i++) {
        setTimeout(myFunction((i).toString(16)), 3000);
        console.log((i).toString(16));
    }
    var i = 1048576;
    do {
        myFunction((i).toString(16));
            console.log((i).toString(16));
            i++;
    } while (i != 16777215);
    myFunction((16711680).toString(16));
*/
    var i = 1048576;
    $('#button').click(function() {
        i = i + 1000;
        myFunction((i).toString(16));
        console.log((i).toString(16));
    });
	</script>
</body>
</html>
