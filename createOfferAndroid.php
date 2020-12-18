<?php

include 'connect.php';

$target_dir = "images/";
$image = $_POST["image"];
$listing_id = $_POST['listing_id'];
$product_name = $_POST['product_name'];
$listing_details = $_POST['listing_details'];
$accountid = $_POST['accountid'];
$dateoffered = $_POST['dateoffered'];

if(!file_exists($target_dir)){
    mkdir($target_dir,0777,true);
}

$target_dir = $target_dir . rand() . "_" . time() . "." . "jpeg";
if(file_put_contents($target_dir, base64_decode($image))){
    
    $statement = $conn->prepare("CALL addOffer(?,?,?,?,?,?);");
    $statement->bindParam(1, $listing_id, PDO::PARAM_STR);
    $statement->bindParam(2, $accountid, PDO::PARAM_STR);
    $statement->bindParam(3, $product_name, PDO::PARAM_STR);
    $statement->bindParam(4, $listing_details, PDO::PARAM_STR);
    $statement->bindParam(5, $target_dir, PDO::PARAM_STR);
    $statement->bindParam(6, $dateoffered, PDO::PARAM_STR);
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