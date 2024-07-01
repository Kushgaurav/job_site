<div class="row">
    <div class="col-md-12">
        <div class="hs_heading medium">
            <h3>Ads Integration</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- tab start -->
        <div class="hs_tabs">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#custon_ads">Ads Integration</a></li>
                <li><a data-toggle="pill" href="#google_add_s_setting_tab">Google Adsense</a></li> 	
				<li><a data-toggle="pill" href="#admib_setting_tab">Admob</a></li>
            </ul>
               
            <div class="tab-content">
				<!-- site setting tab start -->
                <div id="custon_ads" class="tab-pane fade in active">
                    <div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-md-8">
										<p>SELECT POSITION ON WEB</p>
											<? form_open_multipart('admin/custon_add_update'); ?>
											<form id="custom_ads_form">
											<div class="hs_checkbox">
												<input <?php if($ads->home_page=="yes") { echo "checked"; } ?>  type="checkbox" name="home_page" id="home_page"  value="yes" >
												  <label for="home_page">Home Page</label>
											   </div>
											   <div class="hs_checkbox">
												<input <?php if($ads->single_page_top=="yes") { echo "checked"; } ?> type="checkbox" name="single_page_top" id="single_page_top"  value="yes" >
												  <label for="single_page_top">Single Page Top</label>
											   </div>
											   <div class="hs_checkbox">
												<input <?php if($ads->single_page_bottom=="yes") { echo "checked"; } ?> type="checkbox" name="single_page_bottom" id="single_page_bottom"  value="yes" >
												  <label for="single_page_bottom">Single Page bottom</label>
											   </div>
											   <div class="hs_checkbox">
												<input <?php if($ads->both_page=="yes") { echo "checked"; } ?> type="checkbox" id="both_page" name="both_page"  value="yes" >
												  <label for="both_page">Both Page</label>
											   </div>
											   <div class="hs_input">
													<label>Link</label>
												    <input type="text"  id="link1" name="link1" value="<?= $ads->link1; ?>" class="form-control settingsfields"  title="Enter Link" >
											   </div>
											    <div class="hs_input">
													<label>Upload Ad Image</label>
												    <input type="file" id="add_img" name="add_img" value="" class="form-control settingsfields" >
													<p class="help-block">Only JPG  or PNG files are allowed</p>
													<div class="iv_image">
													<img src="<?= base_url().$ads->add_img; ?>">	  
												</div>
											   </div>
											    <div class="hs_input">
													<label>Status</label>
												    <select class="form-control" name="status">
													<option <?php if($ads->status=="Active") { echo "selected"; } ?> >Active</option>
													<option <?php if($ads->status=="InActive") { echo "selected"; } ?>>InActive</option>
													</select>
											   </div>
											   </form>
											  <input type="button" onclick="custom_ads_create();" value="Update"  class="btn"></button>
											 
								</div>
								<div class="col-md-8">
										
								</div>

						</div>
							
						</div>
                    </div>
                </div>
			    <div id="analytics_setting_tab" class="tab-pane fade">
				   <div class="row">
                        <div class="col-md-8">
						  <form id="google_analytics_form">
						  <div class="hs_input">
                                <label>Google Analytics Script </label>
                                <textarea rows="4" class="form-control settingsfields" name="google_analytics" id="google_anaylitics"><?= $res->google_analytics; ?></textarea>
                           </div>
						   </form>
                        </div>
						
                        <div class="col-md-12">
                            <input type="button" class="btn" name="gogole_ana_btn" onclick="google_code_setting('google_analytics')" id="gogole_ana_btn" value="Save Changes" />
                        </div>
                    </div>
                </div>
			  <!-- Analytics setting tab end -->
              <!-- Analytics setting tab start -->
                <div id="google_add_s_setting_tab" class="tab-pane fade">
                   <div class="row">
                        <div class="col-md-8">
                          <form id="google_add_s_form">
                          <div class="hs_input">
                                <label>google adsense  Script </label>
                                <textarea rows="4" class="form-control settingsfields" name="google_adds_s" id="google_adds_s"><?= $res->google_adds_s; ?></textarea>
                           </div>
                           </form>
                        </div>
                        
                        <div class="col-md-12">
                            <input type="button" class="btn" name="gogole_ana_btn" onclick="google_code_setting('google_add_s')" value="Save Changes" />
                        </div>
                    </div>
                </div>
              <!-- Analytics setting tab end -->
              <!-- Analytics setting tab start -->
			<div id="admib_setting_tab" class="tab-pane fade">
			   <div class="row">
					<div class="col-md-8">
					  <form id="add_mob_s_form">
					  <div class="hs_input">
							<label>Admob </label>
							<textarea rows="4" class="form-control settingsfields" name="add_mob_s" id="add_mob_s "><?= $res->add_mob_s; ?></textarea>
					   </div>
					   </form>
					</div>
					
					<div class="col-md-12">
						<input type="button" class="btn" name="gogole_ana_btn" onclick="google_code_setting('add_mob_s')" value="Save Changes" />
					</div>
				</div>
			</div>
            </div>
        </div>
        <!-- tab end -->
    </div>
</div>    
