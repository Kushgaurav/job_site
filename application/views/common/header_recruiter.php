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




    <header>
        <!-- Header End -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-3 col-xs-12 navbar-light"> <a href="<?= base_url(''); ?>"
                            class="logo"><img src="<?= $img2; ?>" alt=""></a>


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

                                    <li class="nav-item"><a href="<?= base_url('/recruiter'); ?>"
                                            class="nav-link">MY JOBS</a></li>
                                    <li class="nav-item"><a href="<?= base_url('recruiter/post_jobs'); ?>"
                                            class="nav-link">POST A JOB </a></li>
                                    <li class="nav-item"><a href="<?= base_url('recruiter/recruiter_profile'); ?>"
                                            class="nav-link">PROFILE SETTING</a>
                                    </li>
                                    <li class="nav-item"><a href="<?= base_url('recruiter/seekers'); ?>"
                                            class="nav-link">Data Search</a>
                                    </li>
                                    <li class="nav-item"><a href="<?= base_url('recruiter/logout'); ?>"
                                            class="nav-link">LOGOUT </a></li>




                                    <?php
				$s1=$this->session->userdata('recruiter');
				$res2=$this->Common_model->select('recruiter',$s1,'email');
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




</div>