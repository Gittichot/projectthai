<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางรายงานยอดการขาย</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="homeTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
            					<th >ชื่อ</th>
								<th >วันที่ขาย</th>
            					<th >ยอดการขาย</th>
								<th >ยอดราคารวม</th>
          					</tr>
                		</thead>
                	<tbody>
					<?php while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
        			<tr>
            			<td><?php echo $result['M_Fname']." ".$result['M_Lname'];?></td>
						<td><?php echo $result['B_Date']?></td>
						<td><?php echo $result['Total']." การขาย"; ?></td>
						<td><?php echo $result['Totalbuy']." บาท"; ?></td>
					</tr>
	<?php
		} ?>
			</tbody>
			</table>
			</div>
		</div>
		</div>
	<!--End Delete Modal -->