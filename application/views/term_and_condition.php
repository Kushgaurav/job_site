<?php include('common/head-section.php');  ?>
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
                    <h3><?php  echo $controller->set_language('terms_heading'); ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>   
<!-- header end -->
<div class="jp_main_wrapper">
   <div class="container">
       <div class="row">	
			<div class="jp_term_wrapper">
				<div class="col-md-12">
					<h3><b><?php  echo $controller->set_language('terms_heading'); ?></b></h3>
					<p>(Last Updated: <?php echo $res->	privacy_policy_update_date;   ?>)</p>
					<br>
					<?= $res->terms_condition; ?>	
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