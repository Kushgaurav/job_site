<!DOCTYPE html>
<html>
<head>
	<?php
	$head_section=$this->Common_model->select('jp_setting','2','id');
	?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - <?= $head_section->title; ?>	</title>
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
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url('assets/admin/css/preloader.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/css/bootstrap.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/css/font-awesome.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/css/main.css') ?>" />    
</head>
<body class="auth_body"> 

<!-- preloader start -->
<div class="hs_preloader">
    <div class="hs_preloader_inner">
        <span></span><span></span><span></span>
    </div>
</div>
<?php 
$res=
 $this->session->flashdata('msg');
 if(isset($res))
 {
 ?>
 <div class="hs_alert_wrapper open_alert  hs_error msg"> 
 <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  --> 
 <div class="hs_alert_inner">
 <p> 
 <span class="icon"></span>The user name or password doesn't match</p>
 </div>
 </div>
 <?php 
 } 
 ?>
<!-- preloader end -->