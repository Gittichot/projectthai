<div class="card">
	<div class="card-body">
	<div class="card-title"><h5>เพิ่มผู้ใช้</h5></div>
		<form action="../../control/member/Addmem.php" method="POST">
		<div class="modal-body">
						<div class="form-group">
							<label>ชื่อ</label>
							<input type="text"  name="Fname" id="Fname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>นามสกุล</label>
							<input type="text"  name="Lname" id="Lname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ที่อยู่</label>
							<input class="form-control"  name="Add" id="Add" class="form-control" required></input>
						</div>
						<div class="form-group">
							<label>เบอร์ติดต่อ</label>
							<input type="text"  name="Phone" id="Phone" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ชื่อผู้ใช้</label>
							<input class="form-control"  name="user" id="user" class="form-control" required></input>
						</div>
						<div class="form-group">
							<label>รหัสผ่าน</label>
							<input type="text"  name="pass" id="pass" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-success" value="Save Change">
					</div>

</form>
	</div>
</div>