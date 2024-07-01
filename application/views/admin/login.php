<?php
$logout=$this->session->flashdata('logout');
if(isset($logout))
{
	?>
<div class="hs_alert_wrapper open_alert  hs_success msg"> <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>Successfully Logout</p>
    </div>
</div>
<?php
}
$msg1=$this->session->flashdata('msg1');
$head_section=$this->Common_model->select('jp_setting','2','id');
if(isset($msg1))
{
	
	?>

<div class="hs_alert_wrapper open_alert  hs_error msg1"> <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>please fill all required fields</p>
    </div>
</div>
<?php
}
?>
<div class="hs_auth_wrapper">
    <div class="hs_auth_logo" style="max-width: 100px;">
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
		<img src="<?php echo $logo_img2; ?>" style="height: 100px;" class="img-responsive" alt="" />
    </div>
   
	<div class="hs_auth_inner">
        <h3 class="text-center">Admin Login</h3><br>
		
		<?= form_open('admin/login'); ?>
		<div class="hs_input">
            <label>Email address</label>
            <input type="text" name="email" value="<?= $this->input->cookie('e1',true); ?>" class="form-control"  placeholder="Email">
        </div>
        <div class="hs_input">
            <label>Password</label>
            <input type="password" name="ps" value="<?= $this->input->cookie('p1',true); ?>" class="form-control" placeholder="Password">
        </div>
		<?php
		$rem1=$this->input->cookie('p1',true);
		if($rem1)
		{
		?>
		 <div class="hs_input">
            <input type="checkbox" name="remember" checked value="yes"> Remember me
        </div>
		<?php } else { ?>
		<div class="hs_input">
            <input type="checkbox" name="remember" value="yes"> Remember me
        </div>
		<?php } ?>
		<button id="admin_login_button" class="btn">Login</button>
		<?= form_close(); ?>
    </div>
</div>