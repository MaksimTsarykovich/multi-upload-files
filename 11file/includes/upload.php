<?php
require_once('config.php');
require_once('functions.php');

if (!($_SERVER["REQUEST_METHOD"] == "POST")) {
    $_SESSION['error'] = "Неверный HTTP метод";
    returnToHomePage();
}

/*!isMethodPOST() ? returnToHomePage() : null;*/

foreach ($_FILES["files"]["name"] as $key => $image) {

    $fileTmpName = $_FILES["files"]["tmp_name"][$key];
    $fileSize = $_FILES["files"]["size"][$key];
    $fileType = $_FILES["files"]["type"][$key];

    !isImageValid($fileSize, $fileType) ? returnToHomePage() :

    $fileName = createUniqueName(2,$fileType);

    if (!saveImage($fileName, $fileTmpName)) {
        $_SESSION['error'] = "Ошибка при загрузки изображения";
    }
    if (!addToDatabase($fileName, $mysqli)){
        $_SESSION['error'] = "Ошибка записи в базу данных";
    }
}
$_SESSION['success'] = "Изображения успешно загружены";
returnToHomePage();
