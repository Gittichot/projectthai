<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางรายงานยอดการการจองที่ชำระเงินและส่งมอบแล้ว</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Billtable" width="100%" cellspacing="0">
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
			<th>การลบข้อมูล</th>
          </tr>
                		</thead>
                	<tbody>
					<?php while($rowbooking = mysqli_fetch_array($query2,MYSQLI_ASSOC)) { ?>
            <tr>
                <td><?php echo $rowbooking['Bo_id'];?></td>
                <td><?php echo $rowbooking['P_name']; ?></td>
			    <td><?php echo $rowbooking['Bo_amount']; ?></td>
			    <td><?php echo $rowbooking['Bo_total']; ?></td>
			    <td><?php echo $rowbooking['Bo_date']; ?></td>
			    <td><?php echo $rowbooking['Bo_cus']; ?></td>
			    <td><?php echo $rowbooking['Bo_cadd']; ?></td>
			    <td><?php echo $rowbooking['Bo_ctel']; ?></td>
			    <td><?php echo $rowbooking['Bo_cdate']; ?></td>
				<td><?php echo $rowbooking['Get_name']; ?></td>
				<td align="center"><a href="#" data-target="#deleteModal<?php echo $rowbooking['Bo_id']; ?>" class="btn btn btn-danger" data-toggle="modal" >ลบ</a></td>
			</tr>
				<!-- Delete Modal HTML -->
	<div id="deleteModal<?php echo $rowbooking['Bo_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">ยืนยันการลบการซื้อขายนี้</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>รหัสการซื้อ : <?php echo $rowbooking['Bo_id']; ?></p>
                        <p>ชื่อผู้ซื้อ : <?php echo $rowbooking['Bo_cus'];?></p>
                        <p>สินค้าที่ซื้อ : <?php echo $rowbooking['P_name']; ?></p>
						<p>จำนวนที่ซื้อ : <?php echo $rowbooking['Bo_amount']; ?></p>
						<p>ราคารวม : <?php echo $rowbooking['Bo_total']; ?></p>
						<p>วันที่จอง : <?php echo $rowbooking['Bo_date']; ?></p>
						<p>ประเภทการรับสินค้า : <?php echo $rowbooking['Get_name']; ?></p>
					</div>
					<div class="modal-footer">
						<a name="del" id="del" class="btn btn-danger" href="../../control/booking/Deladmin.php?delid=<?php echo $rowbooking['Bo_id']; ?>" role="button" value="Delete">ยืนยัน</a>
						<input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
		} ?>
			</tbody>
			</table>
			</div>
		</div>
		</div>
	<!--End Delete Modal -->