<?php
$msg=$this->session->flashdata('msg');
if(isset($msg))
{
	?>
<div class="hs_alert_wrapper open_alert  hs_success msg1"> <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>1 Seeker <?= $msg ?></p>
    </div>
</div>
<?php
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="hs_heading medium">
            <h3>All Languages</h3>
        </div>
<div class="alert alert-info th_setting_text">
		<p><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Just double click on any text to update that.</p>
</div>
<div class="panel-group theme_panel" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#accordion_0" aria-expanded="true" aria-controls="accordion_0" class="">Home Page</a></h4>
	</div>
	<div id="accordion_0" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="hs_datatable_wrapper">
				<table id="example" class="hs_datatable table table-bordered">
					<thead>
					   <tr>
						<?php foreach($language_name as  $value) { ?>
							<th><?= $value->name; ?></th>
						<?php } ?>
					   </tr>
					</thead>
					<tbody>
					<?php foreach($language_info as $data) { ?>
						<tr>
						<?php foreach($language_name as $language_name1) 
						{ 
							
							$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$b=str_replace(' ', '-',$data->english);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id;
						?>
							<td id="" ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><span id="<?= $id_web; ?>"><?= $data->$key_word; ?></span></td>
						<?php } ?>
						 </tr>
						 <?php
							}
						?>
					</tbody>
				</table>
			</div> 
        </div>
    </div>
 </div>
 
 
 
 <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#header_menu" aria-expanded="" aria-controls="header_menu" class="">Header Menu</a></h4>
	</div>
	<div id="header_menu" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="panel-body">
				<div class="hs_datatable_wrapper">
					<table  class="hs_datatable table table-bordered">
						<thead>
						   <tr>
							<?php foreach($language_name as  $value) { ?>
								<th><?= $value->name; ?></th>
							<?php } ?>
						   </tr>
						</thead>
						<tbody>
						<?php foreach($language_menu_info as $data) { ?>
							<tr>
							<?php foreach($language_name as $language_name1)
							{ 
							$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$a=str_replace('&', '-',$a);
							$b=str_replace(' ', '-',$data->english);
							$b=str_replace('&', '-',$b);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id;
							?>
								<td ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><span id="<?= $id_web; ?>"><?= $data->$key_word; ?></span></td>
							<?php } ?>
							 </tr>
							 <?php
								}
							?>
						</tbody>
					</table>
				</div> 
			</div>
        </div>
    </div>
 </div>
 <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#user_profile" aria-expanded="" aria-controls="user_profile" class="">User Profile Page</a></h4>
	</div>
	<div id="user_profile" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="panel-body">
				<div class="hs_datatable_wrapper">
					<table class="hs_datatable table table-bordered">
						<thead>
						   <tr>
							<?php foreach($language_name as  $value) { ?>
								<th><?= $value->name; ?></th>
							<?php } ?>
						   </tr>
						</thead>
						<tbody>
						<?php foreach($language_my_applied_job as $data) { ?>
							<tr>
							<?php foreach($language_name as $language_name1) { 
							$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$a=str_replace('/', '-',$a);
							$a=str_replace(' ', '-',$a);
							$b=str_replace(' ', '-',$data->english);
							$b=str_replace('/', '-',$b);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id;
							?>
								<td ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><span id="<?= $id_web; ?>"><?= $data->$key_word; ?></span></td>
							<?php } ?>
							 </tr>
							 <?php
								}
							?>
						</tbody>
					</table>
				</div> 
			</div>
        </div>
    </div>
 </div>
 <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#login_page"  aria-controls="login_page" class="">Login Page</a></h4>
	</div>
	<div id="login_page" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="panel-body">
				<div class="hs_datatable_wrapper">
					<table class="hs_datatable table table-bordered">
						<thead>
						   <tr>
							<?php foreach($language_name as  $value) { ?>
								<th><?= $value->name; ?></th>
							<?php } ?>
						   </tr>
						</thead>
						<tbody>
						<?php foreach($language_login_page as $data) { ?>
							<tr>
							<?php foreach($language_name as $language_name1) 
							{
							$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$a=str_replace("n`t", '-',$a);
							$a=str_replace('?', '-',$a);
							$b=str_replace(' ', '-',$data->english);
							$b=str_replace("n`t", '-',$b);
							$b=str_replace('?', '-',$b);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id;
								?>
								<td ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><span id="<?= $id_web; ?>"><?= $data->$key_word; ?></span></td>
							<?php } ?>
							 </tr>
							 <?php
								}
							?>
						</tbody>
					</table>
				</div> 
			</div>
        </div>
    </div>
 </div>
 
 <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#register_page" aria-controls="register_page" class="">Register Page</a></h4>
	</div>
	<div id="register_page" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="panel-body">
				<div class="hs_datatable_wrapper">
					<table class="hs_datatable table table-bordered">
						<thead>
						   <tr>
							<?php foreach($language_name as  $value) { ?>
								<th><?= $value->name; ?></th>
							<?php } ?>
						   </tr>
						</thead>
						<tbody>
						<?php foreach($language_register_page as $data) { ?>
							<tr>
							<?php foreach($language_name as $language_name1) 
							{
							$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$a=str_replace('?', '-',$a);
							$b=str_replace(' ', '-',$data->english);
							$b=str_replace('?', '-',$b);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id; 
								?>
								<td ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><span id="<?= $id_web; ?>"><?= $data->$key_word; ?></span></td>
							<?php } ?>
							 </tr>
							 <?php
								}
							?>
						</tbody>
					</table>
				</div> 
			</div>
        </div>
    </div>
 </div>
 <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#accordion_2" aria-controls="accordion_1" class="">Recruiter Header</a></h4>
	</div>
	<div id="accordion_2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="panel-body">
				<div class="hs_datatable_wrapper">
					<table class="hs_datatable table table-bordered">
						<thead>
						   <tr>
							<?php foreach($language_name as  $value) { ?>
								<th><?= $value->name; ?></th>
							<?php } ?>
						   </tr>
						</thead>
						<tbody>
						<?php foreach($language_req_herder_page as $data) { ?>
							<tr>
							<?php foreach($language_name as $language_name1) 
							{
								$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$a=str_replace('&', '-',$a);
							$b=str_replace(' ', '-',$data->english);
							$b=str_replace('&', '-',$b);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id;
								
								?>
								<td ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><span id="<?= $id_web; ?>"><?= $data->$key_word; ?></span></td>
							<?php } ?>
							 </tr>
							 <?php
								}
							?>
						</tbody>
					</table>
				</div> 
			</div>
        </div>
    </div>
 </div>
 <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#rec_home" aria-controls="accordion_1" class="">Recruiter Home</a></h4>
	</div>
	<div id="rec_home" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="panel-body">
				<div class="hs_datatable_wrapper">
					<table class="hs_datatable table table-bordered">
						<thead>
						   <tr>
							<?php foreach($language_name as  $value) { ?>
								<th><?= $value->name; ?></th>
							<?php } ?>
						   </tr>
						</thead>
						<tbody>
						<?php foreach($language_recruiter_home as $data) { ?>
							<tr>
							<?php foreach($language_name as $language_name1) 
							{
								$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$a=str_replace('&', '-',$a);
							$b=str_replace(' ', '-',$data->english);
							$b=str_replace('&', '-',$b);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id;
								
								?>
								<td ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><span id="<?= $id_web; ?>"><?= $data->$key_word; ?></span></td>
							<?php } ?>
							 </tr>
							 <?php
								}
							?>
						</tbody>
					</table>
				</div> 
			</div>
        </div>
    </div>
 </div>
 <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#rec_pro_p" aria-controls="accordion_1" class="">Recruiter Profile Page</a></h4>
	</div>
	<div id="rec_pro_p" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="panel-body">
				<div class="hs_datatable_wrapper">
					<table class="hs_datatable table table-bordered">
						<thead>
						   <tr>
							<?php foreach($language_name as  $value) { ?>
								<th><?= $value->name; ?></th>
							<?php } ?>
						   </tr>
						</thead>
						<tbody>
						<?php foreach($language_req_profile_page as $data) { ?>
							<tr>
							<?php foreach($language_name as $language_name1)
							{ 
							$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$b=str_replace(' ', '-',$data->english);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id; 
							?>
								<td ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><span id="<?= $id_web; ?>"><?= $data->$key_word; ?></span></td>
							<?php } ?>
							 </tr>
							 <?php
								}
							?>
						</tbody>
					</table>
				</div> 
			</div>
        </div>
    </div>
 </div>
 <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#job_post_page" aria-controls="accordion_1" class="">Job  Post Page</a></h4>
	</div>
	<div id="job_post_page" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="panel-body">
				<div class="hs_datatable_wrapper">
					<table class="hs_datatable table table-bordered">
						<thead>
						   <tr>
							<?php foreach($language_name as  $value) { ?>
								<th><?= $value->name; ?></th>
							<?php } ?>
						   </tr>
						</thead>
						<tbody>
						<?php foreach($language_job_post_page as $data) { ?>
							<tr>
							<?php foreach($language_name as $language_name1)
							{ 
							$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$a=str_replace('(', '-',$a);
							$a=str_replace(')', '-',$a);
							$a=str_replace(',', '-',$a);
							$a=str_replace('/', '-',$a);
							$b=str_replace(' ', '-',$data->english);
							$b=str_replace('(', '-',$b);
							$b=str_replace(')', '-',$b);
							$b=str_replace(',', '-',$b);
							$b=str_replace('/', '-',$b);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id;
							?>
								<td ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><span id="<?= $id_web; ?>"><?= $data->$key_word; ?></span></td>
							<?php } ?>
							 </tr>
							 <?php
								}
							?>
						</tbody>
					</table>
				</div> 
			</div>
        </div>
    </div>
 </div>
 
 <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#single_job_page"  aria-controls="accordion_1" class="">Single Job Page</a></h4>
	</div>
	<div id="single_job_page" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="panel-body">
				<div class="hs_datatable_wrapper">
					<table class="hs_datatable table table-bordered">
						<thead>
						   <tr>
							<?php foreach($language_name as  $value) { ?>
								<th><?= $value->name; ?></th>
							<?php } ?>
						   </tr>
						</thead>
						<tbody>
						<?php foreach($language_job_single_page as $data) { ?>
							<tr>
							<?php foreach($language_name as $language_name1)
							{
								$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$b=str_replace(' ', '-',$data->english);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id;
								?>
								<td ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><span id="<?= $id_web; ?>"><?= $data->$key_word; ?></span></td>
							<?php } ?>
							 </tr>
							 <?php
								}
							?>
						</tbody>
					</table>
				</div> 
			</div>
        </div>
    </div>
 </div>
 <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#validation" aria-controls="accordion_1" class="">Validation</a></h4>
	</div>
	<div id="validation" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="panel-body">
				<div class="hs_datatable_wrapper">
					<table class="hs_datatable table table-bordered">
						<thead>
						   <tr>
							<?php foreach($language_name as  $value) { ?>
								<th><?= $value->name; ?></th>
							<?php } ?>
						   </tr>
						</thead>
						<tbody>
						<?php foreach($language_validation_page as $data) { ?>
							<tr>
							<?php foreach($language_name as $language_name1) 
							{
							$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$a=str_replace('/', '-',$a);
							$a=str_replace('\'', '-',$a);
							$b=str_replace(' ', '-',$data->english);
							$b=str_replace('/', '-',$b);
							$b=str_replace('\'', '-',$b);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id;
								?>
								<td ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><span id="<?= $id_web; ?>"><?= $data->$key_word; ?></span></td>
							<?php } ?>
							 </tr>
							 <?php
								}
							?>
						</tbody>
					</table>
				</div> 
			</div>
        </div>
    </div>
 </div>
 <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#my_applied_job"  aria-controls="accordion_1" class="">My Applied Jobs</a></h4>
	</div>
	<div id="my_applied_job" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="panel-body">
				<div class="hs_datatable_wrapper">
					<table class="hs_datatable table table-bordered">
						<thead>
						   <tr>
							<?php foreach($language_name as  $value) { ?>
								<th><?= $value->name; ?></th>
							<?php } ?>
						   </tr>
						</thead>
						<tbody>
						<?php foreach($language_my_applied_job_page as $data) { ?>
							<tr>
							<?php foreach($language_name as $language_name1) 
							{
								$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$b=str_replace(' ', '-',$data->english);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id;
								?>
								<td ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><span id="<?= $id_web; ?>"><?= $data->$key_word; ?></span></td>
							<?php } ?>
							 </tr>
							 <?php
								}
							?>
						</tbody>
					</table>
				</div> 
			</div>
        </div>
    </div>
 </div>
 <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#applied_seeker"  aria-controls="accordion_1" class="">Applied Seeker</a></h4>
	</div>
	<div id="applied_seeker" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="panel-body">
				<div class="hs_datatable_wrapper">
					<table class="hs_datatable table table-bordered">
						<thead>
						   <tr>
							<?php foreach($language_name as  $value) { ?>
								<th><?= $value->name; ?></th>
							<?php } ?>
						   </tr>
						</thead>
						<tbody>
						<?php foreach($language_applied_seeker_page as $data) { ?>
							<tr>
							<?php foreach($language_name as $language_name1)
						{ 
						$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$b=str_replace(' ', '-',$data->english);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id;
							?>
								<td ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><span id="<?= $id_web; ?>"><?= $data->$key_word; ?></span></td>
							<?php } ?>
							 </tr>
							 <?php
								}
							?>
						</tbody>
					</table>
				</div> 
			</div>
        </div>
    </div>
 </div>
 <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#seeker_info"  aria-controls="accordion_1" class="">Seeker information</a></h4>
	</div>
	<div id="seeker_info" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="panel-body">
				<div class="hs_datatable_wrapper">
					<table class="hs_datatable table table-bordered">
						<thead>
						   <tr>
							<?php foreach($language_name as  $value) { ?>
								<th><?= $value->name; ?></th>
							<?php } ?>
						   </tr>
						</thead>
						<tbody>
						<?php foreach($language_seeker_info as $data) { ?>
							<tr>
							<?php foreach($language_name as $language_name1) 
							{
							$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$b=str_replace(' ', '-',$data->english);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id;
								?>
								<td ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><span id="<?= $id_web; ?>"><?= $data->$key_word; ?></span></td>
							<?php } ?>
							 </tr>
							 <?php
								}
							?>
						</tbody>
					</table>
				</div> 
			</div>
        </div>
    </div>
 </div>
 <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#a_job_info"  aria-controls="accordion_1" class="">Applied Job information</a></h4>
	</div>
	<div id="a_job_info" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="panel-body">
				<div class="hs_datatable_wrapper">
					<table class="hs_datatable table table-bordered">
						<thead>
						   <tr>
							<?php foreach($language_name as  $value) { ?>
								<th><?= $value->name; ?></th>
							<?php } ?>
						   </tr>
						</thead>
						<tbody>
						<?php foreach($language_applied_job_info as $data) { ?>
							<tr>
							<?php foreach($language_name as $language_name1) 
							{ 
							$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$b=str_replace(' ', '-',$data->english);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id; 
							?>
								<td ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><span id="<?= $id_web; ?>"><?= $data->$key_word; ?></span></td>
							<?php } ?>
							 </tr>
							 <?php
								}
							?>
						</tbody>
					</table>
				</div> 
			</div>
        </div>
    </div>
 </div>
 <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#revenue_plans"  aria-controls="accordion_1" class="">Revenue Plans</a></h4>
	</div>
	<div id="revenue_plans" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="panel-body">
				<div class="hs_datatable_wrapper">
					<table class="hs_datatable table table-bordered">
						<thead>
						   <tr>
							<?php foreach($language_name as  $value) { ?>
								<th><?= $value->name; ?></th>
							<?php } ?>
						   </tr>
						</thead>
						<tbody>
						<?php foreach($language_revenue_plans as $data) { ?>
							<tr>
							<?php foreach($language_name as $language_name1) { 
							$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$b=str_replace(' ', '-',$data->english);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id; 
							?>
								<td ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><span id="<?= $id_web; ?>"><?= $data->$key_word; ?></span></td>
							<?php } ?>
							 </tr>
							 <?php
								}
							?>
						</tbody>
					</table>
				</div> 
			</div>
        </div>
    </div>
 </div>
 <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#payment_getway" aria-expanded="" aria-controls="accordion_1" class="">Payment Gateway</a></h4>
	</div>
	<div id="payment_getway" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="panel-body">
				<div class="hs_datatable_wrapper">
					<table class="hs_datatable table table-bordered">
						<thead>
						   <tr>
							<?php foreach($language_name as  $value) { ?>
								<th><?= $value->name; ?></th>
							<?php } ?>
						   </tr>
						</thead>
						<tbody>
						<?php foreach($language_payment as $data) { ?>
							<tr>
							<?php foreach($language_name as $language_name1) { 
							$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$b=str_replace(' ', '-',$data->english);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id;
							?>
								<td ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><?= $data->$key_word; ?></td>
							<?php } ?>
							 </tr>
							 <?php
								}
							?>
						</tbody>
					</table>
				</div> 
			</div>
        </div>
    </div>
 </div>
 
 <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_0">
		<h4 class="panel-title">
		<a role="button" data-toggle="collapse" data-parent="#accordion" href="#term" aria-expanded="" aria-controls="accordion_1" class="">Compliance Pages</a></h4>
	</div>
	<div id="term" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_0">
		<div class="panel-body">
			<div class="panel-body">
				<div class="hs_datatable_wrapper">
					<table class="hs_datatable table table-bordered">
						<thead>
						   <tr>
							<?php foreach($language_name as  $value) { ?>
								<th><?= $value->name; ?></th>
							<?php } ?>
						   </tr>
						</thead>
						<tbody>
						<?php foreach($language_term as $data) { ?>
							<tr>
							<?php foreach($language_name as $language_name1) { 
							$key_word=$language_name1->name; 
							$a=str_replace(' ', '-',$data->$key_word);
							$a=str_replace('&', '-',$a);
							$b=str_replace(' ', '-',$data->english);
							$b=str_replace('&', '-',$b);
							$id_web=$b.$a.$key_word;
							$field=$key_word;
							$data1=$data->$key_word;
							$db_id=$data->language_id;
							?>
								<td ondblclick="update_language('<?= $id_web ?>','<?= $field ?>','<?=$data1 ?>','<?= $db_id ?>');"><?= $data->$key_word; ?></td>
							<?php } ?>
							 </tr>
							 <?php
								}
							?>
						</tbody>
					</table>
				</div> 
			</div>
        </div>
    </div>
 </div>
 </div>
 

    </div>
</div>
<div id="update_language_popup" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Change Language Text</h4>
			</div>
			<div class="modal-body">
			<div class="hs_input">
					<form id="language_up_form">
					<input type="hidden" name="id_web" id="id_web" value=""/>
					<input type="hidden" name="id" id="id_db" value=""/>
					<input type="hidden" name="field" id="field" value=""/>
					<input type="text" id="data" name="" id="data" value="" class="form-control">
					</form>
			 </div>
			 <input type="button" onclick="languageUpdate()" value="Update" class="btn">
</div>
			<div id="disp_language_data"> 
			
			</div>
		</div>
	</div>
</div>