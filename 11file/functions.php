<?php

require_once('config.php');

function getAllImages($mysqli)
{
    $sql = "SELECT * FROM images";
    $result = mysqli_query($mysqli, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function returnToHome()
{
    header("Location: /Task/11file/index.php");
    exit();
}



