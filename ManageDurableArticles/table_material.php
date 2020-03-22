<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางข้อมูลวัสดุ</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered text-center DataTable" id="homeTable" width="100%" cellspacing="0">
				<thead class="thead-light">
					<tr>
						<th scope="col">ลำดับ</th>
						<th scope="col">ชนิดครุภัณฑ์</th>
						<th scope="col">รายละเอียด</th>
						<th scope="col">จำนวน</th>
						<th scope="col">ที่จัดเก็บ</th>
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
							<td><?php echo $row['dastock_name']; ?></td>
							<td><?php echo $row['dastock_detel']; ?></td>
							<td><?php echo $row['dastock_amoun']; ?></td>
							<td><?php echo $row['dastock_location']; ?> วัน</td>
							<td>
								<a href="Edit/edit_mat.php?id=<?php echo $row['dastock_id']; ?>" class="btn btn-sm btn-warning ">
									<i class="fa fa-pencil-square-o"></i> แก้ไข
								</a>
							</td>
							<td>
								<a href="#" onclick="deleteItem(<?php echo $row['dastock_id']; ?>);" class="btn btn-sm btn-danger">
									<i class="fa fa-trash"></i> ลบ
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