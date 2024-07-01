<?php include('common/head-section.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
<!-- 
<link rel="stylesheet"
                                  href="https://scnjob.com/assets/css/multiselect.css">
                                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
                                        </script>
                                       
                                <script src="https://scnjob.com/assets/js/multiselect.js"> -->
</script>
<div class="alert_close jp_alert_wrapper jp_error msg">
    <div class="jp_alert_inner">
        <p class="ng-binding">Please Profile Update</p>
    </div>
</div>
<?php 
$fmsg=$this->session->flashdata('profile_update');
if($fmsg)
{
	?>
<div class="alert_open jp_alert_wrapper jp_error msg">
    <div class="jp_alert_inner">
        <p class="ng-binding"><?= $controller->set_language('profile_update_err'); ?></p>
    </div>
</div>
<?php
}
?>
<div class="alert_close jp_alert_wrapper jp_error msg">
    <div class="jp_alert_inner">
        <p class="ng-binding">Please Profile Update</p>
    </div>
</div>

<body onload="read_cookie();" <?php if(!empty($this->email)) { echo "class='jp_login'"; } ?>>
    <div class="jp_loading_wrapper">
        <div class="jp_loading_inner">
            <img src="<?= base_url('assets/images/loader01.gif'); ?>" alt="" />
        </div>
    </div>
    <div class="jp_sidebar_close"></div>
    <!-- header start -->
    <div class="jp_header" style="background-image: url(<?= base_url().$res->bg_img; ?>);">
        <div class="container">
            <div class="row">
                <?php include('common/header_recruiter.php');
			$name=$r1->name;
			$name_array=explode(" ",$name)
			?>
                <div class="col-md-12">
                    <div class="jp_page_title">
                        <h3><?= $name_array[0]." "; ?><span
                                id=""><?= $controller->set_language('profile_keyword'); ?></span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header end -->
    <div class="jp_main_wrapper">
        <div class="jp_profile_wrapper">
            <div class="container">
                <div class="row">
                    <? form_open('Recruiter/recruiter_profile_update'); ?>
                    <div class="jp_job_box">
                        <div class="col-md-4">
                            <div class="jp_profile_image">
                                <div class="image">
                                    <?php
                                    $img1=$r1->img;
                                    $imgf='';
                                    //$check=strrpos($img1,"https://");
                                    if (filter_var($img1, FILTER_VALIDATE_URL)) {
                                         $imgf=$img1;
                                    } else {
                                        $imgf=base_url().$img1;
                                    }
                                 ?>
                                    <img src="<?= $imgf; ?>" alt="Profile Image">
                                    <div class="overlay">
                                        <form id="f1">
                                            <input type="hideen" name="counter" value="1">
                                            <input type="file" name="img" id="img" />
                                            <svg x="0px" y="0px" viewbox="0 0 471.2 471.2"
                                                style="enable-background:new 0 0 471.2 471.2;" xml:space="preserve"
                                                width="512px" height="512px">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M457.7,230.15c-7.5,0-13.5,6-13.5,13.5v122.8c0,33.4-27.2,60.5-60.5,60.5H87.5c-33.4,0-60.5-27.2-60.5-60.5v-124.8 c0-7.5-6-13.5-13.5-13.5s-13.5,6-13.5,13.5v124.8c0,48.3,39.3,87.5,87.5,87.5h296.2c48.3,0,87.5-39.3,87.5-87.5v-122.8 C471.2,236.25,465.2,230.15,457.7,230.15z"
                                                            fill="#FFFFFF" />
                                                        <path
                                                            d="M159.3,126.15l62.8-62.8v273.9c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5V63.35l62.8,62.8c2.6,2.6,6.1,4,9.5,4 c3.5,0,6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1l-85.8-85.8c-2.5-2.5-6-4-9.5-4c-3.6,0-7,1.4-9.5,4l-85.8,85.8 c-5.3,5.3-5.3,13.8,0,19.1C145.5,131.35,154.1,131.35,159.3,126.15z"
                                                            fill="#FFFFFF" />
                                                    </g>
                                                </g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                            </svg>
                                    </div>
                                </div>
                                <p id="">Company Logo</p>
                                <h3><?= $r1->name; ?></h3>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">


                                <div class="col-md-12" style="display:none">
                                    <div class="jp_input_wrapper">
                                        <label id=""><?= $controller->set_language('org_type_title'); ?></label>
                                        <div class="jp_radio_list" style="display:none">
                                            <?php if($r1->org_type=="Company") { ?>
                                            <div class="jp_radio">

                                                <input type="radio" value="Company" name="org_type" id="Company"
                                                    checked="">
                                                <label for="Company"
                                                    id=""><?= $controller->set_language('type1'); ?></label>
                                            </div>
                                            <div class="jp_radio">
                                                <input type="radio" value="Consultant" name="org_type" id="Consultant">
                                                <label for="Consultant"
                                                    id=""><?= $controller->set_language('type2'); ?></label>
                                            </div>
                                            <?php } else { ?>
                                            <div class="jp_radio">
                                                <input type="radio" value="Company" name="org_type" id="Company">
                                                <label for="Company"
                                                    id=""><?= $controller->set_language('type1'); ?></label>
                                            </div>
                                            <div class="jp_radio">
                                                <input type="radio" value="Consultant" name="org_type" id="Consultant"
                                                    checked="">
                                                <label for="Consultant"
                                                    id=""><?= $controller->set_language('type2'); ?></label>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="jp_input_wrapper">
                                        <label id="">Company Name</label>
                                        <input type="text" id="company_name" name="company_name"
                                            value="<?= $r1->company_name; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="jp_input_wrapper">
                                        <label id="">full name</label>
                                        <input type="text" id="" name="name" value="<?= $r1->name; ?>"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="jp_input_wrapper">
                                        <label id="">Mobile no</label>
                                        <input type="number" id="mno" name="mno" value="<?= $r1->mno; ?>"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="jp_input_wrapper">
                                        <label id=""> E-mail ID </label>
                                        <input type="text" id="name" name="email" value="<?= $r1->email?>"
                                            disabled="disabled" class="form-control">
                                    </div>
                                </div>



                                <?php  $lung=explode(', ',$r1->language); ?>

                                <div class="col-md-12">
                                    <div class="jp_input_wrapper">
                                        <label>Language</label>

                                        </script>
                                        <select data-placeholder="Begin typing a name to filter..." multiple
                                            class="form-control chosen-select" name="language[]" id="language">

                                            <?php foreach($language as $key=>$lg){ ?>

                                            <option value="<?= $lg->name;?>"
                                                <?php if(in_array( $lg->name,$lung,true)) { echo "selected"; } ?>>
                                                <?= $lg->name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <script>
                                $(".chosen-select").chosen({
                                    no_results_text: "Oops, nothing found!"
                                })
                                </script>
                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label for="us_state">STATE</label>
                                        <select onchange="print_city('city',this.selectedIndex);" id="us_state"
                                            name="state" class="form-control"></select>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label for="city">CITY</label>
                                        <select name="city" id="city" class="form-control">
                                        </select>
                                    </div>
                                </div>
                                <script language="javascript">
                                print_state("us_state");
                                if ("<?= $r1->state?>" != "") {
                                    document.getElementById("us_state").value = "<?= $r1->state?>";
                                    var index = $("select[name='state'] option:selected").index();
                                    // console.log(index);
                                    print_city('city', index);
                                    if ("<?= $r1->city?>" != "") {
                                        document.getElementById("city").value = "<?= $r1->city?>";

                                    }
                                }
                                </script>

                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label id="">LOCALITY</label>
                                        <input type="text" name="locality" id="locality" class="form-control"
                                            value="<?= $r1->locality?>">

                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="jp_input_wrapper">
                                        <label id="">Company Address</label>
                                        <input type="text" id="company_address" name="company_address"
                                            value="<?= $r1->company_address; ?>" class="form-control">
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="jp_input_wrapper">
                                        <label id="">Head Office Address if have</label>
                                        <textarea rows="3" name="address" id="address"
                                            class="form-control"><?= $r1->address; ?></textarea>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="jp_input_wrapper">
                                        <label id="">COMPANY Website </label>
                                        <input type="text" name="website" id="website" value="<?=$r1->website ?>"
                                            class="form-control">
                                        <p>URL Should be in HTTP Or HTTPS Format</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="jp_input_wrapper">
                                        <label id=""><?= $controller->set_language('org_desc'); ?></label>
                                        <textarea rows="3" id="desc" name="des" value=""
                                            class="form-control"><?= $r1->des ?></textarea>
                                        </form>
                                    </div>
                                </div>
                            </div>



                            <div class="jp_input_wrapper">
                                <button class="jp_btn"
                                    id="req_profile_btn"><?= $controller->set_language('s_change'); ?></button>
                            </div>



                            <div class="jp_job_disc">
                                <h4 id="pay_detail"></h4>
                                <?php 
								if($r1->pay=='yes')
								{
									$job_p=$jp_plan_info->value1;
									$resume=$jp_plan_info->value2;
								?>
                                <p><strong><span id=""><?= $controller->set_language('pay_date'); ?></span> : </strong>
                                    <?= $r1->pay_date ?> </p>
                                <p><strong><span id=""><?= $controller->set_language('plan'); ?></span> : </strong>
                                    <?= $r1->plan ?></p>
                                <p><strong><span id=""><?= $controller->set_language('job_post'); ?></span> : </strong>
                                    <?php  if($job_p=='ALL') { echo  "Unlimited"; } else { echo  $job_post."/".$job_p; } ?>
                                </p>
                                <p><strong><span id=""><?= $controller->set_language('r_download'); ?></span> :
                                    </strong>
                                    <?php if($resume=='ALL') { echo "Unlimited"; } else { echo  $resume_download."/".$resume; } ?>
                                </p>
                                <p><strong><span id=""><?= $controller->set_language('validity'); ?></span> : </strong>
                                    <?php  $vali=$plan_info->duration; if($vali=="one_time") { echo "Life Time"; } else { echo $vali." Month"; } ?>
                                </p>
                                <p><strong><a href="<?= base_url('recruiter/revenue_plans'); ?>"><span
                                                id=""><?= $controller->set_language('active_new_plan'); ?></span></a></strong>
                                </p>
                                <?php } else {
									?>
                                <p><strong><?= $controller->set_language('rec-pay_error'); ?></strong> </p>
                                <p><a href="<?= base_url('recruiter/revenue_plans'); ?>"><span
                                            id="active_new_plan"><?= $controller->set_language('active_new_plan'); ?></span></a>
                                </p>
                                <?php
								} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <input type="hidden" name="loc_empty" id="loc_empty"
        value="<?= $controller->set_language_v('validation_org_loc'); ?>" class="form-control">
    <input type="hidden" name="address_empty" id="address_empty"
        value="<?= $controller->set_language_v('validation_enter_address'); ?>" class="form-control">
    <input type="hidden" name="website_empty" id="website_empty"
        value="<?= $controller->set_language_v('validation_website_link'); ?>" class="form-control">
    <input type="hidden" name="desc_empty" id="desc_empty"
        value="<?= $controller->set_language_v('validation_org_desc'); ?>" class="form-control">
    <input type="hidden" name="valid_website" id="valid_website"
        value="<?= $controller->set_language_v('validation_valid_link'); ?>" class="form-control">
    <input type="hidden" name="update" id="update"
        value="<?= $controller->set_language_v('validation_profile_success'); ?>" class="form-control">
    <input type="hidden" name="not_up" id="not_up" value="<?= $controller->set_language_v('pro_not_up'); ?>"
        class="form-control">
    <input type="hidden" name="pri_pic_up" id="pri_pic_up" value="<?= $controller->set_language_v('pro_pic_up'); ?>"
        class="form-control">
    <input type="hidden" name="pro_pic_not_up" id="pro_pic_not_up"
        value="<?= $controller->set_language_v('ppic_not'); ?>" class="form-control">
    <input type="hidden" name="jpg_png" id="jpg_png" value="<?= $controller->set_language_v('only_jpg'); ?>"
        class="form-control">
    <?php include('common/footer_recruiter.php'); ?>
    <a href="#" id="jp_backToTop" title="Back to top">&uarr;</a>
</body>

</html>