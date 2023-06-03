

<?php echo $__env->make('layoutWebs.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container">
<div class="menu-container">
	<ul class="vertical-nav">
		
		<li>
			<a href="#">cai 1</a>
			<div class="hover-menu">
				<ul>
					<li><a href="#">Menu Item</a></li>
					<li><a href="#">Menu Item</a></li>
					<li><a href="#">Menu Item</a></li>
					<li><a href="#">Menu Item</a></li>
					<li><a href="#">Menu Item</a></li>
				</ul>
			</div>
		</li>
	</ul>
</div>
</div>



<div id="newsletter" class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Kết nối với <strong>3TDLStore</strong></p>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
 
</div>


<footer id="footer">
    <div class="section">

        <div class="container">
   
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Về chúng tôi</h3>
                        <p class="footer-content" >Chào mừng đến với trang web bán đồ điện tử của chúng tôi - nơi cung cấp hàng ngàn sản phẩm chất lượng với giá cả phải chăng.</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>53 võ văn ngân</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>21211tt1539@mail.tdc.edu.vn</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Thông tin chính sách</h3>
                        <ul class="footer-links">
                            <li><a href="#">Mua hàng và thanh toán Online</a></li>
                            <li><a href="#">Mua hàng trả góp Online</a></li>
                            <li><a href="#">Tra thông tin đơn hàng</a></li>
                            <li><a href="#">Trung tâm bảo hành chính hãng</a></li>
                            <li><a href="#">Quy định về việc sao lưu dữ liệu</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Dịch vụ và thông tin khác</h3>
                        <ul class="footer-links">
                            <li><a href="#">Ưu đãi thanh toán</a></li>
                            <li><a href="#">Quy chế hoạt động</a></li>
                            <li><a href="#">Chính sách Bảo hành</a></li>
                            <li><a href="#">Liên hệ hợp tác kinh doanh</a></li>
                            <li><a href="#">Tuyển dụng</a></li>
                            <li><a href="#"> Dịch vụ bảo hành điện thoại</a></li>
                           
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Tổng đài hỗ trợ miễn phí</h3>
                        <ul class="footer-links">
                            <li><a href="#"> Gọi mua hàng 1800.2097 (7h30 - 22h00)</a></li>
                            <li><a href="#">Gọi khiếu nại 1800.2063 (8h00 - 21h30)</a></li>
                            <li><a href="#">Gọi bảo hành 1800.2064 (8h00 - 21h00)</a></li>                  
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="bottom-footer" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="footer-title">Phương thức thanh toán</h3>
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
                      
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Created by  <i class="fa fa-heart-o" aria-hidden="true"></i> <a href="<?php echo e(route('home')); ?>" target="_blank">3TDLStore</a>
                 
                    </span>
                </div>
            </div>        
        </div>
    </div>
  
</footer>

<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/slick.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/nouislider.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.zoom.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/main.js')); ?>"></script>

</body>
</html>
<?php /**PATH E:\DoAnBe2\resources\views/layoutWebs/footer.blade.php ENDPATH**/ ?>