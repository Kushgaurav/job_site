<div class="row">
    <div class="col-md-12">
        <div class="hs_heading medium">
            <h3>Website Setting</h3>
        </div>
    </div>
</div>

<?php $msg=$this->session->flashdata('msg'); 
if($msg=='Update')
{
	?>
<div class="hs_alert_wrapper open_alert hs_success msg">
    <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>Image Update</p>
    </div>
</div>
<?php
}
else if($msg=='Deleted')
{
?>
<div class="hs_alert_wrapper open_alert hs_success msg">
    <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>1 Language Deleted</p>
    </div>
</div>
<?php	
}
else if($msg=='nDeleted')
{
?>
<div class="hs_alert_wrapper open_alert hs_error msg">
    <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>Language Not Deleted</p>
    </div>
</div>
<?php	
}
else if($msg=='deng')
{
?>
<div class="hs_alert_wrapper open_alert hs_error msg">
    <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>English language is base language of this website.you can't delete this language
        </p>
    </div>
</div>
<?php	
}
else if($msg=='only')
{
?>
<div class="hs_alert_wrapper open_alert hs_error msg">
    <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>Only JPG And PNG File Allowed</p>
    </div>
</div>
<?php	
}
else if($msg=='nup')
{
?>
<div class="hs_alert_wrapper open_alert hs_error msg">
    <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>Image Not Update</p>
    </div>
</div>
<?php	
}
else if($msg=="not_select_i")
{
	?>
<div class="hs_alert_wrapper open_alert hs_error msg">
    <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>Please Select Image</p>
    </div>
</div>
<style>
#image_setting_tab {
    display: block;
}
</style>
<?php 
}
?>
<div class="row">
    <div class="col-md-12">
        <!-- tab start -->
        <div class="hs_tabs">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#site_setting_tab">Site </a></li>
                <li><a data-toggle="pill" href="#image_setting_tab">Image </a></li>
                <li><a data-toggle="pill" href="#footer_setting_tab">Footer </a></li>
                <li><a data-toggle="pill" href="#revenue_setting_tab">Revenue </a></li>
                <li><a data-toggle="pill" href="#language_setting_tab">Language </a></li>
                <li><a data-toggle="pill" href="#email_setting_tab">E-Mail</a></li>
                <li><a data-toggle="pill" href="#creditial_setting_tab">Credentials </a></li>
                <li><a data-toggle="pill" href="#analytics_setting_tab">Google Analytics </a></li>
                <li><a data-toggle="pill" href="#firebase_setting_tab">Firebase</a></li>
                <li><a data-toggle="pill" href="#cookie_text_setting_tab">GDPR Cookie Message</a></li>
                <li><a data-toggle="pill" href="#cookie_text_contect_setting_tab">Contect Setting</a></li>
            </ul>

            <div class="tab-content">
                <!-- site setting tab start -->
                <div id="site_setting_tab" class="tab-pane fade in active">
                    <div class="row">
                        <form id="f1">
                            <div class="col-md-8">
                                <div class="hs_input">
                                    <label>Site Title</label>
                                    <input type="text" id="title" name="title" value="<?= $res->title; ?>"
                                        class="form-control settingsfields" id="site_title"
                                        placeholder="Enter Site Title">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="hs_input">
                                    <label>Site Author</label>
                                    <input type="text" name="author" id="author" value="<?= $res->author; ?>"
                                        class="form-control settingsfields" id="site_author" placeholder="Author">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="hs_input">
                                    <label>Description</label>
                                    <input type="text" id="description" value="<?= $res->description; ?>"
                                        name="description" class="form-control settingsfields" id="site_desc"
                                        placeholder="Description">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="hs_input">
                                    <label>Meta Keywords</label>
                                    <input type="text" id="kw" name="keyword" value="<?= $res->keyword; ?>"
                                        class="form-control settingsfields" id="site_keyword" placeholder="Keywords">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="hs_input">
                                    <label>Copyright</label>
                                    <input type="text" id="copyright" name="copyright" value="<?= $res->copyright; ?>"
                                        class="form-control settingsfields" placeholder="Copyright">
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12">
                            <button id="meta_btn1" class="btn theme_btn">Update</button>
                        </div>
                    </div>
                </div>
                <!-- site setting tab end -->

                <!-- image setting tab start -->
                <div id="image_setting_tab" class="tab-pane fade">
                    <? form_open_multipart('admin/setting'); ?>
                    <div class="row">
                        <form id="img_upload">
                            <div class="col-md-12">
                                <div class="hs_image_viewer">
                                    <label>Favicon</label>
                                    <div class="iv_image">
                                        <?php 
								$favi1=$res->fevi;
								$favi2="";
								if($favi1)
									$favi2=base_url().$res->fevi;
								else
									$favi2=base_url()."assets/images/Logo.png";
									
								
								?>
                                        <img src="<?php echo $favi2; ?>">
                                    </div>
                                    <p class="help-block">Preferred favicon size 32x32px</p>
                                    <div class="iv_action">
                                        <div class="uploader_link">
                                            <label for="favicon_img">Upload New</label>
                                            <input type="file" name="favicon_img" id="favicon_img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="hs_image_viewer">
                                    <label>Logo</label>
                                    <div class="iv_image">
                                        <?php 
									$logo_img=$res->logo_img;
									$logo_img2='';
									if($logo_img)
										$logo_img2=base_url().$res->logo_img;
									else
										$logo_img2=base_url()."assets/images/logo_with_text.png";;
								?>
                                        <img src="<?php echo $logo_img2; ?>">
                                    </div>
                                    <p class="help-block">Preferred image size 180x43px , but maximum size should be
                                        250x50px</p>
                                    <div class="iv_action">
                                        <div class="uploader_link">
                                            <label for="logo_img">Upload New</label>
                                            <input type="file" id="logo_img" name="logo_img" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="hs_image_viewer last">
                                    <label>Authenticate Page</label>
                                    <div class="iv_image">
                                        <?php 
								$auth_img=$res->bg_img;
								$auth_img2="";
								if($auth_img)
									$auth_img2=base_url().$res->bg_img;
								else
									$auth_img2=base_url()."assets/images/auth_bg.jpg";
								?>
                                        <img src="<?php echo $auth_img2; ?>">
                                    </div>
                                    <p class="help-block">Preferred image size 670*730px </p>
                                    <div class="iv_action">
                                        <div class="uploader_link">
                                            <label for="login_img">Upload New</label>
                                            <input type="file" id="login_img" name="bg_img" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="hs_image_viewer">
                                    <label>Site Loader</label>
                                    <div class="iv_image">
                                        <?php 
								$loader1=$res->main_loder;
								$loader2='';
								if($loader1)
									$loader2=base_url().$res->main_loder;
								else
									$loader2=base_url()."assets/images/loader01";
								?>
                                        <img src="<?php echo $loader2; ?>">
                                    </div>

                                    <div class="iv_action">
                                        <div class="uploader_link">
                                            <label for="main_loder">Upload New</label>
                                            <input type="file" name="main_loder" id="main_loder">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="hs_image_viewer">
                                    <label>Contact US</label>
                                    <div class="iv_image">
                                        <?php 
								$contact_img1=$res->contect_img;
								$contact_img2='';
								if($contact_img1)
									$contact_img2=base_url().$res->contect_img;
								else
									$contact_img2=base_url()."assets/images/contact.jpg";
								?>
                                        <img src="<?php echo  $contact_img2; ?>">
                                    </div>

                                    <div class="iv_action">
                                        <div class="uploader_link">
                                            <label for="contect_img">Upload New</label>
                                            <input type="file" name="contect_img" id="contect_img">
                                        </div>
                                        <p class="help-block">Preferred contact Us Image size 550x350px</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="hs_image_viewer">
                                    <label>About US</label>
                                    <div class="iv_image">
                                        <?php 
								$about_img1=$res->about_img;
								$about_img2='';
								if($about_img1)
									$about_img2=base_url().$res->contect_img;
								else
									$about_img2=base_url()."assets/images/about.jpg";
								?>
                                        <img src="<?php echo $about_img2; ?>">
                                    </div>

                                    <div class="iv_action">
                                        <div class="uploader_link">
                                            <label for="about_img">Upload New</label>
                                            <input type="file" name="about_img" id="about_img">
                                        </div>
                                        <p class="help-block">Preferred About Us Image size 550x350px</p>
                                    </div>

                                </div>
                            </div>
                        </form>
                        <div class="col-md-12">
                            <button type="buton" id="img_up_btn" class="btn">Update</button>
                        </div>

                    </div>
                    <?= form_close(); ?>
                </div>
                <!-- image setting tab end -->
                <div id="email_setting_tab" class="tab-pane fade">
                    <div class="col-md-12">
                        <div class="hs_radio_list">
                            <div class="hs_radio">
                                <input type="radio" onclick="email_setting_tab();" id="select_user" checked
                                    name="select_user" value="seeker">
                                <label for="select_user">Seeker</label>
                            </div>
                            <div class="hs_radio">
                                <input type="radio" onclick="email_setting_tab();" id="select_user1" name="select_user"
                                    value="recruiter" />
                                <label for="select_user1">Recruiter</label>
                            </div>
                        </div>
                    </div>
                    <div id="seeker_div">
                        <div class="row">
                            <form id="seeker_form">
                                <div class="col-md-8">
                                    <div class="hs_input">
                                        <label>E-Mail</label>
                                        <input type="text" id="seeker_email" name="seeker_email"
                                            value="<?= $email_info->seeker_email; ?>"
                                            class="form-control settingsfields" id="site_title"
                                            placeholder="Enter Site Title">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="hs_input">
                                        <label>Subject</label>
                                        <input type="text" id="seeker_subject" name="seeker_subject"
                                            value="<?= $email_info->seeker_subject; ?>"
                                            class="form-control settingsfields" id="site_title"
                                            placeholder="Enter Site Title">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="hs_input">
                                        <label>Verification Message </label>
                                        <textarea class="form-control" name="seeker_veri_msg" id="seeker_veri_msg"
                                            placeholder="Enter Verification Massage"><?= $email_info->seeker_veri_msg; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="hs_input">
                                        <label>Forgot Password Message</label>
                                        <textarea class="form-control" name="seeker_forgot_msg" id="seeker_forgot_msg"
                                            placeholder="Enter Forgot Password Massage"><?= $email_info->seeker_forgot_msg; ?></textarea>
                                    </div>
                                </div>
                            </form>
                            <div class="col-md-12">
                                <button onclick="mail_setting('seeker');" class="btn theme_btn">Update</button>
                            </div>
                        </div>
                    </div>
                    <div id="recruiter_div">
                        <div class="row">
                            <form id="recruiter_form">
                                <div class="col-md-8">
                                    <div class="hs_input">
                                        <label>E-Mail</label>
                                        <input type="text" id="recruiter_email" name="recruiter_email"
                                            value="<?= $email_info->recruiter_email; ?>"
                                            class="form-control settingsfields" id="site_title"
                                            placeholder="Enter Site Title">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="hs_input">
                                        <label>Subject</label>
                                        <input type="text" id="recruiter_subject" name="recruiter_subject"
                                            value="<?= $email_info->recruiter_subject; ?>"
                                            class="form-control settingsfields" id="site_title"
                                            placeholder="Enter Site Title">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="hs_input">
                                        <label>Verification Massage </label>
                                        <textarea class="form-control" name="recruiter_veri_msg"
                                            id="recruiter_r_veri_msg"
                                            placeholder="Enter Verification Massage"><?= $email_info->recruiter_veri_msg; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="hs_input">
                                        <label>Forgot Password Massage</label>
                                        <textarea class="form-control" name="recruiter_forgot_msg"
                                            id="recruiter_forgot_msg"
                                            placeholder="Enter Forgot Password Massage"><?= $email_info->recruiter_forgot_msg; ?></textarea>
                                    </div>
                                </div>
                            </form>
                            <div class="col-md-12">
                                <button onclick="mail_setting('recruiter');" class="btn theme_btn">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer setting tab start -->
                <div id="footer_setting_tab" class="tab-pane fade">
                    <div class="hs_datatable_wrapper tabel-responsive">
                        <table class="hs_datatable table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                    if(isset($footer_info))
                    {
                        $i=1;
                        foreach($footer_info as $footer_data)
                        {
                            ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td width="200">
                                        <div class="hs_user">
                                            <div class="user_name">
                                                <p><?= $footer_data->name; ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= $footer_data->link; ?></td>
                                    <td>
                                        <select id="footer_link<?= $footer_data->id; ?>"
                                            onchange="footer_link_status(<?=  $footer_data->id; ?>)">
                                            <option <?php  if($footer_data->status=='Active') { echo "selected"; } ?>>
                                                Active</option>
                                            <option <?php  if($footer_data->status=='Inactive') { echo "selected"; } ?>>
                                                Inactive</option>
                                        </select>
                                    </td>
                                    <td width="200">
                                        <a class="btn" title="Edit" data-name="Dentist"
                                            onclick="update_footer_link(<?=  $footer_data->id; ?>)"><i
                                                class="fa fa-pencil" aria-hidden="true"></i></a </td>
                                </tr>
                                <?php
                        }
                    }
                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- footer setting tab end -->

                <!-- language setting tab start -->
                <div id="language_setting_tab" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="hs_input">
                                <label>Site Language</label>
                                <form id="language_change_form"> <select class="form-control" name="weblanguage_text"
                                        id="weblanguage_text" onchange="change_language()">
                                        <?php foreach($language_name as $language_n) { ?>
                                        <option <?php if($info->language==$language_n->name) { echo "selected"; } ?>
                                            value="<?= $language_n->name; ?>"><?= $language_n->name; ?></option>
                                        <?php } ?>
                                    </select></form>
                                <span class="input_help_info">To see effect of language change you have to restart app
                                    in your Android and Ios device</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="hs_input">
                                <label>Add new language</label>
                                <form id="language_add_form"><input type="text" class="form-control"
                                        name="addnewlanguage" id="addnewlanguage"></form>
                                <span class="input_help_info">Should be in lower case , and one at a time</span><br>
                                <span class="input_help_info"><a href="<?= base_url('admin/language_add'); ?>">Add
                                        language text here</a></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button onclick="add_language()" class="btn">Add</button>
                        </div>
                        </form>
                    </div>
                    <?= form_open('admin/delete_language'); ?>
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="hs_subheading" style="color:#F44336;"> Delete Language Section </h3>
                            <div class="hs_input">
                                <label>Delete Language</label>
                                <select class="form-control" name="del_language" id="lan_to_delete">
                                    <?php foreach($language_name as $language_n) { ?>
                                    <option value="<?= $language_n->name; ?>"><?= $language_n->name; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn" value="Delete">
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
                <!-- language setting tab end -->

                <!-- revenue setting tab start -->
                <div id="revenue_setting_tab" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="hs_radio_list">
                                <div class="hs_radio">
                                    <input type="radio" id="select_type" name="select_type"
                                        <?php if($res2->type=="Recurring") { echo "checked"; } ?> value="Recurring">
                                    <label for="select_type">Recurring Model</label>
                                </div>
                                <div class="hs_radio">
                                    <input type="radio" id="select_type1" name="select_type"
                                        <?php if($res2->type=="One Time Payment ") { echo "checked"; } ?>
                                        value="One_Time_Payment" />
                                    <label for="select_type1">One Time Payment</label>
                                </div>
                            </div>
                        </div>
                        <!-- Recurring Model tab end -->
                        <div id="Recurring_div" <?php if($res2->type!="Recurring") { echo "style='display:none;'"; } ?>>
                            <div class="col-md-8">
                                <form id="f3">
                                    <input type="hidden" value="Recurring" id="re_type" name="type">
                                    <div class="hs_input">
                                        <label>Select Month</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select class="form-control add_plan_form" id="up_plan_duration_count"
                                                    name="plan_duration_count">
                                                    <option value="Select">Select</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='1') { echo "selected"; } ?>
                                                        value="1">1</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='2') { echo "selected"; } ?>
                                                        value="2">2</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='3') { echo "selected"; } ?>
                                                        value="3">3</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='4') { echo "selected"; } ?>
                                                        value="4">4</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='5') { echo "selected"; } ?>
                                                        value="5">5</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='6') { echo "selected"; } ?>
                                                        value="6">6</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='7') { echo "selected"; } ?>
                                                        value="7">7</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='8') { echo "selected"; } ?>
                                                        value="8">8</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='9') { echo "selected"; } ?>
                                                        value="9">9</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='10') { echo "selected"; } ?>
                                                        value="10">10</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='11') { echo "selected"; } ?>
                                                        value="11">11</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='12') { echo "selected"; } ?>
                                                        value="12">12</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='13') { echo "selected"; } ?>
                                                        value="13">13</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='14') { echo "selected"; } ?>
                                                        value="14">14</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='15') { echo "selected"; } ?>
                                                        value="15">15</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='16') { echo "selected"; } ?>
                                                        value="16">16</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='17') { echo "selected"; } ?>
                                                        value="17">17</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='18') { echo "selected"; } ?>
                                                        value="18">18</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='19') { echo "selected"; } ?>
                                                        value="19">19</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='20') { echo "selected"; } ?>
                                                        value="20">20</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='21') { echo "selected"; } ?>
                                                        value="21">21</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='22') { echo "selected"; } ?>
                                                        value="22">22</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='23') { echo "selected"; } ?>
                                                        value="23">23</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='24') { echo "selected"; } ?>
                                                        value="24">24</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='25') { echo "selected"; } ?>
                                                        value="25">25</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='26') { echo "selected"; } ?>
                                                        value="26">26</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='27') { echo "selected"; } ?>
                                                        value="27">27</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='28') { echo "selected"; } ?>
                                                        value="28">28</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='29') { echo "selected"; } ?>
                                                        value="29">29</option>
                                                    <option
                                                        <?php if($res2->plan_duration_count=='30') { echo "selected"; } ?>
                                                        value="30">30</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control add_plan_form" id="up_plan_duration_type"
                                                    name="plan_duration_type">
                                                    <option value="Select">Select</option>
                                                    <option
                                                        <?php if($res2->plan_duration_type=='Days') { echo "selected"; } ?>
                                                        value="Days">Days</option>
                                                    <option
                                                        <?php if($res2->plan_duration_type=='Weeks') { echo "selected"; } ?>
                                                        value="Weeks">Weeks</option>
                                                    <option
                                                        <?php if($res2->plan_duration_type=='Months') { echo "selected"; } ?>
                                                        value="Months">Months</option>
                                                    <option
                                                        <?php if($res2->plan_duration_type=='Years') { echo "selected"; } ?>
                                                        value="Years">Years</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-8">
                                <div class="hs_input">
                                    <label>Price</label>
                                    <input type="text" class="form-control revenuefields" name="price" id="re_price"
                                        value="<?= $res2->price; ?>">
                                </div>
                            </div>
                            <div class="col-md-8">

                                <div class="hs_input">
                                    <label>Currency</label>
                                    <input type="text" class="form-control revenuefields" id="re_curreny"
                                        name="currency" value="<?= $res2->currency; ?>" maxlength=3>
                                    <p class="help-block">This will be used for transactions with Paypal. Use specific
                                        currency code. <a
                                            href="https://developer.paypal.com/docs/classic/mass-pay/integration-guide/currency_codes/"
                                            target="_blank">Click here to get the list.</a></p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="hs_input">
                                    <label>Currency Symbol</label>
                                    <input type="text" class="form-control revenuefields" id="re_symbol" name="symbol"
                                        value="<?= $res2->symbol; ?>">
                                    <p class="help-block">This will be displayed with price.</p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="hs_input">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description"
                                        id="re_desc"><?= $res2->description; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="hs_radio_list">
                                    <div class="hs_radio">
                                        <input type="radio" id="show_on_reg2" name="show_on_reg"
                                            <?php if($res2->show_on_reg=="yes") { echo "checked"; } ?> value="yes">
                                        <label for="show_on_reg2">Show on Registration</label>
                                    </div>
                                    <div class="hs_radio">
                                        <input type="radio" id="show_on_reg1" name="show_on_reg"
                                            <?php if($res2->show_on_reg=="no") { echo "checked"; } ?> value="no" />
                                        <label for="show_on_reg1">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="col-md-6">
                                    <div class="hs_radio_list">
                                        <div class="hs_radio">
                                            <input type="radio" id="re_plan1" class="p1" name="condation"
                                                <?php if($res2->condation=="number_job_post") { echo "checked"; } ?>
                                                value="number_job_post">
                                            <label for="re_plan1">Choose Number Of Job Post WithOut Payment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="hs_input">
                                        <input type="text" class="form-control revenuefields"
                                            <?php if($res2->condation=="num_of_resume_download") { echo "disabled='true'"; } ?>
                                            id="re_num_of_job" name="value1" value="<?= $res2->value1; ?>">
                                        <p class="help-block">.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="hs_radio_list">
                                        <div class="hs_radio">
                                            <input type="radio" id="re_plan2" class="p1" name="condation"
                                                <?php if($res2->condation=="num_of_resume_download") { echo "checked"; } ?>
                                                value="num_of_resume_download">
                                            <label for="re_plan2">Choose Number Of Resume Download WithOut
                                                Payment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="hs_input">
                                        <input type="text" class="form-control revenuefields"
                                            <?php if($res2->condation=="number_job_post") { echo "disabled='true'"; } ?>
                                            id="re_number_of_resume" name="value2" value="<?= $res2->value2; ?>">
                                        <p class="help-block"> </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="hs_radio_list">
                                        <div class="hs_radio">
                                            <input type="radio" id="re_plan3" class="p1" name="condation"
                                                <?php if($res2->condation=="applay_both_condation") { echo "checked"; } ?>
                                                value="applay_both_condation">
                                            <label for="re_plan3">Both Condition</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div class="col-md-12">
                                <button type="button" class="btn" id="re_update">Update</button>
                            </div>
                        </div>
                        <!-- Recurring Model tab end -->
                        <!-- One Time Payment tab end -->
                        <div id="one_time_div" <?php if($res2->type=="Recurring") { echo "style='display:none;'"; } ?>>
                            <div class="col-md-8">
                                <form id="one_f">

                                    <input type="hidden" value="One Time Payment " id="one     _type" name="type">
                                    <div class="col-md-8">
                                        <div class="hs_input">
                                            <label>Price</label>
                                            <input type="text" class="form-control revenuefields" name="price"
                                                id="one_price" value="<?= $res2->price; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="hs_input">
                                            <label>Currency</label>
                                            <input type="text" class="form-control revenuefields"
                                                id="portal_curreny one_curreny" name="currency"
                                                value="<?= $res2->currency; ?>">
                                            <p class="help-block">This will be used for transactions with Paypal. Use
                                                specific currency code.
                                                <a target="_blank"
                                                    href="https://developer.paypal.com/docs/classic/mass-pay/integration-guide/currency_codes/">Click
                                                    here to get the list.</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="hs_input">
                                            <label>Currency Symbol</label>
                                            <input type="text" class="form-control revenuefields"
                                                id="portalcurreny_symbol one_symbol" name="symbol"
                                                value="<?= $res2->symbol; ?>">
                                            <p class="help-block">This will be displayed with price.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="hs_input">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description"
                                                id="one_desc"><?= $res2->description; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="hs_radio_list">
                                            <div class="hs_radio">
                                                <input type="radio" id="show_on_reg" name="show_on_reg"
                                                    <?php if($res2->show_on_reg=="yes") { echo "checked"; } ?>
                                                    value="yes">
                                                <label for="show_on_reg">Show on Registration</label>
                                            </div>
                                            <div class="hs_radio">
                                                <input type="radio" id="show_on_re" name="show_on_reg"
                                                    <?php if($res2->show_on_reg=="no") { echo "checked"; } ?>
                                                    value="no" />
                                                <label for="show_on_re">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="hs_radio_list">
                                            <div class="hs_radio">
                                                <input type="radio" id="one_plan1" onclick="change_control();"
                                                    class="p2" name="condation1"
                                                    <?php if($res2->condation=="number_job_post") { echo "checked"; } ?>
                                                    value="number_job_post">
                                                <label for="one_plan1">Choose Number Of Job Post Without Payment</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="hs_input">
                                            <input type="text" class="form-control revenuefields"
                                                <?php if($res2->condation=="num_of_resume_download") { echo "disabled='true'"; } ?>
                                                id="one_num_of_job" name="value1" value="<?= $res2->value1; ?>">
                                            <p class="help-block">.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="hs_radio_list">
                                            <div class="hs_radio">
                                                <input type="radio" id="one_plan2" onclick="change_control();"
                                                    class="p2" name="condation1"
                                                    <?php if($res2->condation=="num_of_resume_download") { echo "checked"; } ?>
                                                    value="num_of_resume_download">
                                                <label for="one_plan2">Choose Number Of Resume Download Without
                                                    Payment</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="hs_input">
                                            <input type="text" class="form-control revenuefields"
                                                <?php if($res2->condation=="number_job_post") { echo "disabled='true'"; } ?>
                                                id="one_number_of_resume" name="value2" value="<?= $res2->value2; ?>">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="hs_radio_list">
                                            <div class="hs_radio">
                                                <input type="radio" id="one_plan3" onclick="change_control();"
                                                    name="condation1" class="p2"
                                                    <?php if($res2->condation=="applay_both_condation") { echo "checked"; } ?>
                                                    value="applay_both_condation">
                                                <label for="one_plan3">Both Condition</label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-md-12">
                                    <button type="button" class="btn" id="update1">Update</button>
                                </div>
                            </div>
                            <!-- One Time Payment tab end -->
                        </div>
                    </div>





                </div>
                <!-- revenue setting tab end -->

                <!-- sms setting tab start -->
                <div id="sms_setting_tab" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="hs_checkbox">
                                <input type="checkbox" id="msg91_status" class="smsSettings" value="1" checked>
                                <label for="msg91_status">Use Msg91 to send sms</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="hs_input">
                                <label>Msg91 Api Key</label>
                                <input type="text" class="form-control " id="" value="84215Asdsdsdsd54545sd45">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a class="btn" disabled="true">Save Changes</a>
                            <p>This feature is not suported in demo.Thank you for your understanding.</p>
                        </div>
                    </div>
                </div>
                <!-- sms setting tab end -->

                <!-- map setting tab start -->
                <div id="map_setting_tab" class="tab-pane fade">
                    <div class="row">

                        <div class="col-md-8">
                            <div class="hs_input">
                                <label>Google Map Api Key</label>
                                <input type="text" class="form-control " id="map_api"
                                    value="AIzaSyAjInU3SDSDSDSD87SDFS7D97SS7D9">
                                <p class="help-block">Here you get your <a
                                        href="https://developers.google.com/maps/documentation/javascript/get-api-key"
                                        target="_blank">google map api key</a></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a class="btn" disabled="true">Save Changes</a>
                            <p>This feature is not suported in demo.Thank you for your understanding.</p>
                        </div>
                    </div>
                </div>
                <!-- map setting tab end -->

                <!-- chat setting tab start -->
                <div id="chat_setting_tab" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="hs_checkbox">
                                <input type="checkbox" id="chat_status" class="smsSettings " value="1" checked>
                                <label for="chat_status">Active Chat</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="hs_input">
                                <label>QuickBlox App Id</label>
                                <input type="text" class="form-control " id="chat_appid" value="785946">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="hs_input">
                                <label>QuickBlox Authorization Key</label>
                                <input type="text" class="form-control " id="chat_authkey" value="Msdsds-dssdsd">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="hs_input">
                                <label>QuickBlox Authorization Secrete</label>
                                <input type="text" class="form-control" id="chat_authsecret" value="q2sdsdsdVsdasvy">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="hs_input">
                                <label>QuickBlox Account Key</label>
                                <input type="text" class="form-control " id="chat_accountkey"
                                    value="s7hassasssasdaEtr_z">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a class="btn" disabled="true">Save Changes</a>
                            <p>This feature is not suported in demo.Thank you for your understanding.</p>
                        </div>
                    </div>
                </div>
                <!-- chat setting tab end -->

                <!-- Credintials setting tab start -->
                <div id="creditial_setting_tab" class="tab-pane fade">
                    <div class="row">
                        <form id="credentials_update_form">
                            <input type="hidden" name="hide_pass" id="hide_ps" value="<?= $admin_info->pass; ?>">
                            <input type="hidden" name="un" id="un" value="<?= $admin_info->uname; ?>">
                            <div class="col-md-8">
                                <div class="hs_input">
                                    <label>Email</label>
                                    <input type="text" value="<?= $admin_info->uname; ?>" class="form-control"
                                        id="uname" name="uname" />

                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="hs_input">
                                    <label>Enter Old Password</label>
                                    <input type="password" class="form-control" name="old_ps" id="old_ps" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="hs_input">
                                    <label>Enter New Password</label>
                                    <input type="password" class="form-control" name="pass" id="pass" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="hs_input">
                                    <label>Enter Confirm Password</label>
                                    <input type="password" class="form-control" name="cps" id="cps" />
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12">
                            <button type="button" class="btn" id="update_cre">Update</button>
                        </div>
                    </div>
                </div>
                <!-- Credintials setting tab end -->
                <!-- Firebase setting tab start -->
                <div id="firebase_setting_tab" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-8">
                            <form id="firebase_form">
                                <div class="hs_input">
                                    <label>Firebase Server Key</label>
                                    <input type="text" class="form-control" value="<?= $res->firebase; ?>"
                                        name="firebase" id="firebase">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <input type="button" value="Save Changes" class="btn"
                                onclick="google_code_setting('firebase');" />
                        </div>
                    </div>
                </div>
                <!-- Firebase setting tab end -->
                <!-- Timezone setting tab start -->
                <div id="timezone_setting_tab" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="hs_input">
                                <label>Select Timezone</label>
                                <select id="site_timezone" class="form-control settingsfields">
                                    <option value="Africa/Abidjan">Africa/Abidjan</option>
                                    <option value="Africa/Accra">Africa/Accra</option>
                                    <option value="Africa/Addis_Ababa">Africa/Addis_Ababa</option>
                                    <option value="Africa/Algiers">Africa/Algiers</option>
                                    <option value="Africa/Asmara">Africa/Asmara</option>
                                    <option value="Africa/Bamako">Africa/Bamako</option>
                                    <option value="Africa/Bangui">Africa/Bangui</option>
                                    <option value="Africa/Banjul">Africa/Banjul</option>
                                    <option value="Africa/Bissau">Africa/Bissau</option>
                                    <option value="Africa/Blantyre">Africa/Blantyre</option>
                                    <option value="Africa/Brazzaville">Africa/Brazzaville</option>
                                    <option value="Africa/Bujumbura">Africa/Bujumbura</option>
                                    <option value="Africa/Cairo">Africa/Cairo</option>
                                    <option value="Africa/Casablanca">Africa/Casablanca</option>
                                    <option value="Africa/Ceuta">Africa/Ceuta</option>
                                    <option value="Africa/Conakry">Africa/Conakry</option>
                                    <option value="Africa/Dakar">Africa/Dakar</option>
                                    <option value="Africa/Dar_es_Salaam">Africa/Dar_es_Salaam</option>
                                    <option value="Africa/Djibouti">Africa/Djibouti</option>
                                    <option value="Africa/Douala">Africa/Douala</option>
                                    <option value="Africa/El_Aaiun">Africa/El_Aaiun</option>
                                    <option value="Africa/Freetown">Africa/Freetown</option>
                                    <option value="Africa/Gaborone">Africa/Gaborone</option>
                                    <option value="Africa/Harare">Africa/Harare</option>
                                    <option value="Africa/Johannesburg">Africa/Johannesburg</option>
                                    <option value="Africa/Juba">Africa/Juba</option>
                                    <option value="Africa/Kampala">Africa/Kampala</option>
                                    <option value="Africa/Khartoum">Africa/Khartoum</option>
                                    <option value="Africa/Kigali">Africa/Kigali</option>
                                    <option value="Africa/Kinshasa">Africa/Kinshasa</option>
                                    <option value="Africa/Lagos">Africa/Lagos</option>
                                    <option value="Africa/Libreville">Africa/Libreville</option>
                                    <option value="Africa/Lome">Africa/Lome</option>
                                    <option value="Africa/Luanda">Africa/Luanda</option>
                                    <option value="Africa/Lubumbashi">Africa/Lubumbashi</option>
                                    <option value="Africa/Lusaka">Africa/Lusaka</option>
                                    <option value="Africa/Malabo">Africa/Malabo</option>
                                    <option value="Africa/Maputo">Africa/Maputo</option>
                                    <option value="Africa/Maseru">Africa/Maseru</option>
                                    <option value="Africa/Mbabane">Africa/Mbabane</option>
                                    <option value="Africa/Mogadishu">Africa/Mogadishu</option>
                                    <option value="Africa/Monrovia">Africa/Monrovia</option>
                                    <option value="Africa/Nairobi">Africa/Nairobi</option>
                                    <option value="Africa/Ndjamena">Africa/Ndjamena</option>
                                    <option value="Africa/Niamey">Africa/Niamey</option>
                                    <option value="Africa/Nouakchott">Africa/Nouakchott</option>
                                    <option value="Africa/Ouagadougou">Africa/Ouagadougou</option>
                                    <option value="Africa/Porto-Novo">Africa/Porto-Novo</option>
                                    <option value="Africa/Sao_Tome">Africa/Sao_Tome</option>
                                    <option value="Africa/Tripoli">Africa/Tripoli</option>
                                    <option value="Africa/Tunis">Africa/Tunis</option>
                                    <option value="Africa/Windhoek">Africa/Windhoek</option>
                                    <option value="America/Adak">America/Adak</option>
                                    <option value="America/Anchorage">America/Anchorage</option>
                                    <option value="America/Anguilla">America/Anguilla</option>
                                    <option value="America/Antigua">America/Antigua</option>
                                    <option value="America/Araguaina">America/Araguaina</option>
                                    <option value="America/Argentina/Buenos_Aires">America/Argentina/Buenos_Aires
                                    </option>
                                    <option value="America/Argentina/Catamarca">America/Argentina/Catamarca</option>
                                    <option value="America/Argentina/Cordoba">America/Argentina/Cordoba</option>
                                    <option value="America/Argentina/Jujuy">America/Argentina/Jujuy</option>
                                    <option value="America/Argentina/La_Rioja">America/Argentina/La_Rioja</option>
                                    <option value="America/Argentina/Mendoza">America/Argentina/Mendoza</option>
                                    <option value="America/Argentina/Rio_Gallegos">America/Argentina/Rio_Gallegos
                                    </option>
                                    <option value="America/Argentina/Salta">America/Argentina/Salta</option>
                                    <option value="America/Argentina/San_Juan">America/Argentina/San_Juan</option>
                                    <option value="America/Argentina/San_Luis">America/Argentina/San_Luis</option>
                                    <option value="America/Argentina/Tucuman">America/Argentina/Tucuman</option>
                                    <option value="America/Argentina/Ushuaia">America/Argentina/Ushuaia</option>
                                    <option value="America/Aruba">America/Aruba</option>
                                    <option value="America/Asuncion">America/Asuncion</option>
                                    <option value="America/Atikokan">America/Atikokan</option>
                                    <option value="America/Bahia">America/Bahia</option>
                                    <option value="America/Bahia_Banderas">America/Bahia_Banderas</option>
                                    <option value="America/Barbados">America/Barbados</option>
                                    <option value="America/Belem">America/Belem</option>
                                    <option value="America/Belize">America/Belize</option>
                                    <option value="America/Blanc-Sablon">America/Blanc-Sablon</option>
                                    <option value="America/Boa_Vista">America/Boa_Vista</option>
                                    <option value="America/Bogota">America/Bogota</option>
                                    <option value="America/Boise">America/Boise</option>
                                    <option value="America/Cambridge_Bay">America/Cambridge_Bay</option>
                                    <option value="America/Campo_Grande">America/Campo_Grande</option>
                                    <option value="America/Cancun">America/Cancun</option>
                                    <option value="America/Caracas">America/Caracas</option>
                                    <option value="America/Cayenne">America/Cayenne</option>
                                    <option value="America/Cayman">America/Cayman</option>
                                    <option value="America/Chicago">America/Chicago</option>
                                    <option value="America/Chihuahua">America/Chihuahua</option>
                                    <option value="America/Costa_Rica">America/Costa_Rica</option>
                                    <option value="America/Creston">America/Creston</option>
                                    <option value="America/Cuiaba">America/Cuiaba</option>
                                    <option value="America/Curacao">America/Curacao</option>
                                    <option value="America/Danmarkshavn">America/Danmarkshavn</option>
                                    <option value="America/Dawson">America/Dawson</option>
                                    <option value="America/Dawson_Creek">America/Dawson_Creek</option>
                                    <option value="America/Denver">America/Denver</option>
                                    <option value="America/Detroit">America/Detroit</option>
                                    <option value="America/Dominica">America/Dominica</option>
                                    <option value="America/Edmonton">America/Edmonton</option>
                                    <option value="America/Eirunepe">America/Eirunepe</option>
                                    <option value="America/El_Salvador">America/El_Salvador</option>
                                    <option value="America/Fort_Nelson">America/Fort_Nelson</option>
                                    <option value="America/Fortaleza">America/Fortaleza</option>
                                    <option value="America/Glace_Bay">America/Glace_Bay</option>
                                    <option value="America/Godthab">America/Godthab</option>
                                    <option value="America/Goose_Bay">America/Goose_Bay</option>
                                    <option value="America/Grand_Turk">America/Grand_Turk</option>
                                    <option value="America/Grenada">America/Grenada</option>
                                    <option value="America/Guadeloupe">America/Guadeloupe</option>
                                    <option value="America/Guatemala">America/Guatemala</option>
                                    <option value="America/Guayaquil">America/Guayaquil</option>
                                    <option value="America/Guyana">America/Guyana</option>
                                    <option value="America/Halifax">America/Halifax</option>
                                    <option value="America/Havana">America/Havana</option>
                                    <option value="America/Hermosillo">America/Hermosillo</option>
                                    <option value="America/Indiana/Indianapolis">America/Indiana/Indianapolis</option>
                                    <option value="America/Indiana/Knox">America/Indiana/Knox</option>
                                    <option value="America/Indiana/Marengo">America/Indiana/Marengo</option>
                                    <option value="America/Indiana/Petersburg">America/Indiana/Petersburg</option>
                                    <option value="America/Indiana/Tell_City">America/Indiana/Tell_City</option>
                                    <option value="America/Indiana/Vevay">America/Indiana/Vevay</option>
                                    <option value="America/Indiana/Vincennes">America/Indiana/Vincennes</option>
                                    <option value="America/Indiana/Winamac">America/Indiana/Winamac</option>
                                    <option value="America/Inuvik">America/Inuvik</option>
                                    <option value="America/Iqaluit">America/Iqaluit</option>
                                    <option value="America/Jamaica">America/Jamaica</option>
                                    <option value="America/Juneau">America/Juneau</option>
                                    <option value="America/Kentucky/Louisville">America/Kentucky/Louisville</option>
                                    <option value="America/Kentucky/Monticello">America/Kentucky/Monticello</option>
                                    <option value="America/Kralendijk">America/Kralendijk</option>
                                    <option value="America/La_Paz">America/La_Paz</option>
                                    <option value="America/Lima">America/Lima</option>
                                    <option value="America/Los_Angeles">America/Los_Angeles</option>
                                    <option value="America/Lower_Princes">America/Lower_Princes</option>
                                    <option value="America/Maceio">America/Maceio</option>
                                    <option value="America/Managua">America/Managua</option>
                                    <option value="America/Manaus">America/Manaus</option>
                                    <option value="America/Marigot">America/Marigot</option>
                                    <option value="America/Martinique">America/Martinique</option>
                                    <option value="America/Matamoros">America/Matamoros</option>
                                    <option value="America/Mazatlan">America/Mazatlan</option>
                                    <option value="America/Menominee">America/Menominee</option>
                                    <option value="America/Merida">America/Merida</option>
                                    <option value="America/Metlakatla">America/Metlakatla</option>
                                    <option value="America/Mexico_City">America/Mexico_City</option>
                                    <option value="America/Miquelon">America/Miquelon</option>
                                    <option value="America/Moncton">America/Moncton</option>
                                    <option value="America/Monterrey">America/Monterrey</option>
                                    <option value="America/Montevideo">America/Montevideo</option>
                                    <option value="America/Montserrat">America/Montserrat</option>
                                    <option value="America/Nassau">America/Nassau</option>
                                    <option value="America/New_York">America/New_York</option>
                                    <option value="America/Nipigon">America/Nipigon</option>
                                    <option value="America/Nome">America/Nome</option>
                                    <option value="America/Noronha">America/Noronha</option>
                                    <option value="America/North_Dakota/Beulah">America/North_Dakota/Beulah</option>
                                    <option value="America/North_Dakota/Center">America/North_Dakota/Center</option>
                                    <option value="America/North_Dakota/New_Salem">America/North_Dakota/New_Salem
                                    </option>
                                    <option value="America/Ojinaga">America/Ojinaga</option>
                                    <option value="America/Panama">America/Panama</option>
                                    <option value="America/Pangnirtung">America/Pangnirtung</option>
                                    <option value="America/Paramaribo">America/Paramaribo</option>
                                    <option value="America/Phoenix">America/Phoenix</option>
                                    <option value="America/Port-au-Prince">America/Port-au-Prince</option>
                                    <option value="America/Port_of_Spain">America/Port_of_Spain</option>
                                    <option value="America/Porto_Velho">America/Porto_Velho</option>
                                    <option value="America/Puerto_Rico">America/Puerto_Rico</option>
                                    <option value="America/Punta_Arenas">America/Punta_Arenas</option>
                                    <option value="America/Rainy_River">America/Rainy_River</option>
                                    <option value="America/Rankin_Inlet">America/Rankin_Inlet</option>
                                    <option value="America/Recife">America/Recife</option>
                                    <option value="America/Regina">America/Regina</option>
                                    <option value="America/Resolute">America/Resolute</option>
                                    <option value="America/Rio_Branco">America/Rio_Branco</option>
                                    <option value="America/Santarem">America/Santarem</option>
                                    <option value="America/Santiago">America/Santiago</option>
                                    <option value="America/Santo_Domingo">America/Santo_Domingo</option>
                                    <option value="America/Sao_Paulo">America/Sao_Paulo</option>
                                    <option value="America/Scoresbysund">America/Scoresbysund</option>
                                    <option value="America/Sitka">America/Sitka</option>
                                    <option value="America/St_Barthelemy">America/St_Barthelemy</option>
                                    <option value="America/St_Johns">America/St_Johns</option>
                                    <option value="America/St_Kitts">America/St_Kitts</option>
                                    <option value="America/St_Lucia">America/St_Lucia</option>
                                    <option value="America/St_Thomas">America/St_Thomas</option>
                                    <option value="America/St_Vincent">America/St_Vincent</option>
                                    <option value="America/Swift_Current">America/Swift_Current</option>
                                    <option value="America/Tegucigalpa">America/Tegucigalpa</option>
                                    <option value="America/Thule">America/Thule</option>
                                    <option value="America/Thunder_Bay">America/Thunder_Bay</option>
                                    <option value="America/Tijuana">America/Tijuana</option>
                                    <option value="America/Toronto">America/Toronto</option>
                                    <option value="America/Tortola">America/Tortola</option>
                                    <option value="America/Vancouver">America/Vancouver</option>
                                    <option value="America/Whitehorse">America/Whitehorse</option>
                                    <option value="America/Winnipeg">America/Winnipeg</option>
                                    <option value="America/Yakutat">America/Yakutat</option>
                                    <option value="America/Yellowknife">America/Yellowknife</option>
                                    <option value="Antarctica/Casey">Antarctica/Casey</option>
                                    <option value="Antarctica/Davis">Antarctica/Davis</option>
                                    <option value="Antarctica/DumontDUrville">Antarctica/DumontDUrville</option>
                                    <option value="Antarctica/Macquarie">Antarctica/Macquarie</option>
                                    <option value="Antarctica/Mawson">Antarctica/Mawson</option>
                                    <option value="Antarctica/McMurdo">Antarctica/McMurdo</option>
                                    <option value="Antarctica/Palmer">Antarctica/Palmer</option>
                                    <option value="Antarctica/Rothera">Antarctica/Rothera</option>
                                    <option value="Antarctica/Syowa">Antarctica/Syowa</option>
                                    <option value="Antarctica/Troll">Antarctica/Troll</option>
                                    <option value="Antarctica/Vostok">Antarctica/Vostok</option>
                                    <option value="Arctic/Longyearbyen">Arctic/Longyearbyen</option>
                                    <option value="Asia/Aden">Asia/Aden</option>
                                    <option value="Asia/Almaty">Asia/Almaty</option>
                                    <option value="Asia/Amman">Asia/Amman</option>
                                    <option value="Asia/Anadyr">Asia/Anadyr</option>
                                    <option value="Asia/Aqtau">Asia/Aqtau</option>
                                    <option value="Asia/Aqtobe">Asia/Aqtobe</option>
                                    <option value="Asia/Ashgabat">Asia/Ashgabat</option>
                                    <option value="Asia/Atyrau">Asia/Atyrau</option>
                                    <option value="Asia/Baghdad">Asia/Baghdad</option>
                                    <option value="Asia/Bahrain">Asia/Bahrain</option>
                                    <option value="Asia/Baku">Asia/Baku</option>
                                    <option value="Asia/Bangkok">Asia/Bangkok</option>
                                    <option value="Asia/Barnaul">Asia/Barnaul</option>
                                    <option value="Asia/Beirut">Asia/Beirut</option>
                                    <option value="Asia/Bishkek">Asia/Bishkek</option>
                                    <option value="Asia/Brunei">Asia/Brunei</option>
                                    <option value="Asia/Chita">Asia/Chita</option>
                                    <option value="Asia/Choibalsan">Asia/Choibalsan</option>
                                    <option value="Asia/Colombo">Asia/Colombo</option>
                                    <option value="Asia/Damascus">Asia/Damascus</option>
                                    <option value="Asia/Dhaka">Asia/Dhaka</option>
                                    <option value="Asia/Dili">Asia/Dili</option>
                                    <option value="Asia/Dubai">Asia/Dubai</option>
                                    <option value="Asia/Dushanbe">Asia/Dushanbe</option>
                                    <option value="Asia/Famagusta">Asia/Famagusta</option>
                                    <option value="Asia/Gaza">Asia/Gaza</option>
                                    <option value="Asia/Hebron">Asia/Hebron</option>
                                    <option value="Asia/Ho_Chi_Minh">Asia/Ho_Chi_Minh</option>
                                    <option value="Asia/Hong_Kong">Asia/Hong_Kong</option>
                                    <option value="Asia/Hovd">Asia/Hovd</option>
                                    <option value="Asia/Irkutsk">Asia/Irkutsk</option>
                                    <option value="Asia/Jakarta">Asia/Jakarta</option>
                                    <option value="Asia/Jayapura">Asia/Jayapura</option>
                                    <option value="Asia/Jerusalem">Asia/Jerusalem</option>
                                    <option value="Asia/Kabul">Asia/Kabul</option>
                                    <option value="Asia/Kamchatka">Asia/Kamchatka</option>
                                    <option value="Asia/Karachi">Asia/Karachi</option>
                                    <option value="Asia/Kathmandu">Asia/Kathmandu</option>
                                    <option value="Asia/Khandyga">Asia/Khandyga</option>
                                    <option value="Asia/Kolkata">Asia/Kolkata</option>
                                    <option value="Asia/Krasnoyarsk">Asia/Krasnoyarsk</option>
                                    <option value="Asia/Kuala_Lumpur">Asia/Kuala_Lumpur</option>
                                    <option value="Asia/Kuching">Asia/Kuching</option>
                                    <option value="Asia/Kuwait">Asia/Kuwait</option>
                                    <option value="Asia/Macau">Asia/Macau</option>
                                    <option value="Asia/Magadan">Asia/Magadan</option>
                                    <option value="Asia/Makassar">Asia/Makassar</option>
                                    <option value="Asia/Manila">Asia/Manila</option>
                                    <option value="Asia/Muscat" selected>Asia/Muscat</option>
                                    <option value="Asia/Nicosia">Asia/Nicosia</option>
                                    <option value="Asia/Novokuznetsk">Asia/Novokuznetsk</option>
                                    <option value="Asia/Novosibirsk">Asia/Novosibirsk</option>
                                    <option value="Asia/Omsk">Asia/Omsk</option>
                                    <option value="Asia/Oral">Asia/Oral</option>
                                    <option value="Asia/Phnom_Penh">Asia/Phnom_Penh</option>
                                    <option value="Asia/Pontianak">Asia/Pontianak</option>
                                    <option value="Asia/Pyongyang">Asia/Pyongyang</option>
                                    <option value="Asia/Qatar">Asia/Qatar</option>
                                    <option value="Asia/Qyzylorda">Asia/Qyzylorda</option>
                                    <option value="Asia/Riyadh">Asia/Riyadh</option>
                                    <option value="Asia/Sakhalin">Asia/Sakhalin</option>
                                    <option value="Asia/Samarkand">Asia/Samarkand</option>
                                    <option value="Asia/Seoul">Asia/Seoul</option>
                                    <option value="Asia/Shanghai">Asia/Shanghai</option>
                                    <option value="Asia/Singapore">Asia/Singapore</option>
                                    <option value="Asia/Srednekolymsk">Asia/Srednekolymsk</option>
                                    <option value="Asia/Taipei">Asia/Taipei</option>
                                    <option value="Asia/Tashkent">Asia/Tashkent</option>
                                    <option value="Asia/Tbilisi">Asia/Tbilisi</option>
                                    <option value="Asia/Tehran">Asia/Tehran</option>
                                    <option value="Asia/Thimphu">Asia/Thimphu</option>
                                    <option value="Asia/Tokyo">Asia/Tokyo</option>
                                    <option value="Asia/Tomsk">Asia/Tomsk</option>
                                    <option value="Asia/Ulaanbaatar">Asia/Ulaanbaatar</option>
                                    <option value="Asia/Urumqi">Asia/Urumqi</option>
                                    <option value="Asia/Ust-Nera">Asia/Ust-Nera</option>
                                    <option value="Asia/Vientiane">Asia/Vientiane</option>
                                    <option value="Asia/Vladivostok">Asia/Vladivostok</option>
                                    <option value="Asia/Yakutsk">Asia/Yakutsk</option>
                                    <option value="Asia/Yangon">Asia/Yangon</option>
                                    <option value="Asia/Yekaterinburg">Asia/Yekaterinburg</option>
                                    <option value="Asia/Yerevan">Asia/Yerevan</option>
                                    <option value="Atlantic/Azores">Atlantic/Azores</option>
                                    <option value="Atlantic/Bermuda">Atlantic/Bermuda</option>
                                    <option value="Atlantic/Canary">Atlantic/Canary</option>
                                    <option value="Atlantic/Cape_Verde">Atlantic/Cape_Verde</option>
                                    <option value="Atlantic/Faroe">Atlantic/Faroe</option>
                                    <option value="Atlantic/Madeira">Atlantic/Madeira</option>
                                    <option value="Atlantic/Reykjavik">Atlantic/Reykjavik</option>
                                    <option value="Atlantic/South_Georgia">Atlantic/South_Georgia</option>
                                    <option value="Atlantic/St_Helena">Atlantic/St_Helena</option>
                                    <option value="Atlantic/Stanley">Atlantic/Stanley</option>
                                    <option value="Australia/Adelaide">Australia/Adelaide</option>
                                    <option value="Australia/Brisbane">Australia/Brisbane</option>
                                    <option value="Australia/Broken_Hill">Australia/Broken_Hill</option>
                                    <option value="Australia/Currie">Australia/Currie</option>
                                    <option value="Australia/Darwin">Australia/Darwin</option>
                                    <option value="Australia/Eucla">Australia/Eucla</option>
                                    <option value="Australia/Hobart">Australia/Hobart</option>
                                    <option value="Australia/Lindeman">Australia/Lindeman</option>
                                    <option value="Australia/Lord_Howe">Australia/Lord_Howe</option>
                                    <option value="Australia/Melbourne">Australia/Melbourne</option>
                                    <option value="Australia/Perth">Australia/Perth</option>
                                    <option value="Australia/Sydney">Australia/Sydney</option>
                                    <option value="Europe/Amsterdam">Europe/Amsterdam</option>
                                    <option value="Europe/Andorra">Europe/Andorra</option>
                                    <option value="Europe/Astrakhan">Europe/Astrakhan</option>
                                    <option value="Europe/Athens">Europe/Athens</option>
                                    <option value="Europe/Belgrade">Europe/Belgrade</option>
                                    <option value="Europe/Berlin">Europe/Berlin</option>
                                    <option value="Europe/Bratislava">Europe/Bratislava</option>
                                    <option value="Europe/Brussels">Europe/Brussels</option>
                                    <option value="Europe/Bucharest">Europe/Bucharest</option>
                                    <option value="Europe/Budapest">Europe/Budapest</option>
                                    <option value="Europe/Busingen">Europe/Busingen</option>
                                    <option value="Europe/Chisinau">Europe/Chisinau</option>
                                    <option value="Europe/Copenhagen">Europe/Copenhagen</option>
                                    <option value="Europe/Dublin">Europe/Dublin</option>
                                    <option value="Europe/Gibraltar">Europe/Gibraltar</option>
                                    <option value="Europe/Guernsey">Europe/Guernsey</option>
                                    <option value="Europe/Helsinki">Europe/Helsinki</option>
                                    <option value="Europe/Isle_of_Man">Europe/Isle_of_Man</option>
                                    <option value="Europe/Istanbul">Europe/Istanbul</option>
                                    <option value="Europe/Jersey">Europe/Jersey</option>
                                    <option value="Europe/Kaliningrad">Europe/Kaliningrad</option>
                                    <option value="Europe/Kiev">Europe/Kiev</option>
                                    <option value="Europe/Kirov">Europe/Kirov</option>
                                    <option value="Europe/Lisbon">Europe/Lisbon</option>
                                    <option value="Europe/Ljubljana">Europe/Ljubljana</option>
                                    <option value="Europe/London">Europe/London</option>
                                    <option value="Europe/Luxembourg">Europe/Luxembourg</option>
                                    <option value="Europe/Madrid">Europe/Madrid</option>
                                    <option value="Europe/Malta">Europe/Malta</option>
                                    <option value="Europe/Mariehamn">Europe/Mariehamn</option>
                                    <option value="Europe/Minsk">Europe/Minsk</option>
                                    <option value="Europe/Monaco">Europe/Monaco</option>
                                    <option value="Europe/Moscow">Europe/Moscow</option>
                                    <option value="Europe/Oslo">Europe/Oslo</option>
                                    <option value="Europe/Paris">Europe/Paris</option>
                                    <option value="Europe/Podgorica">Europe/Podgorica</option>
                                    <option value="Europe/Prague">Europe/Prague</option>
                                    <option value="Europe/Riga">Europe/Riga</option>
                                    <option value="Europe/Rome">Europe/Rome</option>
                                    <option value="Europe/Samara">Europe/Samara</option>
                                    <option value="Europe/San_Marino">Europe/San_Marino</option>
                                    <option value="Europe/Sarajevo">Europe/Sarajevo</option>
                                    <option value="Europe/Saratov">Europe/Saratov</option>
                                    <option value="Europe/Simferopol">Europe/Simferopol</option>
                                    <option value="Europe/Skopje">Europe/Skopje</option>
                                    <option value="Europe/Sofia">Europe/Sofia</option>
                                    <option value="Europe/Stockholm">Europe/Stockholm</option>
                                    <option value="Europe/Tallinn">Europe/Tallinn</option>
                                    <option value="Europe/Tirane">Europe/Tirane</option>
                                    <option value="Europe/Ulyanovsk">Europe/Ulyanovsk</option>
                                    <option value="Europe/Uzhgorod">Europe/Uzhgorod</option>
                                    <option value="Europe/Vaduz">Europe/Vaduz</option>
                                    <option value="Europe/Vatican">Europe/Vatican</option>
                                    <option value="Europe/Vienna">Europe/Vienna</option>
                                    <option value="Europe/Vilnius">Europe/Vilnius</option>
                                    <option value="Europe/Volgograd">Europe/Volgograd</option>
                                    <option value="Europe/Warsaw">Europe/Warsaw</option>
                                    <option value="Europe/Zagreb">Europe/Zagreb</option>
                                    <option value="Europe/Zaporozhye">Europe/Zaporozhye</option>
                                    <option value="Europe/Zurich">Europe/Zurich</option>
                                    <option value="Indian/Antananarivo">Indian/Antananarivo</option>
                                    <option value="Indian/Chagos">Indian/Chagos</option>
                                    <option value="Indian/Christmas">Indian/Christmas</option>
                                    <option value="Indian/Cocos">Indian/Cocos</option>
                                    <option value="Indian/Comoro">Indian/Comoro</option>
                                    <option value="Indian/Kerguelen">Indian/Kerguelen</option>
                                    <option value="Indian/Mahe">Indian/Mahe</option>
                                    <option value="Indian/Maldives">Indian/Maldives</option>
                                    <option value="Indian/Mauritius">Indian/Mauritius</option>
                                    <option value="Indian/Mayotte">Indian/Mayotte</option>
                                    <option value="Indian/Reunion">Indian/Reunion</option>
                                    <option value="Pacific/Apia">Pacific/Apia</option>
                                    <option value="Pacific/Auckland">Pacific/Auckland</option>
                                    <option value="Pacific/Bougainville">Pacific/Bougainville</option>
                                    <option value="Pacific/Chatham">Pacific/Chatham</option>
                                    <option value="Pacific/Chuuk">Pacific/Chuuk</option>
                                    <option value="Pacific/Easter">Pacific/Easter</option>
                                    <option value="Pacific/Efate">Pacific/Efate</option>
                                    <option value="Pacific/Enderbury">Pacific/Enderbury</option>
                                    <option value="Pacific/Fakaofo">Pacific/Fakaofo</option>
                                    <option value="Pacific/Fiji">Pacific/Fiji</option>
                                    <option value="Pacific/Funafuti">Pacific/Funafuti</option>
                                    <option value="Pacific/Galapagos">Pacific/Galapagos</option>
                                    <option value="Pacific/Gambier">Pacific/Gambier</option>
                                    <option value="Pacific/Guadalcanal">Pacific/Guadalcanal</option>
                                    <option value="Pacific/Guam">Pacific/Guam</option>
                                    <option value="Pacific/Honolulu">Pacific/Honolulu</option>
                                    <option value="Pacific/Kiritimati">Pacific/Kiritimati</option>
                                    <option value="Pacific/Kosrae">Pacific/Kosrae</option>
                                    <option value="Pacific/Kwajalein">Pacific/Kwajalein</option>
                                    <option value="Pacific/Majuro">Pacific/Majuro</option>
                                    <option value="Pacific/Marquesas">Pacific/Marquesas</option>
                                    <option value="Pacific/Midway">Pacific/Midway</option>
                                    <option value="Pacific/Nauru">Pacific/Nauru</option>
                                    <option value="Pacific/Niue">Pacific/Niue</option>
                                    <option value="Pacific/Norfolk">Pacific/Norfolk</option>
                                    <option value="Pacific/Noumea">Pacific/Noumea</option>
                                    <option value="Pacific/Pago_Pago">Pacific/Pago_Pago</option>
                                    <option value="Pacific/Palau">Pacific/Palau</option>
                                    <option value="Pacific/Pitcairn">Pacific/Pitcairn</option>
                                    <option value="Pacific/Pohnpei">Pacific/Pohnpei</option>
                                    <option value="Pacific/Port_Moresby">Pacific/Port_Moresby</option>
                                    <option value="Pacific/Rarotonga">Pacific/Rarotonga</option>
                                    <option value="Pacific/Saipan">Pacific/Saipan</option>
                                    <option value="Pacific/Tahiti">Pacific/Tahiti</option>
                                    <option value="Pacific/Tarawa">Pacific/Tarawa</option>
                                    <option value="Pacific/Tongatapu">Pacific/Tongatapu</option>
                                    <option value="Pacific/Wake">Pacific/Wake</option>
                                    <option value="Pacific/Wallis">Pacific/Wallis</option>
                                    <option value="UTC">UTC</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a class="btn" onclick="updateSettings('settingsfields')">Save Changes</a>
                        </div>
                    </div>
                </div>
                <!-- Timezone setting tab end -->
                <!-- Analytics setting tab start -->
                <div id="analytics_setting_tab" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-8">
                            <form id="google_analytics_form">
                                <div class="hs_input">
                                    <label>Google Analytics Script </label>
                                    <textarea rows="4" class="form-control settingsfields" name="google_analytics"
                                        id="google_anaylitics"><?= $res->google_analytics; ?></textarea>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-12">
                            <input type="button" class="btn" name="gogole_ana_btn"
                                onclick="google_code_setting('google_analytics')" id="gogole_ana_btn"
                                value="Save Changes" />
                        </div>
                    </div>
                </div>
                <div id="cookie_text_setting_tab" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-8">
                            <form id="cookie_text_form">
                                <div class="hs_input">
                                    <label>Title</label>
                                    <input type="text" name="c_title" class="form-control"
                                        value="<?= $res->c_btn_text; ?>" id="c_title" />
                                </div>
                                <div class="hs_input">
                                    <label>Link Text</label>
                                    <input type="text" name="c_link_text" value="<?= $res->c_link_text; ?>"
                                        class="form-control" id="c_link_text" />
                                </div>
                                <div class="hs_input">
                                    <label>Link</label>
                                    <input type="text" name="c_link" value="<?= $res->c_link; ?>" class="form-control"
                                        id="c_link" />
                                </div>
                                <div class="hs_input">
                                    <label>Message</label>
                                    <textarea rows="4" class="form-control settingsfields" name="cookie_text"
                                        id="cookie_text"><?= $res->cookie_text; ?></textarea>
                                    <p class="help-block">Place {LINK} where you want to show link</p>
                                </div>
                                <div class="hs_input">
                                    <label>Button Text</label>
                                    <input type="text" name="c_btn_text" value="<?= $res->c_btn_text; ?>"
                                        class="form-control" id="c_btn_text" />
                                </div>
                            </form>
                        </div>

                        <div class="col-md-12">
                            <input type="button" class="btn" onclick="cookie_setting()" value="Save Changes" />
                        </div>
                    </div>
                </div>
                <!-- Analytics setting tab end -->






                <div id="cookie_text_contect_setting_tab" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="contectupdate" id="cookie_text_form" method="POST"
                                enctype="multipart/form-data">

                                <div class="hs_input">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control"
                                        value="<?= $contect->address; ?>" id="address" />
                                </div>
                                <div class="hs_input">
                                    <label>Phone</label>
                                    <input type="number" name="phone" class="form-control"
                                        value="<?= $contect->phone; ?>" id="phone" />
                                </div>
                                <div class="hs_input">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="<?=$contect->email;?>"
                                        id="email" />
                                </div>

                                <br>
                                <input type="submit" class="btn" value="Save Changes" />

                            </form>
                        </div>

                        <!-- <div class="col-md-12">
                        </div> -->
                    </div>
                </div>
                <!-- Analytics setting tab end -->

                <!-- bk setting tab start -->
                <div id="dsd" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="hs_input">
                                <label>Copyright text</label>
                                <input type="text" class="form-control"
                                    value="Copyright © 2018 Doctor Directory. All rights reserved">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="" class="btn">Save Changes</a>
                        </div>
                    </div>
                </div>
                <!-- bk setting tab end -->

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