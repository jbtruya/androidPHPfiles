<?php

require 'connect.php';

$accountid = $_POST['accountid'];
$statement = $conn->prepare("Call getTransactions(?)");
$statement->bindParam(1,$accountid, PDO::PARAM_STR);
$statement->execute();

$response = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "{\"Transactions\":".json_encode($response)."}";

?>