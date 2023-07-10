<?php 
require_once('Database.php');
class Product
{
    public $id;
    public $name;
    public $type;
    public $price;
    public $img;

    public function __construct($id='',$name='',$types='',$price='',$image=''){
        $this->id = $id;
        $this->name = $name;
        $this->type= $types;
        $this->price= $price;
        $this->img= $image;
    }
    public static function getall($pdo){
        // $pdo= Database::getConn();
        
        $sql="SELECT * FROM food";
        $stmt=$pdo->prepare($sql);
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
            if($line["img"]== "NULL"){
                $imgnull="";
                $product = new Product($line["id"],$line["name"],$line["type"],$line["price"],$imgnull);
            }else{
                $product = new Product($line["id"],$line["name"],$line["type"],$line["price"],strtolower($line["img"]));   
            }
            
            
        
            $data[] = $product;
        }
        //var_dump($data);      
        return $data;
        
    }
    public static function getProductsByType($pdo ,$t){
        // $pdo= Database::getConn();
        
        $sql="SELECT * FROM food where type= :types ";
        $stmt=$pdo->prepare($sql);
        $types=$t;
        $stmt->bindParam(':types',$types,PDO::PARAM_INT);
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
            if($line["img"]== "NULL"){
                $imgnull="";
                $product = new Product($line["id"],$line["name"],$line["type"],$line["price"],$imgnull);
            }else{
                $product = new Product($line["id"],$line["name"],$line["type"],$line["price"],strtolower($line["img"]));   
            }
            
            
        
            $data[] = $product;
        }
        //var_dump($data);      
        return $data;
        
    }
    public function add($pdo){
        
        $sql="INSERT INTO product( name, type, price,image) VALUES (:name,:types,:price,:image)";
        $stmt=$pdo->prepare($sql);

    
        $name=$this->name;
        $stmt->bindParam(':name',$name,PDO::PARAM_STR);
        $types=$this->type;
        $stmt->bindParam(':types',$types,PDO::PARAM_INT);
        $price=$this->price;
        $stmt->bindParam(':price',$price,PDO::PARAM_INT);
        $img=$this->img;
        $stmt->bindParam(':image',$img,PDO::PARAM_STR);

        if($stmt->execute()){
            $id= $pdo->lastInsertId();
            
        }
        else{
            $error=$stmt->errorInfo();
            var_dump($error);
        }
    }
    public function Delete($pdo,$id){
        //$pdo= Database::getConn();
        
        $sql="DELETE FROM product WHERE id=:id";
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
    
        


        if($stmt->execute()){
            $id= $pdo->lastInsertId();
            //var_dump($id);
        }
        
    }

    public function Edit($pdo,$id){
        //$pdo= Database::getConn();
        
        $sql="UPDATE product SET name=:name ,type=:types,price= :price,image =:image WHERE id=:id";
        $stmt=$pdo->prepare($sql);
        
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $name=$this->name;
        $stmt->bindParam(':name',$name,PDO::PARAM_STR);
        $types=$this->type;
        $stmt->bindParam(':types',$types,PDO::PARAM_INT);
        $price=$this->price;
        $stmt->bindParam(':price',$price,PDO::PARAM_INT);
        $img=$this->img;
        $stmt->bindParam(':image',$img,PDO::PARAM_INT);


        if($stmt->execute()){
            $id= $pdo->lastInsertId();
            //var_dump($id);
        }
        
    }

    public static function getOneById($pdo, $id){
        //$pdo= Database::getConn();
        
        $sql="SELECT * FROM food WHERE id=:id";
        $stmt=$pdo->prepare($sql);
        $ids=$id;
        $stmt->bindParam(':id',$ids,PDO::PARAM_INT);

        if($stmt->execute()){
            $products= $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }
        else{
            $error=$stmt->errorInfo();
            var_dump($error);
        }
        $lines = $products;
        foreach ($lines as $line) {
           
            $product = new Product($line["id"],$line["name"],$line["type"],$line["price"],$line["img"]);

           
        
           
        }
        if(isset($product)){
            return $product;
        }
        return null;

    }

    public static function getLastId($data){
        $last = end($data);
        return $last->id ;

    }
}

?>