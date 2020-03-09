<div class="card">
	<div class="card-body">
	<div class="card-title"><h5>นำเข้าสินค้า</h5></div>
		<form action="../../control/stock/AddPro.php" method="POST">
		<div class="modal-body">
						<div class="form-group">
							<label>รหัสผู้ขาย</label>
							<input type="text"  name="mid" id="mid" class="form-control" required>
						</div>
						<div class="form-group">
							<label>รหัสสินค้า</label>
							<input type="text"  name="pid" id="pid" class="form-control" required>
						</div>
						<div class="form-group">
							<label>จำนวนสินค้า</label>
							<input class="form-control"  name="amount" id="amount" class="form-control" required></input>
						</div>
						<div class="form-group">
							<label>ราคารวม</label>
							<input type="text"  name="total" id="total" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ชื่อลูกค้า</label>
							<input type="text"  name="mid" id="mid" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ที่อยู่ลูกค้า</label>
							<input type="text"  name="pid" id="pid" class="form-control" required>
						</div>
						<div class="form-group">
							<label>เบอร์โทรลูกค้า</label>
							<input class="form-control"  name="amount" id="amount" class="form-control" required></input>
						</div>
						<div class="form-group">
							<label>วันที่จอง</label>
							<input type="Date"  name="total" id="total" class="form-control" required>
						</div>
						<div class="form-group">
							<label>วันที่รับ-ส่ง</label>
							<input type="Date"  name="total" id="total" class="form-control" required>
						</div>
						<div class="form-group">
							<label>สถานะการส่ง</label>
						<select class="custom-select">
  							<option selected>Open this select menu</option>
 							<option value="1">One</option>
  							<option value="2">Two</option>
  							<option value="3">Three</option>
						</select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-success" value="Save ฺBooking">
					</div>

</form>
	</div>
</div>