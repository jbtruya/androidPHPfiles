<?php

require 'connect.php';

$productName = $_POST['productName'];
$statement = $conn->prepare("Call searchForListing(?)");
$statement->bindParam(1,$productName, PDO::PARAM_STR);
$statement->execute();

$response = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "{\"listingInfo\":".json_encode($response)."}";

?>