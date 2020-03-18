<?php
session_start();

$total_price = 0;
$total_buy = 0;
$total_amount = 0;
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
if(isset($_SESSION["cart_item"])) {
foreach($_SESSION["cart_item"] as $item) {
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
  $total_amount += $item["quantity"];
  $total_price += ($item["price"] * $item["quantity"]);

    }

 $item_details .= $item["name"] . ', ';
 $item_details = substr($item_details, 0, -2);
 $order_details .= '
 <tr>
 <td><b>Total</b></td>
 <td>'.$total_amount.'</td>
 <td>'. number_format($total_price, 2) .'</td>
</tr>
 ';
}
$order_details .= '</table>';

?>
<!doctype html>
<html lang="en">

<head>
    <title>Main Admin</title>
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
<?php include './Navpay.php'; ?>
<!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
<!-- Card Buy Content  -->
<div class="row" align="center" >
<div class="col-md-6" method="POST" >
					<div class="form-header">
					<h4 class="form-title">ชำระเงิน</h4>
          </div>
					<div class="form-group md-3">
                    <div class="input-group-append">
                    <input class="form-control" name="pay" id="pay" value=" " class="form-control" required>
                    <div class="input-group-append">
                    <span class="input-group-text">บาท</span>
                    </div>
                    </div>
                    <br>
                    <div class="form-group">
                    <button type="submit" class="btn btn-success" data-target="#payModal" id="btn" data-toggle="modal">จ่ายเงิน</button>
                    </div>
                    <br>
                </div>
                </div>
                <br>
<div class="col-md-6">
        <h4 align="center">รายการที่ซื้อ</h4>
        <?php
        echo $order_details;
        ?>
        <input type="hidden" name="total" id="total" value="<?php echo number_format($total_price, 2); ?>">
			</div>
        </div>
    </div>			
</div>
    <!-- Modal -->
<form  method="POST" action="../../control/buy/AddBuy.php">
<div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="payModal">ทำการจ่าย</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>จ่ายเงินจำนวน :</p><p class="number"> </p>
          <p>ทอนเงิน :</p><p class="money"> </p>
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
    // Get value on button click and show alert
    $("#btn").click(function(){
        var str = $("#pay").val();
        var num = $("#total").val();
        var minus = str - num;
        $("p.number").text(str);
        $("p.money").text(minus);
        

        
    });
});
    </script>
</body>

</html>