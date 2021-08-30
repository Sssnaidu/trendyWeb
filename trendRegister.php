<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];

$conn = new mysqli('localhost', 'root','','trendusers');

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("INSERT INTO registration(firstName,lastName,email) 
    values(?,?,?)");

    $stmt->bind_param("sss", $firstName, $lastName, $email);
    
    $stmt->execute();

    echo "Successfully Registered!";
    echo "Thank you $firstName for signing up!";

    $stmt->close();
    $conn->close();
}

?>