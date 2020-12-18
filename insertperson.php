<?php

    include 'connect.php';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];


    $statement = $conn->prepare("CALL InsertPerson(?,?);");

    $statement->bindParam(1, $firstname, PDO::PARAM_STR);
    $statement->bindParam(2, $lastname, PDO::PARAM_STR);

  	if(($statement->execute()) == 1){
		echo "success";
	}

    $conn = null;
?>