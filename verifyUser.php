<?php
include 'connect.php';

$password = $_POST['1password'];
$username = $_POST['1username'];

$statement = $conn->prepare("Call verifyUser(?,?);");

$statement->bindParam(1,$username ,PDO::PARAM_STR);
$statement->bindParam(2,$password ,PDO::PARAM_STR);

$statement->execute();

//$response = $statement->fetchAll(PDO::FETCH_ASSOC);

$response = $statement->fetch();


if($password == $response['password']){
    
    echo "User Verified!";
}else{
    echo $response['password'];
    echo $password;
}

//echo "{\"persons\":".json_encode($response)."}";

?>