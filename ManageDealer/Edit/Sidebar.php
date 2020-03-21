<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
	<div class="navbar-brand">Thai Orange</div><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarCollapse" href="#"><i class="fa fa-bars"></i></button>
	<!-- Navbar Search-->
	<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
		<a href="../../Checkout.php" type="button" class="btn btn-danger"><span class="fa fa-times mr-3"></span>ออกจากระบบ</a>
	</form>
</nav>
<!-- Sideabar -->
<div class="wrapper d-flex align-items-stretch">
	<nav id="sidebar" class="sb-sidenav accordion sb-sidenav-dark">
		<!-- <div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div> -->
		<h1>
			<div class="logo"><?php echo $_SESSION["status"]; ?></div>
		</h1>
		<ul class="list-unstyled components mb-5">
			<li class="">
				<a href="../Mainadmin.php"><span class="fa fa-home mr-3"></span> หน้าหลัก</a>
			</li>
			<li class="">
				<a href="../"><span class="fa fa-archive mr-3"></span> จัดการวัสดุ</a>
			</li>
			<li class="">
				<a href="../Add/add_mat.php"><span class="fa fa-plus mr-3"></span> เพิ่มข้อมูลสินค้า</a>
			</li>
			<li class="">
				<a href="Come_in/MatOrder_create.php"><span class="fa fa-cart-plus mr-3"></span> สั่งซื้อวัสดุ</a>
			</li>
			<li class="">
				<a href="History/Mat_History.php"><span class="fa fa-history mr-3"></span> ประวัติการสั่งซื้อวัสดุ</a>
			</li>
			<li class="">
				<a href="../Chart/main_chart.php"><span class="fa fa-bar-chart mr-3"></span> สถิติการสั่งซื้อวัสดุ</a>
			</li>
		</ul>
	</nav>