<?php

include 'connect.php';

    $listing_id = $_POST['listing_id'];

    
    $statement = $conn->prepare("CALL deleteListing(?);");

    $statement->bindParam(1, $listing_id, PDO::PARAM_STR);

  	if(($statement->execute()) == 1){
		echo "success";
	}

    $conn = null;



?>