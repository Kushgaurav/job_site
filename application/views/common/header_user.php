<div class="col-md-12">
    <?php
$img=$res->logo_img;;
$img2='';
if($img)
{
	$img2=base_url().$img;
}
else
{
	$img2=base_url('assets/images/logo_with_text.png');
}
?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/scn-job.css'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" defer>
    </script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/lib/cities.js'); ?>" />
    <script>
    $(document).ready(function() {
        $(".filterselect").select2();
    });
    </script>


    <?php $email=$this->session->userdata('seeker');
		if(isset($email)) { ?>



    <header>
        <!-- Header End -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class=".col-lg-2 col-2 navbar-light navbar-cstm">
                        <a href="<?= base_url(''); ?>" class="logo">
                            <img src="<?= $img2; ?>" alt=""></a>

                        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                  </button> -->

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#nav-main" aria-controls="navMain" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>


                    </div>
                    <div class="col-md-10 col-sm-12 col-xs-12">
                        <!-- Nav start -->
                        <div class="navbar navbar-expand-lg navbar-light" role="navigation">
                            <div class="collapse navbar-collapse" id="nav-main">
                                <ul class="navbar-nav ms-auto align-items-center">

                                    <li class="nav-item"><a href="<?= base_url(''); ?>" class="nav-link">Home</a></li>
                                    <!--<li class="nav-item"><a href="about-us.html" class="nav-link">Post Resume</a></li>-->
                                    <!--<li class="nav-item"><a href="about-us.html" class="nav-link">Employer Zone</a></li>-->
                                    <li class="nav-item"><a href="<?= base_url('home/contact'); ?>"
                                            class="nav-link">Contact </a></li>
                                    <li class="nav-item"><a href="<?= base_url('home/user_profile'); ?>"
                                            class="nav-link"><?= $controller->set_language('profile_setting') ?> </a>
                                    </li>
                                    <li class="nav-item"><a href="<?= base_url('home/logout'); ?>"
                                            class="nav-link"><?= $controller->set_language('logout') ?> </a></li>
                                    <!--<li class="nav-item"><a href="contact-us.html" class="nav-link">Contact</a></li>-->
                                    <li class="nav-item postjob"><a href="<?= base_url('home/searchjob'); ?>"
                                            class="nav-link">Find jobs</a>
                                    </li>
                                    <li class="nav-item jobseeker"><a href="<?= base_url('home/my_applied_jobs'); ?>"
                                            class="nav-link"><?= $controller->set_language('applied_job') ?></a></li>




                                    <?php
                            $res2=$this->Common_model->select('seeker',$email,'email');
                            $img1=$res2->img;
                            $gid=$res2->google_id;
                            $imgf='';
                            //$check=strrpos($img1,"https://");
                            if (filter_var($img1, FILTER_VALIDATE_URL)) {
                                 $imgf=$img1;
                            } else {
                                $imgf=base_url().$img1;
                            }
                           ?>

                                    <li class="nav-item dropdown userbtn"><a
                                            href="<?= base_url('home/user_profile'); ?>"><img src="<?= $imgf; ?>" alt=""
                                                class="userimg"></a>

                                    </li>
                                </ul>
                                <!-- Nav collapes end -->
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- Nav end -->
                    </div>
                </div>
                <!-- row end -->
            </div>
            <!-- Header container end -->
        </div>
    </header>


    <div class="jp_header_wrapper">



        <?php }	else 	{ ?>


        <header>
            <!-- Header End -->
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-3 col-xs-12 navbar-light"> <a href="<?= base_url(''); ?>"
                                class="logo"><img src="<?= $img2; ?>" alt=""></a>

                            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                  </button> -->

                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#nav-main" aria-controls="navMain" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>


                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <!-- Nav start -->
                            <div class="navbar navbar-expand-lg navbar-light" role="navigation">
                                <div class="collapse navbar-collapse" id="nav-main">
                                    <ul class="navbar-nav ms-auto align-items-center">

                                        <li class="nav-item"><a href="<?= base_url(''); ?>" class="nav-link">Home</a>
                                        </li>

                                        <li class="nav-item"><a href="<?= base_url('home/contact'); ?>"
                                                class="nav-link">Contact </a></li>
                                        <!--<li class="nav-item"><a href="contact-us.html" class="nav-link">Contact</a></li>-->
                                        <li class="nav-item postjob"><a href="<?= base_url('home/searchjob'); ?>"
                                                class="nav-link">Find jobs</a>
                                        </li>
                                        <li class="nav-item jobseeker"><a href="<?= base_url('home/login') ?>"
                                                class="nav-link">Log In</a></li>


                                    </ul>
                                    <!-- Nav collapes end -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- Nav end -->
                        </div>
                    </div>
                    <!-- row end -->
                </div>
                <!-- Header container end -->
            </div>
        </header>






        <!--<div class="jp_header_right">-->
        <!--                  <div class="jp_nav">-->
        <!--	<ul>-->
        <!--                          <li><a href="<?= base_url(); ?>"><?= $controller->set_language('jobs') ?></a></li> -->
        <!--                          <li><a href="<?= base_url('home/login') ?>"><?= $controller->set_language('login') ?></a></li>-->
        <!--                      </ul>-->
        <!--                  </div>-->



        <!--                  <div class="jp_category_toggle">-->
        <!--                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 485.008 485.008" style="enable-background:new 0 0 485.008 485.008;" xml:space="preserve" width="512px" height="512px"><g><g><path d="M171.501,464.698v-237.9l-166.3-192.6c-8.9-10.9-7.9-33.3,15.1-33.3h443.6c21.6,0,26.6,19.8,15.1,33.3l-162.3,187.5v147.2 c0,6-2,11.1-7.1,15.1l-103.8,95.8C193.801,488.698,171.501,483.898,171.501,464.698z M64.701,41.298l142.2,164.3c3,4,5,8.1,5,13.1 v200.6l64.5-58.5v-146.1c0-5,2-9.1,5-13.1l138.1-160.3L64.701,41.298L64.701,41.298z" fill="#FFFFFF"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>-->
        <!--                  </div>-->
        <!--                  <div class="jp_nav_toggle">-->
        <!--                      <span></span>-->
        <!--                      <span></span>-->
        <!--                      <span></span>-->
        <!--                  </div>-->
        <!--              </div>	-->
        <?php } ?>
    </div>
</div>