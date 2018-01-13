<?php //include('header.php'); ?>

        <div id="page-wrapper" style="background:#fff;padding:20px;color:#000">
 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center text-danger">
                           All Course/Lecture Details
                        </h1>
                    </div>
                </div>
            <div class="row">
							<div class="col-lg-10"></div>
			<div class="col-lg-2">
			<a title="Add New Instructor" href="index.php?option=add_instructor" class="btn btn-warning">Add New Instructor</a>
</div>
            
			<div class="row">
                
                <div class="col-lg-12">
                    <table class="table table-striped table-responsive table-bordered" id='example'> 
                        
						<thead>
								<th>Sr. No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Mobile</th>
		<th>Programme</th>
		<th>Lecture/Subject</th>
		<th>Status</th>
		<th>Delete</th>
						</thead>
                        <tbody>
                <?php
                $record = mysqli_query($con,"SELECT * FROM instructor");
                    $i=1;
	while($row = mysqli_fetch_array($record))
	{
	?>
	<tr>
		<Td><?php echo $i;?></Td>
		<Td><?php echo $row['name'];?></Td>
		<Td><?php echo $row['email'];?></Td>
		<Td><?php echo $row['mob'];?></Td>
		<Td><?php echo $row['program'];?></Td>
		
		<Td>
		<?php
		$c= $row['course'];
		$course_arr=explode(",",$c);
		echo "<ol type='a'>";
		foreach($course_arr as $c_id)
		{
$que1=mysqli_query($con,"select * from  category where id='".$c_id."'");
$re= mysqli_fetch_array($que1);
echo "<li>".$re['name']."</li>";
		}
		echo "</ol>";
		?></Td>
<Td>
<?php 
$seid= $row['email'];
$s= $row['status'];
if($s==1)
{
echo "<a title='Activate Instructor' href='Instructor_status.php?status=$s&eid=$seid'><span class='glyphicon glyphicon-user' style='color:red' aria-hidden='true'></span></a>";
}
else
{
echo "<a title='Deactivate Instructor' href='Instructor_status.php?status=$s&eid=$seid'><span class='glyphicon glyphicon-user' style='color:#00FF00' aria-hidden='true'></span></a>";
}
?>
</Td>
<Td>
<a href='#' onclick="deletes('<?php echo $row["email"];?>')"><span class='glyphicon glyphicon-remove' style='color:red;'></span></a>

</td>
	<?php 

echo "</Tr>";
$i++;
$inc++;
}


                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]});
        } );
    </script>
<script type="text/javascript">
function deletes(eid)
{
	a=confirm('Are You Sure To Remove This Record ?')
	 if(a)
     {
        window.location.href='Instructor_Delete.php?eid='+eid;
     }
}
</script>
	