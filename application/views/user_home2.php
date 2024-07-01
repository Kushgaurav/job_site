<?php include('common/head-section.php'); 

$check=$this->session->userdata('job_applay');
if($check)
{
	redirect('home/user_jobSingle/'.$check);
}
?>

<div class="jp_sidebar_close"></div>
<!-- header start -->
<div class="jp_header" <?php include('module/bg_img.php'); ?> >
    <div class="container">
        <div class="row">
            <?php
				include('common/header_user.php');    
			?>		
            <div class="col-md-12">
                <div class="jp_page_title">
                    <h3><?php  echo $controller->set_language('home_page_heading'); ?></h3>
                    <p><?php echo $controller->set_language('filter_up_side_msg'); ?></p>
                </div>
            </div>

            <div class="col-md-8 col-md-offset-2">
			   <div class="jp_search_form">        
					<input type="text" name="search_txt" id="search_txt" placeholder="<?php  echo $controller->set_language('text_filter_placeholder'); ?>" />
                    <button id="sbtn" class="jp_search_btn"></button>
					<div id="key_res" class="jp_search_result_dd">
					</div>
                </div>
            </div>
        </div>
    </div>
</div>   
<!-- header end -->
<div class="jp_main_wrapper">   
    <div class="jp_doctor_list_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <!-- category start -->
                    <div class="jp_widget_wrapper">
                        
						<div class="jp_widget_box">
                            <h3 class="jp_widget_title"><?php  echo $controller->set_language('left_job_type'); ?></h3>
                            <div class="jp_checkbox_list">
                                <?php
								if(isset($job_type))
								{
								$i=0;
								foreach($job_type as $jt)
								{
									$i++;
									?>
								<div class="jp_checkbox">
                                    <input type="checkbox" name="s1" value="<?= $jt->name.'_jt'; ?>" id="<?= $i ?>" />
                                     <label for="<?= $i ?>"><?= $jt->name; ?></label>
                                </div>
								<?php
								}
								}
								else
								{
								   echo $controller->set_language('home_not_avil_msg');
								}
								?>
                            </div>
                        </div>
                        
                        <div class="jp_widget_box">
                            <h3 class="jp_widget_title"><?= $controller->set_language('left_location'); ?></h3>
                            <div class="jp_widget_search">
                                <input type="text"  id="loc_text" placeholder="Search..." />
                                <button class="icon" id="loc_text"></button>
                            </div>
							<div id="loc_data">
                            <div class="jp_checkbox_list">
							   <?php
							   if(isset($location))
							   {
							   $l=100;
								foreach($location as $loc)
								{
									$l++;
									?>
								<div class="jp_checkbox">
                                    <input type="checkbox" name="s1" value="<?= $loc->name.'_loc'; ?>" id="<?= $l; ?>" />
                                     <label for="<?= $l; ?>"><?= $loc->name; ?></label>
                                </div>
								<?php
								}
							   }
							   else
							   {
								    echo $controller->set_language('home_not_avil_msg');
							   }
								?>
                            </div>
							</div>
                        </div>

                        <div class="jp_widget_box">
                            <h3 class="jp_widget_title"><?= $controller->set_language('left_designation'); ?></h3>
                            <div class="jp_checkbox_list">
                                <?php
								if(isset($desi))
								{
							  $q=200;
								foreach($desi as $desi1)
								{
									$q++;
									?>
								<div class="jp_checkbox">
                                    <input type="checkbox" name="s1" value="<?= $desi1->name.'_desi'; ?>" id="<?= $q; ?>" />
                                     <label for="<?= $q; ?>"><?= $desi1->name; ?></label>
                                </div>
								<?php
								}
								}
								else
								{ echo $controller->set_language('home_not_avil_msg'); }
								?>
                            </div>
                        </div>
                        
                        <div class="jp_widget_box">
                            <h3 class="jp_widget_title"><?= $controller->set_language('left_qualification'); ?></h3>
                            <div class="jp_checkbox_list">
                               <?php
							   if(isset($qua))
							   {
							   $q=300;
								foreach($qua as $qu)
								{
									$q++;
									?>
								<div class="jp_checkbox">
                                    <input type="checkbox" name="s1" value="<?= $qu->name.'_qua'; ?>" id="<?= $q; ?>" />
                                     <label for="<?= $q; ?>"><?= $qu->name; ?></label>
                                </div>
								<?php
								}
							   }
							   else
							   { echo $controller->set_language('home_not_avil_msg'); }
								?>
                            </div>
                        </div>
                        
                        <div class="jp_widget_box">
                            <h3 class="jp_widget_title"><?= $controller->set_language('left_experience'); ?></h3>
                            <div class="jp_checkbox_list">
                               <?php
							   if(isset($exp))
							   {
							   $q=400;
								foreach($exp as $exp1)
								{
									$q++;
									?>
								<div class="jp_checkbox">
                                    <input type="checkbox" name="s1" value="<?= $exp1->name.'_exp'; ?>" id="<?= $q; ?>" />
                                     <label for="<?= $q; ?>"><?= $exp1->name; ?></label>
                                </div>
								<?php
								}
							   }
							   else
							   { echo $controller->set_language('home_not_avil_msg'); }
								?>
                            </div>
                        </div>
						<?php 
						if($custom_ads)
						{ ?>
						  <div class="">
                            <?php
							
								foreach($custom_ads as $ca)
								{
									$visible=$ca->home_page;
									$visible2=$ca->both_page;
									if($visible=="yes")
									{ 
										$image=$ca->add_img;
										?>
										<a target="_blank" href="<?= $ca->link1; ?>"><img class="img-responsive" src="<?= base_url().$image; ?>" alt="Ads"></a>
										<?php	
								   }
								    else if($visible2=="yes")
								    {
									    $image=$ca->add_img;
										?>
										<div class="wrapper">
										<a target="_blank" href="<?php echo  $ca->link1; ?>"><img class="img-responsive" src="<?php echo base_url().$image; ?>" alt="Ads"></a>
										</div>
										<?php	
								    }
								    else { }
								}
							
							?>
                        </div>
						<?php } ?>


                    </div>
                    <!-- category end -->
                </div>
                <div class="col-md-8">
					
					<!-- job listing start -->
					<div id="loading">
						<div class="jp_loading_inner">
							
						</div>
						</div>
					<div  id="se_res"></div>

                </div>
            </div>
        </div>
    </div>
</div>
<a href="#" id="jp_backToTop" title="Back to top">&uarr;</a>
</body>
</html>
<!-- site jquery start -->
<?php include('common/footer_user.php'); ?>
<!-- site jquery end -->
<script>
$(document).ready(function(){

 function load_country_data(page)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>index.php/Home/pagination/"+page,
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