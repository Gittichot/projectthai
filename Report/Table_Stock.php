<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางสินค้าคงคลัง</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="report" width="100%" cellspacing="0">
                        <thead>
                            <tr>
            					<th>#</th>
           						<th>สินค้า</th>
								<th>จำนวนคงเหลือ</th>
								<th>อัพเดตล่าสุด</th>
          					</tr>
                		</thead>
                	<tbody>
						<?php while($result = mysqli_fetch_array($stockquery,MYSQLI_ASSOC)) { ?>
        			<tr>
            			<td><?php echo $result['P_id'];?></td>
            			<td><?php echo $result['P_name']; ?></td>
						<td><?php echo $result['P_unit']; ?></td>
						<td><?php echo $result['P_add_history_date']; ?></td>
					</tr>
	<?php } ?>
			</tbody>
			</table>
			</div>
		</div>
		</div>
	<!--End  Modal -->