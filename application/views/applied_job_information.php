<?php include('common/head-section.php'); ?>
<div class="jp_sidebar_close"></div>
<!-- header start -->
<div class="jp_header" style="background-image: url(<?= base_url().$res->bg_img; ?>);">
    <div class="container">
        <div class="row">
            <?php
				include('common/header_recruiter.php');     
			?>
            <div class="col-md-12">
                <div class="jp_page_title">
                    <h3><?= $controller->set_language('Job_details'); ?></h3>
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
			  <div class="jp_single_wrapper">
                    <div class="jp_job_box">
                        <div class="job_detail">
                            <h3><?= $r1->specialization; ?></h3>
                            <span><?= $controller->set_language('i_name'); ?></span>
                            <ul>
                                <li><span><img src="assets/images/experience.svg" alt=""></span> <?= $r1->exp; ?></li>
                                <li><span><img src="assets/images/location.svg" alt=""></span> <?= $r1->job_location; ?></li>
                            </ul>
                            <h4>
                                <span class="icon"></span>
                                <span class="skills"><?=  $r1->technology; ?></span>
                            </h4>
                            
                            <p><strong><?= $controller->set_language('job_posted'); ?>:</strong> <?= $r1->post_date; ?></p>
                            <p><strong><?= $controller->set_language('j_type'); ?> :</strong> <?= $r1->job_type; ?></p>
                            <p><strong><?= $controller->set_language('desi'); ?> :</strong> <?= $r1->designation; ?></p>
                            <p><strong><?= $controller->set_language('qualification'); ?> :</strong> <?= $r1->qualification; ?></p>
                            <p><strong><?= $controller->set_language('sp'); ?> :</strong> <?= $r1->specialization; ?></p>
                            <p><strong><?= $controller->set_language('last_date_a'); ?> :</strong> <?php if($r1->lasr_date_application=="") { echo "N/A"; } else { echo $r1->lasr_date_application; } ?> </p>
                    </div>
               </div>
           </div>  
       </div>
   </div>
</div>
<?php include('common/footer_recruiter.php'); ?>
<a href="#" id="jp_backToTop" title="Back to top">&uarr;</a>
</body>
</html>