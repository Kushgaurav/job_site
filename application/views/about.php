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
                    <h3><?php  echo $controller->set_language('about_heading'); ?></h3>
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
                <div class="jp_term_wrapper jb_about_wrapper">
                    <div class="col-md-12">
                        <div class="row">
                            <?php
						$about_image1=$res->about_img;
						$about_image2='';
						if($about_image1)
						{
							$about_image2=base_url().$about_image1;
						}
						else
						{
							$about_image2=base_url('assets/images/about.jpg');
						}
						?>
                            <div class="col-md-12">
                                <img src="<?php echo $about_image2; ?>" alt="" class="img-responsive"
                                    style="max-width: 100px;">
                                <br>
                            </div>
                            <div class="col-md-12">
                                <h3 class="text-capitalize">
                                    <b><?php  echo $controller->set_language('about_heading'); ?></b>
                                </h3>
                                <br>
                                <?= $res->about_us; ?>
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