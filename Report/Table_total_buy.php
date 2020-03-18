<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางแสดงยอดการขาย</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="buytable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
            					<th>#</th>
           						<th>สินค้า</th>
                                <th>จำนวนที่ซื้อ</th>
                                <th>ราคารวม</th>
                                <th>วันเดือนปี ที่ซื้อ</th>
          					</tr>
                		</thead>
                	<tbody>
						<?php while($row = mysqli_fetch_array($querytotal,MYSQLI_ASSOC)) { ?>
        			<tr>
            			<td><?php echo $row['B_id'];?></td>
            			<td><?php echo $row['P_name']; ?></td>
                        <td><?php echo $row['B_Amount']; ?></td>
                        <td><?php echo $row['B_Total']; ?></td>
                        <td><?php echo $row['B_Date']; ?></td>
					</tr>
	<?php } ?>
			</tbody>
			</table>
			</div>
		</div>
		</div>
	<!--End  Modal -->