<div class="row">
    <div class="col-md-12">
        <div class="hs_heading medium">
            <h3>Payment Method</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- tab start -->
        <div class="hs_tabs">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#paypal">Paypal</a></li>
                <li><a data-toggle="pill" href="#PayUMoney_setting_tab">PayUMoney</a></li> 
            </ul>
               
            <div class="tab-content">
				<!-- site setting tab start -->
                <div id="paypal" class="tab-pane fade in active">
                    <div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-md-8">
									<form id="paypal_form">
									<div class="hs_input">
									   <label>Use Paypal for payment</label>
									   <select class="form-control" name="paypal_status">
											<option value="active">Active</option>
											<option value="inactive">InActive</option>
									   </select>
									</div>
									<div class="hs_input">
									   <label>PAYPAL EMAIL</label>
									   <input type="text" id="paypal_email" name="paypal_email" value="<?= $res->paypal_email; ?>" class="form-control settingsfields" id="paypal_email" placeholder="Enter Paypal email" >
									</div>
									</form>
									<div class="col-md-12">
										<button onclick="paypal_info_update();" class="btn">Update</button>
									</div>
								</div>
						</div>
						</div>
                    </div>
                </div>
			    <div id="PayUMoney_setting_tab" class="tab-pane fade">
				   <div class="row">
							<div class="col-md-8">
							<form id="payu_form">
								<div class="hs_input">
								   <label>Use PayUMoney for payment</label>
								   <select class="form-control"  name="payu_status">
										<option value="active">Active</option>
										<option value="inactive">InActive</option>
								   </select>
								</div>
								<div class="hs_input">
								   <label>Merchant Key</label>
								   <input type="text" id="merchant_key" name="merchant_key" value="<?= $res->merchant_key; ?>" class="form-control settingsfields"  placeholder="Enter Merchant Key" >
								</div>
								<div class="hs_input">
								   <label>Merchant Salt</label>
								   <input type="text" id="merchant_salt" name="merchant_salt" value="<?= $res->merchant_salt; ?>" class="form-control settingsfields"  placeholder="Enter Merchant Salt" >
								</div>
								</form>
							</div>
                        <div class="col-md-12">
							<button onclick="payu_info_update();" class="btn">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tab end -->
    </div>
</div>    
