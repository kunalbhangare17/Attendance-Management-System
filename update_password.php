 <?php
 require('../config.php');
 extract($_POST);
 extract($_SESSION);

 
 if(isset($updpass))
 {
 
	$que=mysqli_query($con,"select * from admin where email='".$_SESSION['admin']."' and pass=password('$op')");
	
	$row= mysqli_num_rows($que);
	

	 if($row)
	 {
		if($np==$cp)
		{
		mysqli_query($con,"update admin set pass=password('$np') where email='".$_SESSION['admin']."'");
		$err="<font color='green'>Password Updated Successfully !</font>";
		}
		else
		{
		$err="<font color='red'>New Password and Confirm not matched</font>";
		}
	 }
	 else
	 {
	  $err="<font color='red'>Old Password doesn't match</font>";
	 }
 
 }
 ?>

<div class="well" style="background:#fff">
 <div class="row">
<div class="col-sm-1">
</div>
<div class="col-sm-9">

<div class="panel panel-default">
<div class="panel-body">

 <form method="post">
	<div class="form-group">
    <label for="exampleInputEmail1"><?php echo @$err;?></label>   
  </div> 
	 
	 
 
  <div class="form-group">
    <label for="exampleInputPassword1">Old Password</label>
    <input type="password" class="form-control" name="op" value="<?php echo @$op; ?>" id="exampleInputPassword1" placeholder="Old Password">
  </div>
  
   <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" class="form-control" name="np" value="<?php echo @$np; ?>" id="exampleInputPassword1" placeholder="New Password">
  </div>
  
   <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" name="cp" value="<?php echo @$cp; ?>" id="exampleInputPassword1" placeholder="Confirm Password">
  </div>
  
  

<br/>
<div class="form-group">
    <button name="updpass" class="btn btn-success" type="submit">Update Password</button>
</div>
	</form>	
		</div>
	</div>
</div>

	</div>	
	</div>