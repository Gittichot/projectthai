<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
	<div class="card-header">การสั่งซื้อวัสดุ</div>
	<div class="card-body">
		<div class="col-md-8 mx-auto">
			<form class="was-validated" action="" method="POST" enctype="multipart/form-data">

				<div class="form-group row">
					<label for="pname" class="col-sm-3 col-form-label">ชื่อสินค้า</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="mt_name" name="mt_name" required>
						<div class="invalid-feedback">
							กรุณากรอกชื่อสินค้า
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="loation" class="col-sm-3 col-form-label">ที่จัดเก็บสินค้า</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="mt_location" name="mt_location" rows="4" required></input>
						<div class="invalid-feedback">
							กรุณากรอกที่จัดเก็บสินค้า
						</div>
					</div>
                </div>
                <div class="form-group row">
					<label for="loation" class="col-sm-3 col-form-label">ระยะเวลาในการจัดส่ง</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="mt_location" name="mt_location" rows="4" required></input>
						<div class="invalid-feedback">
							กรุณากรอกระยะเวลาในการจัดส่ง
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