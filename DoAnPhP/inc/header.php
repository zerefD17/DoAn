<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Food</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="/hk6/php/DoAnPhP/CT/style.css"> 

</head>
<body>
<?php
require('inc/init.php'); 


?>
<!-- header section starts  -->

<header>

    <a href="#" class="logo"><i class="fas fa-utensils"></i>food</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="index.php">home</a>
        <a href="speciality.php">speciality</a>
        <a href="popular.php">popular</a>
        
        <?php if(!isset($_SESSION['log_detail'] )): ?>
            <a href="login.php">Login</a>&nbsp&nbsp&nbsp&nbsp
            
        <?php else:?>
            
            <a href="logout.php">logout</a>&nbsp&nbsp&nbsp&nbsp
            
        <?php endif;?>
        <?php if(isset($_SESSION['pow'] ) ): ?>
            <?php if($_SESSION['pow']== 'admin'):?> 
                <a href="manage.php">Manage</a>&nbsp&nbsp&nbsp&nbsp
            
        
            <?php endif;?>
        <?php endif;?>
        <!-- <a href="login.php">Login</a> -->
        <a href="cart.php" class="cart-icon">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count"></span>
        </a>
    </nav>

</header>















