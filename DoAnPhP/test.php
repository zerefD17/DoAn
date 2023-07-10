<?php

   
    require('inc/init.php');
    include('class/Product.php');
    include('class//CartItem.php');
    // require('class/User.php');
    $db = new Database();
    $pdo = $db->getConn();

    $data2= CartItem::getall($pdo,$_SESSION['id'])	;
    $newID= CartItem::getLastId($data2);
        $qty= 1;
        $newcart= new CartItem($newID,$_SESSION['id'] , 11, $qty);
        $newcart->add($pdo);
    
   
    
?>
