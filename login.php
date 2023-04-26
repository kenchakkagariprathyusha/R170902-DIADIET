<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Dia Diet</title>
      <link rel="stylesheet" href="css/admin.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <style>
          
          .in{	
			width: 170%;
			height:37px;
			border-radius: 5px;
			
			font-size: 15px;
			margin-left: -40%;
            margin-top:4px;
		}
		#txt{
			font-size: 25px;
			margin-left: -40%;
            color:white;
		}
		input[type=file]{
			width: 300px;
			height:35px;
			border-radius: 5px;
		}
		.container
		{
			width: 40%;
            height:50%;
    		margin-left: 30%;
			margin-right: 30%;
			margin-top: auto;
			margin-bottom: auto;
  		  
			position: fixed;
			bottom: 30%;
   			background-color:#063247;
    		border-radius: 4px;
    		font-size: 12px;
			height: flex;
            border: 2px solid black;
			
		}
		.container #h1{
			color: #0ac5cc;
			text-align: center;
            font-size:35px;
		}
		.container #btn{
			width: 50%;
			height:35px;
			border-radius: 5px;
			border: 2px solid black;
			font-size: 15px;
			background-color: #0AA1DD;
			color: white;
			font-size:20px;
			margin: 0;
			position: relative;
			
			margin-left: 30%;
			margin-right: 45%;
            margin-top: 5%;
	
		}
        .container #btn:hover
		{
			background-color: green;
			width: 55%;
			height:37px;
		}
		.container span{
			color: red;
			font-size: 16px;
			text-align: center;
		}
        .container .t1{
			margin-left: 30%;
			margin-right: 30%;
		}
        .container a
        {
            font-size:19px;
            color: #0ac5cc;
        }
      </style>
   </head>
   <body>
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
		
        <h1 id='h1'>Login</h1>
            <form id="form" action=""  method='POST'>
            <table  cellspacing="15" class="t1">
                
                <tr><td>
                    <lable id="txt">User Id:</lable><br><input type="text" id="email" placeholder="Enter User Id.." name="email" class="in" required>
                    
                </td></tr>
                <tr><td>
                <lable id="txt">Password:</lable><br><input type="password" id="password" placeholder="Enter Password..." name="password"class="in"required>
                    
                </td></tr>
                <tr><td><input type="submit" id="btn" placeholder="" name="submit" value="Sign In"><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="registration.php">Click Here to Sign Up</a>
                <br>
                <span id="error"></span></td></tr>
                
        </table>
            </form>
        <?php
        session_start();
        $_SESSION['user']='';
        $_SESSION['admin']='';
        if(isset($_POST['submit']))
        {
            $email=$_POST['email'];
            $password=$_POST['password'];
            if($email=='admin' && $password=='admin')
            {
                $_SESSION['admin']='admin';
                header("Location:admin.php");
            }
            $con=new mysqli("localhost","root","","diadiet");
            if(!$con)
                echo "There is an error while database connection";
            $sel="select * from user_details where email='$email'";
            $query=mysqli_query($con,$sel);
            if(mysqli_num_rows($query))
            {
                $data=mysqli_fetch_assoc($query);
                if($data['password']==$password){
                    $_SESSION['user']=$email;
                header("Location:user/userhome.php");
                }
                else
                {
                    echo "<script>document.getElementById('error').innerHTML='**Incorrect Password**';</script>";
                }
                
            
            }
            else
                {
                    echo "<script>document.getElementById('error').innerHTML='** No Account Found With Entered Email Id**';</script>";
                }
        }
        ?> 
        
    
        </div>
     
   </body>
</html>
