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
								<th>วันเดือนปี ที่มีการเพิ่มสินค้า</th>
								<th>การจัดการ</th>
          					</tr>
                		</thead>
                	<tbody>
						<?php while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
        			<tr>
            			<td align="center"><img src="../pic/<?php echo $result['P_Image'];?>" alt="" srcset=""></td>
            			<td><?php echo $result['P_name']; ?></td>
						<td><?php echo $result['P_unit']; ?></td>
						<td><?php echo $result['P_price']; ?></td>
						<td><?php echo $result['P_add_history_date']; ?></td>
            			<td align="center"><a href="#" data-target="#deleteProModal<?php echo $result['P_id']; ?>" class="btn btn btn-danger" data-toggle="modal" >ลบสินค้านี้</a></td>

					</tr>					
	<!-- Delete Modal HTML -->
	<div id="deleteProModal<?php echo $result['P_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">ยืนยันการลบสินค้า</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>รหัสสินค้า : <?php echo $result['P_id']; ?></p>
                        <p>สินค้า : <?php echo $result['P_name'];?></p>
                        <p>จำนวนคงเหลือ : <?php echo $result['P_unit']; ?></p>
						<p>ราคาต่อหน่วย : <?php echo $result['P_price']; ?></p>
					</div>
					<div class="modal-footer">
						<a name="del" id="del" class="btn btn-danger" href="../control/stock/DelPro.php?delid=<?php echo $result['P_id']; ?>" role="button" value="Delete">ยืนยัน</a>
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