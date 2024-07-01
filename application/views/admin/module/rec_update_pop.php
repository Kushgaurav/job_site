<?php
if(isset($rec_info))
{
?>
<form method="POST" action="update_rec_data">
    <input type="hidden" name='id' value="<?= $rec_info->id; ?>">


    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label>Name</label>
                <input type="text" value="<?= $rec_info->name; ?>" name="name" id="name" placeholder="Enter Name"
                    class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label>Email</label>
                <input type="text" value="<?= $rec_info->email; ?>" name="email" id="email" placeholder="Enter E-Mail"
                    class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label>Mobile No</label>
                <input type="text" value="<?= $rec_info->mno; ?>" name="mno" id="mno" placeholder="Enter Mobile Number"
                    class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label>Org type</label>
                <select name="org_type" id="org_type" class="form-control">
                    <option value="Company" <?php if($rec_info->org_type == 'Company'){echo 'selected';} ?>>Company
                    </option>
                    <option value="Consultant" <?php if($rec_info->org_type == 'Consultant'){echo 'selected';} ?>>
                        Consultant</option>
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label>Company Name</label>
                <input type="text" value="<?= $rec_info->company_name; ?>" name="company_name" id="company_name"
                    placeholder="Enter Company Name" class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label>Company Address</label>
                <input type="text" value="<?= $rec_info->company_address; ?>" name="company_address"
                    id="company_address" placeholder="Enter Company Address" class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label>Head Office Address</label>
                <input type="text" value="<?= $rec_info->address; ?>" name="address" id="address"
                    placeholder="Enter Address" class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label>Company website</label>
                <input type="text" value="<?= $rec_info->website; ?>" name="website" id="website"
                    placeholder="Enter website" class="form-control">
            </div>
            <div class="col-md-6 form-group">
                <label>Organisation Details</label>
                <input type="text" value="<?= $rec_info->des; ?>" name="des" id="des" placeholder="Enter Details"
                    class="form-control">
            </div>

        </div>
    </div>


    <!-- <div class="hs_input">
					 <label>E-Mail</label>
                    <input disabled type="text" name="email" id="email" class="form-control" value="<?= $rec_info->email; ?>" >
        </div>
		<div class="hs_input">
				<label>Payment Done</label>
        </div>
		<div class="hs_radio_list">
				<div class="hs_radio">		
						<input type="radio" id="p_yes" onclick="plan_show();" class="py" name="pay" <?php if($rec_info->pay=='yes') { echo "checked"; } ?>  value="yes" >		
						<label for="p_yes">Yes</label>	
				</div>	
				<div class="hs_radio">
						<input type="radio" class="pn" <?php if($rec_info->pay!='yes') { echo "checked"; } ?> onclick="plan_hide();" id="p_no" name="pay"  value="no" />
						<label for="p_no">No</label>	
				</div>
		</div>
		<div class="hs_input" id="plans">
					 <label>Plan</label>
					<select name="plan" class="form-control">
					<?php
					foreach($plan as $plan_single)
					{
					?>
						<option <?php if($rec_info->plan==$plan_single->name) { echo "selected"; } ?> ><?= $plan_single->name ?></option>
					<?php } ?>
					 </select>
                    
        </div>
		<div class="hs_input" id="mon">
					 <label>Month</label>
					<select class="form-control" name="month" >	
						<option  <?php if($rec_info->month=='1') { echo "selected"; } ?> value="1" >1 Month</option>	
						<option <?php if($rec_info->month=='2') { echo "selected"; } ?> value="2">2 Month</option>	
						<option <?php if($rec_info->month=='3') { echo "selected"; } ?> value="3">3 Month</option>
						<option <?php if($rec_info->month=='4') { echo "selected"; } ?> value="4">4 Month</option>	
						<option <?php if($rec_info->month=='5') { echo "selected"; } ?> value="5">5 Month</option>	
						<option <?php if($rec_info->month=='6') { echo "selected"; } ?> value="6">6 Month</option>	
						<option <?php if($rec_info->month=='7') { echo "selected"; } ?> value="7">7 Month</option>	
						<option <?php if($rec_info->month=='8') { echo "selected"; } ?> value="8">8 Month</option>	
						<option <?php if($rec_info->month=='9') { echo "selected"; } ?> value="9">9 Month</option>	
						<option <?php if($rec_info->month=='10') { echo "selected"; } ?> value="10">10 Month</option>	
						<option <?php if($rec_info->month=='11') { echo "selected"; } ?> value="11">11 Month</option>	
						<option <?php if($rec_info->month=='12') { echo "selected"; } ?> value="12">12 Month</option>	
						</select> 
        </div> -->
    <input type="submit" class="btn" value="submit">
</form>

<script>
$(".datepicker").click(function() {
    $(this).datepicker('show');
});
</script>
<?php
}
?>