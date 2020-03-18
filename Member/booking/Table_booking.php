<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางจัดการข้อมูล สินค้า</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Bookingdt" width="100%" cellspacing="0">
                <thead>
          <tr>
            <th>#</th>
            <th>สินค้าที่จอง</th>
            <th>จำนวนที่จอง</th>
            <th>ราคารวม</th>
            <th>วันที่จอง</th>
            <th>ผู้ซื้อ</th>
            <th>ที่อยู่ผู้ซื้อ</th>
			<th>เบอร์โทร</th>
			<th>วันที่รับสินค้า</th>
			<th>ประเภทการจัดส่ง</th>
            <th>แจ้งชำระเงิน</th>
            <th>ลบข้อมูล</th>
          </tr>
                </thead>
                <tbody>
				<?php  while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) { 
				?>
							
          <tr>
            <td><?php echo $result['Bo_id'];?></td>
            <td><?php echo $result['P_name']; ?></td>
			<td><?php echo $result['Boo_amount']; ?></td>
			<td><?php echo $result['Boo_total']; ?></td>
			<td><?php echo $result['Boo_date']; ?></td>
			<td><?php echo $result['Boo_cus']; ?></td>
			<td><?php echo $result['Boo_cadd']; ?></td>
			<td><?php echo $result['Boo_ctel']; ?></td>
			<td><?php echo $result['Boo_cget']; ?></td>
			<td><?php echo $result['Get_name']; ?></td>
            <td><a href="#" data-target="#confirmmodal<?php echo $result['Bo_id'];?>" class="btn btn-sm btn-warning" data-toggle="modal">ชำระเงินและส่งมอบแล้ว</a></td>
            <td><a href="#" data-target="#deleteModal<?php echo $result['Bo_id']; ?>" class="btn btn-sm btn-danger" data-toggle="modal" >ยกเลิกการจอง</a></td>
					</tr>
					<!-- Delete Modal HTML -->
		<div id="confirmmodal<?php echo $result['Bo_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="../../control/booking/Bill.php">
					<div class="modal-header">
						<h4 class="modal-title">Confirm Payment Booking</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>รหัสการจอง : <?php echo $result['Bo_id']; ?></p>
                        <p>ผู้จำหน่าย : <?php echo $result['M_Fname']." ".$result['M_Lname'];?></p>
                        <p>สินค้า : <?php echo $result['P_name']; ?></p>
						<p>จำนวน : <?php echo $result['Boo_amount']; ?></p>
						<p>ราคารวม : <?php echo $result['Boo_total']." บาท"; ?></p>
						<p>วันที่ : <?php echo $result['Boo_date']; ?></p>
						<p>ชื่อผู้สั่งจอง : <?php echo $result['Boo_cus']." ".$result['M_Lname'];?></p>
                        <p>ที่อยู่ : <?php echo $result['Boo_cadd']; ?></p>
						<p>เบอร์ติดต่อ : <?php echo $result['Boo_ctel']; ?></p>
						<p>วันที่ต้องจัดส่ง : <?php echo $result['Boo_cget']." บาท"; ?></p>
						<p>ประเภทการจัดส่ง : <?php echo $result['Get_name']; ?></p>
						<input type="hidden" name="boid" value="<?php echo $result["Bo_id"];?>">
						<input type="hidden" name="pid" value="<?php echo $result["P_id"];?>">
						<input type="hidden" name="name" value="<?php echo $result["P_name"];?>">
						<input type="hidden" name="quantity" value="<?php echo $result["Boo_amount"];?>">
						<input type="hidden" name="total" value="<?php echo $result["Boo_total"];?>">
						<input type="hidden" name="price" value="<?php echo $result["P_price"];?>">
					</div>
					<div class="modal-footer">
						<button type="submit" name="del" id="del" class="btn btn-success"  role="button" value="ชำระเงิน">ชำระเงิน</button>
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteModal<?php echo $result['Bo_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">Confirm Cancel Booking?</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>รหัสการจอง : <?php echo $result['Bo_id']; ?></p>
                        <p>ผู้จำหน่าย : <?php echo $result['M_Fname']." ".$result['M_Lname'];?></p>
                        <p>สินค้า : <?php echo $result['P_name']; ?></p>
						<p>จำนวน : <?php echo $result['Boo_amount']; ?></p>
						<p>ราคารวม : <?php echo $result['Boo_total']." บาท"; ?></p>
						<p>วันที่ : <?php echo $result['Boo_date']; ?></p>
						<p>ชื่อผู้สั่งจอง : <?php echo $result['Boo_cus']." ".$result['M_Lname'];?></p>
                        <p>ที่อยู่ : <?php echo $result['Boo_cadd']; ?></p>
						<p>เบอร์ติดต่อ : <?php echo $result['Boo_ctel']; ?></p>
						<p>วันที่ต้องจัดส่ง : <?php echo $result['Boo_cget']." บาท"; ?></p>
                        <p>ประเภทการจัดส่ง : <?php echo $result['Get_name']; ?></p>
					</div>
					<div class="modal-footer">
						<a name="del" id="del" class="btn btn-success" href="../../control/booking/DelBooking.php?delid=<?php echo $result['M_id']; ?>" role="button" value="Delete">Delete</a>
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
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
    <!-- </div> -->
    <!--End Delete Modal -->
	<!-- END Add Modal HTML -->