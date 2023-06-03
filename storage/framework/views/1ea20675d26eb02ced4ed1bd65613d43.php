<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('storage/css/app.css')); ?>">

	<title>Admin Store</title>
</head>
<body>
	<div id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			
			<a href="#" class="profile">
				<img src="<?php echo e(asset('storage/images/tri.jpg')); ?>">
			</a>
		</nav>
	  </div>
		<!-- NAVBAR -->
		 <!-- SIDEBAR -->
		 <div id="sidebar">
			<a href="#" class="brand">
				<span class="text"><i class="bi bi-shop-window"></i>      LD3TStore</span>
			</a>
			<ul class="side-menu top">
				<li class="active">
					<a href="#">
						<i class='bx bxs-dashboard' ></i>
						<span class="text">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class='bx bxs-shopping-bag-alt' ></i>
						<span class="text">My Store</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class='bx bxs-doughnut-chart' ></i>
						<span class="text">Analytics</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class='bx bxs-message-dots' ></i>
						<span class="text">Message</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class='bx bxs-group' ></i>
						<span class="text">Team</span>
					</a>
				</li>
			</ul>
			<ul class="side-menu">
				<li>
					<a href="#">
						<i class='bx bxs-cog' ></i>
						<span class="text">Settings</span>
					</a>
				</li>
				<li>
					<a href="#" class="logout">
						<i class='bx bxs-log-out-circle' ></i>
						<span class="text">Logout</span>
					</a>
				</li>
			</ul>
		  </div>
			 <!-- SIDEBAR -->
	
	<?php echo $__env->yieldContent('content'); ?>
<script src="<?php echo e(asset('storage/js/app.js')); ?>"></script>
</body>
</html>  



<?php /**PATH E:\DoAnBe2\resources\views/products/about.blade.php ENDPATH**/ ?>