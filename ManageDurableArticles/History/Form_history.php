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
						<th>ชนิครุภัณฑ์</th>
						<th>รายละเอียด</th>
						<th>จำนวน</th>
						<th>ราคา</th>
						<th>ประเภท</th>
						<th>ชื่อจำหน่าย</th>
						<th>เบอร์โทรจำหน่าย</th>
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
							<td><?php echo $row['da_buydate']; ?></td>
							<td><?php echo $row['da_name']; ?></td>
							<td><?php echo $row['da_detel']; ?></td>
							<td><?php echo $row['da_amount']; ?></td>
							<td><?php echo $row['da_price']; ?> บาท</td>
							<td><?php echo $row['mtype_name']; ?></td>
							<td><?php echo $row['dl_fname']." ".$row['dl_lname'];?></td>
							<td><?php echo $row['dl_phone']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!--End Delete Modal -->