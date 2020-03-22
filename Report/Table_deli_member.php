<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางแสดงการส่งมอบ</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Protable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
            					<th>#</th>
           						<th>ผู้จอง</th>
                                <th>สินค้า</th>
                                <th>จำนวนที่ซื้อ</th>
                                <th>ราคารวม</th>
								<th>วันเดือนปี ที่จอง</th>
								<th>วันเดือนปี ที่รับสินค้า</th>
          					</tr>
                		</thead>
                	<tbody>
						<?php while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
        			<tr>
            			<td><?php echo $row['Bo_id'];?></td>
            			<td><?php echo $row['M_Fname']." ".$row["M_Lname"]; ?></td>
                        <td><?php echo $row['P_name']; ?></td>
                        <td><?php echo $row['Bo_amount']; ?></td>
                        <td><?php echo $row['Bo_total']; ?></td>
						<td><?php echo $row['Bo_date']; ?></td>
						<td><?php echo $row['Bo_cdate']; ?></td>
					</tr>
	<?php } ?>
			</tbody>
			</table>
			</div>
		</div>
		</div>
	<!--End  Modal -->