<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางจัดการจองสินค้า</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Bookingdt" width="100%" cellspacing="0">
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
			<th>วันที่รับสินค้า</th>
            <th>ประเภทการจัดส่ง</th>
            <th>การยกเลิกจอง</th>
        </tr>
                </thead>
                <tbody>
				<?php  while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) { 
				?>
							
        <tr>
            <td><?php echo $result['Bo_id'];?></td>
            <td><?php echo $result['M_Fname']."".$result['M_Lname']; ?></td>
            <td><?php echo $result['P_name']; ?></td>
			<td><?php echo $result['Bo_amount']; ?></td>
			<td><?php echo $result['Bo_total']; ?></td>
			<td><?php echo $result['Bo_date']; ?></td>
			<td><?php echo $result['Bo_cus']; ?></td>
			<td><?php echo $result['Bo_cadd']; ?></td>
			<td><?php echo $result['Bo_ctel']; ?></td>
			<td><?php echo $result['Bo_cdate']; ?></td>
            <td><?php echo $result['Get_name']; ?></td>
            <td align="center"><a href="#" data-target="#deleteModal<?php echo $result['Bo_id']; ?>" class="btn btn btn-danger" data-toggle="modal" >ยกเลิกการจอง</a></td>
            
        </tr>
				<!-- Delete Modal HTML -->
                <div id="deleteModal<?php echo $result['Bo_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">ยืนยันการยกเลิกการจองนี้</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>รหัสการซื้อ : <?php echo $result['Bo_id']; ?></p>
                        <p>ชื่อผู้ซื้อ : <?php echo $result['Bo_cus'];?></p>
                        <p>สินค้าที่ซื้อ : <?php echo $result['P_name']; ?></p>
						<p>จำนวนที่ซื้อ : <?php echo $result['Bo_amount']; ?></p>
						<p>ราคารวม : <?php echo $result['Bo_total']; ?></p>
						<p>วันที่จอง : <?php echo $result['Bo_date']; ?></p>
						<p>ประเภทการรับสินค้า : <?php echo $result['Get_name']; ?></p>
					</div>
					<div class="modal-footer">
						<a name="del" id="del" class="btn btn-danger" href="../../control/booking/Deladmin.php?delid=<?php echo $result['Bo_id']; ?>" role="button" value="Delete">ยืนยัน</a>
						<input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php }?>
			</tbody>
			</table>
			</div>
        </div>
    </div>
    <!--End Delete Modal -->
	<!-- END Add Modal HTML -->