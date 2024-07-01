<?php
include('common/header.php');
$msg=$this->session->flashdata('msg');
if(isset($msg))
{
	?>
<div class="hs_alert_wrapper open_alert  hs_success msg1"> <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
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
            <h3><?= $name; ?></h3>
        </div>
        <div class="hs_datatable_wrapper">
            <table class="hs_datatable table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Job Type</th>
						 <th>No. of Vacancies</th>
                        <th>Post Date</th>
						<th>Last date</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>	
				<?php 
				if($jobs)
				{
				$i=1;
				foreach($jobs as $j)
				{
				?>
					 <tr>
                        <td><?= $i++; ?></td>
                        <td width="200">
                            <div class="hs_user">
                                <div class="user_name">
                                    <p><?= $j->specialization; ?></p>
                                </div>
                            </div>
                        </td>
                        <td><?= $j->job_type; ?></td>
                        <td><?= $j->number_of_vacancies; ?></td>
						<td><?= $j->post_date; ?></td>
						<td><?= $j->lasr_date_application; ?></td>
						<td><a target="_blank" href="<?= base_url('home/user_jobSingle/'.$j->id) ?>"  class="btn" title="Edit" data-name="Dentist" ><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                     </tr>
				<?php } } ?>
				</tbody>
            </table>
        </div>
    </div>
</div>


<?php
include('common/footer.php');
?>