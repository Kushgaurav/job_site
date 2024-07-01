/*
Copyright (c) 2017 JobPortal
------------------------------------------------------------------
[Master Javascript]

Project:	JobPortal

-------------------------------------------------------------------*/
var b_url = $('#b_url').val();
(function ($) {
	"use strict";
	var JobPortal = {
		initialised: false,
		version: 1.0,
		mobile: false,
		init: function () {

			if(!this.initialised) {
				this.initialised = true;
			} else {
				return;
			}

			/*-------------- JobPortal Functions Calling ---------------------------------------------------
			------------------------------------------------------------------------------------------------*/
			this.RTL();
			this.PopUps();
			this.SidebarOpen();
			
		},
		
		/*-------------- JobPortal Functions definition ---------------------------------------------------
		---------------------------------------------------------------------------------------------------*/
		RTL: function () {
			// On Right-to-left(RTL) add class 
			var rtl_attr = $("html").attr('dir');
			if(rtl_attr){
				$('html').find('body').addClass("rtl");	
			}		
        },
      
	  PopUps: function(){
            $('.jp_popup_link').on('click', function(e){
				e.preventDefault();
                $('body').addClass('popup_open');
            });
            $('.jp_popup_close').on('click', function(){
                $('body').removeClass('popup_open');
            });
        },
		
		
        SidebarOpen: function(){
			$('.jp_nav_toggle').on('click', function(){
				$('body').removeClass('jp_cat_sidebar_open');
				$('body').toggleClass('jp_sidebar_open');
			});
			$('.jp_category_toggle').on('click', function(){
				$('body').removeClass('jp_sidebar_open');
				$('body').toggleClass('jp_cat_sidebar_open');
			});
			$('.jp_sidebar_close').on('click', function(){
				$('body').removeClass('jp_sidebar_open');
				$('body').removeClass('jp_cat_sidebar_open');
			});
            
        },
		BackToTop: function(){
			//Goto Top
			$(window).scroll(function() {
				if ($(this).scrollTop() > 100) {
					$("#jp_backToTop").addClass('btt_show')
				} else {
					$("#jp_backToTop").removeClass('btt_show')
				}
			});
			$("#jp_backToTop").on("click", function() {
				$("html, body").animate({
					scrollTop: 0
				}, 600);
				return false
			});
		}
		
		
	};

	// Load Event
	$(window).on('load', function() {
		$(".jp_loading_wrapper").delay(350).fadeOut("slow");
		
		var body_h = window.innerHeight;
		$('body').css('height',body_h);
		
		// add class on body
		setTimeout(function(){
			$('body').addClass('jp_site_loaded');
		},1000);
	});

	// Resize Event
	$(window).on('resize', function () {
		var body_h = window.innerHeight;
		$('body').css('height',body_h);
	});
	
	$(window).on('scroll', function () {
		
	});
	
	
	// ready function
	$(document).ready(function() {
		JobPortal.init();
		JobPortal.BackToTop();
	});
	
	
})(jQuery);
function reating()
{
	$('body').addClass('popup_open');
}
function add_review()
{
	var comment=$('#rat_comment').val();
	var rat_rating=$('#rat_rating').val();
	var recruiter_email=$('#recruiter_email').val();
	var seeker_email=$('#seeker_email').val();
	if(comment=='')
	 alert('Enter Comment')
   else if(rat_rating=='')
	   alert('select star')
   else
   {
	   $.post('../../star_reating',{'rat_rating':rat_rating,'comment':comment,'seeker_email':seeker_email,'recruiter_email':recruiter_email},function(data){
		   if(data.match('insert'))
			   $('#jp_view_user').hide();
		   else
			   alert('data not insert')
	   });
   }
}
function review_show(email)
{
	setInterval(function(){ 
		$.post('../../review_show',{'email':email},function(data){
			$('#star').html(data);
		})
	}, 200);
}
function applied_user(email,mno,add,qua,loc,jt,name,img)
{
	$('#pemail').text(email);
	$('#pmno').text(mno);
	$('#padd').text(add);
	$('#pqua').text(qua);
	$('#ploc').text(loc);
	$('#pjt').text(jt);
	$('#pname').text(name);
	$('#pimg').attr("src",img);
	//$('#pemail').text(email);
	$('body').addClass('popup_open');
	
	
}
//language function start
function validation_language_change(key,type)
{
	if(type=='ok')
	{
		  var data=$(key).val();
		  $('.msg').addClass('alert_open');
          $('.msg').addClass('jp_success');
		  $(".ng-binding").text(data);
		  setTimeout(function(){ $('.msg').removeClass('alert_open'); }, 3000);
          setTimeout(function(){ $('.msg').removeClass('jp_success'); }, 3300);
	}
	else
	{
		$('document').ready(function(){
		  var data=$(key).val();
		  $('.msg').addClass('alert_open');
          $('.msg').addClass('jp_error');
		  $(".ng-binding").text(data);
		  setTimeout(function(){ $('.msg').removeClass('alert_open'); }, 3000);
          setTimeout(function(){ $('.msg').removeClass('jp_error'); }, 3300);
	     });
	}
}
//language js end
//authentication js start
//Sign Up seekr or  Recruiter
$('document').ready(function(){
	$('#reg_btn').click(function(){
		var select_option=$('.s:checked').val();
		var email=$('#email').val();
		var name=$('#name').val();
		var mno=$('#mno').val();
		var ps=$('#ps').val();
		var rps=$('#rps').val();
		if(select_option=="seeker")
		{
			if(email=="")
				validation_language_change('#email_empty','err');
			else if(name=="")
				validation_language_change('#name_empty','err');
			else if(mno=="")
				validation_language_change('#mno_empty','err');
			else if(ps=="")
				validation_language_change('#ps_empty','err');
			else if(rps=="")
					validation_language_change('#cps_empty','err');
			else if(!email.match(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/))
				validation_language_change('#valid_email','err');
			else if(ps.length<5)
				validation_language_change('#ps_short','err');
			else if(rps.length<5)
				validation_language_change('#ps_short','err');
			else if(!$.isNumeric(mno))
				validation_language_change('#valid_mno','err');
			else if(rps!=ps)
				validation_language_change('#not_match','err');
			else
			{
				$('.message').hide();
				$.ajax({
				type:'POST',
				url:'signUp/seeker',
				data:new FormData($("#f1")[0]),
				contentType:false,
				processData:false,
				success:function(fb)
				    {
						if(fb.match('eyes'))
							validation_language_change('#eyes','err');
						else if(fb.match('Ok'))
							window.location.href="login";
						else
							validation_language_change('#myes','err');
					}
					
					
				})
			}
		}
		else if(select_option=="Recruiter")
		{
			if(email=="")	
				validation_language_change('#email_empty','err');
			else if(name=="")
				validation_language_change('#name_empty','err');
			else if(mno=="")
				validation_language_change('#mno_empty','err');
			else if(ps=="")
				validation_language_change('#ps_empty','err');
			else if(rps=="")
				validation_language_change('#cps_empty','err');
			else if(!email.match(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/))
				validation_language_change('#valid_email','err');
			else if(ps.length<5)
				validation_language_change('#ps_short','err');
			else if(!$.isNumeric(mno))
				validation_language_change('#valid_mno','err');
			else if(rps!=ps)
				validation_language_change('#not_match','err');
			else
			{
				$.ajax({
				type:'POST',
				url:'signUp/recruiter',
				data:new FormData($("#f1")[0]),
				contentType:false,
				processData:false,
				success:function(fb){				
					if(fb.match('eyes'))
						validation_language_change('#eyes','err');
					else if(fb.match('pay'))
						window.location.href='revenue_plans';
					else if(fb.match('Ok'))
						window.location.href="login";
					else
						validation_language_change('#myes','err');
				}

			   })
			}
			
		}
	});	
	//Login seeker or Recruiter
	$('#lbtn').click(function(){
		var r=$('.r:checked').val();
		var $email=$('#email').val();
		var $ps=$('#ps').val();
		var remember=$("input[name='remember']:checked").val();
		if($email=='')
			validation_language_change('#email_empty','err');
		else if(!$email.match(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/))
			validation_language_change('#valid_email','err');
		else if($ps=='')
			validation_language_change('#ps_empty','err');
		else if($ps.length<5)
			validation_language_change('#ps_short','err');
		else if(r=="Seeker")
		{
			$.post('login1/seeker',{'email':$email,'ps':$ps,'remember':remember},function(fb){
				if(fb.match('ve'))
					validation_language_change('#email_veri','err');
				else if(fb.match('right'))
					window.location.href="../";
				else if(fb.match('y_ac_dis'))
					validation_language_change('#account_dis','err');
				else 
					validation_language_change('#not_match','err');
			})
		}
		else if(r=="Recruiter")
		{
			$.post('login1/recruiter',{'email':$email,'ps':$ps},function(fb){
				if(fb.match('ve'))
					validation_language_change('#email_veri','err');
				else if(fb.match('right'))
					window.location.href="../recruiter";
				else if(fb.match('y_ac_dis'))
					validation_language_change('#account_dis','err');
				else if(fb.match('pay'))
					window.location.href='revenue_plans';
				else 
					validation_language_change('#not_match','err');
			})
		
		}
		else
			validation_language_change('Please Select Radiio Button');
	});
	
	//Forget Password seeker or Recruiter
	$('#forget_ps_btn').click(function(){
		var s1=$('input[name=s1]:checked').val();
		var email=$('#email_forget').val();
		if(email=='')
			validation_language_change('#email_empty','err');
		else if(!email.match(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/))
			validation_language_change('#valid_email','err');
		else if(s1.match('Seeker'))
		{
			$.post('forgot_password/seeker',{'email':email},function(data){
				if(data.match('Pssword_Change'))
				{
					validation_language_change('#ps_send','ok');
					 $('.jp_popup_wrapper').hide();

				
				}
				else
					validation_language_change('#ps_not_send','err');
			})
		}
		else if(s1.match('Recruiter'))
		{
			$.post('forgot_password/recruiter',{'email':email},function(data){
				if(data.match('Pssword_Change'))
				{
					validation_language_change('#ps_send','ok');
					$('.jp_popup_wrapper').hide();
				    setTimeout(function(){ $('.msg').removeClass('alert_open'); }, 3000);
		            setTimeout(function(){ $('.msg').removeClass('jp_success'); }, 3300);
				}
				else
					validation_language_change('#ps_not_send');
			})
		}
	});
	//authentication js end
	//Filter relared Js start
	$('#loc_text').keyup(function(){
		var data=$('#loc_text').val();
		data_length=data.length;
		$.post('Home/filter/location',{'search_txt':data},function(data1){
			$('#loc_data').html(data1);
		})
	});
	$('body').click(function(){
		$('#key_res').hide();
	});
	
	//Left Filter
	$('input:checkbox').click(function(){
			var s1 = new Array();
			$('input[name="s1"]:checked').each(function() {
			s1.push(this.value);
			});
			if(s1.length>0)
			{
			/*$.ajax({ 
				   type: "POST", 
				   url: "Home/search_left_f", 
				   data: { d1 : s1}, 
				   success: function(data) { 
						$('#se_res').html(data)  
					} 
			});*/
				function fetch_filter_data1(page)
					{
							  $.ajax({
							   type: "GET",
							   url:"index.php/Home/search_left_f/"+page,
							   data: { d1 : s1},
							   success:function(data)
							   {
									 $('#se_res').html(data);
									 $('#pl').html(data);
									 //alert(data)
							   }
							  });
							 
					}
				
				fetch_filter_data1(1); 
				 $(document).on("click", ".pagination li a", function(event){
				  event.preventDefault();
				  var page = $(this).data("ci-pagination-page");
				  fetch_filter_data1(page);
				})
			}
			else
			{
				function load_country_data(page)
				 {
				  $.ajax({
				   url:"index.php/Home/pagination/"+page,
				   method:"GET",
				   success:function(data)
				   {
					$('#se_res').html(data);
				   }
				  });
				 }
				 
				 load_country_data(1);

				 $(document).on("click", ".pagination li a", function(event){
				  event.preventDefault();
				  var page = $(this).data("ci-pagination-page");
				  load_country_data(page);
				 });
			}
	});	
	//Search Field
	$('#key_res').hide();
		$("#search_txt").keyup(function(){
				var data1=$('#search_txt').val();
				if(data1.length>1)
				{
					$.post('Home/search_text2',{'search_txt':data1},function(data){
						$('#key_res').show();
						$('#key_res').html(data);
					});
					
				}
				else
				{
					$('#key_res').hide();
				}
		});
		$('#sbtn').click(function(){
		var data=$('#search_txt').val();
		function fetch_filter_data(page)
		{
			  $.ajax({
			   type: "GET",
			   url:"index.php/Home/search_text/"+page,
			   data: { search_txt : data},
			   success:function(data)
			   {
				$('#se_res').html(data);
			   $('#pl').html(data);
			   }
			  });
		}
		 
		 fetch_filter_data(1);
		 
		 $(document).on("click", ".pagination li a", function(event){
		  event.preventDefault();
		  var page = $(this).data("ci-pagination-page");
		  fetch_filter_data(page);
		 });
	 });
	
	$('#search_txt').keyup(function (e) {
			    if (e.keyCode === 13) {
			       var data=$('#search_txt').val();
						function fetch_filter_data(page)
						 {
						  $.ajax({
						   type: "GET",
						   url:"index.php/Home/search_text/"+page,
						   data: { search_txt : data},
						   success:function(data)
						   {
							$('#se_res').html(data);
						   $('#pl').html(data);
						   }
						  });
						 }
						 
				 fetch_filter_data(1);
				 
				 $(document).on("click", ".pagination li a", function(event){
				  event.preventDefault();
				  var page = $(this).data("ci-pagination-page");
				  fetch_filter_data(page);
				 });
			    }
			  });
	//Filter relared Js end
	//user Operation related js start
	$('.datepicker').datepicker({
			    format: 'yyyy-mm-dd',
			    
	});
	$('.datepicker1').datepicker({
			    format: 'yyyy-mm-dd',
				startDate: '-0d'
			    
	});
	$('.datepicker_pyear').datepicker({
			    format: 'yyyy-mm-dd',
				endDate: '+0d'
			    
	});
	$('.datepicker_pyear1').datepicker({
			    format: 'yyyy-mm-dd',
				endDate: '+365d'
			    
	});
	//User Profile Update
	$('#proup_btn').click(function(){
		var name = $('#name').val();
		var mno = $('#mno').val();
		var curent_address = $('#curent_address').val();
		var p_year = $('#p_year').val();
		var re = $('#re').val();
		var p_location = $('#p_location').val();
		var qua = $('#qua').val();
		var aofs = $('#aofs').val();
		var ps = $('#ps').val();
		var rps = $('#rps').val();
		var counter1 = $('#counter1').val();
		var ps_reserve=$('#ps_reserve').val();
		var filter = /^[0-9-+]+$/;
		if(name=="")
			validation_language_change('#name_empty','err');
		else if(mno=="")
			validation_language_change('#mno_empty','err');
		else if(p_location=="select")
			validation_language_change('#p_loc_select','err');
		else if(qua=="select")
			validation_language_change('#qua_select','err');
		else if(aofs=="select")
			validation_language_change('#aofs_select','err');
		else if(!filter.test(mno))
			validation_language_change('#valid_mno','err');
		else if(curent_address=="")
			validation_language_change('#c_add_empty','err');
		else if(p_year=="")
			validation_language_change('#p_year_empty','err');
	
		else if(ps!=rps && ps_reserve=='')
				validation_language_change('#ps_not','err');
		else if(ps.length<5 && ps_reserve=='')
			validation_language_change('#ps_short','err');
		else if(ps!=rps && ps!='')
				validation_language_change('#ps_not','err');
		else if(ps.length<5 && ps!='')
			validation_language_change('#ps_short','err');
		else if(!$.isNumeric(mno))
			validation_language_change('#valid_mno','err');
		else if(!$.isNumeric(cgpa))
			validation_language_change('#valid_cgpa','err');
		else if(counter1==0 && re=="")
				validation_language_change('#select_resume_file','err');
		else
		{
			$('.message').hide();
			$.ajax({
				type:'POST',
				url:'profile_update',
				data:new FormData($("#f1")[0]),
				contentType:false,
				processData:false,
				success:function(fb){
					if(fb.match('Update'))
					{
						validation_language_change('#profile_update','ok');
					    setTimeout(function(){ window.location.href="user_profile"; }, 3000);
					   
					}
					else
					{
						$('.msg').addClass('alert_open');
						$('.msg').addClass('jp_error');
						$(".ng-binding").text('Uploaded file is not a valid resume file. Only PDF and DOC files are allowed');
						$('#re').val('');
					}
				}
			})
		}
		setTimeout(function(){ $('.msg').removeClass('alert_open'); }, 3000);
        setTimeout(function(){ $('.msg').removeClass('jp_error'); }, 3300);
		});	
		$('#rec_pro_pic_upload').click(function(){
			$.ajax({
				type:'POST',
				url:'recruiter_pic_update/recruiter',
				data:new FormData($("#r_pro_pic")[0]),
				contentType:false,
				processData:false,
				success:function(fb){
					if(fb.match('Upload'))
						window.location.href="recruiter_profile";
					else if(fb.match('jpg_png'))
						validation_language_change('#jpg_png','err');
					else
						validation_language_change('#pro_pic_not_up','err');
				}
			});
			setTimeout(function(){ $('.msg').removeClass('alert_open'); }, 3000);
			setTimeout(function(){ $('.msg').removeClass('jp_error'); }, 3300);
		});	
//user Operation related js end
//payment_getway related js start
$('#payu').click(function(){
		var id=$('#p_id').val();
		$.post('../payum',{'id':id},function(res){
			$('#form').html(res);
			$('#payuForm1').submit();
		})
		
	});
$('#paypal').click(function(){
	var id=$('#p_id').val();
	$.post('../paypal',{'id':id},function(res){
		$('#form').html(res);
		$('#payuForm').submit();
	})
});
//payment_getway related js end
});
//user_profile pic upload strat
function user_image_upload()
{
		$.ajax({
				type:'POST',
				url:'pro_pic_upload/seeker',
				data:new FormData($("#f2")[0]),
				contentType:false,
				processData:false,
				success:function(fb){
					if(fb.match('ok'))
						window.location.href="user_profile";
					else
					{
						$('.msg').show();
						$('.msg').addClass('alert_open');
		            	$('.msg').addClass('jp_error');
						$('.msg').addClass('alert_open');
						$(".ng-binding").text(fb);
						setTimeout(function(){ $('.msg').removeClass('alert_open'); }, 5000);
		                setTimeout(function(){ $('.msg').removeClass('jp_error'); }, 5500);
					}
					}
			})
}
//user_profile pic upload strat

