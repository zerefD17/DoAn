<?php 
require('Database.php');
class User
{
    public $id;
    public $fullname;
    public $numberphone;
    public $sex;
    public $accname;
    public $pass;
    public $address;
    public $power;


    public function __construct($id='',$name='',$nump='',$sex='',$acc='', $pa ='', $addr='',$pow=''){
        $this->id = $id;
        $this->fullname = $name;
        $this->numberphone= $nump;
        $this->sex= $sex;
        $this->accname= $acc;
        $this->pass= $pa;
        $this->address= $addr;
        $this->power= $pow;
    }
    public static function getall($pdo){
        // $pdo= Database::getConn();
        
        $sql="SELECT * FROM user";
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
            $us= new User($line["id"],$line["name"],$line["sdt"],$line["gioitinh"],$line["accname"],$line["pass"],$line["diachi"],$line["power"]);
            
            
            
        
            $data[] = $us;
        }
        //var_dump($data);      
        return $data;
        
    }
    
    public function add($pdo){
        /////
        $sql = "INSERT INTO user(name, sdt, diachi, gioitinh, accname, pass, power) VALUES(:name, :np, :addr, :sex, :accn, :pass, :pow)";
        $stmt = $pdo->prepare($sql);

        $fullname = $this->fullname;
        $stmt->bindParam(':name', $fullname, PDO::PARAM_STR);
        $np = $this->numberphone;
        $stmt->bindParam(':np', $np, PDO::PARAM_STR);
        $addr = $this->address;
        $stmt->bindParam(':addr', $addr, PDO::PARAM_STR);
        $accn = $this->accname;
        $stmt->bindParam(':accn', $accn, PDO::PARAM_STR);
        $pass = $this->pass;
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
        $sex = $this->sex;
        $stmt->bindParam(':sex', $sex, PDO::PARAM_STR);
        $pow = "user";
        $stmt->bindParam(':pow', $pow, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $id = $pdo->lastInsertId();
        } else {
            $error = $stmt->errorInfo();
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

    // public function Edit($pdo,$id){
    //     //$pdo= Database::getConn();
        
    //     $sql="UPDATE product SET name=:name ,type=:types,price= :price,image =:image WHERE id=:id";
    //     $stmt=$pdo->prepare($sql);
        
    //     $stmt->bindParam(':id',$id,PDO::PARAM_INT);
    //     $name=$this->name;
    //     $stmt->bindParam(':name',$name,PDO::PARAM_STR);
    //     $types=$this->type;
    //     $stmt->bindParam(':types',$types,PDO::PARAM_INT);
    //     $price=$this->price;
    //     $stmt->bindParam(':price',$price,PDO::PARAM_INT);
    //     $img=$this->img;
    //     $stmt->bindParam(':image',$img,PDO::PARAM_INT);


    //     if($stmt->execute()){
    //         $id= $pdo->lastInsertId();
    //         //var_dump($id);
    //     }
        
    // }

    // public static function getOneById($pdo, $id){
    //     //$pdo= Database::getConn();
        
    //     $sql="SELECT * FROM product WHERE id=:id";
    //     $stmt=$pdo->prepare($sql);
    //     $ids=$id;
    //     $stmt->bindParam(':id',$ids,PDO::PARAM_INT);

    //     if($stmt->execute()){
    //         $products= $stmt->fetchAll(PDO::FETCH_ASSOC);
            
    //     }
    //     else{
    //         $error=$stmt->errorInfo();
    //         var_dump($error);
    //     }
    //     $lines = $products;
    //     foreach ($lines as $line) {
           
    //         $product = new Product($line["id"],$line["name"],$line["type"],$line["price"],$line["image"]);

           
        
           
    //     }
    //     if(isset($product)){
    //         return $product;
    //     }
    //     return null;

    // }

    public static function getLastId($data){
        $last = end($data);
        return $last->id ;

    }
}

?>