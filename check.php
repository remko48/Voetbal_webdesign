
<?php
//require_once("connect.php");

$dsn = 'mysql:host=127.0.0.1;dbname=voetbal';
$username = "root";

//Samantha password ""
//Remko password "root"
$password = "";

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

//prepare
$statement = $pdo->prepare('SELECT * FROM member WHERE email = :email AND password = :password');
$statement->bindParam(':email',$email);
$statement->bindParam(':password',$password);

//uitvoeren
$statement->execute();
//results
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

//if it's not empty show result
if(!empty($result)){
    echo "<pre>";
    print_r($result);
    echo "</pre>";

header('Location: home.view.php');

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