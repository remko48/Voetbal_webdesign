<?php

require 'core/QueryBuilder.php';


//variables
$email = $_POST['email'];
$password = $_POST['password'];
$Query_builder = new QueryBuilder();

// This sends a persistent cookie that lasts a day.
session_start([
    'cookie_lifetime' => 86400,
]);
//if it's not empty show result
if($Query_builder->checkEmailAndPassword($email, $password)){
    echo "<pre>";
    print_r($result);
    echo "</pre>";
    //set cookie for member email this is the email, cookie is remembered for 7 days
    $_SESSION["member_email"] =  $_POST['email'];
    //set cookie for member password this is the password, cookie is remembered for 7 days
    $_SESSION["member_password"] =  $_POST['password'];


header('Location: home.php');

    die;
}else{



   echo "Wachtwoord of gebruikersnaam klopt niet.";
}
