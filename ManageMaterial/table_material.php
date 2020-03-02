<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางข้อมูล วัสดุ</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered text-center DataTable" id="homeTable" width="100%" cellspacing="0">
				<thead class="thead-light">
					<tr>
						<th scope="col">ลำดับ</th>
						<th scope="col">ชื่อวัสดุ</th>
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
							<td><?php echo $row['mstock_name']; ?></td>
							<td><?php echo $row['mstock_amount']; ?></td>
							<td><?php echo $row['mstock_location']; ?></td>
							<td>
								<a href="product_manage/edit_product.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning ">
									<i class="fa fa-pencil-square-o"></i> แก้ไข
								</a>
							</td>
							<td>
								<a href="product_manage/detail.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger ">
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