<?php
$msg=$this->session->flashdata('msg');
if(isset($msg))
{
	?>
<div class="hs_alert_wrapper open_alert  hs_success msg1"> <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
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
            <h3>Reviews  (<?= $this->Common_model->row_count('jp_review'); ?>)</h3>
        </div>
        <div class="hs_datatable_wrapper table-responsive">
            <table class="hs_datatable table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
						<th>Recruiter E-Mail</th>
                        <th>Seeker E-Mail</th>
                        <th>Review</th>
                        <th>Rating</th>
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
						<td><?= $r1->recruiter_email; ?></td>
                        <td width="200">
                            <div class="hs_user">
                                <div class="user_name">
                                    <p><?= $r1->seeker_email; ?></p>
                                </div>
                            </div>
                        </td>
                        <td><?= $r1->comment; ?></td>
                        <td><?= $r1->rat_rating; ?></td>
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


	