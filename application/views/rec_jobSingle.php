<!DOCTYPE html>
<html>
<head>
<?php
$res=$this->Common_model->select('jp_setting','2','id');
?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta name="description"  content="<?= $r1->meta_desc; ?>"/>
	<meta name="keywords" content="<?= $r1->meta_keyword; ?>">
	<meta name="author"  content="<?= $r1->author; ?>"/>
	<meta name="MobileOptimized" content="320">
	<title><?= $res->title; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery.toast.css'); ?>">
	<link rel="icon" type="image/ico" href="<?= base_url().$res->fevi; ?>" />
	<link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
</head>
<body onload="read_cookie();" <?php if(!empty($this->email)) { echo "class='jp_login'"; } ?>>
<div class="jp_loading_wrapper">
    <div class="jp_loading_inner">
        <img src="<?= base_url('assets/images/loader01.gif'); ?>" alt="" />
    </div>
</div>
<?php include('common/head-section.php'); ?>
<div class="jp_sidebar_close"></div>
<!-- header start -->
<div class="jp_header" <?php include('module/bg_img.php'); ?>>
    <div class="container">
        <div class="row">
            <?php include('common/header_recruiter.php'); ?> 
			<div class="col-md-12">
                <div class="jp_page_title">
                    <h3><?= $r1->specialization; ?></h3>
                    <p><span id=""></span><?= $controller->set_language('form_k'); ?> - <?= $res0->name; ?></p>
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
                            <span><span id="single_organisation_keyword"><?= $controller->set_language('org_k'); ?></span> - <?= $res0->name; ?></span>
                            <ul>
                                <li title="<?= $controller->set_language('tt1'); ?>"><span><img src="<?= base_url('assets/images/experience.svg'); ?>" alt=""></span> <?= $r1->exp; ?></li>
                                <li title="<?= $controller->set_language('tt2'); ?>"><span><img src="<?= base_url('assets/images/location.svg'); ?>" alt=""></span> <?= $r1->job_location; ?></li>
                            </ul>
                            <h4 title="<?= $controller->set_language('tt3'); ?>">
                               <span class="icon"></span>
                                <span class="skills"><?= $r1->technology; ?></span>
                            </h4>
                            <p><strong><span id=""><?= $controller->set_language('job_posted'); ?></span>:</strong> <?= $r1->post_date; ?></p>
                            <p><strong><span id="single_job_type"><?= $controller->set_language('job_type'); ?></span> :</strong> <?= $r1->job_type; ?></p>
                            <p><strong><span id="single_designation"><?= $controller->set_language('desi'); ?></span> :</strong> <?= $r1->designation; ?></p>
                            <p><strong><span id="single_qualification"><?= $controller->set_language('qua'); ?></span> :</strong> <?= $r1->qualification; ?></p>
                            <p><strong><span id="single_specialization"><?= $controller->set_language('sp'); ?></span> :</strong> <?= $r1->specialization; ?></p>
                            <p><strong><span id="language">Language</span> :</strong> <?php if(empty($r1->language)) { echo "N/A"; } else { echo $r1->language; } ?> </p>
                            <p><strong><span id="skills">Skills</span> :</strong> <?php if(empty($r1->skills)) { echo "N/A"; } else { echo $r1->skills; } ?> </p>
                            <p><strong><span id="single_application_last_date"><?= $controller->set_language('last_date_of_a'); ?></span> :</strong> <?php if(empty($r1->lasr_date_application)) { echo "N/A"; } else { echo $r1->lasr_date_application; } ?> </p>
							<p><strong><span id="single_min"><?= $controller->set_language('min1'); ?></span> :</strong> <?= $r1->min."/".$r1->salary_range; ?> </p>
							<p><strong><span id="single_max"><?= $controller->set_language('max1'); ?></span> :</strong> <?= $r1->max."/".$r1->salary_range;; ?> </p>
							<p><strong><span id="notice_period">Notice Period</span> :</strong> <?= $r1->notice_period; ?> </p>
                             <div class="jp_job_disc">
                                <h4 id="single_h_pro"><?= $controller->set_language('h_pro'); ?></h4>
                                <?php 
								if($r1->written_test=='Yes')
								{
									?>
									<p><?= $controller->set_language('r_j__written_test_k'); ?></p>
									<?php
								}
								if($r1->group_discussion=='Yes')
								{
									?>
									<p><?= $controller->set_language('r_j__gtoup_d_k'); ?></p>
									<?php
								}
								if($r1->technical_round=='Yes')
								{
									?>
									<p><?= $controller->set_language('r_j__r_round_k'); ?></p>
									<?php
								}
								if($r1->hr_round=='Yes')
								{
									?>
									<p><?= $controller->set_language('r_j__hr_round_k'); ?></p>
									<?php
								}
								?>
                             </div>
							<div class="jp_job_disc">
                                <h4 id="single_job_desc"><?= $controller->set_language('job_desc1'); ?></h4>
                                <p><?= $r1->job_desc; ?></p>
                            </div>
                            <div class="jp_job_disc">
                                <h4 id="single_org_d"><?= $controller->set_language('org_desc'); ?></h4>
                                <p><strong><span id="single_type"><?= $controller->set_language('org_type'); ?></span> :</strong> <?= $res0->org_type; ?></p>
                                <p><strong><span id="single_location"><?= $controller->set_language('j_location'); ?></span> :</strong> <?=  $res0->location;  ?></p>
                                <p><strong><span id="single_website"><?= $controller->set_language('j_website'); ?></span>:</strong> <a href="<?=  $res0->website;  ?>" target="_blank"><?=  $res0->website;  ?></a></p>
                            </div>
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