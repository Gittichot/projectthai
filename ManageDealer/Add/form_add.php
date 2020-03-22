<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
	<div class="card-header">เพิ่มข้อมูลผู้จำหน่าย</div>
	<div class="card-body">
		<div class="col-md-8 mx-auto">
			<form class="was-validated" action="" method="POST" enctype="multipart/form-data">
				<div class="form-group row">
					<label for="pname" class="col-sm-3 col-form-label">ชื่อ</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="dl_fname" name="dl_fname" required>
						<div class="invalid-feedback">
							กรุณากรอกชื่อ
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="pname" class="col-sm-3 col-form-label">นามสกุล</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="dl_lname" name="dl_lname" required>
						<div class="invalid-feedback">
							กรุณากรอกนามสกุล
						</div>
					</div>
				</div>
                <div class="form-group row">
					<label for="loation" class="col-sm-3 col-form-label">เบอร์โทรศัพท์</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="dl_phone" name="dl_phone" maxlength='10' onKeyUp="IsNumeric(this.value,this)" pattern="[0-9]{10}" title="กรุณากรอกตัวเลข 0-9 จำนวน 10 ตัว" required></input>
						<div class="invalid-feedback">
							กรุณากรอกเบอร์โทรศัพท์ (กรอกเฉพาะตัวเลข 0-9 เท่านั้น)
						</div>
					</div>
				</div>
		</div>
	</div>
	<div class="card-footer text-center">
		<input type="submit" name="submit" class="btn btn-primary" value="ยืนยัน">
		<a class="btn btn-danger" href="../">ยกเลิก</a>
	</div>
	</form>
</div>
<!--End Delete Modal -->