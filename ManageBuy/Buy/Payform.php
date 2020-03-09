<?php
session_start();

$total_price = 0;

$item_details = '';

$order_details = '
<div class="table-responsive" id="order_table">
 <table class="table table-bordered table-striped">
  <tr>  
            <th>Product Name</th>  
            <th>Quantity</th>  
            <th>Price</th>  
            <th>Total</th>  
        </tr>
';

if(!empty($_SESSION["shopping_cart"]))
{
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
  $order_details .= '
  <tr>
   <td>'.$values["name"].'</td>
   <td>'.$values["quantity"].'</td>
   <td align="right">$ '.$values["price"].'</td>
   <td align="right">$ '.number_format($values["quantity"] * $values["price"], 2).'</td>
  </tr>
  ';
  $total_price = $total_price + ($values["quantity"] * $values["price"]);

  $item_details .= $values["name"] . ', ';
 }
 $item_details = substr($item_details, 0, -2);
 $order_details .= '
 <tr>  
        <td colspan="3" align="right">Total</td>  
        <td align="right">$ '.number_format($total_price, 2).'</td>
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
    <style>
    .no-records {
    text-align: center;
    clear: both;
    margin: 40px 0;
    color: red;
    }
    </style>
</head>

<body>
<?php include './Sidebar.php'; ?>
<!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
<!-- Card Buy Content  -->
				<form method="POST" action="../../control/stock/EditPro.php">
					<div class="form-header">
						<h4 class="form-title">ชำระเงิน</h4>
					</div>
					<div class="form-body">
					<div class="form-group">
						<label>รับเงินจำนวน</label>
						<input  type="text" name="bill" id="bill" class="form-control" required >
					</div>
					<div class="form-footer">
						<input type="button" class="btn btn-default" data-dismiss="form" value="ยกเลิก">
						<input type="submit" class="btn btn-success" value="ยืนยัน">
                    </div>
                </div>
                <br>
        <div class="col-md-4">
        <h4 align="center">Order Details</h4>
        <?php
        echo $order_details;
        ?>
				</form>
			</div>
        </div>
    </div>


    <!-- END Page Content  --></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
</body>

</html>