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
<?php
					$email=$this->session->userdata('seeker');
					
					if(isset($email))
					{
					?>
					
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/scn-job.css'); ?>">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <header>
        <!-- Header End -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-3 col-xs-12 navbar-light"> <a href="index.html" class="logo"><img
                                src="img/logo.png" alt=""></a>

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
                                    <li class="nav-item"><a href="<?= base_url('home/contact'); ?>" class="nav-link">Contact </a></li>
                                    <!--<li class="nav-item"><a href="contact-us.html" class="nav-link">Contact</a></li>-->
                                    <li class="nav-item postjob"><a href="<?= base_url('home/searchjob'); ?>" class="nav-link">Find jobs</a>
                                    </li>
                                    <li class="nav-item jobseeker"><a href="<?= base_url('home/login') ?>"
                                            class="nav-link">post jobs</a></li>
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
                              
                                    <li class="nav-item dropdown userbtn"><a href="<?= base_url('home/login') ?>" class="nav-link"><img
                                                src="<?= $imgf; ?>" alt=""
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
                   
					
					<div class="jp_header_right">
                       
                        <div class="jp_profile_dd jp_dropdown_wrapper dropdown_right">
                           
                            <label>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewbox="0 0 48.4 48.4" style="enable-background:new 0 0 48.4 48.4;" xml:space="preserve"><g><path d="M48.4,24.2c0-1.8-1.297-3.719-2.896-4.285s-3.149-1.952-3.6-3.045c-0.451-1.093-0.334-3.173,0.396-4.705 c0.729-1.532,0.287-3.807-0.986-5.08c-1.272-1.273-3.547-1.714-5.08-0.985c-1.532,0.729-3.609,0.848-4.699,0.397 s-2.477-2.003-3.045-3.602C27.921,1.296,26,0,24.2,0c-1.8,0-3.721,1.296-4.29,2.895c-0.569,1.599-1.955,3.151-3.045,3.602 c-1.09,0.451-3.168,0.332-4.7-0.397c-1.532-0.729-3.807-0.288-5.08,0.985c-1.273,1.273-1.714,3.547-0.985,5.08 c0.729,1.533,0.845,3.611,0.392,4.703c-0.453,1.092-1.998,2.481-3.597,3.047S0,22.4,0,24.2s1.296,3.721,2.895,4.29 c1.599,0.568,3.146,1.957,3.599,3.047c0.453,1.089,0.335,3.166-0.394,4.698s-0.288,3.807,0.985,5.08 c1.273,1.272,3.547,1.714,5.08,0.985c1.533-0.729,3.61-0.847,4.7-0.395c1.091,0.452,2.476,2.008,3.045,3.604 c0.569,1.596,2.49,2.891,4.29,2.891c1.8,0,3.721-1.295,4.29-2.891c0.568-1.596,1.953-3.15,3.043-3.604 c1.09-0.453,3.17-0.334,4.701,0.396c1.533,0.729,3.808,0.287,5.08-0.985c1.273-1.273,1.715-3.548,0.986-5.08 c-0.729-1.533-0.849-3.61-0.398-4.7c0.451-1.09,2.004-2.477,3.603-3.045C47.104,27.921,48.4,26,48.4,24.2z M24.2,33.08 c-4.91,0-8.88-3.97-8.88-8.87c0-4.91,3.97-8.88,8.88-8.88c4.899,0,8.87,3.97,8.87,8.88C33.07,29.11,29.1,33.08,24.2,33.08z" fill="#393939"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                            </label>
                            <div class="jp_dropdown">
                                <div class="jp_dropdown_inner">
                                    <ul>
                                        <li><a href="<?= base_url('home/my_applied_jobs'); ?>"><?= $controller->set_language('applied_job') ?></a></li>
										<li><a href="<?= base_url('home/user_profile'); ?>"><?= $controller->set_language('profile_setting') ?></a></li>
                                        <li><a href="<?= base_url('home/logout'); ?>"><?= $controller->set_language('logout') ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="jp_nav_toggle">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
					<?php
					}
					else
					{ ?>
						<div class="jp_header_right">
                        <div class="jp_nav">
						<?php						
						?>
							<ul>
                                <li><a href="<?= base_url(); ?>"><?= $controller->set_language('jobs') ?></a></li> 
                                <li><a href="<?= base_url('home/login') ?>"><?= $controller->set_language('login') ?></a></li>
                            </ul>
                        </div>
						
						
						
                        <div class="jp_category_toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 485.008 485.008" style="enable-background:new 0 0 485.008 485.008;" xml:space="preserve" width="512px" height="512px"><g><g><path d="M171.501,464.698v-237.9l-166.3-192.6c-8.9-10.9-7.9-33.3,15.1-33.3h443.6c21.6,0,26.6,19.8,15.1,33.3l-162.3,187.5v147.2 c0,6-2,11.1-7.1,15.1l-103.8,95.8C193.801,488.698,171.501,483.898,171.501,464.698z M64.701,41.298l142.2,164.3c3,4,5,8.1,5,13.1 v200.6l64.5-58.5v-146.1c0-5,2-9.1,5-13.1l138.1-160.3L64.701,41.298L64.701,41.298z" fill="#FFFFFF"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                        </div>
                        <div class="jp_nav_toggle">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>	
					<?php }
					?>			
                </div>
            </div>