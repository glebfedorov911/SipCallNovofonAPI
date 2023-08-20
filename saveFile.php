<?php

    // сохранение файла после его загрузки на сервер

    $tmp_file = $_FILES["file"]["tmp_name"];
    $new_file = __DIR__ . "/" . $_FILES["file"]["name"];

    $result = move_uploaded_file($tmp_file, $new_file);

    header("Location: index.php");