<?php
//  require 'views/check.view.php';
//require_once("connect.php");

$dsn = 'mysql:host=127.0.0.1;dbname=voetbal';
$username = "root";

//Samantha password ""
//Remko password "root"
$password = "root";

try {
    $pdo = new PDO ($dsn,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e){
    echo 'connection failed: ' . $e->getMessage();

}

//Query => zoekvraag naar de database
//variables
$email = $_POST['email'];
$password = $_POST['password'];
$adminid = $_POST['adminid'];

//prepare
$statement = $pdo->prepare('SELECT * FROM admin WHERE email = :email AND password = :password AND adminid = :adminid');
$statement->bindParam(':email',$email);
$statement->bindParam(':password',$password);
$statement->bindParam(':adminid',$adminid);

//uitvoeren
$statement->execute();
//results
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

//if it's not empty show result
if(!empty($result)){
    echo "<pre>";
    print_r($result);
    echo "</pre>";
    //set cookie for member email this is the email, cookie is remembered for 7 days
    setcookie("admin_email", $_POST['email'], time()+(7 * 24 * 60 * 60));
    //set cookie for member password this is the password, cookie is remembered for 7 days
    setcookie("admin_password", $_POST['password'], time()+(7 * 24 * 60 * 60));
    setcookie("admin_email", $_POST['adminid'], time()+(7 * 24 * 60 * 60));


    header('Location: home.php');

    die;
}else{



    echo "Wachtwoord of gebruikersnaam klopt niet.";
}



//if($_POST) {
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";
//
//    die;
//
//
//}
?>