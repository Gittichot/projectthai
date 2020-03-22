<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางจัดการข้อมูล สมาชิก</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="btable" width="100%" cellspacing="0">
                        <thead>
          <tr>
            <th>#</th>
            <th>ชื่อผู้ขาย</th>
            <th>สินค้าที่ซื้อ</th>
            <th>จำนวนที่ซื้อ</th>
            <th>ราคารวม</th>
			<th>วันที่ซื้อ</th>
            <th>ลบข้อมูล</th>
          </tr>
                </thead>
                <tbody>
				<?php while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
          <tr>
            <td><?php echo $result['B_id'];?></td>
            <td><?php echo $result['M_Fname']." ".$result['M_Lname']; ?></td>
            <td><?php echo $result['P_name']; ?></td>
			<td><?php echo $result['B_amount']; ?></td>
            <td><?php echo $result['B_total']." บาท"; ?></td>
			<td><?php echo $result['B_date']; ?></td>
            <td align="center"><a href="#" data-target="#deleteModal<?php echo $result['B_id']; ?>" class="btn btn btn-danger" data-toggle="modal" >ลบ</a></td>

					</tr>
	<!-- Delete Modal HTML -->
	<div id="deleteModal<?php echo $result['B_id']; ?>" name="delete" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">ยืนยันการลบการซื้อขายนี้</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>รหัสการซื้อ : <?php echo $result['B_id']; ?></p>
                        <p>ชื่อผู้ขาย : <?php echo $result['M_Fname']." ".$result['M_Lname'];?></p>
                        <p>สินค้าที่ซื้อ : <?php echo $result['P_name']; ?></p>
						<p>จำนวนที่ซื้อ : <?php echo $result['B_amount']; ?></p>
						<p>ราคารวม : <?php echo $result['B_total']; ?></p>
                        <p>วันที่ซื้อ : <?php echo $result['B_date']; ?></p>
					</div>
					<div class="modal-footer">
						<a name="del" id="del" class="btn btn-danger" href="../../control/buy/DelBuy.php?delid=<?php echo $result['B_id']; ?>" role="button" value="Delete">ยืนยัน</a>
						<input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php } 
?>
			</tbody>
			</table>
			</div>
        </div>
		</div>
    <!-- </div> -->
    <!--End Delete Modal -->