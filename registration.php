<?php
   session_start();
   $_SESSION['user']="";
   $_SESSION['admin']="";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
	
    <link rel="stylesheet" href="css/admin.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  
  
	<link rel="stylesheet" href="css/admin.css">
	<style type="text/css">
		body
		{
			color:white;
		}
		input[type=text],input[type=email],input[type=password],input[type=integer]{	
			width: 145%;
			height:37px;
			border-radius: 5px;
			border: 2px solid black;
			font-size: 15px;
			position: relative;
		}
		input[type=file]{
			width: 300px;	
	
			border-radius: 5px;
		}
		.container
		{
			width: 500px;
    			margin: 25 auto 0 auto;
  		  	padding: 20px;
   			background-color: white;
    			border-radius: 4px;
    			font-size: 12px;
			height: flex;
			background-color:#063247;
			
		}
		#h1{
			color: blue;
		}
		#btn{
			width: 50%;
			height:35px;
			border-radius: 5px;
			border: 2px solid black;
			font-size: 15px;
			background-color: #0AA1DD;
			color: white;
			font-size:20px;
			
			position: relative;
			
			left: 40%;
			right: 40%;
			margin-top: 2px;;
	
		}#btn:hover
		{
			background-color: green;
			
		}
		span{
			color: red;
			font-size: 16px;
			position:absolute;
			margin-bottom: 5px;	
		}
		
		.container a{
			color: #0ac5cc;
		}
	</style>
</head>
<body >
	<nav>
		<label class="logo">Dia Diet</label>
		<ul>
		   <li><a  href="home.php"><i class="fa fa-home"></i> Home</a></li>
		   <li><a  href="about_us.php"><i class="fa fa-address-book"></i> About Us</a></li>
		   <li> <a  href="contact_us.php"><i class="bi bi-telephone"></i> Contact Us</a></li>
		   <li><a class="active" href="login.php"><i class="fa fa-user-circle " ></i> Login/Register</a></li>
		</ul>
	 </nav>
	<div class="container">
	<?php
	if(isset($_POST['submit']))
	{
		
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$phone=$_POST['phone'];
		$password=$_POST['password'];
		$filename=$_FILES['profile_pic']['name'];
		$tempname=$_FILES['profile_pic']['tmp_name'];
		$imageExt=explode('.',$filename);
		$target="profilePics/";
		$imageExt=strtolower(end($imageExt));
		$newname=uniqid();
		$newname.='.'.$imageExt;
		$des=$target.$newname;
		$con=new mysqli("localhost","root","","diadiet");

		
			if(!$con)
				echo "There is an Error while database connecting";
			$sel="select email from user_details where email='$email'";	
			$qu=mysqli_query($con,$sel);
			if(!mysqli_num_rows($qu))
			{
					if(!@move_uploaded_file($_FILES['profile_pic']['tmp_name'],$des))
					{
						$newname="dummy.png";
					};
					$ins="INSERT INTO `user_details`(`firstname`, `lastname`, `email`, `profilepic`, `phonenumber`,`gender`,  `password`) 
					    VALUES ('$fname','$lname','$email','$newname','$phone','$gender','$password')";	
					$que=mysqli_query($con,$ins);
					$to=$email;
					/*$from="info@edgroom.com";
					$fromname="Edgroom";
					$subject="Reg: Registration Successful";
					$htmlContent='<html>
					<head>
						<title>Welcome </title>
					</head>
					<body  align="center">
						<h1 style="color:blue">Welcome </h1>
						<h3 style="color:green">Thanks for joining with us</h3>
						<p>This is auto generated email. Your Registration is Successful</p>
					</body>
					</html>
					';
					$header='From: '.$fromname.'<'.$from.'>';
					mail($to,$subject,$htmlContent,$header);*/
					echo("<font color = green><center><b>Sucessfully registered</center></b></font>");

				
			}
		
			else
			{
				echo "<font color = red><center><b>Account already exist with this Email Id.</center></b></font>";
			}
		
	}
	
