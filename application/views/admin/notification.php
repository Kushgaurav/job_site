<?php
include('common/header.php');
$msg=$this->session->flashdata('msg');
if(isset($msg))
{
	?>
<div class="hs_alert_wrapper open_alert  hs_success msg1"> <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>1 Recruiter <?= $msg ?></p>
    </div>
</div>
<?php
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="hs_heading medium">
            <h3>Notification</h3>
        </div>
         <div class="row">
			<div class="col-md-8">
				<form id="notification_send_form">
				<input type="hidden" name="date1" value="<?= date("jS  F Y "); ?>">
				<div class="hs_input">
					<label>Type</label>
				    <select class="form-control" name='notification_type'>
						<option value="seeker">Seeker</option>
						<option value="recruiter">Recruiter</option>
					</select>
				</div>
				<div class="hs_input">
					<label>Title</label>
				   <input type="text" id="title" name="title"  class="form-control settingsfields" id="title" placeholder="Enter Title" />
				</div>
				<div class="hs_input">
					<label>Message</label>
				   <textarea name="message" id="message" class="form-control"></textarea>
				</div>
				</form>
				<div class="col-md-12">
					<button onclick="notification_send();" class="btn theme_btn">Send</button>
				</div>
			</div>
		</div>
    </div>
</div>


<?php
include('common/footer.php');
?>