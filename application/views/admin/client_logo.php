<?php
$msg=$this->session->flashdata('msg');
if(isset($msg))
{
	?>
<div class="hs_alert_wrapper open_alert  hs_success msg1">
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>1 Client Logo <?= $msg ?></p>
    </div>
</div>
<?php
}
?>
<div class="row" onload="location_fetch()">
    <div class="col-md-12">
        <div class="hs_heading medium">
            <h3>All Client Logo (<?= $this->Common_model->row_count('client_logo'); ?>)
                <a href="#add_desi_popup" class="btn" data-toggle="modal">Add new</a>
            </h3>
        </div>
        <div class="hs_datatable_wrapper tabel-responsive">
            <table id="example" class="hs_datatable table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Client Logo</th>
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
                                    <p><img src="<?=base_url().$r1->logo?>" alt="" style="width: 80px;height: 80px;border-radius: 50%;"></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <select id="logo<?= $r1->logo_id?>" onchange="logo_status(<?=  $r1->logo_id; ?>)">
                                <option <?php  if($r1->status=='Active') { echo "selected"; } ?>>Active</option>
                                <option <?php  if($r1->status=='Inactive') { echo "selected"; } ?>>Inactive</option>
                            </select>
                        </td>

                        <td width="200">
                            <!-- <a class="btn" title="Edit" data-name="Dentist"
                                onclick="update_desi('<?= $r1->logo_id; ?>','<?= $r1->name; ?>')"><i
                                    class="fa fa-pencil" aria-hidden="true"></i></a> -->
                            <a class="btn" title="Delete" onclick="delete_conform(<?=$r1->logo_id?>,'desi')"><i
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
function logo_status(id) {

    
   var status1 =  document.getElementById("logo"+id).value;
    $.post('updatelogo', {
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

<!-- add desi popup start -->
<div id="add_desi_popup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Client Logo</h4>
            </div>
            <div class="modal-body">
                <div class="hs_input">
                    <label>Client Logo</label>
                    <form id="" action="insertlogo" method="POST" enctype="multipart/form-data">

                        <div class="hs_input">
                            <input type="file" name="logo" id="logo" class="form-control" placeholder="Client Logo">
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
                <h4 class="modal-title">Update Client Logo</h4>
            </div>
            <div class="modal-body">
                <div class="hs_input">
                    <label>Client Logo</label>
                    <form id="f2">
                        <div id="data_disp">
                            <input type="hidden" name="id" id="l_id" value="">
                            <input type="hidden" name="tbl_name" id="tbl_name" value="">
                            <input type="text" name="name" id="name" class="form-control" value="" />
                        </div>
                    </form>
                </div>
                <button id="up_desi" class="btn">Update</button>
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
                <h4 class="modal-title">Do you want to delete this Client Logo</h4>
            </div>
            <div class="modal-body">
                <?= form_open('admin/delete_clientlogo'); ?>
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