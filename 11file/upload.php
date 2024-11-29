<?php
require_once('config.php');
require_once('functions.php');

if (!($_SERVER["REQUEST_METHOD"] == "POST")) {
    $_SESSION['error'] = "Неверный HTTP метод";
    returnToHome();
}

foreach ($_FILES["files"]["type"] as $type) {
    if (!($type == "image/jpeg" || $type == "image/png")) {
        $_SESSION['error'] = "Можно загрузить изображение только в формате .jpg и .png";
        returnToHome();
    }
}

if (!(empty($_FILES["files"]["size"]))) {
    $upLoadDir = __DIR__ . '\uploads\\';
    $upLoadFile = [];
    foreach ($_FILES["files"]['name'] as $key => $file) {
        $upLoadFile[$key] = $upLoadDir . basename($file);
    }
    foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
        move_uploaded_file($tmp_name, $upLoadFile[$key]);
    }

} else {
    $_SESSION['error'] = "Выберете изображения";
    returnToHome();
}

foreach ($_FILES["files"]["name"] as $fileName) {
    print_r($fileName);
    $sql = "INSERT INTO `images` (`id`, `filename`) VALUES (NULL, '{$fileName}')";
    if (!(mysqli_query($mysqli, $sql))) {
        $_SESSION['error'] = "Ошибка при записи в бд: ".mysqli_error($mysqli);
        returnToHome();
    }
}

$_SESSION['success'] = "Изображения успешно загружены";

returnToHome();






