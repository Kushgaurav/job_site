<?php include('common/head-section.php'); ?>
<div class="alert_close jp_alert_wrapper jp_error msg">
    <div class="jp_alert_inner">
        <p class="ng-binding">Please Profile Update</p>
    </div>
</div>
<?php
if(isset($msg))
{
	?>
<script>
$('.msg').addClass('alert_open');
$(".ng-binding").text("Enter Percentage/CGPA");
</script>
<?php
}
?>
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
                    <h3 id=""><?= $controller->set_language('edit_job_post_heading'); ?></h3>
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

                    <div class="jp_job_box">
                        <div class="row">

                            <form action="/Recruiter/updatejobpost" method="POST" enctype='multipart/form-data'>

                                <input type="hidden" name="r_id" value="<?= $s1 ?>">
                                <input type="hidden" name="id" value="<?= $job_post_info->id; ?>">
                                <input type="hidden" name="post_date" value="<?= $job_post_info->post_date; ?>">

                                <div class="jp_job_box">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="jp_input_wrapper">
                                                <label id="">Job role</label>
                                                <select name="designation" id="designation"
                                                    class="form-control filterselect">


                                                    <?php foreach($jbrole as $jr){ ?>
                                                    <option value="<?= $jr->name; ?>"
                                                        <?php if($job_post_info->designation == $jr->name){echo "selected";} ?>>
                                                        <?= $jr->name?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="jp_input_wrapper">
                                                <label id=""><?= $controller->set_language('num_if_v'); ?></label>
                                                <input type="text" name="number_of_vacancies" id="specialization"
                                                    value="<?= $job_post_info->number_of_vacancies; ?>"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="jp_input_wrapper">
                                                <label id=""><?= $controller->set_language('job_type'); ?></label>
                                                <select name="job_type" id="job_type" class="form-control filterselect">
                                                    <option value="<?= $controller->set_language('job_post_select'); ?>"
                                                        id="select_keyword">
                                                        <?= $controller->set_language('job_post_select'); ?>
                                                    </option>
                                                    <?php
										foreach($job_types as $jt)
										{  ?>
                                                    <option value="<?= $jt->name; ?>"
                                                        <?php if($jt->name==$job_post_info->job_type){ echo "selected"; } ?>>
                                                        <?= $jt->name; ?></option>
                                                    <?php
										}
										?>
                                                </select>
                                            </div>
                                        </div>




                                        <div class="col-md-4">
                                            <div class="jp_input_wrapper">
                                                <label id="">STATE</label>
                                                <select name="state" id="us_state" class="form-control">
                                                    <option value="<?= $controller->set_language('job_post_select'); ?>"
                                                        id="select_keyword3">
                                                        <?= $controller->set_language('job_post_select'); ?></option>
                                                    <?php
										foreach($loc as $loc1)
										{
										?>
                                                    <option value="<?= $loc1->state; ?>"
                                                        <?php if($job_post_info->state == $loc1->state){ echo "selected";} ?>>
                                                        <?= $loc1->state?>
                                                    </option>
                                                    <?php
										}
										?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="jp_input_wrapper">

                                                <label id="">CITY</label>
                                                <select name="city" id="city" class="form-control">
                                                    <?php foreach ($city as $key) { ?>
                                                    <option value="<?=$key->name ?>"
                                                        <?php if($job_post_info->city == $key->name){ echo "selected";} ?>>
                                                        <?= $key->name?>
                                                    </option>
                                                    <?php } ?>



                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="jp_input_wrapper">
                                                <label id="">LOCALITY</label>
                                                <select name="locality" id="locality" class="form-control">


                                                    <?php foreach ($locality as $key) { ?>
                                                    <option value="<?=$key->locality ?>"
                                                        <?php if($job_post_info->locality == $key->locality){ echo "selected";} ?>>
                                                        <?= $key->locality?>
                                                    </option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>








                                        <script>
                                        document.getElementById('us_state').addEventListener('change',
                                            function handleChange(teama) {

                                                var data = {
                                                    'id': teama.target.value
                                                }

                                                $.ajax({
                                                    type: "POST",
                                                    url: "/admin/locationcity",
                                                    data: data,
                                                    dataType: "json",

                                                    success: function(result) {
                                                        console.log(result);

                                                        $('#city').html('');
                                                        var options = '';
                                                        options +=
                                                            '<option value=""> -- Select City -- </option>';
                                                        for (var i = 0; i < result.data.length; i++) {
                                                            options += '<option value="' + result.data[
                                                                    i].name +
                                                                '">' + result
                                                                .data[i]
                                                                .name +
                                                                '</option>';
                                                        }
                                                        $('#city').append(options);
                                                    }
                                                });
                                            });
                                        </script>

                                        <script>
                                        document.getElementById('city').addEventListener('change',
                                            function handleChange(teama) {

                                                var data = {
                                                    'id': teama.target.value
                                                }

                                                $.ajax({
                                                    type: "POST",
                                                    url: "/admin/locationlocality",
                                                    data: data,
                                                    dataType: "json",

                                                    success: function(result) {
                                                        console.log(result);

                                                        $('#locality').html('');
                                                        var options = '';
                                                        options +=
                                                            '<option value=""> -- Select locality -- </option>';
                                                        for (var i = 0; i < result.data.length; i++) {
                                                            options += '<option value="' + result.data[
                                                                    i]
                                                                .locality +
                                                                '">' + result
                                                                .data[i]
                                                                .locality +
                                                                '</option>';
                                                        }
                                                        $('#locality').append(options);
                                                    }
                                                });
                                            });
                                        </script>







                                        <div class="col-md-4">
                                            <div class="jp_input_wrapper">
                                                <label id="">GENDER</label>
                                                <select name="gender" id="gender" class="form-control filterselect">
                                                    <option
                                                        <?php if($job_post_info->gender == 'male'){echo "selected";} ?>
                                                        value="male"> Male</option>
                                                    <option
                                                        <?php if($job_post_info->gender == 'female'){echo "selected";} ?>
                                                        value="female"> Female</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="col-md-4">
                                            <div class="jp_input_wrapper">
                                                <label>QUALIFICATION TYPE</label>
                                                <select name="qualification_type" id="qualification_type"
                                                    class="form-control">
                                                    <option value=""> -- Select Qualification Type -- </option>
                                                    <?php foreach($qualification_type as $qtype){ ?>
                                                    <option value="<?= $qtype->id;?>"
                                                        <?php if($qtype->id==$job_post_info->qualification_type){ echo "selected"; } ?>>
                                                        <?=$qtype->name; ?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="jp_input_wrapper">
                                                <label>User Qualification</label>
                                                <select name="qualification" id="qualification" class="form-control">
                                                    <option value="<?= $job_post_info->qualification?>" selectd>
                                                        <?=$job_post_info->qualification?></option>


                                                    <?php	foreach($user_qualification as $loc1)
										{
										?>
                                                    <option value="<?= $loc1->name; ?>"
                                                        <?php if($loc1->name == $job_post_info->qualification){ echo "selected"; } ?>>
                                                        <?=$loc1->name; ?>
                                                    </option>
                                                    <?php
										}
										?>
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
                                                            options += '<option value="' + result.data[
                                                                    i].name +
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
                                                <input type="text" name="year_of_passing" placeholder="yyyy-mm-dd"
                                                    id="year_of_passing" class="form-control datepicker_pyear"
                                                    value="<?= $job_post_info->year_of_passing; ?>" />
                                            </div>
                                        </div>

                                        <!-- pre_cgpa -->
                                        <div class="col-md-4">
                                            <div class="jp_input_wrapper">
                                                <label id="">PERCENTAGE</label>
                                                <input type="text" name="pre_cgpa" placeholder="Enter Percentage"
                                                    id="pre_cgpa" class="form-control"
                                                    value="<?= $job_post_info->pre_cgpa; ?>" />
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
                                                    <option value="<?= $aofs1->name; ?>"
                                                        <?php if($aofs1->name==$job_post_info->area_of_sector){ echo "selected"; } ?>>
                                                        <?= $aofs1->name; ?></option>
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
                                                    <option
                                                        <?php if($sp->name==$job_post_info->specialization){ echo "selected"; } ?>
                                                        value="<?= $sp->name ?>">
                                                        <?= $sp->name ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="jp_input_wrapper">
                                                <label>experience</label>
                                                <input type="text" id="exp" name="exp" value="<?=$job_post_info->exp?>"
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
                                            <option <?php if($np->name==$job_post_info->notice_period){ echo "selected"; } ?>>
                                                <?= $np->name ?></option>
                                            <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="jp_input_wrapper">
                                                <label>Preferred Shift</label>

                                                <select name="preferred_shift" id="preferred_shift"
                                                    class="form-control filterselect">

                                                    <option value="">--Select Shift--</option>
                                                    <?php  foreach($preferred_shift as $prefesh){ ?>
                                            <option <?php if($prefesh->name==$job_post_info->preferred_shift){ echo "selected"; } ?>>
                                                <?= $prefesh->name ?></option>
                                            <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                             $skil=explode(', ',$job_post_info->skills); 
                                             $lung=explode(', ',$job_post_info->language); 
                                             $benefits=explode(', ',$job_post_info->benefit); 
                                            //  print_r($benefits);die;
                                        ?>
                                        <div class="col-md-4">
                                            <div class="jp_input_wrapper">
                                                <label id=""><?= $controller->set_language('s_range'); ?></label>
                                                <select name="salary_range" id="salary_range"
                                                    class="form-control filterselect">
                                                    <option value="<?= $controller->set_language('job_post_select'); ?>"
                                                        id="select_keyword7">
                                                        <?= $controller->set_language('job_post_select'); ?></option>
                                                    <option value="<?= $controller->set_language('per_year1'); ?>"
                                                        <?php if($controller->set_language('per_year1')==$job_post_info->salary_range){ echo "selected"; } ?>>
                                                        <?= $controller->set_language('per_year1'); ?></option>
                                                    <option value="<?= $controller->set_language('per_month'); ?>" id=""
                                                        <?php if($controller->set_language('per_month')==$job_post_info->salary_range){ echo "selected"; } ?>>
                                                        <?= $controller->set_language('per_month'); ?></option>
                                                    <option
                                                        value="<?= $controller->set_language('per_day'); ?> <?php if($controller->set_language('per_day')==$job_post_info->salary_range){ echo "selected"; } ?>"
                                                        id="">
                                                        <?= $controller->set_language('per_day'); ?></option>
                                                    <option
                                                        value="<?= $controller->set_language('per_hour'); ?> <?php if($controller->set_language('per_hour')==$job_post_info->salary_range){ echo "selected"; } ?>"
                                                        id="">
                                                        <?= $controller->set_language('per_hour'); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="jp_input_wrapper">
                                                <label id=""><?= $controller->set_language('min1'); ?></label>
                                                <input type="text" id="min" name="min" class="form-control"
                                                    value="<?= $job_post_info->min; ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="jp_input_wrapper">
                                                <label id=""><?= $controller->set_language('max1'); ?></label>
                                                <input type="text" name="max" id="max" class="form-control"
                                                    value="<?= $job_post_info->max; ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="jp_input_wrapper">
                                                <label id="">Benefit</label>

                                                <link rel="stylesheet"
                                                    href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
                                                <select name="benefit[]" id="benefit" class="form-control"
                                                    multiple="multiple">
                                                    <?php foreach($benefit as $benefitedit){?>
                                                    <option value="<?= $benefitedit->name; ?>"
                                                        <?php if(in_array( $benefitedit->name,$benefits)) { echo "selected"; } ?>>
                                                        <?= $benefitedit->name; ?></option>
                                                    <?php } ?>
                                                </select>


                                            </div>
                                        </div>

                                       


                                        <div class="col-md-6">
                                            <div class="jp_input_wrapper">
                                                <label id="">skills</label>
                                                <select name="skills[]" id="skills" class="form-control"
                                                    multiple="multiple">
                                                    <?php foreach($skill as $sk){?>
                                                    <option value="<?= $sk->name; ?>"
                                                        <?php if(in_array( $sk->name,$skil)) { echo "selected"; } ?>>
                                                        <?= $sk->name; ?></option>
                                                    <?php } ?>
                                                </select>


                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="jp_input_wrapper">
                                                <label>Language</label>

                                                <script
                                                    src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
                                                </script>

                                                <select name="language[]" id="language" class="form-control"
                                                    multiple="multiple">
                                                    <?php foreach($language as $key=>$lg){ ?>

                                                    <option value="<?= $lg->name;?>"
                                                        <?php if(in_array( $lg->name,$lung,true)) { echo "selected"; } ?>>
                                                        <?= $lg->name;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <script
                                            src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js">
                                        </script>
                                        <script>
                                        new MultiSelectTag('skills')
                                        new MultiSelectTag('language')
                                        new MultiSelectTag('benefit')
                                        // id
                                        </script>

                                        <div class="col-md-12">
                                            <div class="jp_input_wrapper">
                                                <label id=""><?= $controller->set_language('job_desc1'); ?></label>
                                                <textarea name="job_desc" id="job_desc" cols="6" rows="10"
                                                    class="form-control"> <?= $job_post_info->job_desc; ?></textarea>
                                            </div>
                                        </div>


                                        <div class="col-md-12 text-center">
                                            <button type="submit"
                                                class="jp_btn"><?= $controller->set_language('edit_job_btn'); ?></button>


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
<input type="hidden" name="job_up_success1" id="job_post_success1"
    value="<?= $controller->set_language_v('job_up_success'); ?>" class="form-control">
<input type="hidden" name="job_not_up1" id="job_not_post1" value="saddwqq" class="form-control">
<?php include('common/footer_recruiter.php'); ?>
<a href="#" id="jp_backToTop" title="Back to top">&uarr;</a>
</body>

</html>