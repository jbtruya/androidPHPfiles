<?php

    include 'connect.php';

    $listingid = $_POST['listingid'];
    $offerid = $_POST['offerid'];
    $datetime = $_POST['datetime'];

    $statement = $conn->prepare("CALL acceptOffer(?,?,?);");

    $statement->bindParam(1, $listingid, PDO::PARAM_STR);
    $statement->bindParam(2, $offerid, PDO::PARAM_STR);
     $statement->bindParam(3, $datetime, PDO::PARAM_STR);

  	if(($statement->execute()) == 1){
		echo "success";
	}

    $conn = null;
?>