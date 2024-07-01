<?php include('common/head-section.php');  ?>
<div class="alert_close jp_alert_wrapper jp_error ap_msg msg">
	<div class="jp_alert_inner">
		<p class="ng-binding"></p>
	</div>
</div>
<div class="jp_sidebar_close"></div>
<!-- header start -->
<div class="jp_header" <?php include('module/bg_img.php'); ?>>
    <div class="container">
        <div class="row">
           <?php
				if($this->uri->segment(1)=='recruiter')
			    {
				   include('common/header_recruiter.php');
			    }
			    else
			    {
				   include('common/header_user.php');  
			    }      
			?>		
			<div class="col-md-12">
                <div class="jp_page_title">
                    <h3><?php  echo $controller->set_language('contect_heding'); ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>   
<!-- header end -->
<div class="jp_main_wrapper">
   <div class="container">
       <div class="row">	
			<div class="col-md-12">
				<div class="jp_term_wrapper jb_contact_wrapper">
					<div class="row">
						<div class="col-md-6">
						<?php
						$contect_img=$res->contect_img;
						$contect_img1='';
						if($contect_img)
						{
							$contect_img1=base_url().$res->contect_img;
						}
						else
						{
							$contect_img1=base_url('assets/images/contact.jpg');
						}
						?>
							<img src="<?php echo $contect_img1 ?>" alt="" class="img-responsive">
							<br>
						</div>
						<div class="col-md-6">
							<div class="jb_contact_form">
							<form id="contect_form">
								<div class="jp_input_wrapper">
									<label><?php  echo $controller->set_language('full_name_keyword'); ?></label>
									<input type="text" name="name" value="" id="name" class="form-control">
								</div>
								<div class="jp_input_wrapper">
									<label><?php  echo $controller->set_language('mobile_no_keyword'); ?></label>
									<input type="text" name="mno" value="" id="mno" class="form-control">
								</div>
								<div class="jp_input_wrapper">
									<label><?php  echo $controller->set_language('sub_keyword'); ?></label>
									<input type="text" name="subject" value="" id="subject" class="form-control">
								</div>
								<div class="jp_input_wrapper">
									<label><?php  echo $controller->set_language('msg_keyword'); ?></label>
									<textarea name="msg" value="" id="msg" class="form-control"></textarea>
								</div>
								</form>
								<button onclick="contect_us_send();" class="jp_btn"><?php  echo $controller->set_language('submit_btn'); ?></button>
							</div>
						</div>
					</div>
			   </div> 
           </div> 
       </div> 
   </div>
</div>
<?php
if($this->uri->segment(1)=='recruiter')
{
   include('common/footer_recruiter.php');
}
else
{
   include('common/footer_user.php');  
}
?>
<a href="#" id="jp_backToTop" title="Back to top">&uarr;</a>
</body>
</html>
<input type="hidden" name="validation_name_empty" id="validation_name_empty" value="<?= $controller->set_language_v('validation_name_empty'); ?>" class="form-control">
<input type="hidden" name="validation_mno_empty" id="validation_mno_empty" value="<?= $controller->set_language_v('validation_mno_empty'); ?>" class="form-control">
<input type="hidden" name="sub_empty" id="sub_empty" value="<?= $controller->set_language_v('sub_empty'); ?>" class="form-control">
<input type="hidden" name="msg_empty" id="msg_empty" value="<?= $controller->set_language_v('msg_empty'); ?>" class="form-control">
<input type="hidden" name="msg_not_send" id="msg_not_send" value="<?= $controller->set_language_v('msg_not_send'); ?>" class="form-control">
<input type="hidden" name="msg_send" id="msg_send" value="<?= $controller->set_language_v('msg_send'); ?>" class="form-control">
<input type="hidden" name="validation_valid_mno" id="validation_valid_mno" value="<?= $controller->set_language_v('validation_valid_mno'); ?>" class="form-control">