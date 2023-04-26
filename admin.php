<?php
session_start();

	if($_SESSION['admin']!='admin')
		header("Location:home.php");
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Admin - Dia Diet</title>
      <link rel="stylesheet" href="css/adminpage.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <nav>
         <label class="logo">Dia Diet</label>
         <ul>
            <li><a class="active" href="admin.php">  <i class="fa fa-users"></i> User's Details</a></li>
            <li><a href="user/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
         </ul>
      </nav>
	 <?php
      if($_SESSION['admin']=='admin' )
         {
            $con=new mysqli("localhost","root","","diadiet");
            if(!$con)
            {
               echo "There is an error while connecting to database";
            }
            $quer="SELECT * from user_details order by firstname,lastname asc";
            $select=mysqli_query($con,$quer);
            $rows=mysqli_num_rows($select);
            if($rows==0)
            {
               echo "<br>". "<h2><center><font color=red>No Users Found</font><strong></strong></center><h2>";
            }
            else
            {
               echo "<div class='table1'>
               <table class='table2'>
                  <tr class='tr1'>
                     <td colspan='6' id='tablehead'><b> User's Details</b></td>
                  </tr>
                  <tr class='tr1'>
                     <td class='td1'><b>First Name</b></td>
                     <td class='td1'><b>Last Name</b></td>
                     <td class='td1'><b>Email</b></td>
                     <td class='td1'><b>Gender</b></td>
                     <td class='td1'><b>Phone Number</b></td>
                     <td class='td1'><b>Password</b></td>
                  </tr>";
                  while($data=mysqli_fetch_assoc($select))
                  {
                     echo "<tr >
                              <td class='td1'>".$data['firstname']."</td>                   
                              <td class='td1'>".$data['lastname']."</td>
                              <td class='td1'>".$data['email']."</td>
                              <td class='td1'>".$data['gender']."</td>
                              <td class='td1'>".$data['phonenumber']."</td>
					               <td class='td1'>".$data['password']."</td>
                           </tr>";
                  }
                  echo "</table>";
                  echo "</div>";
            }
         }
		else
		{
			header("Location:home.php");
		}
                ?>
     
   </body>
</html>
