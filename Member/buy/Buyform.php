<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<div class="card mb-4" method="POST">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตะกร้าสินค้า</div>
            <div class="card-body">
            <a href="./Main_buy.php?action=empty" class="btn btn-sm btn-danger ">
						<i class="fa fa-times"></i> ล้างตะกร้า</a>
                <div class="table-responsive">
                <?php
                
                if(isset($_SESSION["cart_item"])) {
                    $total_amount = 0;
                    $total_price = 0;
                 ?>
                    <table class="table tbl-cart" id="btable" width="100%" cellspacing="0">
                <thead>
          <tr>
            <th>สินค้า</th>
            <th>จำนวน</th>
            <th>ราคาต่อหน่วย</th>
            <th>ราคารวม</th>
            <th>เอาออกจากตะกร้าสินค้า</th>

          </tr>
                </thead>
                <tbody>
                <?php
                foreach($_SESSION["cart_item"] as $item) {
                    $item_price = $item["quantity"] * $item["price"]
                
                ?>
        <tr>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['quantity']; ?></td>
			<td><?php echo $item['price']; ?></td>
            <td><?php echo number_format($item['price'], 2); ?></td>
            <td><a href="./Main_buy.php?action=remove&id=<?php echo $item['id']; ?>" class="btn btn-sm btn-danger ">
						<i class="fa fa-times"></i>ออกจากตะกร้า</a>
							</td>
		</tr>

        <?php 
        $total_amount += $item["quantity"];
        $total_price += ($item["price"] * $item["quantity"]);

                }
        ?>
        <tr>
            <td><b>Total</b></td>
            <td><?php echo $total_amount; ?></td>
            <td><?php echo number_format($total_price, 2); ?></td>
		</tr>
			</tbody>
            </table>
                <a href="./Payform.php" class="btn btn btn-success ">
			<i class="fa fa-money"></i> ชำระเงิน</a>
            <?php
                }else {
            ?>
            <div class="no-records">ไม่มีสินค้า</div>
                <?php } ?>

            </div>
        </div>
    <!-- </div> -->
    					<!-- Edit Modal HTML -->

	<!--End Delete Modal -->