<?php include('common/head-section.php'); ?>
<body>
<div class="jp_loading_wrapper">
    <div class="jp_loading_inner">
        <img src="<?= base_url('assets/images/loader01.gif'); ?>" alt="" />
    </div>
</div>

<div class="jp_sidebar_close"></div>

<?php
if(isset($msg))
{
	?>
<script>
$.toast(
					{
						text:'Job Application Successfull Complet',
						icon:'success',
						showHideTransition :'slide',
						bgColor:'green',
						textColorr:'white',
						hideAfter:'10000',
						position:'bottom-right',

					}
				  )
</script>
<?php
}
?>
<!-- header start -->
<div class="jp_header">
    <div class="container">
        <div class="row">
            <?php
				include('user_header.php');    
			?>	
            <div class="col-md-12">
                <div class="jp_page_title">
                    <h3>Are You Looking For A Job</h3>
                    <p>you are on the right place</p>
                </div>
            </div>
           <div class="col-md-8 col-md-offset-2">
			
			   <div class="jp_search_form">
                    
					<input type="text" name="search_txt" id="search_txt" placeholder="Search Job Here by Location, Skills">
                    <button id="sbtn" class="jp_search_btn"></button>
                </div>
	
            </div>
        </div>
    </div>
</div>   
<!-- header end -->

<div class="jp_main_wrapper">
   <div class="container">
       <div class="row">	
			<div class="col-md-12">
               <div class="jp_single_wrapper">
                    <div class="jp_job_box">
                        <div class="job_detail">
                            <h3><?= $r1->specialization; ?></h3>
                            <span>Organisation Name</span>
                            <ul>
                                <li><span><img src="assets/images/experience.svg" alt=""></span> <?= $r1->exp; ?></li>
                                <li><span><img src="assets/images/location.svg" alt=""></span> <?= $r1->job_location; ?></li>
                            </ul>
                            <h4>
                                <span class="icon"></span>
                                <span class="skills"><a href="">Photoshop</a>, <a href="">Illustrator</a>, <a href="">InDesign</a>, <a href="">Corel Draw</a></span>
                            </h4>
                            
                            <p><strong>Job Posted:</strong> <?= $r1->post_date; ?></p>
                            <p><strong>Job Type:</strong> <?= $r1->job_type; ?></p>
                            <p><strong>Designation:</strong> <?= $r1->designation; ?></p>
                            <p><strong>Qualification:</strong> <?= $r1->qualification; ?></p>
                            <p><strong>Specialization:</strong> <?= $r1->specialization; ?></p>
                            <p><strong>Last Date of Application:</strong> <?= $r1->lasr_date_application; ?> </p>

                            <div class="jp_job_disc">
                                <h4>Job Description</h4>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum.</p>
                            </div>

                            <div class="jp_job_disc">
                                <h4>Organisation detail</h4>
                                <p><strong>type:</strong> <?= $res2->org_type; ?></p>
                                <p><strong>Location:</strong> <?=  $res2->location;  ?></p>
                                <p><strong>Website:</strong> <a href="<?=  $res2->website;  ?>" target="_blank"><?=  $res2->website;  ?></a></p>
                            </div>

                        </div>
                        <div class="jp_view_btn">
                            <?php
							if($status=='no')
							{
							?>
							<a href="<?= base_url('Home/job_applay/'.$r1->id); ?>" class="jp_btn">Apply</a>
							<?php
							}
							?>
                        </div>
                    </div>
               </div>
           </div>
		   
		   
       </div>
   </div>
</div>

<a href="#" id="jp_backToTop" title="Back to top">&uarr;</a>

<!-- site jquery start -->
<?php include('common/user_script_tag.php');  ?>
<!-- site jquery end -->
</body>
</html>