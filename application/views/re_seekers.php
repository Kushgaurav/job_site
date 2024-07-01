<?php include('common/head-section.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
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
                    <h3 id="">Seekers List</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header end -->

<div class=" container m-auto row">
    <div class="col-md-12">
        <div class="hs_heading medium">
           
        </div>
     

        <div class="card-body">
            <form>
                <div class="row">
                <div class="col-md-3 form-group">
                        <label for="state">Name</label>
                        <input type="text" id="skname" name="skname" class="form-control"
                            value="<?=$_GET['skname']?>">
                    </div>
               
                    <div class="col-md-3 form-group">
                        <label for="state">State</label>
                        <select onchange="print_city('city', this.selectedIndex);" id="state" name="state" 
                                class="form-control"></select><br>
                    </div>
                   
                    <div class="col-md-3 form-group">
                        <label for="state">City</label>
                        <select id="city" name="city" class="form-control"  ></select>
                           
                        <!-- <input type="text" id="city" name="city" class="form-control " "> -->
                    </div>
                    <script language="javascript">
                            print_state("state");
                            if("<?=$_GET['state']?>"!=""){
                            document.getElementById("state").value="<?=$_GET['state']?>";
                            var index=$("select[name='state'] option:selected").index();
                            console.log(index);
                            print_city('city', index);
                            if("<?=$_GET['city']?>"!=""){
                                document.getElementById("city").value="<?=$_GET['city']?>";

                            }
                        }
                            </script>
                    <div class="col-md-3 form-group">
                        <label for="state">Locality</label>
                        <input type="text" id="locality" name="locality" class="form-control"
                            value="<?=$_GET['locality']?>">
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="job_type">Job Type</label>
                        <select name="job_type[]" id="job_type" class="form-control jobtype" style="padding:6px" multiple="multiple">
                            <option value=""> -- Select Job Type --</option>
                            <?php  foreach ($job_types as $value) { ?>
                            <option value="<?php echo $value->name?>"
                                <?php if($_GET['job_type'] == $value->name){echo "selected";}?>>
                                <?php echo $value->name?>
                            </option>
                            <?php } ?>

                        </select>
                    </div>
                    <script>
                                $(".jobtype").chosen({
                                    no_results_text: "Oops, nothing found!"
                                })
                                </script>
                    <!-- <div class="col-md-3 form-group">
                        <label for="salary">Salary</label>
                        <input type="text" id="salary" name="salary" class="form-control"
                            value="<?=$_GET['salary']?>">
                    </div> -->
                    <div class="col-md-3 form-group">
                        <label for="qualification_type">Qualification Type</label>
                        <select name="qualification_type" id="qualification_type" class="form-control " onchange="handleChange('')"
                            style="padding:6px">
                            <option value=""> -- Select type -- </option>
                            <?php foreach ($qualification_type as $qtype) { ?>
                            <option value="<?=$qtype->id?>"
                                <?php  if($_GET['qualification_type'] == $qtype->id){echo "selected";} ?>><?= $qtype->name?></option>
                            <?php } ?>
                           
                        </select>
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="qualification">Qualification</label>
                        <select name="qualification" id="qualification" class="form-control qualification" style="padding:6px" >
                            <option value=""> -- Select Qualification --</option>
                        </select>
                    </div>
                    <!-- <script>
                                $(".qualification").chosen({
                                    no_results_text: "Oops, nothing found!"
                                })
                                </script> -->

                    <div class="col-md-3 form-group">
                        <label for="exp_typ">Experienc Type</label>
                        <select name="exp_typ[]" id="exp_typ" class="form-control exp_typ " style="padding:6px" multiple="multiple">
                            <option value=""> -- Select type -- </option>
                            <option value="Fresher" <?php  if (!empty($_GET['exp_typ'])){if(in_array( 'Fresher',$_GET['exp_typ'],true)){echo "selected";}} ?>>
                                Fresher</option>
                            <option value="Experienced"
                                <?php if (!empty($_GET['exp_typ'])){ if(in_array( 'Experienced',$_GET['exp_typ'],true)){echo "selected";} }?>>Experienced</option>
                        </select>
                    </div>
                    <script>
                                $(".exp_typ").chosen({
                                    no_results_text: "Oops, nothing found!"
                                })
                                </script>
                    <div class="col-md-1 form-group">
                        <label for="experience">Exp(M)</label>
                        <input type="text" class="form-control" name="experience" id="experience" value="<?=$_GET['experience'] ?>">
                    
                    </div>
                    <div class="col-md-1 form-group">
                        <label for="exp_year">Exp(Y)</label>
                        <input type="text" class="form-control" name="exp_year" id="exp_year" value="<?= $_GET['exp_year'] ?>">
                    
                    </div>


                    <div class="col-md-3 form-group">
                        <label for="skill">Skill</label>
                        <select name="skill[]" id="skill" class="form-control skill" style="padding:6px" multiple="multiple">
                            <option value=""> -- Select skill -- </option>
                            
                            <?php foreach ($skills as $skillob) { ?>
                            <option value="<?=$skillob->name?>"
                                <?php  if (!empty($_GET['skill'])) { if(in_array( $skillob->name,$_GET['skill'],true)) {echo "selected";} }?>><?= $skillob->name?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <script>
                                $(".skill").chosen({
                                    no_results_text: "Oops, nothing found!"
                                })
                                </script>
                    <div class="col-md-3 form-group">
                        <label for="language">Language</label>
                        <select name="language[]" id="language" class="form-control language" style="padding:6px" multiple="multiple">
                            <option value=""> -- Select language -- </option>
                            <?php foreach ($language as $ob) { ?>
                            <option value="<?=$ob->name?>"
                                <?php  if (!empty($_GET['language'])) { if(in_array( $ob->name,$_GET['language'],true)) {echo "selected";} } ?>><?=$ob->name?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <script>
                                $(".language").chosen({
                                    no_results_text: "Oops, nothing found!"
                                })
                                </script>
                    <div class="col-md-3 form-group">
                        <label for="industry">Industry </label>
                        <select name="industry[]" id="industry" class="form-control industry" style="padding:6px" multiple="multiple">
                            <option value=""> -- Select industry -- </option>
                            <?php foreach ($industry as $ob) { ?>
                            <option value="<?=$ob->name?>"
                                <?php  if (!empty($_GET['industry'])) { if(in_array( $ob->name,$_GET['industry'],true)) {echo "selected";} } ?>><?=$ob->name?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <script>
                                $(".industry").chosen({
                                    no_results_text: "Oops, nothing found!"
                                })
                                </script>
                    <div class="col-md-3 form-group">
                        <label for="function">Function</label>
                        <select name="function[]" id="function" class="form-control function" style="padding:6px" multiple="multiple">
                            <option value=""> -- Select function -- </option>
                            <?php foreach ($function as $ob) { ?>
                            <option value="<?=$ob->name?>"
                                <?php if (!empty($_GET['function'])) { if(in_array( $ob->name,$_GET['function'],true)) {echo "selected";} } ?>><?=$ob->name?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <script>
                                $(".function").chosen({
                                    no_results_text: "Oops, nothing found!"
                                })
                                </script>

                    <div class="col-md-3 form-group">
                        <label for="gender">gender</label>
                        <select name="gender[]" id="gender" class="form-control gender " style="padding:6px" multiple="multiple">
                            <option value=""> -- Select gender -- </option>
                            <option value="male" <?php if (!empty($_GET['gender'])) { if(in_array( 'male',$_GET['gender'],true)) {echo "selected";} } ?>> Male </option>
                            <option value="female"  <?php if (!empty($_GET['gender'])) { if(in_array( 'female',$_GET['gender'],true)) {echo "selected";} } ?>> Female </option>
                           
                        </select>
                    </div>
                    <script>
                                $(".gender").chosen({
                                    no_results_text: "Oops, nothing found!"
                                })
                                </script>
                    <div class="col-md-3 form-group">
                        <label for="shifttiming">Shift Timing</label>
                        <select name="shifttiming[]" id="shifttiming" class="form-control shifttiming" style="padding:6px" multiple="multiple">
                            <option value=""> -- Select shift timing -- </option>
                            <?php foreach ($shifttiming as $ob) { ?>
                            <option value="<?=$ob->name?>"
                                <?php if (!empty($_GET['shifttiming'])) { if(in_array( $ob->name,$_GET['shifttiming'],true)) {echo "selected";} }  ?>><?=$ob->name?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <script>
                                $(".shifttiming").chosen({
                                    no_results_text: "Oops, nothing found!"
                                })
                                </script>
                    <div class="col-md-3 form-group">
                        <label for="noticeperiod">Notice Period</label>
                        <select name="noticeperiod[]" id="noticeperiod" class="form-control noticeperiod" style="padding:6px" multiple="multiple">
                            <option value=""> -- Select noticeperiod -- </option>
                            <?php foreach ($noticeperiod as $ob) { ?>
                            <option value="<?=$ob->name?>"
                                <?php if (!empty($_GET['noticeperiod'])) { if(in_array( $ob->name,$_GET['noticeperiod'],true)) {echo "selected";} } ?>><?=$ob->name?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <script>
                                $(".noticeperiod").chosen({
                                    no_results_text: "Oops, nothing found!"
                                })
                                </script>
                    <div class="col-md-3 form-group" style="display: flex;align-items: end;justify-content: space-evenly;">
                        <input type="submit" value="Search" class="btn btn-warning btn-sm">
                        <a href="seekers"><button type="button" class="btn btn-danger">Reset</button></a>
                    </div>
                </div>

            </form>
        </div><br>

        <div class="hs_datatable_wrapper table-responsive">
            <table class=" table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Current Address</th>
                        <th>Permanent Address</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Locality</th>
                        <th>Industry</th>
                        <th>Function</th>
                        <th>Skill</th>
                        <th>Job Type</th>
                        <th>Qualification Type</th>
                        <th>Qualification</th>
                        <th>Experience</th>
                       
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
                        <td><?= $r1->email; ?></td>
                        <td><?= $r1->mno; ?></td>

                        <td><?php if ($r1->current_address == null) {
                            echo 'N/A';}else {
                                echo $r1->current_address;
                            }?>
                        </td>

                        <td><?php if ($r1->permanent_address == null) {
                            echo 'N/A';}else {
                            echo $r1->permanent_address;
                            
                            }?>
                        </td>


                        <td><?php if ($r1->state == null) {
                            echo 'N/A';}else {
                                echo $r1->state;
                            }?>
                        </td>



                        <td><?php if ($r1->city == null) {
                            echo 'N/A';}else {
                                echo $r1->city;
                            }?>
                        </td>


                        <td><?php if ($r1->locality == null) {
                            echo 'N/A';}else {
                                echo $r1->locality;
                            }?>
                        </td>

                        <td><?php if ($r1->aofs == null) {
                            echo 'N/A';}else {
                                echo $r1->aofs;
                            }?>
                        </td>
                        <td><?php if ($r1->function == null) {
                            echo 'N/A';}else {
                                echo $r1->function;
                            }?>
                        </td>
                        <td><?php if ($r1->skill == null) {
                            echo 'N/A';}else {
                                echo $r1->skill;
                            }?>
                        </td>

                        <td><?php if ($r1->job_type == null) {
                            echo 'N/A';}else {
                                echo $r1->job_type;
                            }?>
                        </td>

                        <td><?php if ($r1->qua_type == null) {
                            echo 'N/A';}else {
                              if ($r1->qua_type == '1') {
                                 echo "Graduate";
                              }elseif ($r1->qua_type == '2') {
                                echo "Post Graduate";
                              }elseif ($r1->qua_type == '3') {
                               echo "Diploma";
                              }
                            }?>
                        </td>

                        <td><?php if ($r1->qua == null) {
                            echo 'N/A';}else {
                                echo $r1->qua;
                            }?>
                        </td>

                        <td><?php if ($r1->exp == null) {
                            echo 'N/A';}else {
                                echo $r1->exp;
                            }?>
                        </td>

                       
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

</div>
</div>
<!-- add seeker popup end -->

<script>
  
                                    // document.getElementById('qualification_type').addEventListener('handleChange()',
                                    function handleChange(val) {
                                        var data = {
                                            'type': document.getElementById("qualification_type").value
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

                                                if(val!=""){
                                                    document.getElementById("qualification").value=val;

                                                }
                                            }
                                        });

                                    }
                                    // );
                                </script>
                                <script>

if("<?=$_GET['qualification_type']?>"!=""){
    handleChange("<?=$_GET['qualification']?>");
    }
</script>
<?php include('common/footer_recruiter.php'); ?>
    <a href="#" id="jp_backToTop" title="Back to top">&uarr;</a>
</body>

</html>