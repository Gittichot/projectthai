<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางจัดการข้อมูล สินค้า</div>
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
			<th>แจ้งชำระเงิน</th>
            <th>แก้ไขข้อมูล</th>
            <th>ลบข้อมูล</th>
          </tr>
                </thead>
                <tbody>
				<?php  while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) { 
				?>
							
          <tr>
            <td><?php echo $result['Bo_id'];?></td>
            <td><?php echo $result['M_Fname']."".$result['M_Lname']; ?></td>
            <td><?php echo $result['P_name']; ?></td>
			<td><?php echo $result['Boo_amount']; ?></td>
			<td><?php echo $result['Boo_total']; ?></td>
			<td><?php echo $result['Boo_date']; ?></td>
			<td><?php echo $result['Boo_cus']; ?></td>
			<td><?php echo $result['Boo_cadd']; ?></td>
			<td><?php echo $result['Boo_ctel']; ?></td>
			<td><?php echo $result['Boo_cget']; ?></td>
			<td><?php echo $result['Get_name']; ?></td>
			<td><a href="#" data-target="#confirmModal<?php echo $result['Bo_id'];?>" class="btn btn-sm btn-warning" data-toggle="modal">การชำระเงิน</a></td>
            <td><a href="#" data-target="#editModal<?php echo $result['Bo_id'];?>" class="btn btn-sm btn-warning" data-toggle="modal">แก้ไข</a></td>
            <td><a href="#" data-target="#deleteModal<?php echo $result['Bo_id']; ?>" class="btn btn-sm btn-danger" data-toggle="modal" >ยกเลิกการจอง</a></td>
					</tr>
										<!-- Confirm Bill Modal HTML -->
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
					<!-- Edit Modal HTML -->
	<div id="editModal<?php echo $result['Bo_id'];?>" class="modal fade" >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="./Editmem.php">
					<div class="modal-header">
						<h4 class="modal-title">แก้ไขการจอง</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					<div class="form-group">
						<label>รหัสการจอง</label>
						<input  type="text" value="<?php echo $result['Bo_id'];?>" name="bid" id="bid" class="form-control" required readonly>
					</div>
						<div class="form-group">
							<label>รหัสผู้จำหน่าย</label>
							<input type="text" value="<?php echo $result['M_id'];?>" name="mid" id="mid" class="form-control" required readonly>
							<input type="text" value="<?php echo $result['M_Fname']."".$result['M_Lname'];?>" name="mid" id="mid" class="form-control" required readonly>
						</div>
					<div class="form-group">
					<label>สินค้า</label>
					<select class="form-control" name="pid">
					<option name="pid" value=""><?php echo $result["P_id"]." - ".$result["P_name"];?></option>
					<?php while($product = mysqli_fetch_array($querypro,MYSQLI_ASSOC)) { ?>
						<option name="pid" value="<?php echo $product["P_id"];?>"><?php echo $product["P_id"]." - ".$product["P_name"];?></option>
					<?php } ?>
				</select>	
					</div>
						<div class="form-group">
							<label>จำนวน</label>
							<input class="form-control" value="<?php echo $result['Boo_amount'];?>" name="Add" id="Add" class="form-control" required></input>
						</div>
						<div class="form-group">
							<label>รวม</label>
							<input type="text" value="<?php echo $result['Boo_total'];?>" name="Phone" id="Phone" class="form-control" required>
						</div>
						<div class="form-group">
							<label>วันที่จอง</label>
							<input type="date" value="<?php echo $result['Boo_date'];?>" name="bdate" id="bdate" class="form-control" required >
						</div>
						<div class="form-group">
							<label>ชื่อผู้สั่งจอง</label>
							<input type="text" value="<?php echo $result['Boo_cus'];?>" name="cname" id="cname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ที่อยู่ผู้สั่งจอง</label>
							<input class="form-control" value="<?php echo $result['Boo_amount'];?>" name="cAdd" id="cAdd" class="form-control" required></input>
						</div>
						<div class="form-group">
							<label>เบอร์โทรติดต่อผู้สั่งจอง</label>
							<input type="text" value="<?php echo $result['Boo_ctel'];?>" name="cPhone" id="cPhone" class="form-control" required>
						</div>
						<div class="form-group">
							<label>วันที่ต้องจัดส่ง</label>
							<input type="date" class="form-control" value="<?php echo $result['Boo_cget'];?>" name="getdate" id="getdate" class="form-control" required></input>
						</div>
						<div class="form-group">
					<label>ประเภทการจัดส่ง</label>
					<select class="form-control" name="gid">
						<option value="">เลือกใหม่</option>
						<?php while($gettype = mysqli_fetch_array($querytype,MYSQLI_ASSOC)) { ?>
						<option value="<?php echo $gettype["Get_id"];?>"><?php echo $gettype["Get_id"]." - ".$gettype["Get_name"];?></option>
						<?php } ?>
					</select>
						</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Save Change">
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!--End Edit Modal -->
	<!-- Delete Modal HTML -->
	<div id="deleteModal<?php echo $result['Bo_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">Confirm Delete Employee?</h4>
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
						<a name="del" id="del" class="btn btn-success" href="./Control/Member/Delmem.php?delid=<?php echo $result['M_id']; ?>" role="button" value="Delete">Delete</a>
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