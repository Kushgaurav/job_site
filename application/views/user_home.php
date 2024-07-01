<?php include('common/head-section.php'); 


$check=$this->session->userdata('job_applay');
if($check)
{
	redirect('home/user_jobSingle/'.$check);
}
?>


<!--<div class="jp_sidebar_close"></div>-->
<?php
				include('common/header_user.php');    
			?>

<div class="container-fluid">
    <div class="row">


        <div class="searchwrap">
            <div class="container">
                <!--<h3><?php  echo $controller->set_language('home_page_heading'); ?></h3>-->
                <!--<p><?php echo $controller->set_language('filter_up_side_msg'); ?></p>-->
                <h3>Million's success stories. <span>Start yours today.</span></h3>
                <p>Find Jobs, Employment & Career Opportunities</p>
                <div class="searchbar">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="jp_search_form">
                                <input type="text" name="search_txt" id="search_txt"
                                    placeholder="<?php  echo $controller->set_language('text_filter_placeholder'); ?>" />

                                <!--<input type="submit" class="btn" value="Search Job">-->

                                <!--<button id="sbtn" class="jp_search_btn"></button>-->
                                <div id="key_res" class="jp_search_result_dd">
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-md-2">-->
                        <!--<button  class="jp_search_btn"></button>-->
                        <!--                  <input type="submit" id="sbtn" class="btn" value="Search Job">-->
                        <!--              </div>-->
                    </div>




                </div>
                <!-- button start -->
                <div class="getstarted">
                    <a href="#."><i class="bi bi-briefcase" aria-hidden="true"></i> Post Your Job</a>
                    <a href="<?= base_url('home/searchjob'); ?>"><i class="bi bi-user-o" aria-hidden="true"></i> Search
                        Jobs</a>


                    <!-- button end -->

                </div>
            </div>





        </div>
    </div>
</div>
<div class="section greybg">
    <div class="container">
        <!-- title start -->
        <div class="titleTop">
            <div class="subtitle">Here You Can See</div>
            <h3>Top <span>Employers</span></h3>
        </div>
        <!-- title end -->

        <ul class="employerList owl-carousel owl-loaded owl-drag">
            <!--employer-->

            <div class="marquee">
                <div class="marquee-content">

                    <?php foreach($rlogos as $ob){  ?>

                    <div class="marquee-item" style="width: 93.6px; margin-right: 20px;">
                        <li data-toggle="tooltip" data-placement="top" title="" data-original-title="Company Name">
                            <img src="<?=base_url().$ob->logo?>" alt="Company Name" >
                        </li>
                    </div>

                    <?php }?>


                </div>
            </div>
        </ul>
    </div>
</div>
<div class="section howitwrap">
    <div class="container">
        <!-- title start -->
        <div class="titleTop">
            <div class="subtitle">Here You Can See</div>
            <h3>How It <span>Works?</span></h3>
        </div>
        <!-- title end -->
        <ul class="howlist row">
            <!--step 1-->
            <li class="col-md-4 col-sm-4">
                <div class="iconcircle"><i class="bi bi-person-fill" aria-hidden="true"></i></div>
                <h4>Create An Account</h4>
                <p>1.Please Click on Register Button <br>
                    2.Fill up required information.</p>
            </li>
            <!--step 1 end-->

            <!--step 2-->
            <li class="col-md-4 col-sm-4">
                <div class="iconcircle"><i class="bi bi-black-tie" aria-hidden="true"></i></div>
                <h4>Search Desired Job</h4>
                <p> 1.Click on view all latest job <br>
                    2.Click on view all latest job</p>
            </li>
            <!--step 2 end-->

            <!--step 3-->
            <li class="col-md-4 col-sm-4">
                <div class="iconcircle"><i class="bi bi-file-text" aria-hidden="true"></i></div>
                <h4>Send Your Resume</h4>
                <p>If you are new user than Create an account and upload your bio-data.If you find any difficulty than
                    send your Bio-Data by WhatsApp at 8588892236</p>
            </li>
            <!--step 3 end-->
        </ul>
    </div>
</div>
<!-- header end -->

<div class="section greybg">
    <div class="container">
        <!-- title start -->
        <div class="titleTop">
            <div class="subtitle">Here You Can See</div>
            <h3>Latest <span>Jobs</span></h3>
        </div>
        <!-- title end -->

        <ul class="jobslist row">


            <?php foreach($total_jobs as $ob) { ?>

            <!--Job 1-->
            <li class="col-md-6 col-sm-12 col-xl-4">
                <div class="jobint">
                    <a href="<?=base_url()?>job/user_jobsingle/<?=$ob->id?>">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <!--<img src="<?=base_url()?>" alt="Job Name">-->
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <h4><?=$ob->job_type?></h4>
                                <div class="company"><?=$ob->designation?></div>
                                <div class="jobloc"><label class="fulltime"><?=$ob->area_of_sector?></label> -
                                    <span><?=$ob->job_location?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </li>
            <!--Job end-->

            <?php } ?>



        </ul>
        <!--view button-->
        <div class="viewallbtn"><a href="<?= base_url('home/searchjob'); ?>">View All Latest Jobs</a></div>
        <!--view button end-->
    </div>
</div>

<a href="#" id="jp_backToTop" title="Back to top">&uarr;</a>
</body>

</html>
<!-- site jquery start -->
<?php include('common/footer_user.php'); ?>
<!-- site jquery end -->
<script>
$(document).ready(function() {

    function load_country_data(page) {
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/Home/pagination/" + page,
            method: "GET",
            success: function(data) {
                $('#se_res').html(data);
            }
        });
    }

    load_country_data(1);

    $(document).on("click", ".pagination li a", function(event) {
        event.preventDefault();
        var page = $(this).data("ci-pagination-page");
        load_country_data(page);
    });

});
</script>