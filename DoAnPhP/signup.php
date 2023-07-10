<?php



    $fullnameError = '';
    $numberphoneError = '';
    $sexError ='';
    $usernameError='';
    $pass1Error='';
    $pass2Error='';
    $addressError='';
    
    require('inc/init.php');
    require('class/User.php');
   
    
    
    $db = new Database();
    $pdo = $db->getConn();
    $fullname = ' ';
    $numberphone = ' ';
    $sex =' ';
    $username=' ';
    $pass1=' ';
    $pass2=' ';
    $address=' ';


    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
		$fullname = $_POST['fullname'];
        $numberphone = $_POST['numphone'];
        $sex =$_POST['sex'];
        $username=$_POST['usname'];
        $pass1=$_POST['pass1'];
        $pass2=$_POST['pass2'];
        $address=$_POST['address'];

        if(empty($_POST['fullname'])){
            $fullnameError = 'fullname Name is required';

        }
        if(empty($_POST['numphone'])){
            $numberphoneError = 'numphone is required';

        }
        if(empty($_POST['sex'])){
            $sexError = 'sex Name is required';

        }
        if(empty($_POST['usname'])){
            $usernameError = 'usname is required';

        }
        if(empty($_POST['pass1'])){
            $pass1Error = 'Passworld is required';

        }
        if(empty($_POST['pass2'])){
            $pass2Error = 'Passworld is required';

        }
        if(empty($_POST['address'])){
            $addressError = 'address Name is required';

        }
        if(mb_strlen($numberphone)!=10 || ctype_digit($numberphone)== false){
            $numberphoneError="Invalid phone number";
        }
        if(strcmp($pass1,$pass2)!=0){
            $pass2Error="Passwords do not match";

        }
        if($fullnameError == ""&& $numberphoneError == ''&& $sexError ==''&& $usernameError==''&& $pass1Error==''&&   $pass2Error==''&& $addressError=='')
        {
            $pass1= password_hash($pass1,PASSWORD_DEFAULT);
            $data = User::getall($pdo);
            $newID= User::getLastId($data)+1;
            $u= new User($newID,$fullname,$numberphone,$sex,$username,$pass1,$address,"user");
            $u->add($pdo);
        }
        
    }
    
		

?>



<?php include('inc/header.php')?>
<!-- order section starts  -->

<section class="order" id="order">

    <h1 class="heading"> <span>order</span> now </h1>

    <div class="row">
        
        

        <form action="" method="post">

            <div class="inputBox">
                
                <input type="text" placeholder="Full name" name="fullname"><span class="span"><?= $fullnameError ?></span>
                <input type="text" placeholder="Number phone" name="numphone"><span class="span"><?= $numberphoneError ?></span>
            

            
                <input type="text" placeholder="sex" name="sex"><span class="span"><?= $sexError?></span>
                <input type="text" placeholder="user name" name="usname"><span class="span"><?= $usernameError ?></span>
                <input type="password" placeholder="pass world" name="pass1"><span class="span"><?= $pass1Error ?></span>
                <input type="password" placeholder="Enter the password" name="pass2"><span class="span"><?= $pass2Error ?></span>
            

                <textarea placeholder="address" name="address" id="address" cols="30" rows="10"></textarea><span class="span"><?=$addressError ?></span>
                
            </div>

            

            <input type="submit" value="Sign up" class="btn">

        </form>

    </div>

</section>

<!-- order section ends -->
<?php include('inc/footer.php');?>