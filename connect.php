<?php

//connectionh
// consider database as collection of tables 

// this line sayas crete new sql connection on local database with the username root and null as password also access database 
// named as test
$conn = new mysqli('localhost','root', '', 'test');


if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
} else{
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = $_POST['msg'];
    echo "username is ".$username;
    echo "\ngender is ".$gender;
    echo "\nemail is ".$email;
    echo "\nphone is ".$phone;
    echo "\nmsg is ".$msg;


// Here we create a statement where we define sql query to write into the database in table 'feedback' ha 
    $stmt = $conn->prepare("insert into feedback(username, gender, email, phone, msg)values(?, ?, ?, ?, ?)");

    $stmt->bind_param("sssss", $username, $gender, $email, $phone, $msg);
    $stmt->execute();
    echo "Thankyou for your feedback...";
    $stmt->close();
    // $conn();
}
?>