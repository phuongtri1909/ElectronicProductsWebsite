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

<?php /**PATH E:\DoAnBe2\resources\views/admin/header.blade.php ENDPATH**/ ?>