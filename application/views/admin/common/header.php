<!DOCTYPE html>
<html>

<head>
    <?php
	$head_section=$this->Common_model->select('jp_setting','2','id');
	?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin -<?= $head_section->title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
	$favi1=$head_section->fevi;
	$favi2="";
	if($favi1)
	{
		$favi2=base_url().$head_section->fevi; 
	}
	else
	{
		$favi2=base_url()."assets/images/Logo.png";
	}
	?>
    <link rel="icon" type="image/ico" href="<?php echo $favi2; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/css/preloader.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/css/font-awesome.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/css/scrollbar.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/css/datatables.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/lib/cities.js'); ?>" />
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url('assets/admin/css/dataTables.bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/css/main.css'); ?>" />
</head>

<body>
    <?php
$ses=$this->session->userdata('uname');
if(!$ses)
{
	redirect('admin/');
}
?>
    <!-- preloader start -->
    <div class="hs_preloader">
        <div class="hs_preloader_inner">
            <span></span><span></span><span></span>
        </div>
    </div>
    <!-- preloader end -->
    <!-- alert start -->
    <div class="hs_alert_wrapper  hs_error msg">
        <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
        <div class="hs_alert_inner">
            <p> <span class="icon"></span><span class="err_msg">Please fill all the fields</span></p>
        </div>
    </div>
    <!-- alert end -->
    <!-- sidebar start -->
    <div class="hs_sidebar_wrapper">
        <div class="hs_logo">
            <?php 
	$logo_img=$head_section->logo_img;
	$logo_img2='';
	if($logo_img)
	{
		$logo_img2=base_url().$head_section->logo_img;
	}
	else
	{
		$logo_img2=base_url()."assets/images/logo_with_text.png";
	}
	?>
            <a href=""><img class="img-responsive" style="height: 30px;" src="<?php echo $logo_img2; ?>" alt=""></a>
        </div>
        <div class="hs_sidebar_body hs_custom_scrollbar">
            <div class="hs_nav">
                <ul>
                    <li><a <?php if($this->uri->segment(2)=='dashboard') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/d
