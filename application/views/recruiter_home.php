<?php include('common/head-section.php'); ?>
<div class="jp_sidebar_close"></div>

<!-- header start -->
<div class="jp_header" <?php include('module/bg_img.php'); ?>>
    <div class="container">
        <div class="row">
            <?php include('common/header_recruiter.php'); ?>   
            <div class="col-md-12">
                <div class="jp_page_title">
                    <h3 id=""><?= $controller->set_language('recruiter_home_heading'); ?></h3>
                </div>
            </div>
			<div class="col-md-8 col-md-offset-2">
			   <div class="jp_search_form">        
					<input type="text" name="search_txt" id="search_txt1" placeholder="<?php  echo $controller->set_language('rec_filter_placeholder'); ?>" />
                    <button onclick="rec_job_filter();" class="jp_search_btn"></button>
					<div id="key_res" class="jp_search_result_dd">
					
					</div>
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
$('document').ready(function(){
	function load_country_data(page)
	 {
	  $.ajax({
	   url:"index.php/Recruiter/pagination/"+page,
	   method:"GET",
	   success:function(data)
	   {
		$('#se_res').html(data);
	   // $('#pl').html(data);
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