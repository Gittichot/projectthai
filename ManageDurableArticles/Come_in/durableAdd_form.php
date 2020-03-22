<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
	<div class="card-header">การสั่งซื้อวัสดุ</div>
	<div class="card-body">
		<div class="col-md-8 mx-auto">
			<form class="was-validated" action="" method="POST" enctype="multipart/form-data">

				<div class="form-group row">
					<label for="pname" class="col-sm-3 col-form-label">ชนิดครุภัณฑ์</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="da_name" name="da_name" required>
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
							กรุณากรอกรายละเอียด
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="p_id" class="col-sm-3 col-form-label">จำนวนครุภัณฑ์</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="da_amount" name="da_amount" onKeyUp="IsNumeric(this.value,this)" maxlength="7" pattern="[0-9]{1,}" title="กรุณากรอกตัวเลข 0-9 จำนวน 7 ตัว" required>
						<div class="invalid-feedback">
							กรุณากรอกจำนวนครุภัณฑ์
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="numproduct" class="col-sm-3 col-form-label">ราคาครุภัณฑ์</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="da_price" name="da_price" onKeyUp="IsNumeric(this.value,this)" maxlength="11" pattern="[0-9]{1,}" title="กรุณากรอกตัวเลข 0-9 จำนวน 11 ตัว" required>
						<div class="invalid-feedback">
							กรุณากรอกราคาครุภัณฑ์
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="numproduct" class="col-sm-3 col-form-label">ที่จัดเก็บ</label>
					<div class="col-sm-9">
					<input type="text" class="form-control" id="dastock_location" name="dastock_location" required>
						<div class="invalid-feedback">
							กรุณากรอกราคาครุภัณฑ์
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="dl_id" class="col-sm-3 col-form-label">เลือกผู้จำหน่ายสินค้า</label>
					<div class="col-sm-9">
						<select class="form-control" id="dl_id" name="dl_id" required>
							<option value="" disabled selected>----- กรุณาเลือก -----</option>
							<?php
							while ($row = $result->fetch_assoc()) {
							?>
								<option value="<?php echo $row['dl_id']; ?>"><?php echo $row["dl_fname"] . " " . $row["dl_lname"]; ?></option>
							<?php } ?>
						</select>
						<div class="invalid-feedback">
							กรุณาเลือกผู้จำหน่ายสินค้า
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="dl_date" class="col-sm-3 col-form-label">วันที่รับสินค้ามา</label>
					<div class="col-sm-9">
						<input type="datetime-local" class="form-control" id="da_buydate" name="da_buydate" value="<?= date("Y-m-d\TH:i") ?>" required>
						<div class="invalid-feedback">
							กรุณาเลือกวันที่รับสินค้ามา (เดือน / วัน / ปี)
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