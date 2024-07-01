<?php
$msg=$this->session->flashdata('msg');
if(isset($msg))
{
	?>
<div class="hs_alert_wrapper open_alert  hs_success msg1"> <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>1 Plan <?= $msg ?></p>
    </div>
</div>
<?php
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="hs_heading medium">
            <h3>All Plans (<?= $this->Common_model->row_count('jp_plans'); ?>) <a href="#add_plan_popup" class="btn" data-toggle="modal">Add new</a></h3>
        </div>
        <div class="hs_datatable_wrapper tabel-responsive">
            <table class="hs_datatable table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Duration Count</th>
						<th>Duration Type</th>
						<th>Status</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
					<?php
					if(isset($row))
					{
						$i=1;
						foreach($row as $r1)
						{
							?>		
					 <tr>
                        <td><?= $i++; ?></td>
                        <td width="200">
                            <div class="hs_user">
                                <div class="user_name">
                                    <p><?= $r1->name; ?></p>
                                </div>
                            </div>
                        </td>
						 <td width="200">
                            <div class="hs_user">
                                <div class="user_name">
                                    <p><?= $r1->amount_usd; ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
						<div class="hs_user">
                                <div class="user_name">
                                    <p><?= $r1->duration; ?></p>
                                </div>
                            </div>
						</td>
						<td>
						<div class="hs_user">
                                <div class="user_name">
                                    <p><?= $r1->description; ?></p>
                                </div>
                            </div>
						</td>
						<td>
							<select id="plane<?= $r1->id; ?>" onchange="plane_status(<?=  $r1->id; ?>)">
								<option <?php  if($r1->status=='Active') { echo "selected"; } ?> >Active</option>
								<option <?php  if($r1->status=='Inactive') { echo "selected"; } ?> >Inactive</option>
							</select>
						</td>
						<td width="200">
							<a  class="btn" title="Edit" data-name="Dentist" onclick="update_plan(<?=  $r1->id; ?>)"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                     </tr>
					 <?php
						}
					}
					?>
				</tbody>
            </table>
        </div>
    </div>
</div>
<!-- add seeker popup start -->
<div id="add_plan_popup" class="modal fade" role="dialog">
	<div class="modal-dialog new_width">
		<div id="data_disp"></div>
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add new Plan</h4>
			</div>
			<form id="plane_add">
			<div class="modal-body">
				<div class="hs_input">
                    <label>Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control">
                </div>
				<div class="hs_input">
                    <label>USD Amount</label>
                    <input type="text" name="amount_usd" id="amount_usd" placeholder="Enter USD Amount" class="form-control">
                </div>
				<div class="hs_input">
                    <label>INR Amount</label>
                    <input type="text" name="amount_inr" id="amount_inr" placeholder="Enter USD Amount" class="form-control">
                </div>
				<div class="hs_input">
                 <label>Plan Duration</label>
					<div class="row">
						<div class="col-md-6">
						<select class="form-control add_plan_form" id="plan_duration_count" name="plan_duration_count">
									<option value="Select">Select</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
							</select>
						</div>
						<div class="col-md-6">
							<select class="form-control add_plan_form" id="plan_duration_type" name="plan_duration_type">
								<option value="Select">Select</option>
								<option value="Days">Days</option>
								<option value="Weeks">Weeks</option>
								<option value="Months">Months</option>
								<option value="Years">Years</option>
							</select>
						</div>
					</div>	
                </div>
				<div class="col-sm-6">
					<div class="hs_radio_list">
					  <div class="hs_radio">
					   <input type="radio" id="one_plan1" class="p2" onclick="change_control();" name="condation1"  checked  value="number_job_post" >		
					   <label for="one_plan1">Choose Number Of Job Post</label>	
					  </div>
					 </div>
				</div>
				<div class="col-sm-6">
					<div class="hs_input"> 
					   <input type="text" class="form-control revenuefields" value="ALL"   id="one_num_of_job" name="value1" value="" >	
					   <p class="help-block">.</p>   
					 </div> 
				</div>
				<div class="col-md-6">
				    <div class="hs_radio_list">	
					   <div class="hs_radio">
					        <input type="radio" onclick="change_control();" id="one_plan2" class="p2" name="condation1"  value="num_of_resume_download" >	
					        <label for="one_plan2">Choose Number Of Resume Download</label>	
					   </div>	
					</div>	
				</div>	
			    <div class="col-md-6">   
					<div class="hs_input"> 
					   <input type="text" class="form-control revenuefields" disabled="true" value="ALL"  id="one_number_of_resume"  name="value2" >
					   <p class="help-block">.</p>  
					</div>   
			    </div>
				<div class="col-md-12">
					<div class="hs_radio_list">	
					   <div class="hs_radio">	
						<input type="radio" onclick="change_control();" id="one_plan3" name="condation1" class="p2"  value="applay_both_condation" >
						<label for="one_plan3">Both Condition</label>	
					   </div>	
					 </div>	
				</div>
				<div class="hs_input">
                    <label>Description</label>
                    <textarea name='description' id="description" class="form-control" placeholder="Enter Description"></textarea>
                </div>
				</form>
                </div>
				<input type="button" name="btn" class="btn" id="plan_add" value="Save" title="Save" /><br>.
			</div>
		</div>
</div>
<div id="update_plan_popup" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button  type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update Plan</h4>
			</div>
			
			<div class="modal-body">
			<div id="data_disp1"> 
			
			
			</div>
			</div>
			
		</div>
	</div>
</div>
<!-- add seeker popup end -->
<div id="delete_plan_popup" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button  type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Do you want to delete this plan</h4>
			</div>
			<div class="modal-body">
				<?= form_open('admin/delete_plane/'); ?>
				<div class="hs_input">
					<input type="hidden" name="id" id="disp_data" value="">
                </div>
				<input type="submit" name="sub" class="btn" value="Yes">
				<input type="button"  class="btn" value="No" id="no_btn"></div>
				</form>
				
			</div>
		</div>
</div>