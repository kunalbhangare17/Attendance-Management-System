<?php
 session_start();
error_reporting(1);
require('../config.php');
 extract($_SESSION);
 if($admin=="")
 {
 header('location:login.php');
 }
 
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/dashboard.css" rel="stylesheet">

    <script src="../js/ie-emulation-modes-warning.js"></script>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" style="background:#fff;border-bottom:1px solid #ccc">
      <div class="container-fluid" >
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="color:#337ab7"><?php echo "welcome ".$admin;?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right" >
		  
		  <?php 
		if(file_exists("img/$admin"))
		{
		$arr=scandir("img/$admin");
		$img=$arr[2];
		$path="img/".$admin."/".$img;
		?>
		<li><a href="index.php?option=upload_profile_pic" style="color:#FFFFFF"><img style="border-radius:20px" src="<?php echo $path;?>" width="30" height="30"/></a></li>
		<?php 
		}else{
		?>
		
		<li><a href="index.php?option=upload_profile_pic" style="color:#FFFFFF"><img src="img/user.png" style="border-radius:20px" width="30" height="30"/></a></li>
            <?php } ?>
		  
            <li><a href="logout.php" style="color:#337ab7"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
         
        </div>
      </div>
    </nav>

    <div class="container-fluid" >
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar" style="background:#fff">
          <ul class="nav nav-sidebar">
			            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="index.php?option=category"><span class="glyphicon glyphicon-asterisk"></span> Lecture</a></li>
			<li><a href="index.php?option=Instructor"><span class="glyphicon glyphicon-user"></span> Teacher</a></li>
			<li><a href="index.php?option=Student"><span class="glyphicon glyphicon-user"></span> Student</a></li>
			<li><a href="index.php?option=view_attendance"><span class="glyphicon glyphicon-book"></span> View Attendance</a></li>
	
	<li><a href="index.php?option=notification"> <span class="glyphicon glyphicon-map-marker"></span> Notification</a></li>
    <li><a href="index.php?option=contact"><span class="glyphicon glyphicon-phone"></span> Contact us</a></li>
			<li><a href="index.php?option=update_password"><span class="glyphicon glyphicon-cog"></span> Update Password</a></li>
			
          </ul>
          
        </div>
		<!-- sidebar end-->
        
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<?php 
			$option=$_REQUEST['option'];
			if($option!="")
			{
				
				if($option=="category")
				{
				include('category.php');
				}
				
				if($option=="update_category")
				{
				include('update_category.php');
				}
				
				
				if($option=="add_category")
				{
				include('add_category.php');
				}
				
				if($option=="view_attendance")
				{
				include('view_attendance.php');
				}
				if($option=="view_attendance_details")
				{
				include('view_attendance_details.php');
				}
				
				if($option=="upload_profile_pic")
				{
				include('upload_profile_pic.php');
				}
				if($option=="contact")
				{
				include('contact.php');
				}
				
				
				
				if($option=="Instructor")
				{
				include('Instructor.php');
				}
				
				if($option=="add_instructor")
				{
				include('add_instructor.php');
				}
				
				if($option=="update_password")
				{
				include('update_password.php');
				}
				
				if($option=="Student")
				{
				include('Student.php');
				}
				
				if($option=="add_student")
				{
				include('add_student.php');
				}
				
				
				if($option=="assign_instructor_student")
				{
				include('assign_instructor_student.php');
				}
				
				if($option=="notification")
				{
				include('notification.php');
				}
				if($option=="notification_add")
				{
				include('notification_add.php');
				}
				
			}else{
			?>
			
			<div  class="well" style="background:#fff;padding:10px">
			<h1 class="page-header text-center text-primary">Admin Dashboard</h1>
		<div class="row">	
		<?php
		    //$que=mysql_query("select id from supervisor where email='$sup'");
$c=mysqli_query($con,"SELECT count(*) as total from category ");
$cat=mysqli_fetch_assoc($c);
$catt=$cat['total'];
			
			
			
			$result=mysqli_query($con,"SELECT count(*) as total from student ");
$data=mysqli_fetch_assoc($result);
$countstu=$data['total'];



$r=mysqli_query($con,"SELECT count(*) as total1 from instructor ");
$d=mysqli_fetch_assoc($r);
$c=$d['total1'];



$r=mysqli_query($con,"SELECT count(*) as total1 from instructor where status='0'");
$d=mysqli_fetch_assoc($r);
$c=$d['total1'];


$r=mysqli_query($con,"SELECT count(*) as total1 from instructor where status='1'");
$d=mysqli_fetch_assoc($r);
$c=$d['total1'];

echo "<div class='col-lg-4'>";
echo "<a href='index.php?option=category'><h3 style='color:#fff;width:250px' class='btn btn-success'>Total Lectures/Course: <span stye='color:green'> $catt</span></h3></a><hr/>";
echo "</div>";


echo "<div class='col-lg-4'>";
echo "<a href='index.php?option=Student'><h3 style='color:#fff;width:250px' class='btn btn-success'>Total Registered Students : <span stye='color:green'> $countstu</span></h3></a><hr/>";
echo "</div>";

echo "<div class='col-lg-4'>";
echo "<a href='index.php?option=Instructor'><h3 style='color:#fff;width:250px' class='btn btn-success'>Total Registered Teacher :  $c</h3></a><hr/>";
echo "</div>";


echo "<div class='col-lg-4'>";
echo "<a href='index.php?option=Instructor'><h3 style='color:#fff;width:250px' class='btn btn-success'>Total Active Teacher :  $c</h3></a><hr/>";
echo "</div>";


echo "<div class='col-lg-4'>";
echo "<a href='index.php?option=Instructor'><h3 style='color:#fff;width:250px' class='btn btn-success'>Total Deactive Teacher :  $c</h3></a>";
echo "</div>";



		   ?>
		 </div>  
		  </div>

         <?php }?>
		 
		  
        </div>
      </div>
    </div>

  </body>
</html>
