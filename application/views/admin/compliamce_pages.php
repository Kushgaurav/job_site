<div class="row">
    <div class="col-md-12">
        <div class="hs_heading medium">
            <h3>Compliance Pages</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- tab start -->
        <div class="hs_tabs">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#site_setting_tab">Terms & Condition</a></li>
                <li><a data-toggle="pill" href="#image_setting_tab">Privacy Policy</a></li>
                <li><a data-toggle="pill" href="#email_setting_tab">About Us</a></li>
                <li><a data-toggle="pill" href="#footer_setting_tab">Contact Us</a></li>	 
            </ul>
               
            <div class="tab-content">
				<!-- site setting tab start -->
                <div id="site_setting_tab" class="tab-pane fade in active">
                    <div class="row">
						<div class="col-sm-12">
							<form id="tnc_form">
							<div class="hs_input">								
								<label>Terms & Condition</label>
								 <textarea id="terms_condition"  name="terms_condition" ><?= $setting_info->	terms_condition; ?></textarea>
							</div>
							</form>
							<button type="button" onclick="terms_condation()" class="btn">update</button>
						</div>
                    </div>
                </div>
                <!-- site setting tab end -->
				
                <!-- image setting tab start -->
                 <div id="image_setting_tab" class="tab-pane fade">
				   <div class="hs_input">								
						<label>Privacy Policy</label>
						 <textarea id="privacy_policy" name="privacy_policy" ><?= $setting_info->privacy_policy; ?></textarea>
					</div>
					<button type="button" onclick="privacy_policy();" class="btn">update</button>
                </div>
                <!-- image setting tab end -->
				<div id="email_setting_tab" class="tab-pane fade">
					 <div class="hs_input">								
							<label>About Us</label>
							 <textarea id="about_us" name="about_us"><?= $setting_info->about_us; ?></textarea>
					 </div>
					 <button type="button" onclick="about_us();" class="btn">update</button>
				</div>
                <!-- footer setting tab start -->
                <div id="footer_setting_tab" class="tab-pane fade">
					<div class="hs_input">								
						<label>Contact Us</label>
						
					<div class="hs_datatable_wrapper table-responsive">
						<table class="hs_datatable table table-bordered">
							<thead>
								<tr>
									<th>S.No</th>
									<th>Name</th>
									<th>Mobile</th>
									<th>Message</th>
									<th>Subject</th>
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
									<td><?= $r1->mno; ?></td>
									<td><?= $r1->msg; ?></td>
									<td><?= $r1->subject; ?></td>
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
                <!-- footer setting tab end -->
				
				<!-- language setting tab start -->
            </div>
        </div>
        <!-- tab end -->
    </div>
</div>    
<div id="update_footer_link_popup" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button onclick="h1()" type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update Footer</h4>
			</div>
			<div id="data_disp"> 
			<div class="modal-body">
				
			</div>
			</div>
		</div>
	</div>
</div> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/lib/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/ckeditor/ckeditor.js'); ?>"></script>	 
<script>
$('document').ready(function(){
	CKEDITOR.replace( 'terms_condition' );
	CKEDITOR.replace( 'privacy_policy' );
	CKEDITOR.replace( 'about_us' );
});
</script>