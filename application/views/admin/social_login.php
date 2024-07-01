<div class="row">
    <div class="col-md-12">
        <div class="hs_heading medium">
            <h3>Social Login Setting</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- tab start -->
        <div class="hs_tabs">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#google">google</a></li> 
            </ul>
               
            <div class="tab-content">
				<!-- site setting tab start -->
                <div id="google" class="tab-pane fade in active">
                    <div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-md-8">
									<form id="google_login_form">
									<div class="hs_input">
									   <label>Show Google+ login to users</label>
									   <select class="form-control" name="google_login_status">
											<option <?php if($social_info->google_login_status=='active') echo "selected"; ?> value="active">Active</option>
											<option <?php if($social_info->google_login_status=='inactive') echo "selected"; ?> value="inactive">InActive</option>
									   </select>
									</div>
									<div class="hs_input">
									   <label>CLIENT ID</label>
									   <input type="text" value="<?= $social_info->google_client_id; ?>" id="google_client_id" name="google_client_id" value="" class="form-control settingsfields" id="google_client_id" placeholder="CLIENT ID" >
									</div>
									<div class="hs_input">
									   <label>CLIENT SECRET</label>
									   <input type="text" id="google_client_secret" value="<?= $social_info->google_client_secret; ?>" name="google_client_secret" value="" class="form-control settingsfields" id="google_client_secret" placeholder="CLIENT SECRET" >
									</div>
									</form>
									<div class="col-md-12">
										<button onclick="social_login_seting_update();" class="btn">Update</button>
									</div>
								</div>
						</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tab end -->
    </div>
</div>    
