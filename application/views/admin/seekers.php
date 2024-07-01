<?php  
$msg=$this->session->flashdata('msg');
if(isset($msg))
{
	?>
<div class="hs_alert_wrapper open_alert  hs_success msg1">
    <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>1 Seeker <?= $msg ?></p>
    </div>
</div>
<?php
}
?>


<div class="row">
    <div class="col-md-12">
        <div class="hs_heading medium">
            <h3>All Seekers (<?= $this->Common_model->row_count('seeker'); ?>)
                <a href="" type="button" class="btn btn-success">export</a>
                <a href="#add_seeker_popup" class="btn" data-toggle="modal">Add new</a>
            </h3>
        </div>


        <div class="card-body">
            <form>
                <div class="row">

                    <div class="col-md-3 form-group">
                        <label for="state">State</label>
                        <input type="text" id="state" name="state" class="form-control " value="<?=$_GET['state']?>">
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="state">City</label>
                        <input type="text" id="city" name="city" class="form-control " value="<?=$_GET['city']?>">
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="state">Locality</label>
                        <input type="text" id="locality" name="locality" class="form-control"
                            value="<?=$_GET['locality']?>">
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="job_type">Job Type</label>
                        <select name="job_type" id="job_type" class="form-control " style="padding:6px">
                            <option value=""> -- Select Job Type --</option>
                            <?php  foreach ($job_types as $value) { ?>
                            <option value="<?php echo $value->name?>"
                                <?php if($_GET['job_type'] == $value->name){echo "selected";}?>>
                                <?php echo $value->name?>
                            </option>
                            <?php } ?>

                        </select>
                    </div>


                    <div class="col-md-3 form-group">
                        <label for="qualification_type">Qualification Type</label>
                        <select name="qualification_type" id="qualification_type" class="form-control "
                            style="padding:6px">
                            <option value=""> -- Select type -- </option>
                            <option value="1" <?php  if($_GET['qualification_type'] == 1){echo "selected";} ?>>Graduate
                            </option>
                            <option value="2" <?php  if($_GET['qualification_type'] == 2){echo "selected";} ?>>
                                Postgraduate</option>
                            <option value="3" <?php  if($_GET['qualification_type'] == 3){echo "selected";} ?>>Diploma
                            </option>
                        </select>
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="state">Qualification</label>
                        <select name="qualification" id="qualification" class="form-control " style="padding:6px">
                            <option value=""> -- Select Qualification --</option>
                        </select>
                    </div>

                    <div class="col-md-3 form-group">
                        <label for="exp_typ">Experienc Type</label>
                        <select name="exp_typ" id="exp_typ" class="form-control " style="padding:6px">
                            <option value=""> -- Select type -- </option>
                            <option value="Fresher" <?php  if($_GET['exp_typ'] == 'Fresher'){echo "selected";} ?>>
                                Fresher</option>
                            <option value="Experienced"
                                <?php  if($_GET['exp_typ'] == 'Experienced'){echo "selected";} ?>>Experienced</option>
                        </select>
                    </div>


                    <div class="col-md-3 form-group">
                        <label for="industry">Industry</label>
                        <select name="industry" id="industry" class="form-control " style="padding:6px">
                            <option value=""> -- Select Industry -- </option>
                            <?php foreach ($industry as $ob) { ?>
                            <option value="<?=$ob->name?>"
                                <?php  if($_GET['industry'] == $ob->name){echo "selected";} ?>><?=$ob->name?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-3 form-group">
                        <input type="submit" value="Filter" class="btn btn-warning btn-sm">
                        <a href="seekers"><button type="button" class="btn btn-danger">Reset</button></a>
                    </div>
                </div>

            </form>
        </div><br>

        <script>
        document.getElementById('qualification_type').addEventListener('change', function handleChange(teama) {

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
                    options += '<option value=""> -- Select Qualification -- </option>';
                    for (var i = 0; i < result.data.length; i++) {
                        options += '<option value="' + result.data[i].id + '">' + result
                            .data[i]
                            .name +
                            '</option>';
                    }
                    $('#qualification').append(options);
                }
            });

        });
        </script>


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
                        <th>Job Type</th>
                        <th>Qualification Type</th>
                        <th>Qualification</th>
                        <th>Experience</th>
                        <th>Status</th>
                        <th>Action</th>
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

                        <td>
                            <select id="seeker<?= $r1->id; ?>" onchange="seeker_status(<?=  $r1->id; ?>)">
                                <option value="Active" <?php  if($r1->status=='Active') { echo "selected"; } ?>>Active</option>
                                <option value="Inactive" <?php  if($r1->status=='Inactive') { echo "selected"; } ?>>Inactive</option>
                            </select>
                        </td>
                        <td width="200">
                            <a class="btn" title="Edit" data-name="Dentist" onclick="update_sec(<?=  $r1->id; ?>)"><i
                                    class="fa fa-pencil" aria-hidden="true"></i></a>

                            <a class="btn" title="Delete" onclick="delete_conform(<?= $r1->id;  ?>,'seeker')"><i
                                    class="fa fa-trash" aria-hidden="true"></i></a>
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

<script>
function update_sec(id) {
    $.post('seeker_data_fetch', {
        'id': id
    }, function(fb) {
        $('#update_seeker_popup').fadeIn();
        $('#data_disp').html(fb);
        $('.close').click(function() {
            $('#update_seeker_popup').hide();
        });
    })
}
</script>

<!-- add seeker popup start -->
<div id="add_seeker_popup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add new seeker</h4>
            </div>
            <form id="f1">
                <input type="hidden" value="yes" name="veri" />
                <div class="modal-body">
                    <div class="hs_input">
                        <label>Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control">
                    </div>
                    <div class="hs_input">
                        <label>Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter E-Mail" class="form-control">
                    </div>
                    <div class="hs_input">
                        <label>Mobile No</label>
                        <input type="text" name="mno" id="mno" placeholder="Enter Mobile Number" class="form-control">
                    </div>
                    <div class="hs_input">
                        <label>Password</label>
                        <input type="password" name="ps" id="ps" placeholder="Enter Password" class="form-control">
                    </div>
                    <div class="hs_input">
                        <label>Confirm Password</label>
                        <input type="password" name="rps" id="rps" placeholder="Confirm Password" class="form-control">
                    </div>
                    <div class="hs_input">
                        <div class="hs_checkbox">
                            <input type="checkbox" id="send_detail" value='yes' name="send_detail">
                            <label for="send_detail">Send this details to this Seeker's Email</label>
                        </div>
            </form>
        </div>
        <input type="button" name="btn" class="btn" id="seeker_add" value="Save" title="Save" />
    </div>
</div>
</div>
</div>
<!-- add seeker popup end -->
<div id="delete_seeker_popup" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Do you want to delete this seeker</h4>
            </div>
            <div class="modal-body">
                <?= form_open('admin/delete_seeker'); ?>
                <div class="hs_input">
                    <input type="hidden" name="id" id="disp_data" value="">
                </div>
                <input type="submit" name="sub" class="btn" value="Yes">
                <input type="button" class="btn" value="No" id="no_btn">
            </div>
            </form>

        </div>
    </div>
</div>



<div id="update_seeker_popup" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update seekers</h4>
            </div>
            <div class="modal-body">
                <div id="data_disp">

                </div>
            </div>
        </div>
    </div>
</div>