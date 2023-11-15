<?php
if(!empty($_GET['file']))
{
    $fileName = basename($_GET['file']);
    $filePath = "C:/xampp/htdocs/pro/expfolder/upload/".$fileName;

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

<!-- <iframe src="<?php $_GET['file'] ?>" width="500" height="700"></iframe> -->
