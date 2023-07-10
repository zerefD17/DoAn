<?php 
   
    require('class/Product.php');
    if(!isset($_GET["id"])){
        die("Cần cung cấp id");
    }
    $id = $_GET["id"];
    
    // require('inc/init.php');
    $db = new Database();
    $pdo = $db->getConn();
    $data = Product::getProductsByType($pdo,$id);
    var_dump($id);
    var_dump($data);
    // if($product == null){
    //     die("id không hợp lệ ");
    // }
    // else{
        
    // }
?>






<?php include('inc/header.php');
   
?>
<!-- popular section starts  -->


<section class="popular" id="popular">

<h1 class="heading"> most <span>popular</span> foods </h1>

<div class="box-container">
        <?php foreach($data as $product): ?>
            <div class="box">
                <span class="price"><?= $product->price ?> đ</span>
                
                <img style="text-transform: lowercase;" src="img2/<?= $product->img ?>" alt="">
                <h3><?= $product->name ?></h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <a href="popular.php?id=<?= $product->id ?>" class="btn">order now</a>
            </div>
            
        <?php endforeach; ?>

</div>

</section>

    <!-- popular section ends -->
                                
   

<?php include('inc/footer.php');?>