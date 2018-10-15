<?php
/**
 * Created by PhpStorm.
 * User: SAMANTHA
 * Date: 13-10-2018
 * Time: 13:44
 */
require 'Connection.php';

class QueryBuilder
{

    private $pdo;

    //creates new Querybuilder and set the database connection
    function __construct()
    {
        $this->pdo = Connection::make();
    }

    //returns a statement based on a table name for which SELECT * FROM is done.
    function selectAll($table)
    {
        return $this->pdo->prepare('SELECT * FROM ' . $table);
    }


    //returns a boolean - true when email and password exists - false otherwise
    function checkEmailAndPassword($email, $password)
    {

        $statement = $this->pdo->prepare('SELECT * FROM member WHERE email = :email AND password = :password');
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);

        //uitvoeren
        $statement->execute();

        //if the email and password is true, return true
        if (!empty($statement->fetchAll(PDO::FETCH_ASSOC))) {

            return true;

        } else {
            return false;
        }

    }

    //function copied from internet. Wrapper around build in function 'com_create_guid()' because function works only on windows.
    //function returns GUID;
    function getGUID()
    {
//        if (function_exists('com_create_guid')) {
//            return com_create_guid();
//        } else {
//            mt_srand((double)microtime() * 10000);//optional for php 4.2.0 and up.
//            $charid = strtoupper(md5(uniqid(rand(), true)));
//            $hyphen = chr(45);// "-"
//            $uuid = chr(123)// "{"
//                . substr($charid, 0, 8) . $hyphen
//                . substr($charid, 8, 4) . $hyphen
//                . substr($charid, 12, 4) . $hyphen
//                . substr($charid, 16, 4) . $hyphen
//                . substr($charid, 20, 12)
//                . chr(125);// "}"
//            return $uuid;
//        }
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,
            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }


    //return hexadecimal guid - string, when email is found otherwise -1.
    function forgotPass($email)
    {


        //look in the database with query if the email exist(Prepare - bindParam - execute - fetchALL)
        $statement = $this->pdo->prepare('SELECT * FROM member WHERE email = :email');
        $statement->bindParam(':email', $email);
        $statement->execute();
        $qry_result = $statement->fetchAll(PDO::FETCH_ASSOC);

        //test if email exist to know if the email exist in the database
        if (!empty($qry_result)) {
            $guid = $this->getGUID();
            //update forgot_pass_identity for email
            $statement = $this->pdo->prepare('UPDATE member SET forgot_pass_identity = ? WHERE email = ?');
            $statement->bindValue(1,$guid);
            $statement->bindValue(2,$email);

            $statement->execute();
            //get the forgot_pass_identity GUID to show in url
//            $statement = $this->pdo->prepare('SELECT forgot_pass_identity FROM member WHERE email = :email');
//            $statement->bindParam(':email', $email);
//            $statement->execute();
//            $result = $statement->fetchAll();
            return $guid;
          //  return $result;
            //if email not found return -1
        } else {
            return -1;
        }

    }

//check if the forgot_pass_identity GUID exist
    function checkForgotPassIdentity($strGUID)
    {
        //Look for the GUID forgot_pass_idenity in the member table
        $statement = $this->pdo->prepare('SELECT * FROM member WHERE forgot_pass_identity = :forgot_pass_identity');
        $statement->bindParam(':forgot_pass_identity', $strGUID);

        $statement->execute();

        //if found return true
        if (!empty($statement->fetchAll(PDO::FETCH_ASSOC))) {

            return true;
            //if not found return false
        } else {
            return false;
        }
    }

        public function changedPassword($password, $id)
        {
             $forgot_pass_identity = "0x".strtoupper($id);
             var_dump($forgot_pass_identity);
            //update forgot_pass_identity for email
            $statement = $this->pdo->prepare('UPDATE member SET forgot_pass_identity = NULL, password = ? WHERE forgot_pass_identity = ?');
            $statement->bindValue(1,$password);
            $statement->bindParam(2,$id, PDO::PARAM_LOB);
            $statement->execute();

        }




///new function changed password id, new password
/// UPDATE member SET forgot_pass_identity = NULL, password = :password  WHERE forgot_pass_identity = :forgot_pass_identity
// bind
// execute
// fetch
}