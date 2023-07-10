<?php
  

    class Database
    {
        public static function getConn(){
            $host='localhost';
            $db='my_blog1';
            $user='sang_admin';
            $pass='(2ViMPf!k7i-bIo3';
            $dsn= "mysql:host=$host;dbname=$db;charset-UTF8";
            return new PDO($dsn,$user,$pass);
        }

    }
?>