<?php
$msg=$this->session->flashdata('msg');
if(isset($msg))
{
	?>
<div class="hs_alert_wrapper open_alert  hs_success msg1">
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>1 Skills <?= $msg ?></p>
    </div>
</div>
<?php
}
?>
<div class="row" onload="location_fetch()">
    <div class="col-md-12">
        <div class="hs_heading medium">
            <h3>All skills (<?= $this->Common_model->row_count('skills'); ?>)
                <a href="#import_popup" class="btn" data-toggle="modal">Import</a>
                <a href="#add_desi_popup" class="btn" data-toggle="modal">Add new</a>
            </h3>
        </div>
        <div class="hs_datatable_wrapper tabel-responsive">
            <table id="example" class="hs_datatable table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Skill Name</th>
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
                        <td>
                            <div class="hs_user">
                                <div class="user_name">
                                    <p><?= $r1->name; ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <select id="skills<?= $r1->id; ?>" onchange="skills_status(<?=  $r1->id; ?>)">
                                <option <?php  if($r1->status=='Active') { echo "selected"; } ?>>Active</option>
                                <option <?php  if($r1->status=='Inactive') { echo "selected"; } ?>>Inactive</option>
                            </select>
                        </td>

                        <td width="200">
                            <a class="btn" title="Edit" data-name="Dentist"
                                onclick="update_desi('<?= $r1->id; ?>','<?= $r1->name; ?>')"><i class="fa fa-pencil"
                                    aria-hidden="true"></i></a>
                            <a class="btn" title="Delete" onclick="delete_conform(<?= $r1->id;  ?>,'desi')"><i
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

<!-- add import_popup start -->
<div id="import_popup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Skills</h4>
            </div>
            <div class="modal-body">
                <div class="hs_input">
                    <label>file</label>
                    <form action="importSkills" method="POST" enctype="multipart/form-data">
                        <input type="file" name="importfile" id="importfile" class="form-control"
                            accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                        <a target="_blank" href="https://scnjob.com/uploads/sample.csv" style="color: red;"
                            download="sample.csv">** Download Sample csv **</a><br><br>
                        <button type="submit" class="btn">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- add import_popup end -->


<!-- add desi popup start -->
<div id="add_desi_popup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Skills</h4>
            </div>
            <div class="modal-body">
                <div class="hs_input">
                    <label>Skills</label>
                    <form id="f1" action="add_skills" method="POST">
                        <div class="hs_input">
                            <input type="text" name="name" id="name1" class="form-control" placeholder="Skills Name">
                        </div>

                        <input type="submit" class="btn" value="Add">
                        <input type="button" class="btn" value="close" id="no_btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- add location popup end -->
<!-- update desi popup start -->
<div id="update_desi_popup" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Skills</h4>
            </div>
            <div class="modal-body">
                <div class="hs_input">
                    <label>Skills</label>
                    <form id="f2" action="updateskills" method="POST">
                        <div id="data_disp">
                            <input type="hidden" name="id" id="l_id" value="">
                            <input type="hidden" name="tbl_name" id="tbl_name" value="">
                            <input type="text" name="name" id="name" class="form-control" value="" />
                        </div><br>
                        <input type="submit" class="btn" value="Update">
                        <input type="button" class="btn" value="close" id="no_btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- update areaofsector popup end -->
<div id="delete_desi_popup" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Do you want to delete this Skills</h4>
            </div>
            <div class="modal-body">
                <?= form_open('admin/delete_Skills'); ?>
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