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
<style>
.dd_review_rating {
    margin-bottom: 5px;
}
.dd_review_rating > ul {
    display: inline-block;
    list-style: none;
    padding: 0;
    margin-bottom: 0;
    vertical-align: middle;
}
.dd_review_rating > ul > li {
    display: inline-block;
}
.dd_review_rating > ul > li > .star.active {
    background-position: -15px 0px;
}
.dd_review_rating > ul > li > .star {
    width: 14px;
    height: 13px;
    display: block;
    background-image: url(<?= base_url('assets/images/stars.svg'); ?>);
}
</style>
</head>
<body  <?php if(!empty($this->email)) { echo "class='jp_login'"; } ?> onload="read_cookie(); review_show('<?= $r1->r_id; ?>');">
<div class="jp_loading_wrapper">
    <div class="jp_loading_inner">
        <img src="<?= base_url('assets/images/loader01.gif'); ?>" alt="" />
    </div>
</div>
<div class="jp_sidebar_close"></div>
<!-- header start -->
<div class="jp_header" <?php include('module/bg_img.php'); ?>>
    <div class="container">
        <div class="row">
            <?php
				include('common/header_user.php');    
			?>	
			<div class="col-md-12">
                <div class="jp_page_title">
                    <h3><?= $r1->specialization; ?></h3>
                    <p><span id=""><?= $controller->set_language('single_form_keyword'); ?></span>   - <?= $res0->name; ?></p>
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
			<?php 
			if($custom_ads)
			{ ?>
				<?php
					foreach($custom_ads as $ca)
					{
						$visible=$ca->single_page_top;
						$visible2=$ca->both_page;
						if($visible=="yes")
						{ 
							$image=$ca->add_img;
							?>
							<div class="wrapper">
							<a target="_blank" href="<?php echo  $ca->link1; ?>"><img class="img-responsive" src="<?php echo base_url().$image; ?>" alt="Ads"></a>
							</div>
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
			<?php } ?>
			  <div class="jp_single_wrapper">
                    <div class="jp_job_box">
                        <div class="job_detail">
                            <h3><?= $r1->specialization; ?></h3>
                            <span><span id="single_organisation_keyword"><?= $controller->set_language('single_organisation_keyword'); ?></span> - <?= $res0->name; ?></span>
                            <ul>
                                <li title="<?= $controller->set_language('s_tool_tip1'); ?>"><span><img src="<?= base_url('assets/images/experience.svg'); ?>" alt=""></span> <?= $r1->exp; ?></li>
                                <li title="<?= $controller->set_language('s_tool_tip2'); ?>"><span><img src="<?= base_url('assets/images/location.svg'); ?>" alt=""></span> <?= $r1->state.",".$r1->city.",".$r1->locality; ?></li>
                            </ul>
                            <h4 title="<?= $controller->set_language('s_tool_tip3'); ?>">
                               <span class="icon"></span>
                                <span class="skills"><?= $r1->technology; ?></span>
                            </h4>
                            <p><strong><span ><?= $controller->set_language('single_job_post_date'); ?></span>:</strong> <?= $r1->post_date; ?></p>
                            <p><strong><span><?= $controller->set_language('single_job_type'); ?></span> :</strong> <?= $r1->job_type; ?></p>
                            <p><strong><span ><?= $controller->set_language('single_designation'); ?></span> :</strong> <?= $r1->designation; ?></p>
                            <p><strong><span >Language</span> :</strong> <?php if(empty($r1->language)) { echo "N/A"; } else { echo $r1->language; } ?></p>
                            <p><strong><span >Skills</span> :</strong><?php if(empty($r1->skills)) { echo "N/A"; } else { echo $r1->skills; } ?></p>
                            <p><strong><span id=""><?= $controller->set_language('single_qualification'); ?></span> :</strong> <?= $r1->qualification; ?></p>
                            <p><strong><span><?= $controller->set_language('single_specialization'); ?></span> :</strong> <?= $r1->specialization; ?></p>
                            <p><strong><span><?= $controller->set_language('single_application_last_date'); ?></span> :</strong> <?php if(empty($r1->lasr_date_application)) { echo "N/A"; } else { echo $r1->lasr_date_application; } ?> </p>
							<p><strong><span id=""><?= $controller->set_language('single_min'); ?></span> :</strong> <?= $r1->min."/".$r1->salary_range; ?> </p>
							<p><strong><span id=""><?= $controller->set_language('single_max'); ?></span> :</strong> <?= $r1->max."/".$r1->salary_range;; ?> </p>
                             
							<div class="jp_job_disc">
                                <h4 id=""><?= $controller->set_language('single_job_desc'); ?></h4>
                                <p><?= $r1->job_desc; ?></p>
                            </div>
                            <div class="jp_job_disc">
                                <h4 id=""><?= $controller->set_language('single_org_d'); ?></h4>
                                <p><strong><span id=""><?= $controller->set_language('single_type'); ?></span> :</strong> <?= $res0->org_type; ?></p>
                                <p><strong><span id=""><?= $controller->set_language('single_location'); ?></span> :</strong> <?= $r1->state.",".$r1->city.",".$r1->locality; ?> </p>
                                <p><strong><span id=""><?= $controller->set_language('single_website'); ?></span>:</strong> <a href="<?=  $res0->website;  ?>" target="_blank"><?=  $res0->website;  ?></a></p>
                            </div>
                            <?php if($this->uri->segment(4)) { ?>
                             <div class="col-sm-12"><br>
                             	<?php $session=$this->session->userdata('seeker'); ?>
                                <a class="jp_btn" <?php if($session) { ?> onclick="reating();" <?php } else { ?> href="<?= base_url('home/login'); ?>"  <?php } ?> >Write Review</a> <br><br>	
							<div class="dd_reviews"  >
							<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reviews</label>
							<div id="star"></div>
						</div>
					</div>
				<?php } ?>

                        </div>
						<?php
						 $name=$res0->name;
						$name2 = str_replace(' ', '-', $name);
						$name2 = str_replace('#', '-',$name2);
						$name2 = str_replace('@', '-',$name2);
						$sp=strtolower($r1->specialization);
						$sp2=str_replace(' ', '-', $sp);
						$location=strtolower($r1->job_location);
						$location2=str_replace(' ', '-',$location);
						?>
                       
                            <?php
							if($status=='no')
							{
							?>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?= base_url('home/job_applay/'.$r1->id.'/'.$res0->id); ?>" class="jp_btn" id=""><?= $controller->set_language('applay_btn'); ?></a>
							<?php
							}
							else
							{
								?>
								
								<?php
							}
							?>
                       
                    </div>
               </div>
			   <?php 
			if($custom_ads)
			{ ?>
				<?php
					foreach($custom_ads as $ca)
					{
						$visible=$ca->single_page_bottom;
						if($visible=="yes")
						{ 
							$image=$ca->add_img;
							?>
							<div class="wrapper">
							<a target="_blank" href="<?php echo  $ca->link1; ?>"><img class="img-responsive" src="<?php echo base_url().$image; ?>" alt="Ads"></a>
							</div>
							<?php	
					   }
					}
				?>
			<?php } ?>
           </div>
       </div>
   </div>
</div>
<div id="jp_view_user" class="jp_popup_wrapper">
    <div class="jp_popup_close" jp-popup-close=""></div>
    <div class="jp_popup_inner">
        <div class="jp_popup_header">
            <h3 class="ng-binding"><?= $res0->name; ?></h3>
            <span class="icon">
                <img alt="" src="<?= base_url().$res0->img; ?>" id="pimg">
            </span>
        </div>
        <div class="jp_popup_body">
            <form id="reating_form">
            <div class="dd_input_wrapper">
				<select class="form-control r_required" id="rat_rating">
					<option value="">Select Review Start</option>
					<option value="1">★</option>
					<option value="2">★★</option>
					<option value="3">★★★</option>
					<option value="4">★★★★</option>
					<option value="5">★★★★★</option>
				</select>
			</div><br>
			<div class="dd_input_wrapper">
				<textarea class="form-control" id="rat_comment" placeholder="Enter Your Message here" ></textarea>
			</div><br>
			<input type="hidden" name="recruiter_email" id="recruiter_email" value="<?= $r1->r_id; ?>" />
			<input type="hidden" name="seeker_email" id="seeker_email" value="<?= $this->session->userdata('seeker'); ?>" />
		  </form>
            <div class="dd_input_wrapper">
                <a class="jp_btn" onclick="add_review()">Submit</a>
            </div>
        </div>
    </div>
</div>

<?php include('common/footer_user.php'); ?>
<script type="text/javascript">
$('document').ready(function(){
	
});
</script>
<a href="#" id="jp_backToTop" title="Back to top">&uarr;</a>
</body>
</html>