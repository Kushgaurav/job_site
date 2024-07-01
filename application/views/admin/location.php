<?php
$msg=$this->session->flashdata('msg');
if(isset($msg))
{
	?>
<div class="hs_alert_wrapper open_alert  hs_success msg1">
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>1 Location <?= $msg ?></p>
    </div>
</div>
<?php
}
?>

<script type="text/javascript" src="<?= base_url('assets/js/cities.js') ?>"></script>

<div class="row">
    <div class="col-md-12">
        <div class="hs_heading medium">
            <h3>All Location (<?= $this->Common_model->row_count('location'); ?>)
                <a href="#import_popup" class="btn" data-toggle="modal">Import</a>
                <a href="#add_location_popup" class="btn" data-toggle="modal">Add new</a>
            </h3>
        </div><br>

        <div class="card">
            <div class="card-body">
                <form>
                    <div class="row">

                        <div class="col-md-4 form-group">
                            <label for="state">State</label>
                            <select onchange="print_city('city',this.selectedIndex);" id="state3" name ="state" class="form-control orm-control-sm"></select>
                            <!-- <select name ="state" id ="state3" class="form-control orm-control-sm"></select> -->
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="city">City</label>
                            <select id="city" name="city" class="form-control orm-control-sm"></select>
                            
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="state">Locality</label>
                            <input type="text" id="locality" name="locality" class="form-control form-control-sm">
                        </div>

                        <div class="col-md-4 form-group">
                            <input type="submit" value="Filter" class="btn btn-warning btn-sm">
                            <a href="location"><button type="button" class="btn btn-danger">Reset</button></a>
                        </div>
                    </div>

                </form>
            </div><br>
            <script language="javascript">print_state("state3");</script>

            <div class="hs_datatable_wrapper table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>State Name</th>
                            <th>City Name</th>
                            <th>Locality Name</th>
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
                                        <p><?= $r1->state; ?></p>
                                    </div>
                                </div>
                            </td>
                            <td><input type="hidden" name="id" id="id" value="<?= $r1->id; ?>" />
                                <div class="hs_user">
                                    <div class="user_name">
                                        <p><?= $r1->name; ?></p>
                                    </div>
                                </div>
                            </td>
                            <td><input type="hidden" name="id" id="id" value="<?= $r1->id; ?>" />
                                <div class="hs_user">
                                    <div class="user_name">
                                        <?php if (empty($r1->locality )) {
										echo 'N/A';
									}else {
										echo $r1->locality;
									} ?>
                                        <p></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <select id="location<?= $r1->id; ?>" onchange="location_status(<?=  $r1->id; ?>)">
                                    <option <?php  if($r1->status=='Active') { echo "selected"; } ?>>Active</option>
                                    <option <?php  if($r1->status=='Inactive') { echo "selected"; } ?>>Inactive</option>
                                </select>
                            </td>
                            <td width="200">
                                <a class="btn" title="Edit" data-name="Dentist"
                                    onclick="update_location('<?= $r1->id; ?>','<?= $r1->name; ?>','<?= $r1->state; ?>','<?=$r1->locality?>')"><i
                                        class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a class="btn" title="Delete" onclick="delete_conform(<?= $r1->id;  ?>,'loc')"><i
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
                    <h4 class="modal-title">Add Location </h4>
                </div>
                <div class="modal-body">
                    <div class="hs_input">

                        <form action="importlocation" method="POST" enctype="multipart/form-data">

                            <label>State</label>
                            <select onchange="print_city('state', this.selectedIndex);" id="sts" name="stt"
                                class="form-control" required></select><br>

                            <label>City</label>
                            <select id="state" name="city" class="form-control" required></select>
                            <script language="javascript">
                            print_state("sts");
                            </script><br>

                            <label>Locality</label>
                            <input type="file" name="importfile" id="importfile" class="form-control"
                                accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            <a target="_blank" href="https://scnjob.com/uploads/locality.csv" style="color: red;"
                                download="locality.csv">** Download Sample csv **</a><br><br>
                            <button type="submit" class="btn">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- add import_popup end -->



    <!-- add location popup start -->
    <div id="add_location_popup" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Location</h4>
                </div>
                <div class="modal-body">
                    <div class="hs_input">
                        <label>Location</label>
                        <form id="f1">
                            <div>
                            <select onchange="print_city('name1',this.selectedIndex);" id="state1" name ="state" class="form-control "  style="margin-bottom: 10px;" required></select>
                               
                                    <select id="name1" name="name" class="form-control " style="margin-bottom: 10px;" required></select>
                                <input type="text" name="locality" id="locality1" class="form-control"
                                    placeholder="Add Locality" required>
                            </div>
                            <script language="javascript">
                            print_state("state1");
                            </script>
                        </form>
                    </div>
                    <button id="loc" class="btn">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- add location popup end -->
    <!-- update areaofsector popup start -->
    <div id="update_location_popup" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Location</h4>
                </div>
                <div class="modal-body">
                    <div class="hs_input">
                        <label>Location</label>
                        <form id="f2">
                            <div id="data_disp">
                                <input type="hidden" name="id" id="l_id" value="">
                                <input type="hidden" name="tbl_name" id="tbl_name" value="">
                                <select onchange="print_city('name',this.selectedIndex);" id="state2" name ="state" class="form-control "  style="margin-bottom: 10px;" required></select>
                               
                               <select id="name" name="name" class="form-control " style="margin-bottom: 10px;" required></select>
                         
                                <input type="text" name="locality" id="locality" class="form-control" value="" />
                            </div>
                        </form>
                        <script language="javascript">
                            print_state("state2");
                            </script>
                    </div>
                    <button id="loc_update" class="btn">Update</button>
                </div>
            </div>
        </div>
    </div>
    <!-- update areaofsector popup end -->
    <div id="delete_loc_popup" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Do you want to delete this location</h4>
                </div>
                <div class="modal-body">
                    <?= form_open('admin/delete_location'); ?>
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