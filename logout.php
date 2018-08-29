<?php
require_once("config.php");
unset($_SESSION['token']);
unset($_SESSION['user_id']);
unset($_SESSION['email']);
header("location:/vkgetinfo/");