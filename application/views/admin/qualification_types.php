<?php
$msg=$this->session->flashdata('msg');
if(isset($msg))
{
	?>
<div class="hs_alert_wrapper open_alert  hs_success msg1">
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>1 Qualification <?= $msg ?></p>
    </div>
</div>
<?php
}
?>
<div class="row" onload="location_fetch()">
    <div class="col-md-12">
        <div class="hs_heading medium">
            <h3>All Qualification (<?= $this->Common_model->row_count('qualification_type'); ?>)
                <a href="#add_desi_popup" class="btn" data-toggle="modal">Add new</a>
            </h3>
        </div>
        <div class="hs_datatable_wrapper tabel-responsive">
            <table id="example" class="hs_datatable table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
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


                        <td width="200">
                            <a class="btn" title="Edit" data-name="Dentist"
                                onclick="update_desi('<?= $r1->id; ?>','<?= $r1->name; ?>')"><i class="fa fa-pencil"
                                    aria-hidden="true"></i></a>

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




<!-- add desi popup start -->
<div id="add_desi_popup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Qualification Types</h4>
            </div>
            <div class="modal-body">
                <div class="hs_input">
                    <label>Qualification Type</label>
                    <form action="add_qualification" method="POST">
                        <div class="hs_input">
                            <input type="text" name="name" id="name1" class="form-control"
                                placeholder="Qualification Name">
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
                <h4 class="modal-title">Update Qualification</h4>
            </div>
            <div class="modal-body">
                <div class="hs_input">
                    <label>Qualification Type</label>
                    <form action="updatequat" method="POST">
                        <div id="data_disp">
                            <input type="hidden" name="id" id="l_id" value="">
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