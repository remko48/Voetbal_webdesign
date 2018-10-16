<?php
/**
 * Created by PhpStorm.
 * User: MAARTEN
 * Date: 9-10-2018
 * Time: 21:09
 */

// This sends a persistent cookie that lasts a day.
session_start([
    'cookie_lifetime' => 86400,
]);

//delete the cookie which set the email
if (!empty($_SESSION['member_email'])) {
    unset($_SESSION['member_email']);
    $_SESSION['member_email'];
    }
//delete the cookie which set the password
if (!empty($_SESSION['member_password'])) {
    unset($_SESSION['member_password']);
    $_SESSION['member_password'];
}

//goes to log out page
header('Location: views/check_out.view.php');


