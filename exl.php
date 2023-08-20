<?php

    require_once('PHPExcel.php');
    require_once('PHPExcel/Writer/Excel5.php');
    error_reporting(E_ERROR | E_PARSE); // Выгрузка данных из excel

    function phoneEdit($phone) {
        $phone = preg_replace('/[^0-9]/', '', $phone);

        $phone = substr($phone, 0, 11);

        return $phone;
    }

    $filename = "msg.xlsx";

    $objPHPExcel = PHPExcel_IOFactory::load($filename);
    $highestRow = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

    $dataOfCalling = array();

    for ($i=2; $i<=$highestRow; $i++) {
        $msg = $objPHPExcel->setActiveSheetIndex(0)->getCell("G" . $i);
        if ($msg == "") {

            $fullname = $objPHPExcel->setActiveSheetIndex(0)->getCell("F" . $i);
            $name = $objPHPExcel->setActiveSheetIndex(0)->getCell("E" . $i);
            $square = $objPHPExcel->setActiveSheetIndex(0)->getCell("D" . $i);
            $phone = $objPHPExcel->setActiveSheetIndex(0)->getCell("C" . $i);

            $phone = phoneEdit($phone);

            $from = $_POST['from'];

            if ($phone != "") {
                array_push($dataOfCalling, ["id" => "$i", "fullname" => "$fullname", "name" => "$name",
                    "square" => "$square", "phone" => "$phone", "from" => "$from"]);
            }
        }
    }

    $query = http_build_query($dataOfCalling);
    header("Location: callinglist.php?$query");

