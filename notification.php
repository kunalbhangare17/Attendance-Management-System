<div class="well" style="background:#fff;padding:5px">
  <div class="row">
	<div class="col-lg-2" style="margin-bottom:10px">	<a title="Add notification to Instructor" class="btn btn-warning" href="index.php?option=notification_add">Sent Notification</a></th></div>
  </div>
  <div class="row">
    	 	
                <div class="col-lg-12">
  <table class="table table-striped table-responsive table-bordered" id='example'>
	   	
		<thead>
		<th>Sr. No</th>
		<th>Instructor</th>
		<th>Subject</th>
		<th>Notification</th>
		<th>Date</th>
		<th>Delete</th>
		
		</thead>
		 <tbody>
<?php
	$que=mysqli_query($con,"select * from  notification");
		while($row= mysqli_fetch_array($que))
	{?>
	<tr>
		<Td><?php echo $row[0];?></Td>
		<Td><?php echo $row[2];?></Td>
		<Td><?php echo $row[3];?></Td>
		<Td><?php echo $row[4];?></Td>
		<Td><?php echo $row[5];?></Td>
		

<td>
<?php 
$email= $row[1];
$msgid= $row[0];
$to= $row[2];
?>
<?php echo "<a href='notification_Delete.php?eid=$email&msgid=$msgid'><span class='glyphicon glyphicon-remove' style='color:red' aria-hidden='true'></span></a>";?>
</td>



	</tr>
	
	<?php } ?>
   <tbody>
  </table>
  
 </div>
</div>
</div>
 
   <script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]});
        } );
    </script>
