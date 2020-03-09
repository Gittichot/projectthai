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
							<label>วันที่ซื้อ</label>
							<input type="Date"  name="date" id="date" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-success" value="Save Change">
					</div>

</form>
	</div>
</div>