?>
<br>
	<h1 align ='center' style="color: #0ac5cc;" id='h1'>Sign Up</h1>
	<form action="" autocomplete="off" onsubmit="return validation()" enctype="multipart/form-data" method="POST">
		<table  cellspacing="15">
			
			<tr><td>
				First Name:<br><input type="text" id="fname" placeholder="Enter First Name.." name="fname">
				<br><span id='fnamee'></span>
			</td></tr>
			<tr><td>
				Last Name:<br><input type="text" id="lname" placeholder="Enter Last Name..." name="lname">
				<br><span id='lnamee'></span>
			</td></tr>
			<tr><td>
				Email:<br><input type="email" id="email" placeholder="Enter Email Id..." name="email">
				<br><span id='emaill'></span>
			</td></tr>
			<tr><td>
				Profile Picture:<br><input type="file" id="profile_pic" placeholder="" accept=".png, .jpg, .jpeg" name="profile_pic">
				<br><span id='profile_picc'></span>
			</td></tr>
			<tr><td>
				Gender:<input type="radio" id="male" placeholder="" name="gender" value="Male">Male
				<input type="radio" id="female" placeholder="" name="gender" value="Female">Female
				<br><span id='gender'></span>
			</td></tr>
			<tr><td>
				Phone Number:<br><input type="integer" id="phone" placeholder="9618xxxxxxx" name="phone">
				<br><span id='phonee'></span>
			</td></tr>
			<tr><td>
				Password:<br><input type="password" id="password" placeholder="Password..." name="password">
				<br><span id='passwordd'></span>
			</td></tr>
			<tr><td><input type="submit" id="btn" placeholder="Password..." name="submit" value="Sign Up"></td></tr>
			<tr><td><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="login.php">Click Here To Login</a></center></td></tr>
		</table>
		

	</form>
	<script>
		function validation()
		{
			var fname=document.getElementById('fname').value;
			var lname=document.getElementById('lname').value;
			var email=document.getElementById('email').value;
			var profile_pic=document.getElementById('profile_pic');
			var phone=document.getElementById('phone').value;
			var password=document.getElementById('password').value;
			const isValidEmail = email => {
   			const re = /^([\w]*[\w\.]*(?!\.)@gmail.com)$/;
   		 	return re.test(String(email).toLowerCase());}
			var flag1=1;
			var flag2=1;
			var flag3=1;
			var flag4=1;
			var flag5=1;
			var flag6=1;
			var flag=1;
			var gen="";
			if(fname.trim()=="")
			{
				document.getElementById('fnamee').innerHTML="**Enter First Name**";
				flag1=0;
				
				
			}
			else if(fname.trim().length<3)
			{
				document.getElementById('fnamee').innerHTML="**First Name required atleast 3 characters**";
				flag1=0;
				
			}
			else
			{
				document.getElementById('fnamee').innerHTML="";
				flag1=1;
			}
			
			if(lname.trim()=="")
			{
				document.getElementById('lnamee').innerHTML="**Enter Last Name**";
				flag2=0;
				
			}
			else if(lname.trim().length<1)
			{
				document.getElementById('lnamee').innerHTML="**Last Name required atleast 1 character**";
				flag2=0;
				
			}
			else
			{
				document.getElementById('lnamee').innerHTML="";
				flag2=1;
			}
			
			
			
			if(email=='')
			{
				document.getElementById('emaill').innerHTML="**Enter Email Id**";
				flag3=0;
			}
			else if(!isValidEmail(email))
			{
				document.getElementById('emaill').innerHTML="**Enter valid Gmail Id**";
				flag3=0;
			}
			else
			{
				document.getElementById('emaill').innerHTML="";
				flag3=1;
			}
			  
     		if(profile_pic.files.length<1)
			 {
				document.getElementById('profile_picc').innerHTML="**Upload FIle for profile picture**";
				flag4=0;
			 }
			 else if(profile_pic.files.length>0)
			 {
					const fsize=profile_pic.files.item(0).size;	
					const file=Math.round((fsize/1024));
					if(file>2048)
					{
						document.getElementById('profile_picc').innerHTML="** File Must be less than 2MB**";
							flag4=0;
					}
					else
					 {
					document.getElementById('profile_picc').innerHTML="";
						flag4=1;
				 }
					

			 }
			 
				
			if(document.getElementById('male').checked==true)
			{
				gen="Male";
				document.getElementById('gender').innerHTML="";
				flag=1;
			}
			else if(document.getElementById('female').checked==true)
			{
				gen="Female";
				document.getElementById('gender').innerHTML="";
				flag=1;
			}
			else 
			{
				document.getElementById('gender').innerHTML="**Select Gender**";
				flag=0;
			}
                	if(phone=="")
			{
				document.getElementById('phonee').innerHTML="**Enter Phone Number**";
				flag5=0;
			}
			else if(isNaN(phone))
			{
				document.getElementById('phonee').innerHTML="**Enter valid mobile number**";
				flag5=0;	
			}
			else if(phone.length<10 || phone.length>10)
			{
				document.getElementById('phonee').innerHTML="**Enter 10 digit mobile number**";
				flag5=0;
			}
			else
			{
				document.getElementById('phonee').innerHTML="";
				flag5=1;
			}
			if(password=='' || password.length<8 || password.length>30)
			{
				document.getElementById('passwordd').innerHTML="**Password requires atleast 8 characters and atmost 30 characeters**";
				flag6=0;
			}
			else if((password.search(/[A-Z]/)==-1 )|| (password.search(/[0-9]/)==-1 )|| (password.search(/[!\@\#\$|%|^|&\*\(\)\_\-\+\=\\\;\'\:\"\<\>\?\/\?]/)==-1 ))
			{
				document.getElementById('passwordd').innerHTML="**It requires 1 Capital,1 digit,1 special character**";
				flag6=0;
			}
			else
			{
				document.getElementById('passwordd').innerHTML="";
				flag6=1;
			}
			
				


			if(flag && flag1 && flag2 && flag3 && flag4 && flag5 && flag6)
				return true;
			else
				return false;
	}
	</script>
	</div>
</body>
</html>
