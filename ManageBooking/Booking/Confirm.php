<?php
session_start();
error_reporting(0);
if(!$_SESSION["status"]){
    if(!$_SESSION["id"]){
        echo "<script>";
        echo "alert('ท่านไม่มีสิทธิ์การเข้าใช้งาน');";
        echo "window.location='../../index.php';";
        echo "</script>";

    }        
}else{
include '../../condb.php';
$sql = "SELECT * FROM `get_type`";
$query = $condb->query($sql);
$total_price = 0;
$total_buy = 0;
$total_tel = 0;
$item_details = '';

$order_details = '
<div class="table-responsive" id="order_table">
 <table class="table table-bordered table-striped">
 <thead>
 <tr>
  <th>รหัสสินค้า</th>
   <th>สินค้า</th>
   <th>จำนวน</th>
   <th>ราคาต่อหน่วย</th>
   <th>ราคารวม</th>

 </tr>
       </thead>
       <tbody>
';
if(isset($_SESSION["Booking_cart"])) {
foreach($_SESSION["Booking_cart"] as $item) {
    $item_price = $item["quantity"] * $item["price"];
    $total_buy += $item["price"];
    
  $order_details .= '
  <tr>
  <td>'. $item['id'] .'</td>
  <td>'. $item['name'] .'</td>
  <td>'.$item['quantity'].'</td>
  <td>'. $item['price'] .'</td>
  <td>'. number_format($total_buy, 2) .'</td>
  </tr>
  ';
  $total_tel += $item["quantity"];
  $total_price += ($item["price"] * $item["quantity"]);

    }

 $item_details .= $item["name"] . ', ';
 $item_details = substr($item_details, 0, -2);
 $order_details .= '
 <tr>
 <td><b>Total</b></td>
 <td>'.$total_tel.'</td>
 <td>'. number_format($total_price, 2) .'</td>
</tr>
 ';
}
$order_details .= '</table>';

?>
<!doctype html>
<html lang="en">

<head>
    <title>ยืนยันการจอง</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<?php include './conbar.php'; ?>
<!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
<!-- Card Buy Content  -->
<div class="row" align="center" >
<div class="col-md-6" method="POST" >
					<div class="form-header">
					<h4 class="form-title">รายละเอียด</h4>
          </div>
					<div class="form-group md-3">
                        <div class="form-group">
							<label>ชื่อลูกค้า</label>
							<input type="text"  name="cname" id="cname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ที่อยู่ลูกค้า</label>
							<input type="text"  name="address" id="address" class="form-control" required>
						</div>
						<div class="form-group">
							<label>เบอร์โทรลูกค้า</label>
							<input type="tel" class="form-control"  name="tel" id="tel" class="form-control" required></input>
						</div>
						<div class="form-group">
							<label>วันที่รับ-ส่ง</label>
							<input type="Date"  name="date" id="date" class="form-control" required>
                        </div>
                    <label>ประเภทการส่ง</label>
                    <select class="form-control" name="type" id="type" required>
                    
						<option value="" required><-- Please Select Item --></option>
                    <?php while($productarray = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
                        
                        <option value="<?php echo $productarray["Get_id"];?>"><?php echo $productarray["Get_id"]." - ".$productarray["Get_name"];?></option>
                    <?php } ?>
                    </select>
                    <br>
                    <div class="form-group">
                    <button type="submit" class="btn btn-success" data-target="#payModal" id="btn" data-toggle="modal">จองสินค้า</button>
                    </div>
                    <br>
                </div>
                </div>
                <br>
<div class="col-md-6">
        <h4 align="center">รายการที่จอง</h4>
        <?php
        echo $order_details;
        ?>
        <input type="hidden" name="total" id="total" value="<?php echo number_format($total_price, 2); ?>">
			</div>
        </div>
    </div>			
</div>
    <!-- Modal -->
<form  method="POST" action="../../control/booking/AddBooking.php">
<div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="payModal">รายการจอง</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>ชื่อลูกค้า : <p class="cusname"></p></p>
        <p>ที่อยู่ลูกค้า : <p class="address"></p></p>
        <p>เบอร์โทรลูกค้า : <p class="tel"></p></p>
        <p>วันที่รับ-ส่ง : <p class="date"></p></p>
        <p>ประเภทการส่ง : <p class="type"></p></p>
        <input type="hidden" value="" id="cusname" name="cusname">
        <input type="hidden" value="" id="caddress" name="caddress">
        <input type="hidden" value="" id="ctel" name="ctel">
        <input type="hidden" value="" id="getdate" name="getdate">
        <input type="hidden" value="" id="gettype" name="gettype">
        <?php echo $order_details; ?>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary">ใบเสร็จ</button> -->
        <button type="submit" class="btn btn-primary">เสร็ขสิ้น</button>
      </div>
    </div>
  </div>
</div>
</form>
    <!-- END Page Content  --></div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
    <script>
$(document).ready(function(){
    $("#btn").click(function(){
        var cn = $("#cname").val();
        var add = $("#address").val();
        var tel = $("#tel").val();;
        var date = $("#date").val();
        var type = $("#type").val();
        $("p.cusname").text(cn);
        $("p.address").text(add);
        $("p.tel").text(tel);
        $("p.date").text(date);
        $("p.type").text(type);
        $("#cusname").val(cn);
        $("#caddress").val(add);
        $("#ctel").val(tel);
        $("#getdate").val(date);
        $("#gettype").val(type);
    });
        

        
});
    </script>
</body>

</html>
<?php } ?>