<?php

use JetBrains\PhpStorm\NoReturn;

require_once('config.php');

function getAllImages($mysqli): array
{
    $sql = "SELECT * FROM images";
    $result = mysqli_query($mysqli, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function isImageValid($fileSize, $fileType): bool
{
    if (empty($fileSize)) {
        $_SESSION['error'] = "Выберете изображения";
        return false;
    }
    if (!($fileType == "image/jpeg" || $fileType == "image/png")) {
        $_SESSION['error'] = "Можно загрузить изображение только в формате .jpg и .png";
        return false;
    }
    return true;
}

function saveImage($fileName, $fileTmpName, $mysqli): bool
{
    $upLoadDir = __DIR__ . '/uploads/';
    $upLoadFile = $upLoadDir . basename($fileName);
    return move_uploaded_file($fileTmpName, $upLoadFile);
}

function addToDatabase($fileName, $mysqli): bool
{
    $sql = "INSERT INTO `images` (`id`, `filename`) VALUES (NULL, '{$fileName}')";
    return mysqli_query($mysqli, $sql);
}

function createUnicName($nameLength, $fileType): string
{
    $randomName = "";
    for ($i = 0; $i < $nameLength; $i++) {
        $codepointUpperCase = chr(random_int(65, 90));
        $codepointLowerCase = chr(random_int(97, 122));
        $number = random_int(0, 100);
        $randomName .= $codepointUpperCase . $codepointLowerCase . $number;
    }
    if ($fileType == "image/jpeg") {
        return $randomName . ".jpg";
    } else {
        return $randomName . ".png";
    }
}

#[NoReturn] function returnToHome(): void
{
    header("Location: /Task/11file/index.php");
    exit();
}



