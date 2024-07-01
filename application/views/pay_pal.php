<?php
include('common/head-section.php');
?>
<body onload="read_cookie();" class="jp_authentication" <?php if(!empty($this->email)) { echo "class='jp_login'"; } ?>>
<input type="hidden" name="id" id="p_id" value=<?= $id; ?> />
<div class="jp_main_wrapper">
    <div class="jp_auth_box_wrapper">
        <div class="container">
            <div class="jp_auth_box jp_payment_button_wrapper">
				<div class="jp_auth_form">
					<h3 class="jp_auth_title"><?= $controller->set_language('paymenu_heading'); ?></h3>
					<?php 
					$paypal_status=$res->paypal_status;
					$payu_status=$res->payu_status;
					?>
					<ul class="jp_payment_buttons">
					<?php if($paypal_status=='active') { ?>
						<li>
							<div class="pull-left">
								<h4> <?= $controller->set_language('pay_with_key'); ?> <img src="<?php echo base_url('assets/images/paypal_img.png'); ?>" alt="" class="img-responsive"></h4>
							</div>
							<div class="pull-right">  
								<input type="button" id="paypal" value="<?= $controller->set_language('pay_now_btn'); ?>" class="jp_btn jp_paypal_btn" />
							</div>
						</li>
					<?php } 
					 if($payu_status=='active') { 
					?>
						<li>
							<div class="pull-left">
								<h4> <?= $controller->set_language('pay_with_key'); ?> <img src="<?= base_url('assets/images/payu.jpg'); ?>" alt="" width="120px" class="img-responsive"></h4>
							</div>
							<div class="pull-right">  
								<input type="button" id="payu" value="<?= $controller->set_language('pay_now_btn'); ?>" class="jp_btn jp_paypal_btn" />
							</div>
						</li>
					 <?php } ?>
					</ul>
					<div id="form">
						
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<?php include('common/footer_user.php'); ?>
</body>
</html>