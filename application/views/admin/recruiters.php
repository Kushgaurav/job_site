<?php
include('common/header.php');
$msg=$this->session->flashdata('msg');
if(isset($msg))
{
	?>
<div class="hs_alert_wrapper open_alert  hs_success msg1">
    <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>1 Recruiter <?= $msg ?></p>
    </div>
</div>
<?php
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="hs_heading medium">
            <h3>All Recruiters (<?= $this->Common_model->row_count('recruiter'); ?>) <a href="#add_recruiters_popup"
                    class="btn" data-toggle="modal">Add new</a></h3>
        </div>
        <div class="hs_datatable_wrapper">
            <table class="hs_datatable table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Organisation Type</th>
                        <th>Company Name</th>
                        <th>Company Address</th>
                        <th>Head Office Address</th>
                        <th>Company Website</th>
                        <th>Status</th>
                        <th>Home Logo Status</th>
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
                        <td><?= $r1->org_type; ?></td>

                        <td><?php if ($r1->company_name == null) {
                            echo "N/A";
                        }else {
                            echo $r1->company_name;
                        } ?></td>


                        <td><?php if ($r1->company_address == null) {
                            echo "N/A";
                        }else {
                            echo $r1->company_address;
                        } ?></td>



                        <td><?php if ($r1->address == null) {
                            echo "N/A";
                        }else {
                            echo $r1->address;
                        } ?></td>





                        <td><?php if ($r1->website == null) {
                            echo "N/A";
                        }else {
                            echo $r1->website;
                        } ?></td>

                        <td>
                            <select id="recruiter<?= $r1->id; ?>" onchange="recruiter_status(<?=  $r1->id; ?>)">
                                <option <?php  if($r1->status=='Active') { echo "selected"; } ?>>Active</option>
                                <option <?php  if($r1->status=='Inactive') { echo "selected"; } ?>>Inactive</option>
                            </select>
                        </td>


                        <td>
                            <select id="recruiterlogo<?= $r1->id; ?>" onchange="recruiter_img_status(<?=  $r1->id; ?>)">
                                <option <?php  if($r1->img_status=='Active') { echo "selected"; } ?>>Active</option>
                                <option <?php  if($r1->img_status=='Inactive') { echo "selected"; } ?>>Inactive</option>
                            </select>
                        </td>

                        <script>
                        function recruiter_img_status(id) {
                            var status1 = $('#recruiterlogo' + id).val();
                            $.post('logo_change/recruiter', {
                                'id': id,
                                'status1': status1
                            }, function(fb) {
                                if (fb.match('Update'))
                                    success_msg('Status changed');
                                else
                                    error_msg('Status not updated');
                            });
                            setTimeout(function() {
                                $('.msg').removeClass('open_alert hs_success hs_error');
                            }, 3000);
                            setTimeout(function() {
                                $('.msg1').removeClass('open_alert hs_success hs_error');
                            }, 3000);
                        }
                        </script>



                        <td width="200">
                            <a href="<?= base_url('admin/posted_jobs/'.$r1->id) ?>" class="btn" title="View Jobs"
                                data-name="Dentist"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a class="btn" title="Edit" data-name="Dentist" onclick="update_rec(<?=  $r1->id; ?>)"><i
                                    class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a class="btn" title="Delete" onclick="delete_conform(<?= $r1->id;  ?>,'rec')"><i
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

<!-- add recruiter popup start -->
<div id="add_recruiters_popup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add new recruiter</h4>
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
                        <label>Select Plan</label>
                        <select name="plan" id="plan" class="form-control">
                            <option value="select">Select</option>
                            <?php 
						foreach($plan_info as $single_plan)
						{
						?><option value="<?= $single_plan->name; ?>"><?= $single_plan->name; ?></option><?php  } ?>
                        </select>
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
        <input type="button" name="btn" class="btn" id="rec_add" value="Save" title="Save" />
    </div>
</div>
</div>
</div>
<!-- add recruiter popup end -->
<div id="delete_rec_popup" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Do you want to delete this recruiter</h4>
            </div>
            <div class="modal-body">
                <?= form_open('admin/delete_recruiters'); ?>
                <div class="hs_input">
                    <input type="hidden" name="id" id="disp_data" value="">
                </div>
                <input type="submit" name="sub" class="btn" value="Yes">
                <input type="button" class="btn" value="No" id="no_btn">
            </div>
        </div>
    </div>
</div>



<div id="update_rec_popup" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Recruiter</h4>
            </div>
            <div class="modal-body">
                <div id="data_disp">

                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('common/footer.php');
?>