<div class="card">
	<div class="card-body">
	<div class="card-title"><h5>นำเข้าสินค้า</h5></div>
		<form action="../../control/stock/AddPro.php" method="POST">
		<div class="modal-body">
						<div class="form-group">
							<label>ชื่อ-สินค้า</label>
							<input type="text"  name="Pname" id="Pname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>จำนวน</label>
							<input type="text"  name="amount" id="amount" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ราคาต่อหน่วย</label>
							<input class="form-control"  name="price" id="price" class="form-control" required></input>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Save Change">
					</div>

</form>
	</div>
</div>