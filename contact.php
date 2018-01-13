        <div id="page-wrapper" style="background:#fff;padding:20px;color:#000">
 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center text-danger">
                           All Enquiry
                        </h1>
                    </div>
                </div>
            
			<div class="row">
                
                <div class="col-lg-12">
                    <table class="table table-striped table-responsive table-bordered" id='example'> 
                        

	 	<thead>
		<th>Sr. No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Mobile</th>
		<th>Message</th>
		<th>Date</th>
		<th>Delete</th>
		
		</thead>
		<tbody>
<?php
	$que=mysqli_query($con,"select * from  contact");
	$i=1;
	while($row= mysqli_fetch_array($que))
	{?>
	<tr>
		<Td><?php echo $i;$i++;?></Td>
		<Td><?php echo $row[1];?></Td>
		<Td><?php echo $row[2];?></Td>
		<Td><?php echo $row[3];?></Td>
		<Td><?php echo $row[4];?></Td>
		<Td><?php echo $row[5];?></Td>
		

<td>
<?php 
$id= $row[0];
?>
<?php echo "<a href='Delete_contact.php?id=$id'><span class='glyphicon glyphicon-remove' style='color:red' aria-hidden='true'></span></a>";?>
</td>



	</tr>
	
	<?php } ?>
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
</body>

</html>
  
