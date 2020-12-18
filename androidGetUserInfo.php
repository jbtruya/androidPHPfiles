<?php

require 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$statement = $conn->prepare("CALL getUserInfo(?,?)");

$statement->bindParam(1,$username, PDO::PARAM_STR);
$statement->bindParam(2,$password, PDO::PARAM_STR);

$statement->execute();

$response = $statement->fetch(PDO::FETCH_ASSOC);

if($password == $response['password']){

$userinfo = array("userinfo" =>array(array("accountid" => $response['accountid'],"username" => $response['username']                  ,"firstname" => $response['firstname']
                    ,"middlename" => $response['middlename']
                    ,"lastname" => $response['lastname']
                    ,"userimage" => $response['userimage'])));

 echo json_encode($userinfo);


 
    
}else{
    throw new Exception("invalid acount details!");
}

?>
