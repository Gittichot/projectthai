<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <div class="navbar-brand">Thai Orange</div><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarCollapse" href="#"><i class="fa fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" action="./Checkout.php">
            <button type="submit" class="btn btn-danger"><span class="fa fa-times mr-3"></span>ออกจากระบบ</button>
                </div>
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
	  		<h1><div class="logo"><?php echo $_SESSION["status"]; ?></div></h1>
        <ul class="list-unstyled components mb-5">
          <li>
              <a href="./ManageMember/Main.php"><span class="fa fa-user-circle mr-3"></span> จัดการสมาชิก</a>
          </li>
          <li>
              <a href="./ManageBuy/Manage/Main.php"><span class="fa fa-book mr-3"></span> จัดการซื้อสินค้าหน้าร้าน</a>
          </li>
          <li>
            <a href="./ManageBooking/Manage/Main.php"><span class="fa fa-book mr-3"></span> จัดการจองสินค้า</a>
          </li>
          <li>
            <a href="./ManageStock/Main.php"><span class="fa fa-archive mr-3"></span> การจัดการคลังสินค้า</a>
          </li>
          <li>
            <a href="ManageMaterial/"><span class="fa fa-archive mr-3"></span> การจัดการคลังวัสดุ</a>
          </li>
          <li>
            <a href="./ManageDurableArticles/"><span class="fa fa-archive mr-3"></span> การจัดการคลังครุภัณฑ์</a>
          </li>
          <li>
              <a href="./ManageDealer/"><span class="fa fa-user-circle mr-3"></span> จัดการผู้จำหน่าย</a>
          </li>
          <li>
            <a href="./Report/Main.php"><span class="fa fa-file mr-3"></span> รายงาน</a>
          </li>
          <!-- <li>
            <a href="#"><span class="fa fa-times mr-3"></span> ออกจากระบบ</a>
          </li> -->
        </ul>
    	</nav>