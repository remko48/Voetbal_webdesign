<?php
/**
 * Created by PhpStorm.
 * User: MAARTEN
 * Date: 13-10-2018
 * Time: 10:08
 */

require 'core/QueryBuilder.php';


//variables
$email = $_POST['email'];
$Query_builder = new QueryBuilder();

$link = $Query_builder->forgotPass($email);

//if it's not empty show result
if($link!=-1){

    //WARNING replace localhost when upload on the cloud or the server!!!
    //Only works for localhost 7777 if you use another one you fail.
    $msg = "Please click on this link to change your password. If you do not click this beautiful link it will expire in 2 days\n\n" . "http://localhost:7777/new_password.view.php?id=" . $link;
// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail($email,"forgot password",$msg);

    echo "<br/>";
    echo "<div class=\"alert alert-success\" role=\"alert\">";
    echo "<p><i>Email is verstuurd</i></p>";
    echo "<p><i>Wanneer je email is verstuurd, volg de instructie in de email om je wachtwoord te reseten.</i></p>";
    echo "</div>";
}else {
    echo "<br/>";
    echo "<div class=\"alert alert-danger\">";
    echo "<p><i>Email incorect</i></p>";
    echo "</div>";
}

