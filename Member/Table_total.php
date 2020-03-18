<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางแสดงยอดการขายในวันนี้</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
            					<th>#</th>
           						<th>สินค้า</th>
                                <th>จำนวนที่ซื้อ</th>
                                <th>ราคารวม</th>
                                <th>วันเดือนปี ที่ซื้อ</th>
								<th>ลบการซื้อขาย</th>
          					</tr>
                		</thead>
                	<tbody>
						<?php while($row = mysqli_fetch_array($querytotal,MYSQLI_ASSOC)) { ?>
        			<tr>
            			<td><?php echo $row['B_id'];?></td>
            			<td><?php echo $row['P_name']; ?></td>
                        <td><?php echo $row['B_Amount']; ?></td>
                        <td><?php echo $row['B_Total']; ?></td>
                        <td><?php echo $row['B_Date']; ?></td>
						<td><a href="#" data-target="#deleteModal<?php echo $row['B_id']; ?>" class="btn btn-sm btn-danger" data-toggle="modal" >ลบการซื้อขาย</a></td>
					</tr>
					<!-- Delete Modal HTML -->
	<div id="deleteModal<?php echo $row['B_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">Confirm Delete Employee?</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>รหัสการซื้อ : <?php echo $row['B_id']; ?></p>
                        <p>สินค้าที่ซื้อ : <?php echo $row['P_name']; ?></p>
						<p>จำนวนที่ซื้อ : <?php echo $row['B_Amount']; ?></p>
						<p>ราคารวม : <?php echo $row['B_Total']; ?></p>
                        <p>วันที่ซื้อ : <?php echo $row['B_Date']; ?></p>
					</div>
					<div class="modal-footer">
						<a name="del" id="del" class="btn btn-danger" href="../control/buy/DelBuy.php?delid=<?php echo $row['B_id']; ?>" role="button" value="Delete">ยืนยันการลบ</a>
						<input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
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
	<!--End  Modal -->