<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางข้อมูลการจองสินค้าสินค้า</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Bookingdt" width="100%" cellspacing="0">
                <thead>
          <tr>
		  	<th>#</th>
            <th>สินค้าที่จอง</th>
            <th>จำนวนที่จอง</th>
            <th>ราคารวม</th>
            <th>วันที่จอง</th>
            <th>ผู้ซื้อ</th>
            <th>ที่อยู่ผู้ซื้อ</th>
			<th>เบอร์โทร</th>
			<th>วันที่รับสินค้า</th>
			<th>ประเภทการจัดส่ง</th>
			<th>สถานะ</th>

          </tr>
                </thead>
                <tbody>
				<?php  while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) { 
				?>
							
        <tr>
		  	<td><?php echo $result['Bo_id']; ?></td>
            <td><?php echo $result['P_name']; ?></td>
			<td><?php echo $result['Bo_amount']; ?></td>
			<td><?php echo $result['Bo_total']; ?></td>
			<td><?php echo $result['Bo_date']; ?></td>
			<td><?php echo $result['Bo_cus']; ?></td>
			<td><?php echo $result['Bo_cadd']; ?></td>
			<td><?php echo $result['Bo_ctel']; ?></td>
			<td><?php echo $result['Bo_cdate']; ?></td>
			<td><?php echo $result['Get_name']; ?></td>
			<td <?php if($result["type_id"] == 1){?> class="nobill" <?php }else{ ?> class="bill" <?php }?> ><?php echo $result['type_name']; ?></td>
		</tr>
	<?php }?>
			</tbody>
			</table>
			</div>
        </div>
    </div>
    <!--End Delete Modal -->
	<!-- END Add Modal HTML -->