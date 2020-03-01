<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางจัดการข้อมูล สินค้า</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Protable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
            					<th>#</th>
           						<th>สินค้า</th>
            					<th>จำนวนคงเหลือ</th>
            					<th>ราคาต่อหน่วย</th>
								<th>แก้ไข</th>
								<th>ลบ</th>
          					</tr>
                		</thead>
                	<tbody>
						<?php while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
        			<tr>
            			<td><?php echo $result['P_id'];?></td>
            			<td><?php echo $result['P_name']; ?></td>
						<td><?php echo $result['P_unit']; ?></td>
						<td><?php echo $result['P_price']; ?></td>
						<td><a href="#" data-target="#editProModal<?php echo $result['P_id'];?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a></td>
            			<td><a href="#" data-target="#deleteProModal<?php echo $result['P_id']; ?>" class="delete" data-toggle="modal" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>

					</tr>
					<!-- Edit Modal HTML -->
	<div id="editProModal<?php echo $result['P_id'];?>" class="modal fade" >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="../control/stock/EditPro.php">
					<div class="modal-header">
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					<div class="form-group">
						<label>#</label>
						<input  type="text" value="<?php echo $result['P_id'];?>" name="pid" id="pid" class="form-control" required readonly>
					</div>
						<div class="form-group">
							<label>ชื่อสินค้า</label>
							<input type="text" value="<?php echo $result['P_name'];?>" name="pname" id="pname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>จำนวนคงเหลือ</label>
							<input type="text" value="<?php echo $result['P_unit'];?>" name="amount" id="amount" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ราคาต่อหน่วย</label>
							<input class="form-control" value="<?php echo $result['P_price'];?>" name="price" id="price" class="form-control" required></input>
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
	<div id="deleteProModal<?php echo $result['P_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">Confirm Delete Employee?</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>รหัสสินค้า : <?php echo $result['P_id']; ?></p>
                        <p>สินค้า : <?php echo $result['P_name'];?></p>
                        <p>จำนวนคงเหลือ : <?php echo $result['P_unit']; ?></p>
						<p>ราคาต่อหน่วย : <?php echo $result['P_price']; ?></p>
					</div>
					<div class="modal-footer">
						<a name="del" id="del" class="btn btn-success" href="../control/stock/DelPro.php?delid=<?php echo $result['P_id']; ?>" role="button" value="Delete">Delete</a>
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