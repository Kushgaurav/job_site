<?php
$msg=$this->session->flashdata('msg');
if(isset($msg))
{
	?>
<div class="hs_alert_wrapper open_alert  hs_success msg1"> <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>Industry <?= $msg ?></p>
    </div>
</div>
<?php
}
?>
<div class="row" onload="location_fetch()">
    <div class="col-md-12">
	<div id="insert">
        <div class="hs_heading medium">
            <h3>All Industry (<?= $this->Common_model->row_count('area_of_sectors'); ?>)
			<a href="#import_popup" class="btn" data-toggle="modal">Import</a>
			  <a href="#add_areaofsector_popup" class="btn" data-toggle="modal">Add new</a>
			</h3>
        </div>
        <div class="hs_datatable_wrapper table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
             <tr>
                <th>S.No</th>
                <th>Industry Name</th>
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
                        <td><input type="hidden" name="id" id="id" value="<?= $r1->id; ?>" />
                            <div class="hs_user">
                                <div class="user_name">
                                    <p><?= $r1->name; ?></p>
                                </div>
                            </div>
                        </td>
						<td>
							<select id="aofs<?= $r1->id; ?>" onchange="aofs(<?=  $r1->id; ?>)">
								<option <?php  if($r1->status=='Active') { echo "selected"; } ?> >Active</option>
								<option <?php  if($r1->status=='Inactive') { echo "selected"; } ?> >Inactive</option>
							</select>
						</td>
                       <td width="200">
							<a  class="btn" title="Edit" data-name="Dentist" onclick="update_aofs('<?= $r1->id; ?>','<?= $r1->name; ?>')"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						   <a  class="btn" title="Delete" onclick="delete_conform(<?= $r1->id;  ?>,'aofs')" ><i class="fa fa-trash" aria-hidden="true"></i></a>
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
				<h4 class="modal-title">Add Industry </h4>
			</div>
			<div class="modal-body">
				<div class="hs_input">
                    <label>file</label>
                    <form  action="importindustry" method="POST"  enctype="multipart/form-data"> 
						<input type="file" name="importfile" id="importfile" class="form-control" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
						<a target="_blank" href="https://scnjob.com/uploads/sample.csv" style="color: red;"
                            download ="sample.csv">** Download Sample csv **</a><br><br>
						<button type="submit" class="btn">Add</button>
					</form>
                </div>
			</div>
		</div>
	</div>
</div>
<!-- add import_popup end -->


<!-- add areaofsector popup start -->
<div id="add_areaofsector_popup" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Area of Sector</h4>
			</div>
			<div class="modal-body">
				<div class="hs_input">
                    <label>Area of Sector</label>
                    <form id="f1"> <input type="text" name="name" id="name1" class="form-control" value="" placeholder="Area Of Sector Name"></form>
                </div>
				<button id="add_aofs" class="btn">Add</button>
			</div>
		</div>
	</div>
</div>
<!-- add areaofsector popup end -->



<!-- update areaofsector popup start -->
<div id="update_areaofsector_popup" class="modal h" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button  type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update Area of Sector</h4>
			</div>
			<div class="modal-body">
				<div class="hs_input">
                    <label>Area of Sector</label>
                    <form id="f2"><div id="data_disp"> 
					<input type="hidden" name="id" id="l_id"  value="">
					<input type="hidden" name="tbl_name" id="tbl_name" value="">
					<input type="text" name="name" id="name" class="form-control" value="" />
					</div></form>
                </div>
				<button id="update_aofs" class="btn">Update</button>
			</div>
		</div>
	</div>
<!-- update areaofsector popup end -->	
</div>
<div id="delete_aofs_popup" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button  type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Do you want to delete this area of sector</h4>
			</div>
			<div class="modal-body">
				<?= form_open('admin/delete_aofs'); ?>
				<div class="hs_input">
					<input type="hidden" name="id" id="disp_data" value="">
                </div>
				<input type="submit" name="sub" class="btn" value="Yes">
				<input type="button"  class="btn" value="No" id="no_btn"></div>
				</form>
				
			</div>
		</div>
</div>