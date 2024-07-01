<?php include('common/head-section.php'); ?>
<div class="jp_sidebar_close"></div>
<!-- header start -->
<div class="jp_header">
    <div class="container">
        <div class="row">
            <?php
      			   include('common/header_recruiter.php');    
      			?>
             <div class="col-md-12">
                <div class="jp_page_title">
                    <h3><?= $controller->set_language('seeker_d_heading'); ?></h3>
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
                            <h3><?= $seeker_informaion->name; ?></h3>
                            <span><?= $controller->set_language('seeker_name'); ?></span>
                            <ul>
                                <li><span><img src="assets/images/experience.svg" alt=""></span> <?= $seeker_informaion->exp; ?></li>
                                <li><span><img src="assets/images/location.svg" alt=""></span> <?= $seeker_informaion->p_locaion; ?></li>
                            </ul>
                            <p><strong><?= $controller->set_language('job_type'); ?> :</strong> <?= $seeker_informaion->job_type; ?></p>
                            <p><strong><?= $controller->set_language('qualification'); ?> :</strong> <?= $seeker_informaion->qua; ?></p>
							<p><strong><?= $controller->set_language('p_year'); ?> :</strong> <?= $seeker_informaion->p_year; ?></p>
							 <p><strong><?= $controller->set_language('resume_keyword'); ?> :</strong> <a target="_blank" href="<?= base_url('recruiter/resume_download/'.$seeker_informaion->id.'/'.$job_id); ?>"><?= $controller->set_language('resume_download');  ?> </a></p>
                        </div>
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