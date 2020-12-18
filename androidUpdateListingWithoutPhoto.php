<?php

include 'connect.php';

    $listing_id = $_POST['listing_id'];
    $product_name = $_POST['product_name'];
    $listing_details = $_POST['listing_details'];
    
    $statement = $conn->prepare("CALL updateListingWithOutPhoto(?,?,?);");

    $statement->bindParam(1, $listing_id, PDO::PARAM_STR);
    $statement->bindParam(2, $product_name, PDO::PARAM_STR);
    $statement->bindParam(3, $listing_details, PDO::PARAM_STR);

  	if(($statement->execute()) == 1){
		echo "success";
	}

    $conn = null;



?>