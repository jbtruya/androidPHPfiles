<?php

require 'connect.php';

$statement = $conn->prepare("Call getImage()");
$statement->execute();

$response = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "{\"images\":".json_encode($response)."}";

?>