
<?php
        session_start();
        if(isset($_POST['connecter'])){
            include('../model/bd.php');
        $user= $_POST['user'];
        $password = $_POST['password'];
    
        if($user == "admin" && $password =="hanout"){
			$_SESSION['authenticated'] = true;
            header('location:dashboard.php');
            
        }
        else {
            echo '<script>alert("Erreur d\'authentification");</script>';
        }
    } 
    ?>

<!DOCTYPE html>
<html>
<head>
	<title>P-STORE ADMIN</title>
	<!--Google Font-->
	<link href="https://fonts.googleapis.com/css?family=Ubuntu:500" rel="stylesheet">
	<!--Jquery CDN-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--Fontawesome CDN-->
	<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

     <style>
        	body{
			background-color: #5E7B84;
            padding-left: 450px;
    }
		.backg{
			position: absolute;
           }
		.login{
			height:220px;
			width: 280px;
			background-color: white; 
			position: relative;
			top:190px;
			left:25px;
			padding-left: 30px;
			box-sizing: border-box;
			z-index: 1;		
			padding-top: 50px;


		}
		.frm{
			position: relative;
			top:50px;
			
		}
		.face{
			height: 120px;
			width: 135px;
			background-color: white;
			border-radius:120px 120px 90px 90px;
			position: relative;
			bottom: 40px;
		}
		.earl,.earr{
			background-color: #072A40

;
			height: 40px;
			width: 45px;
			border-radius: 43px 43px 0 0;
		}
		.earl{
			transform: rotate(-38deg);
			-webkit-transform: rotate(-38deg);
			position: relative;
			top:31px;
			right: 2px;
		}
		.earr{
			transform: rotate(38deg);
			-webkit-transform: rotate(38deg);
			position: relative;
			bottom:8px;
			left:96px;
		}
		.panda{
			position: relative;
			bottom:190px;
			left:100px;

		}
		.eyel,.eyer{
			background-color: #072A40

;
			height: 35px;
			width: 32px;
			border-radius:32px; 
			position: relative;	
		}
		.eyel{
			top:5px;
			left:22px;
			transform:rotate(-20deg); 
			-webkit-transform:rotate(-20deg); 
				
		}
		.eyer{
			transform: rotate(20deg);
			-webkit-transform: rotate(20deg);
			bottom:30.5px;
			left:80px;
		}
		.blshl,.blshr{
			background-color:#F9CB40;
			height: 16px;
			width:22px;  
			border-radius: 50%;
			position: relative;
			opacity: 0.8;
		}
		.blshl{
			transform: rotate(25deg);
			-webkit-transform: rotate(25deg);
			position: relative;
			top:64px;
			left:17px;
		}
		.blshr{
			transform: rotate(-25deg);
			-webkit-transform: rotate(-25deg);
			position: relative;
			top:46px;
			left:95px;
		}
		.eyeball1,.eyeball2{
			height: 10px;
			width: 10px;
			background-color: white;
			border-radius: 50%;
			position: relative;
			transition:1s all;
			-webkit-transition:1s all;
		}
		.eyeball1{
			left:10px;
			top:10px;
			transform: rotate(20deg);
			-webkit-transform: rotate(20deg);
			
		}
		.eyeball2{
			left:10px;
			top:10px;
			transform: rotate(-20deg);
			-webkit-transform: rotate(-20deg);
		}
		.nose{
			height:17px;
			width: 17px;
			background-color: #072A40

;
			border-radius: 20px 0px 4px;
			transform: rotate(45deg);
			-webkit-transform: rotate(45deg);
			position: relative;
			bottom: 30px;
			left:60px;  
		}
		.line{
			background-color: #072A40

;
			height:10px;
			width:2px;
			position: relative;
			transform:rotate(-45deg);
			-webkit-transform:rotate(-45deg);
			left:18.5px;
			top:15px;

		}
		.m,.mm{
			background-color: #072A40

;
			height:8px; 
			width: 15px;
			border-radius:0 0 8px 8px;
			position: relative;
			 
		}
		.m{
			bottom: 21px;
			left:53px;
		}
		.m1{
			height: 6px;
			width: 13px;
			background-color: white;
			border-radius: 0 0 10px 10px;
			position: relative;
			left:1px;
			bottom:1px;
		}
		.mm{
			bottom: 30px;
			left:68.5px;
		}
		.handl,.handr{
			background-color:#072A40

;
			height:45px;
			width: 35px;
			border-radius:10px 10px 30px 30px;  
			z-index: 2;
			transition:1s all;
			-webkit-transition:1s all;
		}
		.handl{
			position: relative;
			bottom: 140px;
			left: 50px;
		}
		.handr{
			position: relative;
			bottom:185px;
			left:250px;
		}
		.pawl,.pawr{
			background-color: #072A40

;
			height: 50px;
			width: 50px;
			border-radius: 40px 40px 20px 20px;
			position: relative;
			z-index: 2;

		}
		.pawl{
			top:170px;
			left:80px;
		}
		.pawr{
			top:120px;
			left:200px;
		}
		.p1{
			background-color: white;
			height: 25px;
			width: 30px;
			position: relative;
			top:21px;
			left:10px;
			border-radius: 25px 25px 10px 10px;
		}
		.p2,.p3,.p4{
			background-color:white;
			height: 10px;
			width: 10px;
			border-radius: 50%;
			position: relative;
		}
		.p2{
			bottom:13px;
			left:9.5px;
		}
		.p3{
			bottom:17.2px;
			right:2.5px;
		}
		.p4{
			bottom:27.2px;
			left:22px;
		}
		span{
			color:#072A40

;
    		font-family: 'Ubuntu', sans-serif;
		}
		input{
			color: #072A40

;
			width: 180px;
			border:none;
			outline: none;
			border-bottom: 1px solid #072A40

;
			font-family: 'Ubuntu', sans-serif;
		}
	.fa{
		color:#072A40

; 
		font-size: 20px;
		outline: none;
	}
	.btn{
		background-color: #F9CB40;
		outline: none;
		border:none;
		color: white;
		font-family: 'Ubuntu', sans-serif;
		font-size: 23px;
		text-transform: uppercase;
		padding: 5px;
		position: relative;
		left:20px;
	}
     </style>


