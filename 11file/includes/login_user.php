<?php
require_once('config.php');
require_once('functions.php');

loginUser($mysqli, $_POST['email'], $_POST['password']) ;