ashboard'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
                    <li><a <?php if($this->uri->segment(2)=='seekers') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/seekers') ?>"><i class="fa fa-eye" aria-hidden="true"></i>
                            Seekers</a></li>
                    <li><a <?php if($this->uri->segment(2)=='recruiters') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/recruiters') ?>"><i class="fa fa-user-circle"
                                aria-hidden="true"></i> Recruiters</a></li>
                    <li><a <?php if($this->uri->segment(2)=='location') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/location') ?>"><i class="fa fa-map-marker" aria-hidden="true"></i>
                            Location</a></li>
                    <li><a <?php if($this->uri->segment(2)=='area_of_sectors') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/area_of_sectors') ?>"><i class="fa fa-th-large"
                                aria-hidden="true"></i> Industry</a></li>
                    <li><a <?php if($this->uri->segment(2)=='specialization') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/specialization') ?>"><i class="fa fa-thumbs-o-up"
                                aria-hidden="true"></i> Funcation</a></li>
                    <!--////Specialization-->

                    <li><a <?php if($this->uri->segment(2)=='qualification_type') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/qualification_type') ?>"><i class="fa fa-book" aria-hidden="true"></i>
                            Qualification Types</a></li>

                    <li><a <?php if($this->uri->segment(2)=='qualification') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/qualification') ?>"><i class="fa fa-book" aria-hidden="true"></i>
                            Qualification</a></li>
                    <li><a <?php if($this->uri->segment(2)=='job_role') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/job_role') ?>"><i class="fa fa-arrow-circle-up"
                                aria-hidden="true"></i> Job Role</a></li>
                    <li><a <?php if($this->uri->segment(2)=='job_types') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/job_types') ?>"><i class="fa fa-list-ul" aria-hidden="true"></i>
                            Job Type</a></li>
                    <li><a <?php if($this->uri->segment(2)=='preferred_shift') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/preferred_shift') ?>"><i class="fa fa-briefcase"
                                aria-hidden="true"></i> Preferred Shift</a></li>

                    <li><a <?php if($this->uri->segment(2)=='notice_period') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/notice_period') ?>"><i class="fa fa-briefcase"
                                aria-hidden="true"></i> Notice Period</a></li>
                    <li><a <?php if($this->uri->segment(2)=='benefit') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/benefit') ?>"><i class="fa fa-briefcase"
                                aria-hidden="true"></i> Benefits</a></li>

                    <!--  -->
                    <li><a <?php if($this->uri->segment(2)=='skills') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/skills') ?>"><i class="fa fa-smile-o" aria-hidden="true"></i>
                            Skills</a></li>
                    <!--  -->


                    <li><a <?php if($this->uri->segment(2)=='experience') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/experience') ?>"><i class="fa fa-clock-o" aria-hidden="true"></i>
                            Experience</a></li>
                    <li><a <?php if($this->uri->segment(2)=='notification') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/notification') ?>"><i class="fa fa-comment"
                                aria-hidden="true"></i> Notification</a></li>

                    <li><a <?php if($this->uri->segment(2)=='client_logo') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/client_logo') ?>"><i class="fa fa-gratipay"
                                aria-hidden="true"></i>Client Logo</a></li>


                    <li><a <?php if($this->uri->segment(2)=='transaction') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/transaction') ?>"><i class="fa fa-stop" aria-hidden="true"></i>
                            Transactions</a></li>
                    <li><a <?php if($this->uri->segment(2)=='ads_integration') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/ads_integration') ?>"><i class="fa fa-suitcase"
                                aria-hidden="true"></i> Ads Integration</a></li>
                    <li><a <?php if($this->uri->segment(2)=='review') { echo "class='active'"; } else { echo "class=''"; } ?>
                            href="<?= base_url('admin/review') ?>"><i class="fa fa-star-half-empty"
                                aria-hidden="true"></i>Reviews</a></li>
                    <li class="hs_nav_dropdown"><a><i class="fa fa-cog" aria-hidden="true"></i> Setting</a>
                        <ul>
                            <li><a <?php if($this->uri->segment(2)=='website_setting') { echo "class='active'"; } else { echo "class=''"; } ?>
                                    href="<?= base_url('admin/website_setting') ?>"> General Setting</a></li>
                            <li><a <?php if($this->uri->segment(2)=='plans') { echo "class='active'"; } ?>
                                    href="<?= base_url('admin/plans') ?>"> Plans</a></li>
                            <!--<li><a <?php if($this->uri->segment(2)=='language_add') { echo "class='active'"; } ?> href="<?= base_url('admin/language_add') ?>"> Language Option</a></li>-->
                            <!--<li><a <?php if($this->uri->segment(2)=='social_login') { echo "class='active'"; } ?> href="<?= base_url('admin/social_login') ?>">Social Login Setting</a></li>-->
                            <li><a <?php if($this->uri->segment(2)=='compliamce_pages') { echo "class='active'"; } ?>
                                    href="<?= base_url('admin/compliamce_pages') ?>"> Compliance Pages</a></li>
                            <li><a <?php if($this->uri->segment(2)=='payment') { echo "class='active'"; } ?>
                                    href="<?= base_url('admin/payment') ?>"> Payment Method</a></li>
                        </ul>
                    </li>
                    <br><br><br><br><br><br>
                </ul>
            </div>
        </div>

    </div>
    <!-- sidebar end -->

    <!-- page start -->
    <div class="hs_page_wrapper">
        <!-- page title start -->
        <div class="hs_page_title">
            <h3><a href="<?= base_url() ?>" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i> Visit
                    Website</a></h3>
            <div class="hs_logout">
                <a href="<?= base_url('admin/logout') ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
            </div>
        </div>
        <!-- page title end -->

        <!-- page body start -->
        <div class="hs_page_body">