<?php
require_once('config.php');
require_once('functions.php');

loginUser($mysqli, $_POST['email'], $_POST['password'])? returnToLoginPage() : null ;

$_SESSION['is_logged_in'] = true;

returnToLoginPage();