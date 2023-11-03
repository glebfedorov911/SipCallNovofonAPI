<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" charset="UTF-8">
    <title>Звонки</title>
    <link rel="stylesheet" type="text/css" href="styles/mystyles.css"/>
</head>
<body>
<div class="main-rectangle">
    <div class="line"></div>
    <div class="data">
        <p class="fullname"><?=$_GET["fullname"]?></p>
        <p class="square"><?=$_GET["square"]?>м^2 ЖК "САДЫ ПЕКИНА"</p>
    </div>
    <p class="fulltext">><?=$_GET["name"]?>, здравствуйте! Подскажите, пожалуйста, возможно Вы продаете или думаете о продаже квартиры в ЖК «Сады Пекина»? Подбираю для клиента, интересны варианты с площадью 130-150 м2 (рассматриваем с ремонтом и без). <br><br> Заранее благодарна за обратную связь, Жиляева Ольга <br><br> Если Вам неинтересна продажа или покупка недвижимости, просто проигнорируйте мое сообщение, я Вас больше не побеспокою, прошу не жаловаться на спам.</p>
    <form action="save_com.php" method="post" class="com-form">
        <textarea class="msg" name="msg" placeholder="Комментарий"></textarea>
        <div class="button-box">
            <button class="suc">Успех</button>
    </form>
    <div class="call"><a class="awhite" href="call.php">Звонить</a></div>
</div>
</div>
</body>

<?php

    session_start(); // страница с текстом, звонком и комментарием

    $_SESSION["from"] = $_GET["from"];
    $_SESSION["to"] = $_GET["phone"];

    $_SESSION["fullname"] = $_GET["fullname"];
