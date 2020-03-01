<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->

<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางจัดการข้อมูล สมาชิก</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Memtable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
								<th>#</th>
            					<th>ชื่อ</th>
           						<th>ที่อยู่</th>
            					<th>เบอโทร</th>
								<th>แก้ไข</th>
								<th>ลบ</th>
          					</tr>
                		</thead>
                	<tbody>
						<?php while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
        			<tr>
						<td><?php echo $result['id']; ?></td>
            			<td><?php echo $result['M_Fname']." ".$result['M_Lname'];?></td>
            			<td><?php echo $result['M_Add']; ?></td>
						<td><?php echo $result['M_Tel']; ?></td>
						<td><a href="#" data-target="#editEmployeeModal<?php echo $result['id'];?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a></td>
            			<td><a href="#" data-target="#deleteEmployeeModal<?php echo $result['id']; ?>" class="delete" data-toggle="modal" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>

					</tr>
					<!-- Edit Modal HTML -->
	<div id="editEmployeeModal<?php echo $result['id'];?>" class="modal fade" >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="../control/member/Editmem.php">
					<div class="modal-header">
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					<div class="form-group">
						<label>ID</label>
						<input  type="text" value="<?php echo $result['id'];?>" name="mid" id="mid" class="form-control" readonly required>
					</div>
						<div class="form-group">
							<label>First Name</label>
							<input type="text" value="<?php echo $result['M_Fname'];?>" name="Fname" id="Fname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Sure Name</label>
							<input type="text" value="<?php echo $result['M_Lname'];?>" name="Lname" id="Lname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<input class="form-control" value="<?php echo $result['M_Add'];?>" name="Add" id="Add" class="form-control" required></input>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" value="<?php echo $result['M_Tel'];?>" name="Phone" id="Phone" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Save Change">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--End Edit Modal -->
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal<?php echo $result['id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">Confirm Delete Employee?</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>ID : <?php echo $result['id']; ?></p>
                        <p>Name : <?php echo $result['M_Fname']." ".$result['M_Lname'];?></p>
                        <p>Address : <?php echo $result['M_Add']; ?></p>
						<p>Phone : <?php echo $result['M_Tel']; ?></p>
						<p>Username : <?php echo $result['M_User']; ?></p>
                        <p>Password : <?php echo $result['M_Pass']; ?></p>
					</div>
					<div class="modal-footer">
						<a name="del" id="del" class="btn btn-success" href="../control/member/Delmem.php?delid=<?php echo $result['id']; ?>" role="button" value="Delete">Delete</a>
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php } ?>
			</tbody>
			</table>
			</div>
		</div>
		</div>
	<!--End Delete Modal -->