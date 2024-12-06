<?php
require_once('config.php');
require_once('functions.php');


if (!(isMethodPOST() &&
    isEmailValid($_POST['email']) &&
    isPasswordValid($_POST['password']) &&
    arePasswordsMatch($_POST['password'], $_POST['confirm-password']))) {
    returnToRegisterPage();
}



createUser($mysqli, $_POST['name'], $_POST['email'], $_POST['password']) ? null : returnToHomePage();

$_SESSION['is_logged_in'] = true;

returnToHomePage();
