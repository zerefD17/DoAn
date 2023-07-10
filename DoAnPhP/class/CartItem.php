<?php 
require_once('Database.php');
class CartItem{
    public $id;
    public $userId;
    public $proId;
    public $quantity;

    public function __construct($id='',$uid='',$pid='',$qty=''){
        $this->id = $id;
        $this->userId = $uid;
        $this->proId= $pid;
        $this->quantity= $qty;
    }

    public static function getall($pdo,$id){
        $sql="SELECT * FROM cart where idus =:id";
        $stmt=$pdo->prepare($sql);
        $ids=$id;
        $stmt->bindParam(':id',$ids,PDO::PARAM_INT);
        $data= array();
        if($stmt->execute()){
            $products= $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }
        else{
            $error=$stmt->errorInfo();
            var_dump($error);
        }
        $lines = $products;
        
        foreach ($lines as $line) {
           
            $product = new CartItem($line["id"],$line["idus"],$line["proid"],(int)$line["qty"]);
           
           
        
            $data[] = $product;
        }
          
        return $data;
        
    }

    public static function getOneById($pdo,$pid,$idu){
        
        
        $sql="SELECT * FROM cart WHERE  proid=:pid and idus= :idu ";
        $stmt=$pdo->prepare($sql);

        $proid= (int)$pid;
        $stmt->bindParam(':pid',$proid,PDO::PARAM_INT);
        $ids= (int)$idu;
        $stmt->bindParam(':idu',$ids,PDO::PARAM_INT);

        if($stmt->execute()){
            $products= $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }
        else{
            $error=$stmt->errorInfo();
            var_dump($error);
        }
        $lines = $products;
        foreach ($lines as $line) {
           
            $product = new CartItem($line["id"],$line["idus"],$line["proid"],(int)$line["qty"]);
           
           
        
            $data[] = $product;
        }
          
        if(isset($product)){
            return $data;
        }
        return null;

    }

    public function add($pdo){
        $sql="INSERT INTO cart( idus, proid, qty )VALUES (:uid,:proid,:qty)";
        $stmt=$pdo->prepare($sql);    
        $uid=$this->userId;
        $stmt->bindValue(':uid',$uid,PDO::PARAM_STR);
        $proid=$this->proId;
        $stmt->bindValue(':proid',$proid,PDO::PARAM_STR);
        $qty=1;
        $stmt->bindParam(':qty',$qty,PDO::PARAM_INT);


        if($stmt->execute()){
            $id= $pdo->lastInsertId();
            
        }
        else{
            $error=$stmt->errorInfo();
            var_dump($error);
        }

    }
    public static function delete($pdo,$pid,$idu){
        $sql="DELETE  FROM  cart   WHERE proid=:pid and idus= :idu ";
        $stmt=$pdo->prepare($sql);
        
        $proid= (int)$pid;
        $stmt->bindParam(':pid',$proid,PDO::PARAM_INT);
        $ids= (int)$idu;
        $stmt->bindParam(':idu',$ids,PDO::PARAM_INT);
       
       


        if($stmt->execute()){
            $id= $pdo->lastInsertId();
            //var_dump($id);
        }

    }
    public static function update($pdo,$pid,$qty,$idu){
        $sql="UPDATE cart SET qty=:qty  WHERE proid=:pid and idus= :idu ";
        $stmt=$pdo->prepare($sql);
        
        $proid= (int)$pid;
        $stmt->bindParam(':pid',$proid,PDO::PARAM_INT);
        $ids= (int)$idu;
        $stmt->bindParam(':idu',$ids,PDO::PARAM_INT);
       
        $qy=(int)$qty;
        $stmt->bindParam(':qty',$qy,PDO::PARAM_INT);
        


        if($stmt->execute()){
            $id= $pdo->lastInsertId();
            //var_dump($id);
        }

    }
    public static function getLastId($data){
        $last = end($data);
        return $last->id ;

    }

}

?>