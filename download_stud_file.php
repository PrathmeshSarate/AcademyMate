<?php
if(!empty($_GET['file']))
{
    $assExp = $_GET['assExp'];
    $filePath;
    $fileName = basename($_GET['file']);
    if($assExp=='experiment'){
    $filePath = "C:/xampp/htdocs/pro/student_upload/exp/".$fileName;
    }
    else if($assExp=='assignment'){
        $filePath = "C:/xampp/htdocs/pro/student_upload/ass/".$fileName;
        }

    if(!empty($fileName) && file_exists($filePath)){

        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Diposition: attachment; filename=$fileName");
        header("Content-type: application/pdf");
        header("Content-Transfer-Encoding: binary");

        readfile($filePath);
        exit;
    }
    else{
        echo "file not found";
    }
}
?>
