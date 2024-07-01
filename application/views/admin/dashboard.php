<?php
$login=$this->session->flashdata('login');
if(isset($login))
{
	?>
<div class="hs_alert_wrapper open_alert  hs_success msg1">
    <!-- use this classes here - "open_alert" and "hs_success" and "hs_error"  -->
    <div class="hs_alert_inner">
        <p> <span class="icon"></span>Successfully login</p>
    </div>
</div>
<?php
}
?>
<div class="row">
    <div class="col-md-3">
        <a href="<?= base_url('admin/seekers') ?>" class="hs_analytics_data">
            <div class="pull-left">
                <span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span>
                <p>Seekers</p>
            </div>
            <h3 class="pull-right"><?= $seeker; ?></h3>
        </a>
    </div>
    <div class="col-md-3">
        <a href="<?= base_url('admin/location') ?>" class="hs_analytics_data">
            <div class="pull-left">
                <span class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                <p>Location</p>
            </div>
            <h3 class="pull-right"><?= $location; ?></h3>
        </a>
    </div>
    <div class="col-md-3">
        <a href="<?= base_url('admin/area_of_sectors') ?>" class="hs_analytics_data">
            <div class="pull-left">
                <span class="icon"><i class="fa fa-th-large" aria-hidden="true"></i></span>
                <p>Industry</p>
            </div>
            <h3 class="pull-right"><?= $area_of_sectors; ?></h3>
        </a>
    </div>
    <div class="col-md-3">
        <a href="<?= base_url('admin/specialization') ?>" class="hs_analytics_data">
            <div class="pull-left">
                <span class="icon"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span>
                <p>Funcation</p>
            </div>
            <h3 class="pull-right"><?= $specialization; ?></h3>
        </a>
    </div>
</div>


 


<div class="row">
    <div class="col-md-3">
        <a href="<?= base_url('admin/recruiters') ?>" class="hs_analytics_data">
            <div class="pull-left">
                <span class="icon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                <p>Recruiters</p>
            </div>
            <h3 class="pull-right"><?= $recruiter; ?></h3>
        </a>
    </div>
    <div class="col-md-3">
        <a href="<?= base_url('admin/qualification') ?>" class="hs_analytics_data">
            <div class="pull-left">
                <span class="icon"><i class="fa fa-book" aria-hidden="true"></i></span>
                <p>Qualification</p>
            </div>
            <h3 class="pull-right"><?= $qualification; ?></h3>
        </a>
    </div>
    <div class="col-md-3">
        <a href="<?= base_url('admin/job_role') ?>" class="hs_analytics_data">
            <div class="pull-left">
                <span class="icon"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></span>
                <p>Job Role</p>
            </div>
            <h3 class="pull-right"><?= $job_role; ?></h3>
        </a>
    </div>
    <div class="col-md-3">
        <a href="<?= base_url('admin/job_types') ?>" class="hs_analytics_data">
            <div class="pull-left">
                <span class="icon"><i class="fa fa-list-ul" aria-hidden="true"></i></span>
                <p>Total Job Type</p>
            </div>
            <h3 class="pull-right"><?= $job_types; ?></h3>
        </a>
    </div>

    <!-- <div class="col-md-3">
        <a href="<?= base_url('admin/designation') ?>" class="hs_analytics_data">
            <div class="pull-left">
                <span class="icon"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
                <p>Designation</p>
            </div>
            <h3 class="pull-right"><?= $designation; ?></h3>
        </a>
    </div> -->

    <div class="col-md-3">
        <a href="<?= base_url('admin/seekers?state=&city=&locality=&job_type=&qualification_type=&qualification=&exp_typ=Experienced&industry=') ?>"
            class="hs_analytics_data">
            <div class="pull-left">
                <span class="icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                <p>Experienced</p>
            </div>
            <h3 class="pull-right"><?= $experience; ?></h3>
        </a>
    </div>


    <div class="col-md-3">
        <a href="<?= base_url('admin/seekers?state=&city=&locality=&job_type=&qualification_type=&qualification=&exp_typ=Fresher&industry=') ?>"
            class="hs_analytics_data">
            <div class="pull-left">
                <span class="icon"><i class="fa fa-free-code-camp" aria-hidden="true"></i></span>
                <p>fresher</p>
            </div>
            <h3 class="pull-right"><?=$freshcount; ?></h3>
        </a>
    </div>
</div>


<script>
if ($('#hs_registration_data').length) {

    var config2 = {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
            datasets: [{
                "label": "Doctors",
                "backgroundColor": "#4bc0c0",
                "borderColor": "#4bc0c0",
                "data": ["0", "5", "27", "6", "6", "1", "2"],
                "fill": false
            }, {
                "label": "Patients",
                "backgroundColor": "#ff9f40",
                "borderColor": "#ff9f40",
                "data": ["0", "4", "25", "16", "25", "10", "5"],
                "fill": false
            }],

        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    id: 'y-axis-1',
                    type: 'linear',
                    position: 'left',
                    ticks: {
                        min: 0,
                        max: 27
                    }
                }]
            }
        }
    };

    window.onload = function() {
        var ctx2 = document.getElementById("hs_registration_data").getContext("2d");
        window.myPie2 = new Chart(ctx2, config2);
    };
}
</script>