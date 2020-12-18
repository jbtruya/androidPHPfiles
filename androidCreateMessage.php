<?php
include 'connect.php';

 $sender_accountid = $_POST['sender_accountid'];
 $receiver_accountid = $_POST['receiver_accountid'];
 $subject = $_POST['subject'];
 $message = $_POST['message'];
 $senddate = $_POST['senddate'];
 $listing_id= $_POST['listing_id'];
    
    $statement = $conn->prepare("CALL createMessage(?,?,?,?,?,?);");

    $statement->bindParam(1, $sender_accountid, PDO::PARAM_STR);
    $statement->bindParam(2, $receiver_accountid, PDO::PARAM_STR);
    $statement->bindParam(3, $subject, PDO::PARAM_STR);
    $statement->bindParam(4, $message, PDO::PARAM_STR);
    $statement->bindParam(5, $senddate, PDO::PARAM_STR);
    $statement->bindParam(6, $listing_id, PDO::PARAM_STR);

  	if(($statement->execute()) == 1){
		echo "success";
	}

    $conn = null;

?>