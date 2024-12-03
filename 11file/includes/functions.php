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

function isMethodPOST(): bool
{
    if (!$_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['error'] = "Пожалуйста заполните все поля";
        return false;
    }
    return true;
}

function saveImage($fileName, $fileTmpName, $mysqli): bool
{
    $upLoadDir = __DIR__ . '/public/uploads/';
    $upLoadFile = $upLoadDir . basename($fileName);
    return move_uploaded_file($fileTmpName, $upLoadFile);
}

function addToDatabase($fileName, $mysqli): bool
{
    $sql = "INSERT INTO `images` (`id`, `filename`) VALUES (NULL, '{$fileName}')";
    return mysqli_query($mysqli, $sql);
}

function createUser($mysqli, $userName, $userEmail, $userPassword,): bool
{
    $userPassword = createSecurePassword($userPassword);
    $sql = "INSERT INTO `users` (`id`, `name`,`email`,`password`) VALUES (NULL, '{$userName}', '{$userEmail}', '{$userPassword}')";
    return mysqli_query($mysqli, $sql);
}

function loginUser($mysqli, $userEmail, $userPassword): bool
{

}

function createUniqueName($nameLength, $fileType): string
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

function isEmailValid($email): bool
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['ValidationError'] = 'Пожалуйста введите корректный email';
        return false;
    }
    return true;
}

function isPasswordValid($password): bool
{
    if (!strlen($password) <= 8) {
        $_SESSION['ValidationError'] = 'Пароль должен быть не менее 8 символов';
        return false;
    }
    if (!preg_match("#\d+#", $password)) {
        $_SESSION['ValidationError'] = 'Пароль должен содержать хотя бы одну цифру';
        return false;
    }
    if (!preg_match("#[a-zA-Z]+#", $password)) {
        $_SESSION['ValidationError'] = 'Пароль должен содержать хотя бы одну букву';
        return false;
    }
    return true;
}

function arePasswordsMatch($password1, $password2): bool
{
    if ($password1 != $password2) {
        $_SESSION['ValidationError'] = 'Пароли должны совпадать';
        return false;
    }
    return true;
}

function createSecurePassword($password): string
{
    return password_hash($password, PASSWORD_DEFAULT);
}

#[NoReturn] function returnToHome(): void
{
    header("Location: /Task/11file/public/upload.php");
    exit();
}

#[NoReturn] function returnToRegisterPage(): void
{
    header("Location: /Task/11file/public/register.php");
    exit();
}


