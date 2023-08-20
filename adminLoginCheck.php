<?php

    $filename = "admin.txt"; // файл с хэшом пароля и логином

    $array = explode("\n", file_get_contents($filename)); // получаем данные из файла в массив

    session_start();

    $login = $_POST["login"];
    $password = $_POST["password"];


    if (sha1($password) == trim($array[1]) && $login == trim($array[0])) { // проверка
        setcookie("login", "admin", time()+3600, "/"); // установка куки
    }

    header("Location: index.php");