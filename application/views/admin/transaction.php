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
            <h3>All Transaction  (<?= $this->Common_model->row_count('jp_payment'); ?>)</h3>
        </div>
        <div class="hs_datatable_wrapper table-responsive">
            <table class="hs_datatable table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
						<th>E-Mail</th>
                        <th>Plan</th>
                        <th>Amount</th>
                        <th>Mode</th>
						<th>Pay Date</th>
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
						<td><?= $r1->email; ?></td>
                        <td width="200">
                            <div class="hs_user">
                                <div class="user_name">
                                    <p><?= $r1->p_id; ?></p>
                                </div>
                            </div>
                        </td>
                        <td><?= $r1->pay_amount; ?></td>
                        <td><?= $r1->source; ?></td>
					    <td><?= $r1->pay_date; ?></td>
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


	