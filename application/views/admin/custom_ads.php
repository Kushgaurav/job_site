<div class="row">
    <div class="col-md-12">
        <div class="hs_heading medium">
            <h3>Custom ads</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- tab start -->
        <div class="hs_tabs">
            <div class="tab-content">
				<!-- site setting tab start -->
                <div id="site_setting_tab" class="tab-pane fade in active">
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
											   </div>
											   <div class="iv_image">
													<img src="<?= base_url().$ads->add_img; ?>">	  
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
                <!-- site setting tab end -->
				<!-- language setting tab start -->
            </div>
        </div>
        <!-- tab end -->
    </div>
</div>    
