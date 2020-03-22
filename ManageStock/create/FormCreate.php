<div class="card">
	<div class="card-body">
	<div class="card-title"><h5>สร้างสินค้า</h5></div>
		<form action="../../control/stock/Addpro.php" method="POST">
		<div class="modal-body">
        <div class="form-group">
					<label>ชื่อสินค้า</label>
					<input type="text"  name="pname" id="pname" class="form-control" min="0" pattern="[z-aA-Z]{25}" title="ตัวอักษรเท่านั้น" required>
				</div>
				<div class="form-group">
					<label>จำนวน</label>
					<input type="number"  name="amount" id="amount" class="form-control" min="0" pattern="[1234567890]{7}" title="ตัวเลขเท่านั้น" required>
                </div>
				<div class="form-group">
					<label>ราคาต่อหน่วย</label>
					<input type="number" name="price" id="price" class="form-control" min="0"  pattern="[1234567890]{7}" title="ตัวเลขเท่านั้น" required></input>
                </div>
                <div class="form-group">
                    <label for="uploadfile">เลือกรูปภาพ</label>
                    <input type="file" name="img" class="form-control-file" id="upload1" required>
                </div>
			</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="ยกเลิก">
						<input type="submit" class="btn btn-success" value="สร้างสินค้า">
					</div>

</form>
	</div>
</div>