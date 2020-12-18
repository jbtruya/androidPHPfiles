<?php

require 'connect.php';

$statement = $conn->prepare("Call getListingInfo()");
$statement->execute();

$response = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "{\"listingInfo\":".json_encode($response)."}";

?>