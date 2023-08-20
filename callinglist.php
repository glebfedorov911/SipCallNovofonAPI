<?php

    $data = $_GET;

    foreach ($data as $i) {

        $fullname = $i["fullname"];
        $name = $i["name"];
        $square = $i["square"]; // список людей (отправка get запросом) для каждого своя страница
        $phone = $i["phone"];
        $from = $i["from"];

        echo "<a href='card.php?fullname=$fullname&name=$name&square=$square&phone=$phone&from=$from'>$fullname</a><br>";
    }