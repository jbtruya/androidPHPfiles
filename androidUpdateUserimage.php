<?php

include 'connect.php';

$target_dir = "images/";
$image = $_POST["image"];
$accountid = $_POST['accountid'];


if(!file_exists($target_dir)){
    mkdir($target_dir,0777,true);
}

$target_dir = $target_dir . rand() . "_" . time() . "." . "jpeg";
if(file_put_contents($target_dir, base64_decode($image))){
    
    $statement = $conn->prepare("CALL uploadUserimage(?,?);");
    $statement->bindParam(1, $target_dir, PDO::PARAM_STR);
    $statement->bindParam(2, $accountid, PDO::PARAM_STR);
    $statement->execute();
    
    
    echo json_encode([
        "Message" => "The file has been uploaded.",
        "Status" => "Ok"
    ]);
    

    
}else{
    echo json_encode([
        "Message" => "Sorry the file is not uploaded.",
        "Status" => "Error" 
    ]);
}


?>