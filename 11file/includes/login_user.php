<?php
require_once('config.php');
require_once('functions.php');

loginUser($mysqli, $_POST['email'], $_POST['password']) ? null : returnToLoginPage();

$_SESSION['is_logged_in'] = true;

returnToHomePage();