<?php

require 'connect.php';

$sender_accountid = $_POST['sender_accountid'];
$receiver_accountid = $_POST['receiver_accountid'];
$listing_id = $_POST['listing_id'];

$statement = $conn->prepare("Call getMessage(?,?,?)");
$statement->bindParam(1,$sender_accountid, PDO::PARAM_STR);
$statement->bindParam(2,$receiver_accountid, PDO::PARAM_STR);
$statement->bindParam(3,$listing_id, PDO::PARAM_STR);
$statement->execute();

$response = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "{\"Messages\":".json_encode($response)."}";

?>