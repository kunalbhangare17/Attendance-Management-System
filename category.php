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
			<div class="col-lg-2"><a href="index.php?option=add_category" class="btn btn-warning">Add New Lecture</a></div>
            
			<div class="row">
                
                <div class="col-lg-12">
                    <table class="table table-striped table-responsive table-bordered" id='example'> 
                        
						<thead>
						<th>Sr.No</th>	
                        <th>Lecture(Course) Name</th>
						<th>Delete</th>		
                        <th>Update</th>
						
						</thead>
                        <tbody>
                <?php
                $record = mysqli_query($con,"SELECT * FROM category");
                    $i=1;
					while($row = mysqli_fetch_array($record))
                    {
                ?>
                    <tr>
						<td><?php echo $i;$i++;?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><a href="deletecategory.php?id=<?php echo $row['id'];?>" ><span style="color:red" class="glyphicon glyphicon-remove"></span></a></td>
						<td><a href="index.php?option=update_category&id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-edit"></span></a></td>
				   </tr>
                    <?php
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
</body>

</html>
