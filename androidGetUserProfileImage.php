<?php

require 'connect.php';

$accountid = $_POST['accountid'];

$statement = $conn->prepare("CALL getUserProfile(?)");

$statement->bindParam(1,$accountid, PDO::PARAM_STR);

$statement->execute();

$response = $statement->fetch(PDO::FETCH_ASSOC);

$userinfo = array("userinfo" =>array(array("accountid" => $response['accountid'],"username" => $response['username']                  ,"firstname" => $response['firstname']
                    ,"middlename" => $response['middlename']
                    ,"lastname" => $response['lastname']
                    ,"userimage" => $response['userimage'])));

 echo json_encode($userinfo);

?>
