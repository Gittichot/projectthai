<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางประวัติการสั่งซื้อวัสดุ</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered text-center DataTable" id="homeTable" ="100%" cellspacing="0">
				<thead class="thead-light">
					<tr>
						<th>ลำดับ</th>
						<th>วันที่</th>
						<th>ชื่อวัสดุ</th>
						<th>จำนวน</th>
						<th>ราคาต่อหน่วย</th>
						<th>ราคารวม</th>
						<th>ประเภท</th>
						<th>ชื่อจำหน่าย</th>
						<th>เบอร์โทรจำหน่าย</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sql = "SELECT
                                    material_order.mt_id,
                                    material_order.mt_buydate,
                                    material_order.mt_name,
                                    material_order.mt_amount,
                                    material_order.mt_UnitPrice,
                                    material_order.mt_price,
                                    mattype.mtype_name,
                                    dealer.dl_name,
                                    dealer.dl_phone
                                FROM
                                    material_order
                                INNER JOIN mattype ON material_order.mtype_id = mattype.mtype_id
                                INNER JOIN dealer ON material_order.dl_id = dealer.dl_id";
					$result = $condb->query($sql);
					$num = 0;
					while ($row = $result->fetch_assoc()) {
						$num++;
					?>
						<tr>
							<td><?php echo $num; ?></td>
							<td><?php echo $row['mt_buydate']; ?></td>
							<td><?php echo $row['mt_name']; ?></td>
							<td><?php echo $row['mt_amount']; ?></td>
							<td><?php echo $row['mt_UnitPrice']; ?> บาท</td>
							<td><?php echo $row['mt_price']; ?> บาท</td>
							<td><?php echo $row['mtype_name']; ?></td>
							<td><?php echo $row['dl_name']; ?></td>
							<td><?php echo $row['dl_phone']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!--End Delete Modal -->