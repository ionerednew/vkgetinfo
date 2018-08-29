<?php
	require_once('config.php');
?>

<!DOCTYPE html>
<meta charset="utf-8" >
<html>
	<head>
	</head>
	
	<body>
		<form action="/vkgetinfo/send.php" method="post">
			<?php
					if (empty($_SESSION['token'])){
					echo "
						Если вы хотите узнать о себе, то<a href = 'https://oauth.vk.com/authorize?client_id=".$appId."&display=page&redirect_uri=".$redirectUrl."&scope=".$scope."&response_type=code&v=5.62'> авторизуйтесь.</a>
					";
					}
					else {
						echo "<a href='/vkgetinfo/send.php?id=".$_SESSION['user_id']."'>Узнать о себе.</a><br><br>
						<a href='/vkgetinfo/logout.php'>Выход.</a>";
					}
			?>
			<br>
			<br>
			Введите ID или доменное имя<br>
			<input type="text" name = "id" >
			<input type="submit">
		</form>
	</body>
</html>