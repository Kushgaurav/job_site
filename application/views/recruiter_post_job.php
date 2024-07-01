<?php include('common/head-section.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
<div class="alert_close jp_alert_wrapper jp_error msg">
    <div class="jp_alert_inner">
        <p class="ng-binding">Please Profile Update</p>
    </div>
</div>
<div class="jp_sidebar_close"></div>
<!-- header start -->
<div class="jp_header" <?php include('module/bg_img.php'); ?>>
    <div class="container">
        <div class="row">
            <?php include('common/header_recruiter.php');
			$s1=$this->session->userdata('recruiter');
			?>
            <div class="col-md-12">
                <div class="jp_page_title">
                    <h3 id=""><?= $controller->set_language('job_post_heading1'); ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header end -->

<div class="jp_main_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jp_postJob_wrapper">
                    <? form_open('Recruiter/job_post') ?>
                    <form id="f1" action="newjobpost" method="POST" enctype='multipart/form-data'>
                        <input type="hidden" name="pay_count" value="<?= $pay_count2; ?>">
                        <input type="hidden" name="r_id" value="<?= $s1 ?>">
                        <input type="hidden" name="post_date" value="<?= date("jS  F Y "); ?>">
                        <div class="jp_job_box">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label id="">Job role</label>
                                        <select name="designation" id="designation" class="form-control filterselect">
                                            <?php foreach($job_r as $jr){ ?>
                                            <option value="<?= $jr->name; ?>"> <?= $jr->name?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label id=""><?= $controller->set_language('num_if_v'); ?></label>
                                        <input type="text" name="number_of_vacancies" id="specialization"
                                            class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label id=""><?= $controller->set_language('job_type'); ?></label>
                                        <select name="job_type" id="job_type" class="form-control filterselect">

                                            <?php
										foreach($job_types as $jt)
										{  ?>
                                            <option value="<?= $jt->name; ?>"><?= $jt->name; ?></option>
                                            <?php
										}
										?>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label id="">STATE</label>
                                        <select onchange="print_city('city',this.selectedIndex);" id="us_state" name ="state" class="form-control"></select>
                                       
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label id="">CITY</label>
                                        <select name="city" id="city" class="form-control">
                                        </select>
                                    </div>
                                </div>

                                <script language="javascript">
                            print_state("us_state");
                            
                            </script>
                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label id="">LOCALITY</label>
                                        <input type="text"  name="locality" id="locality" class="form-control" >
                                        <!-- <select name="locality" id="locality" class="form-control">
                                        </select> -->
                                    </div>
                                </div>




                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label id="">GENDER</label>
                                        <select name="gender" id="gender" class="form-control filterselect">
                                            <option value="male"> Male</option>
                                            <option value="female"> Female</option>
                                        </select>
                                    </div>
                                </div>




                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label>QUALIFICATION TYPE</label>
                                        <select name="qualification_type" id="qualification_type" class="form-control ">
                                            <option value=""> -- Select Qualification Type -- </option>
                                            <?php foreach($qualification_type as $qtype){ ?>
                                            <option value="<?= $qtype->id;?>">
                                                <?=$qtype->name; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label>User Qualification</label>
                                        <select name="qualification" id="qualification" class="form-control ">
                                            <option value=""> -- Select Qualification -- </option>
                                            
                                        </select>
                                    </div>
                                </div>


                                <script>
                                document.getElementById('qualification_type').addEventListener('change',
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
                                                for (var i = 0; i < result.data.length; i++) {
                                                    options += '<option value="' + result.data[i].name +
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

                                <!-- passing of year -->
                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label id=""><?= $controller->set_language('p_year'); ?></label>
                                        <input type="date" name="year_of_passing" placeholder="yyyy-mm-dd"
                                            id="year_of_passing" class="form-control datepicker_pyear" />
                                    </div>
                                </div>

                                <!-- pre_cgpa -->
                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label id="">PERCENTAGE</label>
                                        <input type="text" name="pre_cgpa" placeholder="Enter Percentage" id="pre_cgpa"
                                            class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label id="">Industry</label>
                                        <select name="area_of_sector" id="area_of_sector"
                                            class="form-control filterselect">
                                            <option value="<?= $controller->set_language('job_post_select'); ?>"
                                                id="select_keyword4">
                                                <?= $controller->set_language('job_post_select'); ?></option>
                                            <?php
										foreach($aofs as $aofs1)
										{
										?>
                                            <option value="<?= $aofs1->name; ?>"><?= $aofs1->name; ?></option>
                                            <?php
										}
										?>
                                        </select>
                                    </div>
                                </div>


                                <!-- function -->
                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label>Function</label>
                                        <select name="specialization" id="specialization"
                                            class="form-control filterselect">

                                            <?php  foreach($specialization as $sp){ ?>
                                            <option <?php if($sp->name==$res1->function){ echo "selected"; } ?>>
                                                <?= $sp->name ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label>experience</label>
                                        <input type="text" id="exp" name="exp" value="<?=$res1->exp?>"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label>Notice Period</label>
                                        <select name="notice_period" id="notice_period"
                                            class="form-control filterselect">

                                            <option value="">--Select--</option>
                                            <?php  foreach($notice_period as $np){ ?>
                                            <option <?php if($np->name==$res1->notice_period){ echo "selected"; } ?>>
                                                <?= $np->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label id="">benefit</label>

                                     
                                        <select name="benefit[]" id="benefit" class="form-control chosen-select" multiple="multiple">

                                            <?php foreach($benefit as $benefitjob){?>
                                            <option value="<?= $benefitjob->name; ?>"><?= $benefitjob->name; ?></option>
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
                                        <label>Preferred Shift</label>
                                        <select name="preferred_shift" id="preferred_shift"
                                            class="form-control filterselect">

                                            <option value="">--Select--</option>
                                            <?php  foreach($preferred_shift as $preshift){ ?>
                                            <option <?php if($preshift->name==$res1->preferred_shift){ echo "selected"; } ?>>
                                                <?= $preshift->name ?></option>
                                            <?php } ?>


                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label id=""><?= $controller->set_language('s_range'); ?></label>
                                        <select name="salary_range" id="salary_range" class="form-control filterselect">
                                            <option value="<?= $controller->set_language('job_post_select'); ?>"
                                                id="select_keyword7">
                                                <?= $controller->set_language('job_post_select'); ?></option>
                                            <option value="<?= $controller->set_language('per_year1'); ?>" id="">
                                                <?= $controller->set_language('per_year1'); ?></option>
                                            <option value="<?= $controller->set_language('per_month'); ?>" id="">
                                                <?= $controller->set_language('per_month'); ?></option>
                                            <option value="<?= $controller->set_language('per_day'); ?>" id="">
                                                <?= $controller->set_language('per_day'); ?></option>
                                            <option value="<?=$controller->set_language('per_hour'); ?>" id="">
                                                <?= $controller->set_language('per_hour'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label id=""><?= $controller->set_language('min1'); ?></label>
                                        <input type="text" id="min" name="min" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label id=""><?= $controller->set_language('max1'); ?></label>
                                        <input type="text" name="max" id="max" class="form-control" />
                                    </div>
                                </div>





                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label id="">skills</label>


                                        <select name="skills[]" id="skills" class="form-control skillchosen-select" multiple="multiple">

                                            <?php foreach($skill as $sk){?>
                                            <option value="<?= $sk->name; ?>"><?= $sk->name; ?></option>
                                            <?php } ?>
                                        </select>


                                    </div>
                                </div>
                                <script>
                                $(".skillchosen-select").chosen({
                                    no_results_text: "Oops, nothing found!"
                                })
                                </script>
                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label>Language</label>

                                       

                                        <select name="language[]" id="language" class="form-control languagechu" multiple="multiple"
                                            tabindex="-1" class="select2-hidden-accessible" aria-hidden="true">
                                            <?php foreach($language as $lg){ ?>
                                            <option value="<?= $lg->name;?>"
                                                <?php if($r1->language == $lg->name){ echo "selected";} ?>>
                                                <?= $lg->name; ?></option>
                                            <?php }?>
                                        </select>

                                    </div>
                                </div>
                               
                                <script>
                                $(".languagechu").chosen({
                                    no_results_text: "Oops, nothing found!"
                                })
                                </script>
                                <div class="col-md-4">
                                    <div class="jp_input_wrapper">
                                        <label id=""><?= $controller->set_language('job_desc1'); ?></label>
                                        <textarea name="job_desc" id="job_desc" class="form-control" ></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">

                                    <button type="submit" class="jp_btn">
                                        <?= $controller->set_language('job_post_btn'); ?>
                                    </button>
                                </div>
                    </form>

                </div>

            </div>

        </div>

    </div>
</div>
</div>
</div>
<input type="hidden" name="pyear_empty" id="pyear_empty" value="<?= $controller->set_language_v('validation_pyeat'); ?>"
    class="form-control">
<input type="hidden" name="job_type_empty" id="job_type_empty"
    value="<?= $controller->set_language_v('job_type_select'); ?>" class="form-control">
<input type="hidden" name="desi_empty" id="desi_empty" value="<?= $controller->set_language_v('select_desi'); ?>"
    class="form-control">
<input type="hidden" name="loc_empty" id="loc_empty" value="<?= $controller->set_language_v('select_job_loc'); ?>"
    class="form-control">
<input type="hidden" name="q_empty" id="q_empty" value="<?= $controller->set_language_v('validation_select_qua'); ?>"
    class="form-control">
<input type="hidden" name="sp_empty" id="sp_empty" value="<?= $controller->set_language_v('select_sp'); ?>"
    class="form-control">
<input type="hidden" name="aofs_empty" id="aofs_empty"
    value="<?= $controller->set_language_v('validation_select_aofs'); ?>" class="form-control">
<input type="hidden" name="exp_empty" id="exp_empty" value="<?= $controller->set_language_v('select_exp'); ?>"
    class="form-control">
<input type="hidden" name="s_range_empty" id="s_range_empty"
    value="<?= $controller->set_language_v('select_r_range'); ?>" class="form-control">
<input type="hidden" name="cgpa_empty" id="cgpa_empty" value="<?= $controller->set_language_v('enter_per_cgpa'); ?>"
    class="form-control">
<input type="hidden" name="invelid_cpga" id="invelid_cpga"
    value="<?= $controller->set_language_v('invelid_per_cgpa'); ?>" class="form-control">
<input type="hidden" name="tech_empty" id="tech_empty" value="<?= $controller->set_language_v('enter_tech'); ?>"
    class="form-control">
<input type="hidden" name="num_v_empty" id="num_v_empty"
    value="<?= $controller->set_language_v('enter_number_of_v'); ?>" class="form-control">
<input type="hidden" name="meta_desc_empty" id="meta_desc_empty"
    value="<?= $controller->set_language_v('enter_meta_desc'); ?>" class="form-control">
<input type="hidden" name="meta_k_empty" id="meta_k_empty" value="<?= $controller->set_language_v('enter_meta_key'); ?>"
    class="form-control">
<input type="hidden" name="j_desc_empty" id="j_desc_empty" value="<?= $controller->set_language_v('enter_job_desc'); ?>"
    class="form-control">
<input type="hidden" name="min_selary_empty" id="min_selary_empty"
    value="<?= $controller->set_language_v('enter_min_s'); ?>" class="form-control">
<input type="hidden" name="maxs_empty" id="maxs_empty" value="<?= $controller->set_language_v('enter_max_S'); ?>"
    class="form-control">
<input type="hidden" name="min_less_max" id="min_less_max" value="<?= $controller->set_language_v('min_less_max'); ?>"
    class="form-control">
<input type="hidden" name="max_selary_num" id="max_selary_num" value="<?= $controller->set_language_v('max_s_num'); ?>"
    class="form-control">
<input type="hidden" name="min_selary_num" id=" min_selary_num"
    value="<?= $controller->set_language_v(' min_s_num'); ?>" class="form-control">
<input type="hidden" name="job_post_limit_out" id="job_post_limit_out"
    value="<?= $controller->set_language_v('job_post_limit_out'); ?>" class="form-control">
<input type="hidden" name="plan_exp" id="plan_exp" value="<?= $controller->set_language_v('plan_exp'); ?>"
    class="form-control">
<input type="hidden" name="job_post_success" id="job_post_success"
    value="<?= $controller->set_language_v('job_post_success'); ?>" class="form-control">
<input type="hidden" name="job_not_post" id="job_not_post" value="<?= $controller->set_language_v('job_not_post'); ?>"
    class="form-control">
<?php include('common/footer_recruiter.php'); ?>
<a href="#" id="jp_backToTop" title="Back to top">&uarr;</a>
</body>

</html>