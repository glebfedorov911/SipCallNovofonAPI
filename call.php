<?php
    ini_set("error_reporting", E_ALL & ~E_DEPRECATED);

    // страница звонка

    function createUrl($params, $url) {
        $cnt = 0; // функция создания url
        foreach ($params as $item => $value) {
            if ($cnt == 0) {
                $url = $url . "?$item=" . "$value";
            }

            if ($cnt > 0) {
                $url = $url . "&$item=" . "$value";
            }

            $cnt += 1;
        }

        return $url;
    }


    function connectionApi($params, $apiLink) {
        $userKey = "be96a3d4df68839d9960"; // данные из вашего api
        $secret = "c8da8cf981c577ebb160"; // данные из вашего api

        // функция звонка

        ksort($params);
        $paramsStr = http_build_query($params, null, '&', PHP_QUERY_RFC1738);
        $sign = base64_encode(hash_hmac('sha1', $apiLink . $paramsStr . md5($paramsStr), $secret));
        $header = 'Authorization: ' . $userKey . ':' . $sign;

        $url = "https://api.novofon.com" . $apiLink;
        $url = createUrl($params, $url);

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array($header));

        $html = curl_exec($ch);
        curl_close($ch);

        return $html;
    }

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


    $params = [
        "from" => $_SESSION["from"],
        "to" => $_SESSION["to"],
    ];

    $apiLink = "/v1/request/callback/";

    echo connectionApi($params, $apiLink);

?>
<meta http-equiv="X-UA-Compatible" content="ie=edge" charset="UTF-8">
<button id="back">Вернуться на предыдущую страницу</button>

<script>

    let back = document.getElementById("back");

    back.addEventListener("click", function () {
        window.history.go(-1);
    })

</script>
