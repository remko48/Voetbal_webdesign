<?php
/**
 * Created by PhpStorm.
 * User: MAARTEN
 * Date: 13-10-2018
 * Time: 10:47
 */

class Connection
{
    static function make()
    {
        $dsn = 'mysql:host=127.0.0.1;dbname=voetbal';
        $username = "root";
        $password = "root";

        try {
            $pdo = new PDO ($dsn,$username,$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        } catch (PDOException $e){
            echo 'connection failed: ' . $e->getMessage();

        }
    }
}