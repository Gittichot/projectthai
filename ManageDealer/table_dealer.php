<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางข้อมูลวัสดุ</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered text-center DataTable" id="homeTable" width="100%" cellspacing="0">
				<thead class="thead-light">
					<tr>
						<th scope="col">ลำดับ</th>
						<th scope="col">ชื่อ-นามสกุล</th>
						<th scope="col">เบอร์โทรศัพท์</th>
						<th scope="col"></th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$num = 0;
					while ($row = $result->fetch_assoc()) {
						$num++;
					?>
						<tr>
							<td><?php echo $num; ?></td>
							<td><?php echo $row['dl_name']; ?></td>
							<td><?php echo $row['dl_phone']; ?></td>
							<td>
								<a href="Edit/edit_dealer.php?id=<?php echo $row['dl_id']; ?>" class="btn btn-sm btn-warning ">
									<i class="fa fa-pencil-square-o"></i> แก้ไข
								</a>
							</td>
							<td>
								<a href="#" onclick="deleteItem(<?php echo $row['dl_id']; ?>);" class="btn btn-sm btn-danger">
									<i class="fas fa-trash-alt"></i> ลบ
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!--End Delete Modal -->