$('document').ready(function(){
	setTimeout(function(){ $('.msg').removeClass('alert_open'); }, 3000);
    setTimeout(function(){ $('.msg').removeClass('jp_error'); }, 3300);
	 $('.datepicker').datepicker({
			    format: 'yyyy-mm-dd',	    
	 });
	 $('#pbtn').click(function(){
		var year_of_passing = $('#year_of_passing').val();
		// var per_cgpa = $('#per_cgpa').val();
		var number_of_vacancies = $('#number_of_vacancies').val();
		
		var min = $('#min').val();
		min=parseInt(min);
		var max = $('#max').val();
		max=parseInt(max);
		var job_desc = $('#job_desc').val();
		var job_type = $('#job_type').val();
		var designation = $('#designation').val();
		var qualification=$('#qualification').val();
		var job_location=$('#job_location').val();
		var specialization=$('#specialization').val();
		var area_of_s=$('#area_of_sector').val();
		
		var salary_range=$('#salary_range').val();
		if(year_of_passing=="")
			validation_language_change('#pyear_empty','err');
		else if(job_type=="select")
			validation_language_change('#job_type_empty','err');
		else if(designation=="select")
			validation_language_change('#desi_empty','err');
		else if(job_location=="select")
			validation_language_change('#loc_empty','err');
		else if(qualification=="select")
			validation_language_change('#q_empty','err');
		else if(specialization=="select")
			validation_language_change('#sp_empty','err');
		else if(area_of_s=="select")
			validation_language_change('#aofs_empty','err');
		
		else if(salary_range=="select")
			validation_language_change('#s_range_empty','err');
		
		else if(number_of_vacancies=="")
			validation_language_change('#num_v_empty','err');
		
		
		else if(job_desc=="")
			validation_language_change('#j_desc_empty','err');
		else if(min=="")
			validation_language_change('#min_selary_empty','err');
		else if(max=="")
			validation_language_change('#maxs_empty','err');
		else if(min>=max)
			validation_language_change('#min_less_max','err');
		else if(!$.isNumeric(min))
		{ 
			  $('.msg').addClass('alert_open');
			  $('.msg').addClass('jp_error');
			  $(".ng-binding").text("Minimun salary only number allow");
			  setTimeout(function(){ $('.msg').removeClass('alert_open'); }, 3000);
			  setTimeout(function(){ $('.msg').removeClass('jp_error'); }, 3300);
		}
		else if(!$.isNumeric(max))
			validation_language_change('#max_selary_num','err');
		else if(!$.isNumeric(per_cgpa))
			validation_language_change('#invelid_cpga','err');
		else
		{
			$('.message').hide();
				$.ajax({
				type:'POST',
				url:'job_post',
				data:new FormData($("#f1")[0]),
				contentType:false,
				processData:false,
				success:function(fb){
					if(fb.match('pay_limit'))	
						validation_language_change('#job_post_limit_out','err');
					else if(fb.match('pay_ex'))	
						validation_language_change('#plan_exp','err');
					else if(fb.match('Insert'))
					{
						$('#year_of_passing').val("");
						$('#per_cgpa').val("");
						$('#number_of_vacancies').val("");
						
						$('#min').val("");
						$('#max').val("");
						$('#number_of_vacancies').val("");
						validation_language_change('#job_post_success','ok');
					}
					else if(fb.match('profile_update'))
						window.location.href="recruiter_profile";
					else
						validation_language_change('#job_not_post','err');					
				}
			})
		}	
		setTimeout(function(){ $('.msg').removeClass('alert_open'); }, 7000);
        setTimeout(function(){ $('.msg').removeClass('jp_error'); }, 7300);
	});
	
	
	$('#post_update_btn').click(function(){
		var year_of_passing = $('#year_of_passing').val();
		var per_cgpa = $('#per_cgpa').val();
		var number_of_vacancies = $('#number_of_vacancies').val();
		
		var min = $('#min').val();
		min=parseInt(min);
		var max = $('#max').val();
		max=parseInt(max);
		var job_desc = $('#job_desc').val();
		
		
		
		var job_type = $('#job_type').val();
		var designation = $('#designation').val();
		var qualification=$('#qualification').val();
		var job_location=$('#job_location').val();
		var specialization=$('#specialization').val();
		var area_of_s=$('#area_of_sector').val();
		
		var salary_range=$('#salary_range').val();
		if(year_of_passing=="")
			validation_language_change('#pyear_empty','err');
		
		
		else if(number_of_vacancies=="")
			validation_language_change('#num_v_empty','err');
		
		else if(job_desc=="")
			validation_language_change('#j_desc_empty','err');
		else if(min=="")
			validation_language_change('#min_selary_empty','err');
		else if(max=="")
			validation_language_change('#maxs_empty','err');
		else if(min>=max)
			validation_language_change('#min_less_max','err');
		else if(!$.isNumeric(min))
			validation_language_change('#min_selary_num','err');
		else if(!$.isNumeric(max))
			validation_language_change('#max_selary_num','err');
		else if(!$.isNumeric(per_cgpa))
			validation_language_change('#invelid_cpga','err');
		else
		{
			$('.message').hide();
				$.ajax({
				type:'POST',
				url:'update_job_post',
				data:new FormData($("#f1")[0]),
				contentType:false,
				processData:false,
				success:function(fb){
					if(fb.match('update'))
						validation_language_change('#job_post_success1','ok');
					else
						validation_language_change('#job_not_up','err');
				}
			})
		}
		setTimeout(function(){ $('.msg').removeClass('alert_open'); }, 5000);
        setTimeout(function(){ $('.msg').removeClass('jp_error'); }, 3300);
		setTimeout(function(){ $('.msg').removeClass('jp_success'); }, 5500);
	});
	$('#req_profile_btn').click(function(){
		var loc=$('#location').val();
		var address=$('#address').val();
		var website=$('#website').val();
		var desc=$('#desc').val();
		var url_pattern=/^(http(s)?:\/\/)?(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
		if(loc=="")
			validation_language_change('#loc_empty','err');
		else if(address=="")
			validation_language_change('#address_empty','err');
		else if(website=="")
			validation_language_change('#website_empty','err');
		else if(!url_pattern.test(website))
			validation_language_change('#valid_website','err');
		else if(desc=="")
			validation_language_change('#desc_empty','err');
		else
		{
			$.ajax({
				type:'POST',
				url:'recruiter_profile_update/recruiter',
				data:new FormData($("#f1")[0]),
				contentType:false,
				processData:false,
				success:function(fb){
				if(fb.match('Update'))
				{
					validation_language_change('#update','ok');
					setTimeout(function(){ window.location.href="recruiter_profile"; }, 4300);
				}
					else{
						validation_language_change('#jpg_png','err');
						setTimeout(function(){ $('.msg').removeClass('alert_open'); }, 5000);
		                setTimeout(function(){ $('.msg').removeClass('jp_error'); }, 5500);
					}
				}
			})
		}
	});
});
function create_c()
{
		var d = new Date()
		d2=d.setTime((3600 * 10 * 24 * 365));
		var expires = "expires="+ d2;
		document.cookie = "aa" + "=" + "yes" + ";" + expires + ";path=/";
		$('.jp_cookie_message').hide();
		
}
function read_cookie()
{
	 cookie_data=$.cookie('aa');
	 if(cookie_data)
	 {
		$('.jp_cookie_message').hide();	
	 }
	 else
	 {
		$('.jp_cookie_message').show();
	 }
	 
}

function contect_us_send()
{
	var name=$('#name').val();
	var mno=$('#mno').val();
	var subject=$('#subject').val();
	var msg=$('#msg').val();
	if(name=='')
	{
		validation_language_change('#validation_name_empty','err');
	}
	else if(mno=='')
	{
		validation_language_change('#validation_mno_empty','err');
	}
	else if(!$.isNumeric(mno))
	{
		validation_language_change('#validation_valid_mno','err');
	}
	else if(subject=='')
	{
		validation_language_change('#sub_empty','err');
	}
    else if(msg=='')
	{
		validation_language_change('#msg_empty','err')
	}
	else
	{
		$.ajax({
				type:'POST',
				url:'contect_us_update',
				data:new FormData($("#contect_form")[0]),
				contentType:false,
				processData:false,
				success:function(fb){
				if(fb.match('Update'))
				{
					validation_language_change('#msg_send','ok');
					$('#name').val('');
					$('#mno').val('');
					$('#subject').val('');
					$('#msg').val('');
				}
					else{
						validation_language_change('#msg_not_send','err');
						setTimeout(function(){ $('.msg').removeClass('alert_open'); }, 5000);
		                setTimeout(function(){ $('.msg').removeClass('jp_error'); }, 5500);
					}
				}
			})
	}
	setTimeout(function(){ $('.msg').removeClass('alert_open'); }, 5000);
    setTimeout(function(){ $('.msg').removeClass('jp_error'); }, 5500);
}

function close_cookie_pop()
{
	$('.jp_cookie_message').hide();
}
function rec_job_filter()
{
	var search_txt=$('#search_txt1').val();
	$.post('recruiter/text_filter',{'search_text':search_txt},function(data){
// 		$('#se_res').html(data);
	});
}
function google_login(url)
{
	var data=$("input[name='login_option']:checked").val();
	if(data=='Seeker')
	{
		$.post('set_session',{'type':'seeker','url':url},function(data){
			window.location.href=url;
		});
	}
	else if(data=='seeker')
	{
		$.post('set_session',{'type':'seeker','url':url},function(data){
			window.location.href=url;
		});
	}
	else if(data=='Recruiter')
	{
		$.post('set_session',{'type':'recruiter','url':url},function(data){
			window.location.href=url;
		});
	}
}
$('#search_txt1').keyup(function (e) {
			    if (e.keyCode === 13) {
			       var search_txt=$('#search_txt1').val();
					$.post('recruiter/text_filter',{'search_text':search_txt},function(data){
						$('#se_res').html(data);
					});
			    }
			  });

//RECRUITER Operation related js end