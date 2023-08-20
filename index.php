<?php
    // Загружаем сессию и проверяем есть ли эти значения в сессии

    session_start();

    $opt = ["from", "to"];

    function checkSession($opt) {
        foreach ($opt as $item) {
            if (empty($_SESSION[$item])) {
               $_SESSION[$item] = "";
            }
        }
    }


    checkSession($opt);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница</title>
    <link rel="stylesheet" type="text/css" href="styles/mystyles.css"/>
</head>
<body>

    <header>
        <?php
            // Авторизация (проверка по куки) и загрузка/выгрузка файла msg.xlsx

            if (!empty($_COOKIE["login"]) && $_COOKIE["login"] == "admin") {
                echo "<div class='auth-now'>Вы авторизованы!</div><hr>";
                echo "<a href='logout.php'>Выйти</a><hr>";
                echo "<form action='adminFile.php'> <button type='submit'>Скачать xlsx</button> </form>";

                echo "<form action='saveFile.php' enctype='multipart/form-data' method='post'>
                        <input type='file' name='file'>
                        <button type='submit'>Отправить xlsx</button>
                        </form>";
            }
            else {
                echo "<a href='adminLoginForm.php' class='auth'>Авторизоваться</a><hr>";
            }
        ?>
        <hr>
    </header>

    <main>
        <form action="exl.php" method="post">
            <input type="text" class="from" name="from" placeholder="Номер телефона, с которого вы звоните" value="<?=$_SESSION['from']?>" ><br>
            <button type="submit">Вести диалог</button>
            <!--ВВОД НОМЕРА К КОТОРОМУ ПРИВЯЗАНО УСТРОЙСТВО-->
        </form>
    </main>

</body>
</html>