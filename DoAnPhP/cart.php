<?php
  
    require('inc/init.php');
    
    include('class//CartItem.php');
    include('class/Product.php');
    $db = new Database();
    $pdo = $db->getConn();
    $data= CartItem::getall($pdo,$_SESSION['id'])	;


    if($_SERVER['REQUEST_METHOD']== "POST"){
        $up=$_POST['update'];
        $del=$_POST['delete'];
        $pid=(int) $_POST['proid'];
        $qt=(int) $_POST['qty'];
        $c= $_GET['action'];
    }
    if($up== "Update")
    {
        CartItem::update($pdo,$pid,$qt,$_SESSION['id']);
        $up=' '; 
        header('location: cart.php');

    }
    if($del== "Delete")
    {
        CartItem::delete($pdo,$pid,$_SESSION['id']);
        $del='';
        header('location: cart.php');

    }
    


?>
<?php include('inc/header.php');
      
    
?>
<br><br><br><br><br><br>

<h2 style="font-size:x-large; margin-left: 500px ; color: red;">Giỏ hàng</h2>
<div class="container" style="width: 100%; font-size:x-large;">
    <table class="table my-3" style="margin-left: 200px;">
        
        <thead>
            <tr class="text-center">
                <th>No.</th>
                <th>Pro name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th></th>
            </tr>
        </thead>
        <tbody style="font-size:x-large;">
            <?php if(isset($data)):
                $i=1;
                $total=0;
                foreach($data as $cart):
                    $product=Product::getOneById($pdo,$cart->proId);
            ?>
                    <tr class="text-center">
                        <form  method="post">
                            <td><?= $i ?></td>
                            <td><?= $product->name ?></td>
                           
                            <td><?= number_format($product->price,0,',','.') ?> VNĐ</td>
                            <td>
                                &nbsp &nbsp &nbsp &nbsp
                                <input type="number" value="<?= $cart->quantity ?>" 
                                name="qty" min="1" style="width:50px;">
                                <input type="hidden" value="<?= $cart->proId ?>" 
                                name="proid" >
                            </td>
                            <td>
                                <input type="submit" value="Update" 
                                name="update"  class="btn btn-warning">
                                <input type="submit" value="Delete" 
                                name="delete"  class="btn btn-warning">
                            </td>
                        
                        </form>
                    </tr>
            <?php
                    $total+= $product->price* $cart->quantity;
                    $i++;
                endforeach;
                
            endif; ?>
            <tr>
                <td colspan="5" class="text-center">
                    <h4>Total :<?= number_format($total,0,',','.') ?> VNĐ </h4>
                    
                </td>
            </tr>
        </tbody>
    </table>
</div>


<?php include('inc/footer.php');?>