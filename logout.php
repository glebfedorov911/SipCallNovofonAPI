<?php


    setcookie("login", "admin", time()-3600, "/"); // удаление куки
    header("Location: index.php");
