<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->

<div class="container">
   <b><div class="card-header">การจัดการจองสินค้า</div></b>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<!-- <h2>Manage <b>Employees</b></h2> -->
					</div>
					<!-- <div class="col-sm-3">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>						
					</div> -->
                </div>
            </div>
			<div id="employee_table" method="POST" >
            <table class="table table-striped table-hover">
                <thead>
          <tr>
            <th>#</th>
            <th>ผู้ขาย</th>
            <th>สินค้าที่จอง</th>
            <th>จำนวนที่จอง</th>
            <th>ราคารวม</th>
            <th>วันที่จอง</th>
            <th>ผู้ซื้อ</th>
            <th>ที่อยู่ผู้ซื้อ</th>
            <th>เบอร์โทร</th>
            <th>แก้ไขข้อมูล</th>
            <th>ลบข้อมูล</th>
          </tr>
                </thead>
                <tbody>
				<?php while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
          <tr>
            <td><?php echo $result[''];?></td>
            <td><?php echo $result['']; ?></td>
            <td><?php echo $result['']; ?></td>
            <td></td>
            <td><a href="#" data-target="#editEmployeeModal<?php echo $result['M_id'];?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a></td>
            <td><a href="#" data-target="#deleteEmployeeModal<?php echo $result['M_id']; ?>" class="delete" data-toggle="modal" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>

					</tr>
					<!-- Edit Modal HTML -->
	<div id="editEmployeeModal<?php echo $result['M_id'];?>" class="modal fade" >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="./Editmem.php">
					<div class="modal-header">
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					<div class="form-group">
						<label>ID</label>
						<input  type="text" value="<?php echo $result['M_id'];?>" name="mid" id="mid" class="form-control" required disable>
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
	<div id="deleteEmployeeModal<?php echo $result['M_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">Confirm Delete Employee?</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>ID : <?php echo $result['M_id']; ?></p>
                        <p>Name : <?php echo $result['M_Fname']." ".$result['M_Lname'];?></p>
                        <p>Address : <?php echo $result['M_Add']; ?></p>
						<p>Phone : <?php echo $result['M_Tel']; ?></p>
						<p>Username : <?php echo $result['M_User']; ?></p>
                        <p>Password : <?php echo $result['M_Pass']; ?></p>
					</div>
					<div class="modal-footer">
						<a name="del" id="del" class="btn btn-success" href="./Control/Member/Delmem.php?delid=<?php echo $result['M_id']; ?>" role="button" value="Delete">Delete</a>
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
    <!-- </div> -->
    <!--End Delete Modal -->
    	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="./Control/Member/Addmem.php">
					<div class="modal-header">
						<h4 class="modal-title">Add Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" name="Fname" id="Fname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Sure Name</label>
							<input type="text" name="Lname" id="Lname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<input class="form-control" name="Add" id="Add" required></input>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" name="Phone" id="Phone" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="Username" name="User" id="User" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="Password" name="Pass" id="Pass" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Salary</label>
							<input type="int" name="Sal" id="Sal" class="form-control" required>
						</div>
						<div class="form-group">
							<label>OT Code</label>
							<input type="int" name="OT" id="OT" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
	<!-- END Add Modal HTML -->