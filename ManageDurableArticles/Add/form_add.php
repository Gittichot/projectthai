<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
	<div class="card-header">เพิ่มข้อมูลวัสดุ</div>
	<div class="card-body">
		<div class="col-md-8 mx-auto">
			<form class="was-validated" action="" method="POST" enctype="multipart/form-data">
				<div class="form-group row">
					<label for="pname" class="col-sm-3 col-form-label">ชนิดครุภัณฑ์</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="dastock_name" name="dastock_name" required>
						<div class="invalid-feedback">
							กรุณากรอกชนิดครุภัณฑ์
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="loation" class="col-sm-3 col-form-label">รายละเอียด</label>
					<div class="col-sm-9">
						<textarea type="text" class="form-control" id="dastock_detel" name="dastock_detel" rows="4" style="min-height:150px;" required></textarea>
						<div class="invalid-feedback">
							กรุณากรอกรายละเอียด ตัวอย่างเช่น (ยี่ห้อ,เลขทะเบียน,เลขเครื่องจักร ฯ)
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="loation" class="col-sm-3 col-form-label">ที่จัดเก็บ</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="dastock_location" name="dastock_location"  required></input>
						<div class="invalid-feedback">
							กรุณากรอกที่จัดเก็บ
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