</head>
<body>
	<form class="login" action="" method="post" >
			
				<i class="fa fa-user" aria-hidden="true">&nbsp;&nbsp;</i><input name=user type="text" /><br><br>
				<i class="fa fa-unlock-alt" aria-hidden="true">&nbsp;&nbsp;</i><input type="password"  name="password"><br><br>
				<input type="submit"  class="btn" value="LOGIN" name="connecter">
                
			
</form>
	<div class="backg">
		<div class="panda">
			<div class="earl"></div>
			<div class="earr"></div>
			<div class="face">
				<div class="blshl"></div>
				<div class="blshr"></div>
				<div class="eyel">
					<div class="eyeball1"></div>
				</div>
				<div class="eyer">
					<div class="eyeball2"></div>
				</div>
				<div class="nose">
					<div class="line"></div>
				</div>
				<div class="mouth">
					<div class="m">
						<div class="m1"></div>
					</div>
					<div class="mm">
						<div class="m1"></div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<div class="pawl">
		<div class="p1">
				<div class="p2"></div>
				<div class="p3"></div>
				<div class="p4"></div>
				</div>
			</div>
	<div class="pawr">
		<div class="p1">
			<div class="p2"></div>
			<div class="p3"></div>
			<div class="p4"></div>
		</div>
	</div>
	<div class="handl"></div>
	<div class="handr"></div>

    <script>
$(document).ready(function(){
			$(":text").focus(function(){
				$(".handl").css({
					transform: 'rotate(0deg)',
					bottom: '140px',
					left:'50px',
					height:'45px',
					width:'35px'
				});
				$(".handr").css({
					transform: 'rotate(0deg)',
					bottom: '185px',
					left:'250px',
					height:'45px',
					width:'35px'
				});
				$(".eyeball1").css({
					top: '20px',
					left: '13px'
				});
				$(".eyeball2").css({
					top: '20px',
					left: '8px'
				});
			});
			$(":password").focus(function(){
				$(".eyeball1").css({
					top: '10px',
					left: '10px'
				});
				$(".eyeball2").css({
					top: '10px',
					left: '10px'
				});
				$(".handl").css({
					transform: 'rotate(-150deg)',
					bottom: '215px',
					left:'105px',
					height:'90px',
					width:'40px'
				});
				$(".handr").css({
					transform: 'rotate(150deg)',
					bottom: '308px',
					left:'192px',
					height:'90px',
					width:'40px'
				});
			});
		});
        </script>
  
</body>
</html>