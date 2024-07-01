<?php 
if(isset($plan_info))
{
?>
<form id="plane_up_form">
			<input type="hidden" name="id_p" value="<?= $plan_info->id; ?>">
			<div class="modal-body">
				<div class="hs_input">
                    <label>Name</label>
                    <input type="text" name="name" id="up_name" placeholder="Enter Name" value="<?= $plan_info->name; ?>" class="form-control">
                </div>
				<div class="hs_input">
                    <label>USD Amount</label>
                    <input type="text" name="amount_usd" id="up_amount_usd" value="<?= $plan_info->amount_usd; ?>" placeholder="Enter USD Amount" class="form-control">
                </div>
				<div class="hs_input">
                    <label>INR Amount</label>
                    <input type="text" name="amount_inr" id="up_amount_inr" value="<?= $plan_info->amount_inr; ?>" placeholder="Enter USD Amount" class="form-control">
                </div>	
				<div class="hs_input" id="duration">
                    <label>Duration</label>
                    <div class="row">
						<div class="col-md-6">
						<select class="form-control add_plan_form" id="up_plan_duration_count" name="plan_duration_count">
									<option  value="Select">Select</option>
									<option <?php if($plan_info->plan_duration_count=='1') { echo "selected"; } ?>  value="1">1</option>
									<option <?php if($plan_info->plan_duration_count=='2') { echo "selected"; } ?> value="2">2</option>
									<option <?php if($plan_info->plan_duration_count=='3') { echo "selected"; } ?> value="3">3</option>
									<option <?php if($plan_info->plan_duration_count=='4') { echo "selected"; } ?> value="4">4</option>
									<option <?php if($plan_info->plan_duration_count=='5') { echo "selected"; } ?> value="5">5</option>
									<option <?php if($plan_info->plan_duration_count=='6') { echo "selected"; } ?> value="6">6</option>
									<option <?php if($plan_info->plan_duration_count=='7') { echo "selected"; } ?> value="7">7</option>
									<option <?php if($plan_info->plan_duration_count=='8') { echo "selected"; } ?> value="8">8</option>
									<option <?php if($plan_info->plan_duration_count=='9') { echo "selected"; } ?> value="9">9</option>
									<option <?php if($plan_info->plan_duration_count=='10') { echo "selected"; } ?> value="10">10</option>
									<option <?php if($plan_info->plan_duration_count=='11') { echo "selected"; } ?> value="11">11</option>
									<option <?php if($plan_info->plan_duration_count=='12') { echo "selected"; } ?> value="12">12</option>
									<option <?php if($plan_info->plan_duration_count=='13') { echo "selected"; } ?> value="13">13</option>
									<option <?php if($plan_info->plan_duration_count=='14') { echo "selected"; } ?> value="14">14</option>
									<option <?php if($plan_info->plan_duration_count=='15') { echo "selected"; } ?> value="15">15</option>
									<option <?php if($plan_info->plan_duration_count=='16') { echo "selected"; } ?> value="16">16</option>
									<option <?php if($plan_info->plan_duration_count=='17') { echo "selected"; } ?> value="17">17</option>
									<option <?php if($plan_info->plan_duration_count=='18') { echo "selected"; } ?> value="18">18</option>
									<option <?php if($plan_info->plan_duration_count=='19') { echo "selected"; } ?> value="19">19</option>
									<option <?php if($plan_info->plan_duration_count=='20') { echo "selected"; } ?> value="20">20</option>
									<option <?php if($plan_info->plan_duration_count=='21') { echo "selected"; } ?> value="21">21</option>
									<option <?php if($plan_info->plan_duration_count=='22') { echo "selected"; } ?> value="22">22</option>
									<option <?php if($plan_info->plan_duration_count=='23') { echo "selected"; } ?> value="23">23</option>
									<option <?php if($plan_info->plan_duration_count=='24') { echo "selected"; } ?> value="24">24</option>
									<option <?php if($plan_info->plan_duration_count=='25') { echo "selected"; } ?> value="25">25</option>
									<option <?php if($plan_info->plan_duration_count=='26') { echo "selected"; } ?> value="26">26</option>
									<option <?php if($plan_info->plan_duration_count=='27') { echo "selected"; } ?> value="27">27</option>
									<option <?php if($plan_info->plan_duration_count=='28') { echo "selected"; } ?> value="28">28</option>
									<option <?php if($plan_info->plan_duration_count=='29') { echo "selected"; } ?> value="29">29</option>
									<option <?php if($plan_info->plan_duration_count=='30') { echo "selected"; } ?> value="30">30</option>
							</select>
						</div>
						<div class="col-md-6">
							<select class="form-control add_plan_form" id="up_plan_duration_type" name="plan_duration_type">
								<option value="Select">Select</option>
								<option <?php if($plan_info->plan_duration_type=='Days') { echo "selected"; } ?> value="Days">Days</option>
								<option <?php if($plan_info->plan_duration_type=='Weeks') { echo "selected"; } ?> value="Weeks">Weeks</option>
								<option <?php if($plan_info->plan_duration_type=='Months') { echo "selected"; } ?> value="Months">Months</option>
								<option <?php if($plan_info->plan_duration_type=='Years') { echo "selected"; } ?> value="Years">Years</option>
							</select>
						</div>
					</div>	
                </div>
				<div class="col-sm-6">
					<div class="hs_radio_list">
					  <div class="hs_radio">
					   <input type="radio" id="one_plan11" <?php if($plan_info->condation1=='number_job_post') { echo "checked"; } ?>  class="p2" onclick="change_control1();" name="condation11"  checked  value="number_job_post" >		
					   <label for="one_plan11">Choose Number Of Job Post</label>	
					  </div>
					 </div>
				</div>
				<div class="col-sm-6">
					<div class="hs_input"> 
					   <input type="text" <?php if($plan_info->condation1=='num_of_resume_download') { echo "disabled='true'"; } ?> class="form-control revenuefields" value="ALL"   id="one_num_of_job1" name="value1" value="" >	
					   <p class="help-block">.</p>   
					 </div> 
				</div>
				<div class="col-md-6">
				    <div class="hs_radio_list">	
					   <div class="hs_radio">
					        <input type="radio" onclick="change_control1();" <?php if($plan_info->condation1=='num_of_resume_download') { echo "checked"; } ?> id="one_plan22" class="p2" name="condation11"  value="num_of_resume_download" >	
					       <label for="one_plan22">Choose Number Of Resume Download</label>	
					   </div>	
					</div>	
				</div>	
			    <div class="col-md-6">   
					<div class="hs_input"> 
					   <input type="text" <?php if($plan_info->condation1=='number_job_post') { echo "disabled='true'"; } ?> class="form-control revenuefields"  value="ALL"  id="one_number_of_resume1"  name="value2" >
					   <p class="help-block">.</p>  
					</div>   
			    </div>
				<div class="col-md-12">
					<div class="hs_radio_list">	
					   <div class="hs_radio">	
						<input type="radio" <?php if($plan_info->condation1=='applay_both_condation') { echo "checked"; } ?> onclick="change_control1();" id="one_plan33" name="condation11" class="p2"  value="applay_both_condation" >
						<label for="one_plan33">Both Condition</label>	
					   </div>	
					 </div>	
				</div>
				<div class="hs_input">
                    <label>Desctiption</label>
                    <textarea name='description' value="" id="up_description" class="form-control" placeholder="Enter Desctiption"><?= $plan_info->description; ?></textarea>
                </div>
				</form>
                </div>
				<input type="button" name="btn" class="btn" onclick="plan_up();" value="Save" title="Save" />
<?php } ?>

<script>
$('document').ready(function(){
	$('.p2').click(function(){	
					var data=$("input[name='condation1']:checked").val();	
					if(data.match('number_job_post'))		
						{			
							$("#u_one_number_of_resume").attr("disabled","true");  
							$("#u_one_num_of_job").removeAttr("disabled");						
						}
						else if(data.match('num_of_resume_download'))
						{
							$("#u_one_num_of_job").attr("disabled","true");
							$("#u_one_number_of_resume").removeAttr("disabled");
						}
						else 
						{
							$("#u_one_number_of_resume").removeAttr("disabled"); 
							$("#u_one_num_of_job").removeAttr("disabled");
						}
					});	
});
</script>
