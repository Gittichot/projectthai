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
					<label for="p_id" class="col-sm-3 col-form-label">จำนวนสินค้า</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="mt_amount" name="mt_amount" onKeyUp="IsNumeric(this.value,this)" required>
						<div class="invalid-feedback">
							กรุณากรอกจำนวนสินค้า
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="price" class="col-sm-3 col-form-label">ราคาต่อหน่วย</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="mt_UnitPrice" name="mt_UnitPrice" onKeyUp="IsNumeric(this.value,this)" required>
						<div class="invalid-feedback">
							กรุณากรอกราคาต่อหน่วย
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="numproduct" class="col-sm-3 col-form-label">ราคารวมสินค้า</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="mt_price" name="mt_price" onKeyUp="IsNumeric(this.value,this)" required>
						<div class="invalid-feedback">
							กรุณากรอกราคารวมสินค้า
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
				<?php

				?>
				<div class="form-group row">
					<label for="dl_id" class="col-sm-3 col-form-label">เลือกผู้จำหน่ายสินค้า</label>
					<div class="col-sm-9">
						<select class="form-control" id="dl_id" name="dl_id" required>
							<option value="" disabled selected>----- กรุณาเลือก -----</option>
							<?php
							while ($row = $result->fetch_assoc()) {
							?>
								<option value="<?php echo $row['dl_id']; ?>"><?php echo $row["dl_name"]; ?></option>
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
						<input type="datetime-local" class="form-control" id="mt_buydate" name="mt_buydate" value="<?= date("Y-m-d\TH:i") ?>" required>
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