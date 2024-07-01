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

<style>
    .classabc{
        max-height: 500px;
        height: auto;
       overflow:auto;
    }
   
    
</style>
<!-- header end -->

<div class="jp_main_wrapper">
    <div class="jp_doctor_list_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <!-- category start -->
                    <div class="jp_widget_wrapper">

                        <div class="jp_widget_box classabc" >
                            <h3 class="jp_widget_title">Job Type</h3>
                             <div class="jp_widget_search">
                                <input type="text" id="job_type_serch" placeholder="Search..." />
                                <!-- <button class="icon" id="loc_text"></button> -->
                            </div>
                            <div class="jp_checkbox_list" id="serchjobtype">
                                <?php
								if(isset($job_type))
								{
								$i=0;
								foreach($job_type as $jt)
								{
									$i++;
									?>
                                <div class="jp_checkbox" >
                                    <input type="checkbox" name="s1" value="<?= $jt->name.'_jt'; ?>" id="<?= $i ?>"  />
                                    <label for="<?= $i ?>"><?= $jt->name; ?></label>
                                </div>
                                <?php
								}
								}
								else
								{
								   echo $controller->set_language('home_not_avil_msg');
								}
								?>
                            </div>
                        </div>

                        <div class="jp_widget_box classabc" >
                            <h3 class="jp_widget_title">Location</h3>
                            <div class="jp_widget_search">
                                <input type="text" id="Location_text" placeholder="Search..." />
                                <!-- <button class="icon" id="loc_text"></button> -->
                            </div>
                            <div id="loc_data">
                                <div class="jp_checkbox_list" id="locationck">
                                    <?php
							   if(isset($location))
							   {
							   $l=100;
								foreach($location as $loc)
								{
									$l++;
									?>
                                    <div class="jp_checkbox" >
                                        <input type="checkbox" name="s1" value="<?= $loc->name.'_loc'; ?>"
                                            id="<?= $l; ?>" />
                                        <label
                                            for="<?= $l; ?>"><?=$loc->state .', '. $loc->name .' ,'. $loc->locality; ?></label>
                                    </div>
                                    <?php
								}
							   }
							   else
							   {
								    echo $controller->set_language('home_not_avil_msg');
							   }
								?>
                                </div>
                            </div>
                        </div>




                        <div class="jp_widget_box classabc" >
                            <h3 class="jp_widget_title">Designation</h3>
                             <div class="jp_widget_search" >
                                <input type="text" id="searchdesignation" placeholder="Search..." />
                                <!-- <button class="icon" id="loc_text"></button> -->
                            </div>
                            <div class="jp_checkbox_list" id="designationsearch">
                                <?php
								if(isset($desi))
								{
							  $q=200;
								foreach($desi as $desi1)
								{
									$q++;
									?>
                                <div class="jp_checkbox">
                                    <input type="checkbox" name="s1" value="<?= $desi1->name.'_desi'; ?>"
                                        id="<?= $q; ?>" />
                                    <label for="<?= $q; ?>"><?= $desi1->name; ?></label>
                                </div>
                                <?php
								}
								}
								else
								{ echo $controller->set_language('home_not_avil_msg'); }
								?>
                            </div>
                        </div>

                        <div class="jp_widget_box classabc" >
                            <h3 class="jp_widget_title">Qualification</h3>
                              <div class="jp_widget_search">
                            <input type="text" id="searchqueli" placeholder="Search..." />
                                <!-- <button class="icon" id="loc_text"></button> -->
                            </div>
                            <div class="jp_checkbox_list"id="quelisearch">
                                <?php
							   if(isset($qua))
							   {
							   $q=300;
								foreach($qua as $qu)
								{
									$q++;
									?>
                                <div class="jp_checkbox">
                                    <input type="checkbox" name="s1" value="<?= $qu->name.'_qua'; ?>" id="<?= $q; ?>" />
                                    <label for="<?= $q; ?>"><?= $qu->name; ?></label>
                                </div>
                                <?php
								}
							   }
							   else
							   { echo $controller->set_language('home_not_avil_msg'); }
								?>
                            </div>
                        </div>

                        <div class="jp_widget_box classabc" >
                            <h3 class="jp_widget_title">Experience</h3>
                            <div class="jp_widget_search">
                            <input type="text" id="searchexp" placeholder="Search..." />
                                <!-- <button class="icon" id="loc_text"></button> -->
                            </div>
                            <div class="jp_checkbox_list" id="expsearch">
                                <?php
							   if(isset($exp))
							   {
							   $q=400;
								foreach($exp as $exp1)
								{
									$q++;
									?>
                                <div class="jp_checkbox">
                                    <input type="checkbox" name="s1" value="<?= $exp1->name.'_exp'; ?>"
                                        id="<?= $q; ?>" />
                                    <label for="<?= $q; ?>"><?= $exp1->name; ?></label>
                                </div>
                                <?php
								}
							   }
							   else
							   { echo $controller->set_language('home_not_avil_msg'); }
								?>
                            </div>
                        </div>
                        <?php 
						if($custom_ads)
						{ ?>
                        <div class="">
                            <?php
							
								foreach($custom_ads as $ca)
								{
									$visible=$ca->home_page;
									$visible2=$ca->both_page;
									if($visible=="yes")
									{ 
										$image=$ca->add_img;
										?>
                            <a target="_blank" href="<?= $ca->link1; ?>"><img class="img-responsive"
                                    src="<?= base_url().$image; ?>" alt="Ads"></a>
                            <?php	
								   }
								    else if($visible2=="yes")
								    {
									    $image=$ca->add_img;
										?>
                            <div class="wrapper">
                                <a target="_blank" href="<?php echo  $ca->link1; ?>"><img class="img-responsive"
                                        src="<?php echo base_url().$image; ?>" alt="Ads"></a>
                            </div>
                            <?php	
								    }
								    else { }
								}
							
							?>
                        </div>
                        <?php } ?>


                    </div>
                    <!-- category end -->
                </div>
                <div class="col-md-8">

                    <!-- job listing start -->
                    <div id="loading">
                        <div class="jp_loading_inner">

                        </div>
                    </div>
                    <div id="se_res"></div>

                </div>
            </div>
        </div>
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
 <script>
                        document.getElementById('job_type_serch').addEventListener('keyup',
                            function handleChange(teama) {

                                var data = {
                                    'searchvalue': teama.target.value
                                }

                                $.ajax({
                                    type: "POST",
                                    url: "/home/job_type_serch",
                                    data: data,
                                    dataType: "json",

                                    success: function(result) {
                                        console.log(result);

                                        $('#serchjobtype').html('');
                                        var options = '';

                                        for (var i = 0; i < result.data.length; i++) {
                                            var data=result.data[i];
                                            options += '<div class="jp_checkbox" ><input type="checkbox" name="s1" value="'+data.name+'" id="'+i+'"  /><label ="'+i+'">'+data.name+'</label></div>';
                                            
                                            
                                          

                                            // option += '<label for = "" > ' + result.data[i].name + '' +
                                            //     result.data[i].locality +
                                            //     '</label>';
                                        }
                                        $('#serchjobtype').append(options);
                                    }
                                });

                            });
                        </script>
                                                <script>
                        document.getElementById('Location_text').addEventListener('keyup',
                            function handleChange(teama) {

                                var data = {
                                    'searchvalue': teama.target.value
                                }

                                $.ajax({
                                    type: "POST",
                                    url: "/home/searchlocation",
                                    data: data,
                                    dataType: "json",

                                    success: function(result) {
                                        console.log(result);

                                        $('#locationck').html('');
                                        var options = '';

                                        for (var i = 0; i < result.data.length; i++) {
                                             var data=result.data[i];
                                          options += '<div class="jp_checkbox" ><input type="checkbox" name="s1" value="'+data.name+'" id="'+i+'"  /><label ="'+i+'">'+data.state+','+data.name+','+data.locality+'</label></div>';

                                            // option += '<label for = "" > ' + result.data[i].name + '' +
                                            //     result.data[i].locality +
                                            //     '</label>';
                                        }
                                        $('#locationck').append(options);
                                    }
                                });

                            });
                        </script>
                        </script>
                                                <script>
                        document.getElementById('searchdesignation').addEventListener('keyup',
                            function handleChange(teama) {

                                var data = {
                                    'searchvalue': teama.target.value
                                }

                                $.ajax({
                                    type: "POST",
                                    url: "/home/designation_search",
                                    data: data,
                                    dataType: "json",

                                    success: function(result) {
                                        console.log(result);

                                        $('#designationsearch').html('');
                                        var options = '';

                                        for (var i = 0; i < result.data.length; i++) {
                                             var data=result.data[i];
                                          options += '<div class="jp_checkbox" ><input type="checkbox" name="s1" value="'+data.name+'" id="'+i+'"  /><label ="'+i+'">'+data.name+'</label></div>';

                                            // option += '<label for = "" > ' + result.data[i].name + '' +
                                            //     result.data[i].locality +
                                            //     '</label>';
                                        }
                                        $('#designationsearch').append(options);
                                    }
                                });

                            });
                        </script>
                                                <script>
                        document.getElementById('searchqueli').addEventListener('keyup',
                            function handleChange(teama) {

                                var data = {
                                    'searchvalue': teama.target.value
                                }

                                $.ajax({
                                    type: "POST",
                                    url: "/home/qualifaction_search",
                                    data: data,
                                    dataType: "json",

                                    success: function(result) {
                                        console.log(result);

                                        $('#quelisearch').html('');
                                        var options = '';

                                        for (var i = 0; i < result.data.length; i++) {
                                             var data=result.data[i];
                                          options += '<div class="jp_checkbox" ><input type="checkbox" name="s1" value="'+data.name+'" id="'+i+'"  /><label ="'+i+'">'+data.name+'</label></div>';

                                            // option += '<label for = "" > ' + result.data[i].name + '' +
                                            //     result.data[i].locality +
                                            //     '</label>';
                                        }
                                        $('#quelisearch').append(options);
                                    }
                                });

                            });
                        </script>
                        </script>
                                                <script>
                        document.getElementById('searchexp').addEventListener('keyup',
                            function handleChange(teama) {

                                var data = {
                                    'searchvalue': teama.target.value
                                }

                                $.ajax({
                                    type: "POST",
                                    url: "/home/experience_search",
                                    data: data,
                                    dataType: "json",

                                    success: function(result) {
                                        console.log(result);

                                        $('#expsearch').html('');
                                        var options = '';

                                        for (var i = 0; i < result.data.length; i++) {
                                             var data=result.data[i];
                                          options += '<div class="jp_checkbox" ><input type="checkbox" name="s1" value="'+data.name+'" id="'+i+'"  /><label ="'+i+'">'+data.name+'</label></div>';

                                            // option += '<label for = "" > ' + result.data[i].name + '' +
                                            //     result.data[i].locality +
                                            //     '</label>';
                                        }
                                        $('#expsearch').append(options);
                                    }
                                });

                            });
                        </script>
