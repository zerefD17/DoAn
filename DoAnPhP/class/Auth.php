<?php
    
    require('inc/init.php');
    class Auth{
        public static function login($pdo,$username,$passworld){
            $sql= "SELECT id,pass, power FROM user WHERE accname = :username";
            $stmt= $pdo->prepare($sql);
            $stmt->bindValue(':username', $username,PDO::PARAM_STR);
            if($stmt->execute()){
                // $pw= $stmt->fetchColumn();
                $lines = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($lines as $line) {
                    $pw=$line["pass"];
                    $po=$line["power"];
                    $i=$line["id"];
                }
                
                
                if(password_verify($passworld,$pw)){
                    $_SESSION['log_detail'] = $username;
                    $_SESSION['pow']= $po;
                    $_SESSION['id']= $i;
                    header('location: index.php');
                    exit();
                }
            }
            return 'Login Fail';
        }
        public static function logout(){
        
            unset($_SESSION['log_detail']);
            unset($_SESSION['pow']);
            unset($_SESSION['id']);
            header('location: index.php');
            exit();
        }

    }
?>