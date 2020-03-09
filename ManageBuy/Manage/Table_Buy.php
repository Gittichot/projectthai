<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางจัดการข้อมูล สมาชิก</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="btable" width="100%" cellspacing="0">
                        <thead>
          <tr>
            <th>#</th>
            <th>ชื่อผู้ขาย</th>
            <th>สินค้าที่ซื้อ</th>
            <th>จำนวนที่ซื้อ</th>
            <th>ราคารวม</th>
			<th>วันที่ซื้อ</th>
            <th>แก้ไขข้อมูล</th>
            <th>ลบข้อมูล</th>
          </tr>
                </thead>
                <tbody>
				<?php while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
					<?php while($result2 = mysqli_fetch_array($query2,MYSQLI_ASSOC)) { ?>
          <tr>
            <td><?php echo $result['B_id'];?></td>
            <td><?php echo $result['M_Fname']." ".$result['M_Lname']; ?></td>
            <td><?php echo $result2['P_name']; ?></td>
			<td><?php echo $result2['B_Amount']; ?></td>
            <td><?php echo $result2['B_Total']." บาท"; ?></td>
			<td><?php echo $result2['B_Date']; ?></td>
            <td><a href="#" data-target="#editEmployeeModal<?php echo $result['B_id'];?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a></td>
            <td><a href="#" data-target="#deleteEmployeeModal<?php echo $result['B_id']; ?>" class="delete" data-toggle="modal" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>

					</tr>
					<!-- Edit Modal HTML -->
	<div id="editEmployeeModal<?php echo $result['B_id'];?>" class="modal fade" >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="../../control/stock/EditPro.php">
					<div class="modal-header">
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					<div class="form-group">
						<label>รหัสการซื้อ</label>
						<input  type="text" value="<?php echo $result['B_id'];?>" name="bid" id="bid" class="form-control" required readonly>
					</div>
						<div class="form-group">
							<label>จำนวนที่ซื้อ</label>
							<input class="form-control" value="<?php echo $result['B_Amount'];?>" name="pam" id="pam" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ราคารวม</label>
							<input type="text" value="<?php echo $result['B_Total'];?>" name="Btt" id="Btt" class="form-control" required>
						</div>
						<div class="form-group">
							<label>วันที่ซื้อ</label>
							<input type="text" value="<?php echo $result['B_Date'];?>" name="bd" id="bd" class="form-control" required>
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
	<div id="deleteEmployeeModal<?php echo $result['B_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">Confirm Delete Employee?</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>รหัสการซื้อ : <?php echo $result['B_id']; ?></p>
                        <p>ชื่อผู้ขาย : <?php echo $result['M_Fname']." ".$result['M_Lname'];?></p>
                        <p>สินค้าที่ซื้อ : <?php echo $result2['P_name']; ?></p>
						<p>จำนวนที่ซื้อ : <?php echo $result['B_Amount']; ?></p>
						<p>ราคารวม : <?php echo $result['B_Total']; ?></p>
                        <p>วันที่ซื้อ : <?php echo $result['B_Date']; ?></p>
					</div>
					<div class="modal-footer">
						<a name="del" id="del" class="btn btn-success" href="./Control/Member/Delmem.php?delid=<?php echo $result['B_id']; ?>" role="button" value="Delete">Delete</a>
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php }
} ?>
			</tbody>
			</table>
			</div>
        </div>
		</div>
    <!-- </div> -->
    <!--End Delete Modal -->