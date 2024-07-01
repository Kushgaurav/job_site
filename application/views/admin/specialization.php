<?php
$msg=$this->session->flashdata('msg');
if(isset($msg))
{
	?>
<div class="hs_alert_wrapper open_alert  hs_success msg1">
    <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>1 Funcation <?= $msg ?></p>
    </div>
</div>
<?php
}
?>
<div class="row" onload="location_fetch()">
    <div class="col-md-12">
        <div class="hs_heading medium">
            <h3>All Funcation (<?= $this->Common_model->row_count('specialization'); ?>)
                <a href="#import_popup" class="btn" data-toggle="modal">Import</a>
                <a href="#add_specialization_popup" class="btn" data-toggle="modal">Add new</a>

            </h3>
        </div>
        <div class="hs_datatable_wrapper table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Funcation Name</th>
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
                            <select id="sp<?= $r1->id; ?>" onchange="sp_status(<?=  $r1->id; ?>)">
                                <option <?php  if($r1->status=='Active') { echo "selected"; } ?>>Active</option>
                                <option <?php  if($r1->status=='Inactive') { echo "selected"; } ?>>Inactive</option>
                            </select>
                        </td>
                        <td width="200">
                            <a class="btn" title="Edit" data-name="Dentist"
                                onclick="update_spaci('<?= $r1->id; ?>','<?= $r1->name; ?>')"><i class="fa fa-pencil"
                                    aria-hidden="true"></i></a>
                            <a class="btn" title="Delete" onclick="delete_conform(<?= $r1->id;  ?>,'sp')"><i
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
                <h4 class="modal-title">Add Funcation </h4>
            </div>
            <div class="modal-body">
                <div class="hs_input">
                    <label>file</label>
                    <form action="importfuncation" method="POST" enctype="multipart/form-data">
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


<!-- add specialization popup start -->
<div id="add_specialization_popup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Funcation</h4>
            </div>
            <div class="modal-body">
                <div class="hs_input">
                    <label>Funcation</label>
                    <form id="f1"><input type="text" name="name" id="name1" class="form-control"
                            placeholder="Enter Funcation Name"></form>
                </div>
                <button id="add_sp" class="btn">Add</button>
            </div>
        </div>
    </div>
</div>
<!-- add specialization popup end -->
<!-- update specialization popup start -->
<div id="update_specialization_popup" class="modal h " role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Funcation</h4>
            </div>
            <div class="modal-body">
                <div class="hs_input">
                    <label>Funcation</label>
                    <form id="f2">
                        <div id="data_disp">
                            <input type="hidden" name="id" id="l_id" value="">
                            <input type="hidden" name="tbl_name" id="tbl_name" value="">
                            <input type="text" name="name" id="name" class="form-control" value="" />
                        </div>
                    </form>
                </div>
                <button id="sp_update" class="btn">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- update specialization popup end -->
<div id="delete_sp_popup" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Do you want to delete this Funcation</h4>
            </div>
            <div class="modal-body">
                <?= form_open('admin/delete_specialization'); ?>
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