<?php

include 'connect.php';

    $offerid = $_POST['offerid'];

    
    $statement = $conn->prepare("CALL 	deleteOffer(?);");

    $statement->bindParam(1, $offerid, PDO::PARAM_STR);

  	if(($statement->execute()) == 1){
		echo "success";
	}

    $conn = null;



?>