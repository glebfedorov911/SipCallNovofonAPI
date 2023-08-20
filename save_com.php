<?php
    // сохранения комментария
    session_start();
    require_once "lang.php";

    $com = $_POST["msg"];
    $phone = $_SESSION["to"];
    $fullname = $_SESSION["fullname"];

    require_once('PHPExcel.php');
    require_once('PHPExcel/Writer/Excel5.php');
    error_reporting(E_ERROR | E_PARSE);

    $filename = "msg.xlsx";

    $objPHPExcel = PHPExcel_IOFactory::load($filename);
    $highestRow = $objPHPExcel->getActiveSheet()->getHighestRow()+1;

    $c = "C" . $highestRow;
    $f = "F" . $highestRow;
    $g = "G" . $highestRow;


    $objPHPExcel->getActiveSheet()->setCellValue($c, "$phone");
    $objPHPExcel->getActiveSheet()->setCellValue($f, "$fullname");
    $objPHPExcel->getActiveSheet()->setCellValue($g, "$com");

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save($filename);

    header("location: index.php");