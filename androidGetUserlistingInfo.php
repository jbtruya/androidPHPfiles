<?php

require 'connect.php';

$accountid = $_POST['accountid'];
$statement = $conn->prepare("Call getUserListings(?)");
$statement->bindParam(1,$accountid, PDO::PARAM_STR);
$statement->execute();

$response = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "{\"listingInfo\":".json_encode($response)."}";

?>