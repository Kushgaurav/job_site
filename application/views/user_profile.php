<?php include('common/head-section.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
<div class="alert_close jp_alert_wrapper jp_error msg">
    <div class="jp_alert_inner">
        <p class="ng-binding"><?= $controller->set_language('profile_update_err'); ?></p>
    </div>
</div>
<div class="jp_sidebar_close"></div>
<!-- header start -->
<div class="jp_header" <?php include('module/bg_img.php'); ?>>
    <div class="container">
        <div class="row">
            <?php
				include('common/header_user.php');  
				$name=$res1->name;
				$name_array=explode(" ",$name)
			?>

            <div class="col-md-6">
                <div class="jp_page_title">
                    <h3><?= $name_array[0]."  " ?> <?= $controller->set_language('u_profile_keyword') ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="jp_main_wrapper">
    <div class="jp_profile_wrapper">
        <div class="container">
            <div class="d-flex justify-content-end mb-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Change password
                </button>

                <!-- Modal -->
                <div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Change password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="password" method="post">
                                <input type="hidden" value="<?= $res1->id; ?>" class="form-control" name="id"
                                            disabled="disabled">
                                    <div class="col-md-6">
                                        <div class="jp_input_wrapper">
                                            <label>New Password</label>
                                            <input type="text" id="password" name="password" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <div class="jp_input_wrapper">
                                            <label>New Password</label>
                                            <input type="text" id="password" name="newpassword" class="form-control"
                                                required>
                                        </div>
                                    </div> -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="jp_job_box">
                    <div class="col-md-4">
                        <div class="jp_profile_image">
                            <div class="image">
                                <?php
                                $img1=$res2->img;
                                $gid=$res2->google_id;
                                $imgf='';
                                //$check=strrpos($img1,"https://");
                                if (filter_var($img1, FILTER_VALIDATE_URL)) {
                                     $imgf=$img1;
                                } else {
                                    $imgf=base_url().$img1;
                                }
                               ?>
                                <img src="<?= $imgf; ?>" alt="">

                                <div class="overlay">
                                    <form id="f2">
                                        <input type="file" name="img" id="img" onchange="user_image_upload()">
                                    </form>
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
                                    </form>
                                </div>
                            </div>
                            <p></p>
                            <h3><?= $res1->name; ?></h3>
                        </div>
                    </div>

                    <form action="profile_update" method="post" enctype='multipart/form-data'>
                        <div class="col-md-8">
                            <h3 class="jp_title_medium"><?= $controller->set_language('user_personal_details') ?></h3>
                            <!-- <? form_open_multipart('Home/profile_update'); ?> -->

                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" id="counter" name="counter" value="<?= $res1->counter ?>" />


                                    <div class="jp_input_wrapper">
                                        <label><?= $controller->set_language('user_name') ?></label>
                                        <input type="text" name="name" value="<?= $res1->name; ?>" id="name"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label><?= $controller->set_language('user_mno') ?></label>
                                        <input type="text" value="<?= $res1->mno; ?>" id="mno" name="mno"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label>whatsapp no</label>
                                        <input type="number" value="<?= $res1->whatsapp_no; ?>" id="whatsapp_no"
                                            name="whatsapp_no" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label>email id</label>
                                        <input type="text" value="<?= $res1->email; ?>" class="form-control"
                                            disabled="disabled">
                                    </div>
                                </div>

                                <script>
                                $('option').mousedown(function(e) {
                                    e.preventDefault();
                                    $(this).prop('selected', !$(this).prop('selected'));
                                    return false;
                                });

                                window.onmousedown = function(e) {
                                    var el = e.target;
                                    if (el.tagName.toLowerCase() == 'option' && el.parentNode.hasAttribute(
                                            'multiple')) {
                                        e.preventDefault();

                                        // toggle selection
                                        if (el.hasAttribute('selected')) el.removeAttribute('selected');
                                        else el.setAttribute('selected', '');

                                        // hack to correct buggy behavior
                                        var select = el.parentNode.cloneNode(true);
                                        el.parentNode.parentNode.replaceChild(select, el.parentNode);
                                    }
                                }
                                </script>

                                <?php  $lung=explode(', ',$res1->language); ?>

                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label>Language</label>


                                        <select name="language[]" id="language" class="form-control chosen-select language"
                                            multiple="multiple">
                                            <?php foreach($language as $key=>$lg){ ?>

                                            <option value="<?= $lg->name;?>"
                                                <?php if(in_array( $lg->name,$lung,true)) { echo "selected"; } ?>>
                                                <?= $lg->name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                             <script>
                                $(".language").chosen({
                                    no_results_text: "Oops, nothing found!"
                                })
                                </script>


                                <?php $male_k=strtolower($controller->set_language('male_keyword')); 
								  $female_k=strtolower($controller->set_language('female_keyword'));
							?>
                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label><?= $controller->set_language('gender_keyword') ?></label>

                                        <select name="gender" id="gender" class="form-control filterselect">

                                            <option value=" -- select type -- ">-- select type --</option>
                                            <option value="<?=$male_k?>"
                                                <?php if($res1->gender==$male_k) { echo "selected"; } ?>>
                                                <?php echo $controller->set_language('male_keyword'); ?></option>

                                            <option value="<?=$female_k?>"
                                                <?php if($res1->gender==$female_k) { echo "selected"; } ?>>
                                                <?= $controller->set_language('female_keyword') ?></option>


                                            <option value="other"
                                                <?php if($res1->gender=='other') { echo "selected"; } ?>>
                                                Other</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label>permanent address</label>
                                        <textarea rows="3" name="permanent_address" id="permanent_address"
                                            class="form-control"><?= $res1->permanent_address; ?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label><?= $controller->set_language('user_address') ?></label>
                                        <textarea rows="3" name="current_address" id="current_address"
                                            class="form-control"><?= $res1->current_address; ?></textarea>
                                    </div>
                                </div>


                                <div class="clearfix"></div><br><br>





                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label>Job Role</label>

                                        <select name="designation" id="designation" class="form-control filterselect">
                                            <?php foreach($jobrole as $jb){ ?>
                                            <option value="<?= $jb->name;?>"
                                                <?php if($res1->designation == $jb->name){ echo "selected";} ?>>
                                                <?= $jb->name; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>










                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label><?= $controller->set_language('user_job_type') ?></label>

                                        <select name="job_type" id=" job_type" class="form-control filterselect">
                                            <?php foreach($job_types1 as $jt){ ?>
                                            <option value="<?= $jt->name;?>"
                                                <?php if($res1->job_type == $jt->name){ echo "selected";} ?>>
                                                <?= $jt->name; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label>cv headline</label>
                                        <textarea rows="3" name="cv_headline" id="cv_headline"
                                            class="form-control"><?= $res1->cv_headline; ?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label>Industry</label>
                                        <select name="aofs" id="aofs" class="form-control filterselect">
                                            <option <?php if(is_null($res1->aofs))  { echo "selected"; } ?>
                                                value="select">
                                                <?= $controller->set_language('user_p_select') ?></option>
                                            <?php
										foreach($area_of_sectors1 as $area_sectors)
										{
											?>
                                            <option <?php if($area_sectors->name==$res1->aofs){ echo "selected"; } ?>>
                                                <?= $area_sectors->name; ?></option>
                                            <?php
										}
										?>
                                        </select>
                                    </div>
                                </div>

                                <!-- function -->
                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label>Function</label>
                                        <select name="function" id="function" class="form-control filterselect"
                                            required>

                                            <?php  foreach($specialization as $sp){ ?>
                                            <option <?php if($sp->name==$res1->function){ echo "selected"; } ?>>
                                                <?= $sp->name ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>




                                <?php  $skil=explode(', ',$res1->skills); ?>

                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label>skills</label>
                                        
                                        <div class="row d-flex justify-content-center mt-100">
                                            <select name="skills[]" id="skills" class="form-control skills"
                                                multiple="multiple">

                                                <?php foreach($skills as $key=>$skl){ ?>
                                                <option value="<?= $skl->name;?>"
                                                    <?php if(in_array( $skl->name,$skil,true)) { echo "selected"; } ?>>
                                                    <?= $skl->name;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                $(".skills").chosen({
                                    no_results_text: "Oops, nothing found!"
                                })
                                </script>
                                



                                <!-- <div class="col-md-3">
                                        <div class="jp_input_wrapper">
                                            <label>STATE</label>

                                            <select name="state" id="us_state" class="form-control">
                                                <option value="<?= $controller->set_language('job_post_select'); ?>"
                                                    id="select_keyword3">
                                                    <?= $controller->set_language('job_post_select'); ?></option>
                                                <?php
										foreach($loc as $loc1)
										{
										?>
                                                <option value="<?= $loc1->state; ?>"
                                                    <?php if($res1->state == $loc1->state){ echo "selected";} ?>>
                                                    <?= $loc1->state?>
                                                </option>
                                                <?php
										}
										?>
                                            </select>

                                        </div>
                                    </div> -->



                                <?php  $citys=explode(', ',$res1->city); ?>
                                <div class="col-md-6">

                                    <!-- <div class="jp_input_wrapper">
                                            <label id="">CITY</label>
                                            <select name="city" id="city" class="form-control">
                                                <?php foreach ($city as $key) { ?>
                                                <option value="<?=$key->name ?>"
                                                    <?php if($res1->city == $key->name){ echo "selected";} ?>>
                                                    <?=$key->name?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div> -->


                                    <div class="jp_input_wrapper">
                                        <label>Prefer Location</label>
                                        

                                        <div class="row d-flex justify-content-center mt-100">
                                            <select name="city[]" id="city" class="form-control cityss"
                                                multiple="multiple">
                                                <?php foreach ($city as $key) { ?>
                                                <option value="<?=$key->name ?>"
                                                    <?php if(in_array( $key->name,$citys,true)) { echo "selected"; } ?>>
                                                    <?=$key->name?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                  
                                </div>
                                <script>
                                $(".cityss").chosen({
                                    no_results_text: "Oops, nothing found!"
                                })
                                </script>

                              


                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label>Preferred Shift</label>
                                        <select name="preferred_shift" id="preferred_shift" class="form-control ">
                                            <option value=""> -- Select Preferred Shift --
                                            </option>
                                            <?php foreach($preferred_shift as $preshif){ ?>
                                            <option value="<?= $preshif->name;?>"
                                                <?php if($res1->preferred_shift == $preshif->name){ echo "selected";} ?>>
                                                <?= $preshif->name; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label>Notice Period</label>
                                        <select name="notice_period" id="notice_period" class="form-control ">
                                            <option value=""> -- Select Notice Period --
                                            </option>
                                            <?php foreach($notice_period as $noticpri){ ?>
                                            <option value="<?= $noticpri->name;?>"
                                                <?php if($res1->notice_period == $noticpri->name){ echo "selected";} ?>>
                                                <?= $noticpri->name; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label>QUALIFICATION TYPE</label>
                                        <select name="qua_type" id="qualification_type" class="form-control ">
                                            <option value=""> -- Select Qualification Type --
                                            </option>
                                            <?php foreach($qualification_type as $qt){ ?>
                                            <option value="<?= $qt->id;?>"
                                                <?php if($res1->qua_type == $qt->id){ echo "selected";} ?>>
                                                <?= $qt->name; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label><?= $controller->set_language('user_qualification') ?></label>
                                        <select name="qua" id="qualification" class="form-control">
                                            <option value=""> -- Select Qualification -- </option>
                                            <?php if (!empty($res1->qua) || $res1->qua != null)  { ?>
                                            <option value="<?=$res1->qua?>" selected> <?=$res1->qua?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>


                                <script>
                                document.getElementById('qualification_type').addEventListener(
                                    'change',
                                    function handleChange(teama) {

                                        var data = {
                                            'type': teama.target.value
                                        }

                                        $.ajax({
                                            type: "POST",
                                            url: "/admin/qualifications",
                                            data: data,
                                            dataType: "json",

                                            success: function(result) {

                                                $('#qualification').html('');
                                                var options = '';
                                                options +=
                                                    '<option value=""> -- Select Qualification -- </option>';
                                                for (var i = 0; i < result.data
                                                    .length; i++) {
                                                    options += '<option value="' +
                                                        result.data[
                                                            i]
                                                        .name +
                                                        '">' + result
                                                        .data[i]
                                                        .name +
                                                        '</option>';
                                                }
                                                $('#qualification').append(options);
                                            }
                                        });

                                    });
                                </script>



                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label><?= $controller->set_language('user_passing_year') ?></label>
                                        <input type="text" value="<?= $res1->p_year; ?>" name="p_year" id="p_year"
                                            placeholder="yyyy-mm-dd" class="datepicker_pyear1 form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label><?= $controller->set_language('user_cgpa') ?></label>
                                        <input type="text" value="<?= $res1->cgpa; ?>" id="cgpa" name="cgpa"
                                            class="form-control">
                                    </div>
                                </div>




                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label>ARE YOU</label>
                                        <select name="exp" id="exp" class="form-control filterselect" onchange="handleChange()">

                                            <option value=" -- select type -- ">-- select type --
                                            </option>
                                            <option value="<?= $controller->set_language('fresher_keyword') ?>"
                                                <?php if($res1->exp==$controller->set_language('fresher_keyword')) { echo "selected"; } ?>>
                                                <?= $controller->set_language('fresher_keyword') ?>
                                            </option>

                                            <option value="<?= $controller->set_language('exp_keyword') ?>"
                                                <?php if($res1->exp==$controller->set_language('exp_keyword')) { echo "selected"; } ?>>
                                                <?= $controller->set_language('exp_keyword') ?>
                                            </option>
                                        </select>


                                    </div>
                                </div>

                               
                                <div class="col-md-6" id="expdivmonths"
                                    style=" <?php if($res1->exp==$controller->set_language('exp_keyword')) { echo "display: block;"; }else{echo "display: none;";} ?>">
                                    <div class="jp_input_wrapper">
                                        <label>experience Year</label>
                                        <input type="number" id="exp_year" name="exp_year" value="<?=$res1->exp_year?>"
                                            class="form-control" min="0">
                                    </div>
                                </div>

                                <div class="col-md-6" id="expdiv"
                                    style=" <?php if($res1->exp==$controller->set_language('exp_keyword')) { echo "display: block;"; }else{echo "display: none;";} ?>">
                                    <div class="jp_input_wrapper">
                                        <label>experience Months</label>
                                        <input type="number" id="experience" name="experience"
                                            value="<?=$res1->experience?>" class="form-control" min="0" max="12">
                                    </div>
                                </div>




                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <label><?= $controller->set_language('user_resume') ?></label>
                                        <input type="file" value="c:\abc.jp" name="resume" id="re" class="form-control"
                                            onchange="document.getElementById('output').href = window.URL.createObjectURL(this.files[0])">
                                        <!-- <p><?= $controller->set_language('pdf_doc_msg') ?></p> -->
                                    </div>
                                </div>
                                <?php 
							$resume=$res1->resume;
								if(isset($resume))
								{
								?>
                                <div class="col-md-6">
                                    <div class="jp_input_wrapper">
                                        <p><a href="<?= '../'.$resume; ?>" class="jp_download_link" id="output"
                                                target="_blank"><span></span>View
                                                Resume</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
								}
							?>


                            <div class="clearfix"></div><br><br>

                            <div class="jp_input_wrapper">
                                <button type="submit"
                                    class="jp_btn"><?= $controller->set_language('u_p_save_btn') ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<input type="hidden" name="" id="name_empty" value="<?= $controller->set_language_v('validation_name_empty'); ?>"
    class="form-control">
<input type="hidden" name="mno_empty" id="mno_empty" value="<?= $controller->set_language_v('validation_mno_empty'); ?>"
    class="form-control">
<input type="hidden" name="p_loc_select" id="p_loc_select"
    value="<?= $controller->set_language_v('validation_select_plocation'); ?>" class="form-control">
<input type="hidden" name="qua_select" id="qua_select"
    value="<?= $controller->set_language_v('validation_select_qua'); ?>" class="form-control">
<input type="hidden" name="aofs_select" id="aofs_select"
    value="<?= $controller->set_language_v('validation_select_aofs'); ?>" class="form-control">
<input type="hidden" name="cps_empty" id="cps_empty" value="<?= $controller->set_language_v('validation_cps_empty'); ?>"
    class="form-control">
<input type="hidden" name="valid_mno" id="valid_mno"
    value="<?= $controller->set_language_v('validation_mno_exists'); ?>" class="form-control">
<input type="hidden" name="c_add_empty" id="c_add_empty" value="<?= $controller->set_language_v('c_address'); ?>"
    class="form-control">
<input type="hidden" name="p_year_empty" id="p_year_empty"
    value="<?= $controller->set_language_v('validation_pyeat'); ?>" class="form-control">
<input type="hidden" name="cgpa_empty" id="cgpa_empty"
    value="<?= $controller->set_language_v('validation_enter_cgpa'); ?>" class="form-control">
<input type="hidden" name="valid_cgpa" id="valid_cgpa" value="<?= $controller->set_language_v('validation_v_cgpa'); ?>"
    class="form-control">
<input type="hidden" name="ps_not" id="ps_not" value="<?= $controller->set_language_v('validation_ps_not'); ?>"
    class="form-control">
<input type="hidden" name="ps_short" id="ps_short"
    value="<?= $controller->set_language_v('validation_password_short'); ?>" class="form-control">
<input type="hidden" name="select_resume_file" id="select_resume_file"
    value="<?= $controller->set_language_v('validation_select_resume'); ?>" class="form-control">
<input type="hidden" name="profile_update" id="profile_update"
    value="<?= $controller->set_language_v('validation_profile_success'); ?>" class="form-control">
<input type="hidden" name="profile_not_update" id="profile_not_update"
    value="<?= $controller->set_language_v('pro_not_up'); ?>" class="form-control">
<?php include('common/footer_user.php'); ?>
<a href="#" id="jp_backToTop" title="Back to top">&uarr;</a>
</body>

</html>
<?php
$msg=$this->session->flashdata('pupdate');
if(isset($msg))
{
    ?>
<script>
$('document').ready(function() {
    $('.msg').addClass('alert_open');
    setInterval(function() {
        $('.msg').removeClass('alert_open');
    }, 3000);
});
</script>

<?php
}
?>

<script>
                                    function handleChange() {

                                        var data = document.getElementById('exp').value;

                                        if (data == 'Fresher') {
                                            document.getElementById('expdiv').style.display =
                                                'none';
                                            document.getElementById('expdivmonths').style
                                                .display = 'none';
                                        } else {
                                            document.getElementById('expdiv').style.display =
                                                'block';
                                            document.getElementById('expdivmonths').style
                                                .display = 'block';
                                        }

                                    }
                                </script>