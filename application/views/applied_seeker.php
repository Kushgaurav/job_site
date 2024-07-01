<?php include('common/head-section.php'); 
$resume_msg=$this->session->flashdata('msg');
if($resume_msg)
{
	?>
<div class="alert_open jp_alert_wrapper jp_error msg">
	<div class="jp_alert_inner">
			<p class="ng-binding"><?= $resume_msg  ?> </p>
			<p><a style="color:white" href="<?= base_url('recruiter/revenue_plans'); ?>"><?= $controller->set_language('active_new_p'); ?></a></p>
	</div>
</div>	
	<?php
}
?>
<div class="jp_sidebar_close"></div>
<!-- header start -->
<div class="jp_header" <?php include('module/bg_img.php'); ?>>
    <div class="container">
        <div class="row">
            <?php include('common/header_recruiter.php'); ?>  
            <div class="col-md-12">
                <div class="jp_page_title">
                    <h3><?= $controller->set_language('applied_s_heading'); ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>  
<!-- header end -->

<div class="jp_main_wrapper">
<div id="se_res"></div>
</div>
<?php include('common/footer_recruiter.php'); ?>
<a href="#" id="jp_backToTop" title="Back to top">&uarr;</a>
</body>
</html>
<script>
$(document).ready(function(){

 function load_country_data(page)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>Recruiter/pagination_applied_seeker/"+page,
   method:"GET",
   success:function(data)
   {
    $('#se_res').html(data);
   }
  });
 }
 load_country_data(1);

 $(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var page = $(this).data("ci-pagination-page");
  load_country_data(page);
 });

});
</script>