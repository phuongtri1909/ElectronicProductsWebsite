<div class="thank-you-email">
    <div class="header">
      <h2 style="color: green">Cảm ơn bạn đã đặt hàng!</h2>
    </div>
    <div class="content">
      <p>Xin chào <?php echo e($order->fullName); ?>,</p>
      <p>Bạn vừa đặt hàng từ cửa hàng chúng tôi với mã vận đơn là #<?php echo e($order->order_id); ?> , hãy để ý trạng thái đơn hàng và chúng tôi sẽ sớm giao tận tay đến bạn.</p>
      <p>Nếu bạn có bất kỳ câu hỏi nào về đơn hàng của mình, vui lòng liên hệ với chúng tôi qua email được gửi tới bạn.</p>
      <p>Xin cảm ơn!</p>
    </div>
    <div class="footer">
      <p>Trân trọng,</p>
      <p>3TDL Store</p>
    </div>
  </div><?php /**PATH E:\DoAnBe2\resources\views/emails/email_confirm.blade.php ENDPATH**/ ?>