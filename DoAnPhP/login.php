<?php
    require('class/Database.php');
    require('inc/init.php');
    require('class/Auth.php');
    $acnameError = '';
    $passError = '';
    $acname = '';
    $pass = '';
    $db = new Database();
    $pdo = $db->getConn();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $acname = $_POST['acname'];
        $pass = $_POST['pass'];
		
        if(empty($_POST['acname'])){
            $acnameError = 'Account Name is required';

        }
        if(empty($_POST['pass'])){
            $passError = 'Passworld is required';

        }
        if($acnameError=="" && $passError==""){
			$acname = strtolower($acname);
            $error= Auth::login($pdo,$acname,$pass);
            
        }   
        
    }
    
		

?>
<head>

<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f1f1f1;
		}
		
		.container {
			background-color: #ffffff;
			padding: 20px;
			margin: 50px auto;
			max-width: 500px;
			box-shadow: 0px 0px 10px #ccc;
			border-radius: 5px;
		}
		
		h2 {
			text-align: center;
			margin-top: 0;
		}
		
		input[type=text], input[type=password] {
			padding: 10px;
			width: 100%;
			border: none;
			border-bottom: 1px solid #ccc;
			margin-bottom: 10px;
			box-sizing: border-box;
		}
		
		button {
			background-color: #4caf50;
			color: #ffffff;
			padding: 10px 20px;
			border: none;
			border-radius: 3px;
			cursor: pointer;
			float: right;
			margin-top: 10px;
		}
		
		button:hover {
			background-color: #3e8e41;
		}
	</style>
</head>

<?php include('inc/header.php');?>
<br><br><br><br><br><br>

<body>
	<div class="container">
		<h2>Đăng nhập</h2>
		<form method="post">
			<label for="username"><b>Tên đăng nhập</b></label>
			<input type="text" placeholder="Nhập tên đăng nhập" id="acname" name="acname"  required><span class="span"><?= $acnameError ?></span>

			<label for="password"><b>Mật khẩu</b></label>
			<input type="password" placeholder="Nhập mật khẩu" id="pass" name="pass"  required><span class="span"><?= $passError ?></span>
			
			<a href="signup.php" > Đăng ký </a>
			<button type="submit">Đăng nhập </button>
			
		</form>
		
	</div>
</body>
<br><br><br><br><br><br>

<?php include('inc/footer.php');?>