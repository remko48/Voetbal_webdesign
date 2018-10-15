<?php
/**
 * Created by PhpStorm.
 * User: MAARTEN
 * Date: 9-10-2018
 * Time: 21:09
 */
require 'views/check_out.view.php';

//delete the cookie which set the email
if (!empty($_COOKIE['member_email'])) {
    unset($_COOKIE['member_email']);
    setcookie('member_email', '', time()-3600 );
    }
//delete the cookie which set the password
if (!empty($_COOKIE['member_password'])) {
    unset($_COOKIE['member_password']);
    setcookie('member_password', '', time()-3600 );
}

//goes to log out page
header('Location: views/check_out.view.php');

