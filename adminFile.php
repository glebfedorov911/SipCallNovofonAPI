<?php

    $file = "msg.xlsx"; // Файл чтобы его скачать


    function download($file) {

        ob_end_clean();

        header('Content-Description: File Transfer');
        header('Content-Type: ' . mime_content_type($file));
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . basename($file) . "\"");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        readfile($file);

        header("Location: index.php");


    }

    if (!empty($_COOKIE["login"]) && $_COOKIE["login"] == "admin") {
        download($file); // Если админ авторизован, то файл скачивается
    }

