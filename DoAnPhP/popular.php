<?php include('inc/header.php')?>
<!-- popular section starts  -->
<?php 
    if(!isset($_SESSION['id'])){
        die("Cần đăng nhập");
    }
    require('class/Product.php');
    require_once('class/CartItem.php');
    
    // require('inc/init.php');
    $db = new Database();
    $pdo = $db->getConn();
    $data = Product::getall($pdo);
    
    

    if($_SERVER['REQUEST_METHOD']== "GET"){
       $id=$_GET['id'];

    }
    $data2= CartItem::getall($pdo,$_SESSION['id'])	;
    $data1= CartItem::getOneById($pdo,$id,$_SESSION['id'])	;
    if($data1==null){
        $newID= CartItem::getLastId($data2);
        $qty= 1;
        $newcart= new CartItem($newID,$_SESSION['id'] , $id, $qty);
        $newcart->add($pdo);
    }
    else{
        foreach ($data1 as $d) {
           CartItem::update($pdo,$id,$d->quantity+1,$_SESSION['id']);
            
        }
    }
?>

<section class="popular" id="popular">
<br><br><br><br>
<h1 class="heading"> most <span>popular</span> foods </h1>

<div class="box-container">
        <?php foreach($data as $product): ?>
            <div class="box">
                <span class="price"><?= $product->price ?>đ </span>
                
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
<br><br><br><br><br><br><br><br>
</section>

    <!-- popular section ends -->
                                
    
<?php 

var_dump($data1);

?>
<?php include('inc/footer.php');?>