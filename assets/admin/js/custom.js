function success_msg(msg)
{
		$('.msg').addClass('open_alert hs_success');
     	$(".err_msg").text(msg);
}
function error_msg(msg)
{
		$('.msg').addClass('open_alert hs_error');
     	$(".err_msg").text(msg);
}
function plan_hide()
{
	$('#plans').hide();
	$('#mon').hide();
	
}
function plan_show()
{
	$('#plans').show();
	$('#mon').show();
	
}
$(document).ready(function(){
	$('#p_no').click(function(){
		alert('gbf')
	});
	setTimeout(function(){ $('.msg').removeClass('open_alert hs_success hs_error'); }, 3000);
	setTimeout(function(){ $('.msg1').removeClass('open_alert hs_success hs_error'); }, 3000);
	
	if($('.datepicker').length){
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd'
		});
		
	}
	
	$('#seeker_add').click(function(){
		var name=$('#name').val();
		var email=$('#email').val();
		var mno=$('#mno').val();
		var ps=$('#ps').val();
		var rps=$('#rps').val();
		if(email=="")
				error_msg('Enter seeker email');	
		else if(name=="")
			error_msg('Enter seeker name');
		else if(mno=="")
			error_msg('Enter mobile number');
		else if(ps=="")
			error_msg('Enter a password');
		else if(rps=="")
			error_msg('Enter confirm password');
		else if(!email.match(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/))
			error_msg('Enter a valid email address');
		else if(ps.length<5)
			error_msg('Password is short');
		else if(!$.isNumeric(mno))
			error_msg('Enter a valid mobile number');
		else if(rps!=ps)
			error_msg('Your password do not match. please try again');
		else
		{
			$.ajax({
			type:'POST',
			url:'signUp/seeker',
			data:new FormData($("#f1")[0]),
			contentType:false,
			processData:false,
			success:function(fb){
				if(fb.match('eyes'))
					error_msg('E-Mail already exists');
				else if(fb.match('Ok'))
				{
					success_msg('Seeker registered successfully please wait');
					setInterval(function(){ window.location.href='seekers'; }, 4000);
				}
				else
					error_msg('Mobile number already exists');				
			}

		})
		}
	});
	$('#rec_add').click(function(){
		var name=$('#name').val();
		var email=$('#email').val();
		var mno=$('#mno').val();
		var ps=$('#ps').val();
		var plan=$('#plan').val();
		var rps=$('#rps').val();
		if(name=="")
			 error_msg('Enter recruiter name');
		else if(email=="")
				error_msg('Enter recruiter email');
		else if(mno=="")
			error_msg('Enter mobile number');
		else if(ps=="")
			error_msg('Enter a password');
		else if(rps=="")
			error_msg('Enter confirm password');
		else if(plan=="select")
			error_msg('Select plan');
		else if(!email.match(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/))
			error_msg('Enter a valid email address');
		else if(ps.length<5)
			error_msg('Password is short');
		else if(!$.isNumeric(mno))
			error_msg('Enter a valid mobile number');
		else if(rps!=ps)
			error_msg('Your password do not match. please try again');
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
				error_msg('E-Mail already exists');
			else if(fb.match('Ok'))
			{
				success_msg('Recruiter registered successfully please wait');
				setInterval(function(){ window.location.href='recruiters'; }, 4000);
			}
			else
				error_msg('Mobile number already exists');	
			}       
		   })
		}
	});
	$('#update_rec').click(function(){
		
	});
	//Site Genral Setting Start
	
	$('#img_up_btn').click(function(){
		$.ajax({
				type:'POST',
				url:'setting',
				data:new FormData($("#img_upload")[0]),
				contentType:false,
				processData:false,
				success:function(fb){
				if(fb.match('update'))
				{
					success_msg('File Updated successfully please wait');
					setInterval(function(){ window.location.href="website_setting"; }, 3000);
				}
				else
					error_msg(fb);
				}
			}) 
	});
	$('#update_cre').click(function(){
		var pass=$('#pass').val();
		var cps=$('#cps').val();
		var old_ps=$('#old_ps').val();
		if(old_ps=='')
			error_msg('Enter old password');
		else if(pass=="")
			error_msg('Enter new password');
		else if(cps=='')
			error_msg('Enter confirm password');
		else if(pass.length<5)
			error_msg('Password length must be of 6-10');
		else if(cps.length<5)
			error_msg('Confirm password length must be of 6-10');
		else if(pass!=cps)
			error_msg('Your password do not match. please try again');
		else
		{
			$.ajax({		
			type:'POST',	
			url:'credentials_update',	
			data:new FormData($("#credentials_update_form")[0]),	
			contentType:false,	
			processData:false,		
			success:function(fb){	
				if(fb.match('Update'))
					success_msg('Admin credentials updated');
				else if(fb.match('psn'))
					error_msg('Old password not match');
				else
					error_msg(fb);
			}		
		    })
		}
		
	});
	$('#meta_btn1').click(function(){
		var title=$('#title').val();
		var author=$('#title').val();
		var description=$('#description').val();
		var copyright=$('#copyright').val();
		var kw=$('#kw').val();
		if(title=='')
			error_msg('Enter title');
		else if(author=='')
			error_msg('Enter author name');
		else if(description=='')
			error_msg('Enter description');
		else if(kw=='')
			error_msg('Enter Keyword');
		else if(copyright=='')
			error_msg('Enter copyright');
		else
		{
			$.ajax({		
			type:'POST',	
			url:'meta_information',	
			data:new FormData($("#f1")[0]),	
			contentType:false,	
			processData:false,		
			success:function(fb){		
				if(fb.match('Insert'))		
				{
					success_msg('Meta information updated successfully please wait');
					setInterval(function(){ window.location.href='website_setting'; }, 4000);	
				}	
				else	
					error_msg('Meta information not updated');
			}		
		  })
		}	
});		
//Location Insert And Update Strat
	$('#loc').click(function(){
		var name=$('#name1').val();	
		if(name=='')	
		error_msg('Enter location');
		else
		{
			$.ajax({
				type:'POST',
				url:'add/location',
				data:new FormData($("#f1")[0]),	
				contentType:false,	
				processData:false,		
				success:function(fb){	
					if(fb.match('insert'))		
					{
					   success_msg('Location added successfully please wait');
					   setInterval(function(){ window.location.href='location'; }, 4000);		
					}	
					else if(fb.match('already_exists'))
						error_msg('This Location Already exists ');
					else	
						error_msg('Location not added');					
			  }			
			})		
		}
	});				
	$('#loc_update').click(function(){	
		var name=$('#name').val();	
		if(name=='')		
			error_msg('Enter location');		
		else 	
		{			
			$.ajax({	
			type:'POST',		
			url:'update_data',		
			data:new FormData($("#f2")[0]),			
			contentType:false,			
			processData:false,				
			success:function(fb){				
				if(fb.match('update'))			
				{
					success_msg('Location updated successfully please wait');
					setInterval(function(){ window.location.href="location"; }, 3000);	
				}			
				else				
					error_msg('Location not updated');
			}		
			})		
		}	
    });
	//Location Insert And Update Strat
	$('#add_aofs').click(function(){	
		var name=$('#name1').val();
		if(name=='')	
			error_msg('Enter area of sector');	
		else 
		{	
			$.ajax({	
			type:'POST',
			url:'add/area_of_sectors',	
			data:new FormData($("#f1")[0]),	
			contentType:false,	
			processData:false,			
			success:function(fb){				
				if(fb.match('insert'))	
				{
					success_msg('Area of sectors added successfully please wait');
					setInterval(function(){ window.location.href='area_of_sectors'; }, 4000);	
				}	
				else if(fb.match('already_exists'))
						error_msg('This Area Of Sector Already exists ');
				else			
					error_msg('Area of sectors not added');						
			}	
			})	
		}
	});
	$('#update_aofs').click(function(){		
		var name=$('#name').val();
		if(name=='')
			error_msg('Enter area of sector');		
		else 	
		{
			$.ajax({	
			type:'POST',	
			url:'update_data',	
			data:new FormData($("#f2")[0]),			
			contentType:false,		
			processData:false,			
			success:function(fb){		
			if(fb.match('update'))		
			{
				success_msg('Area of sector updated successfully please wait');
				setInterval(function(){ window.location.href="area_of_sectors"; }, 4000);	
			}	
			else
				error_msg('Area of sector not updated');		
			}			
			})	
		}
	});	
	$('#add_sp').click(function(){	
		var name=$('#name1').val();	
		if(name=='')	
			error_msg('Enter specialization');
		else
		{	
			$.ajax({
				type:'POST',
				url:'add/specialization',	
				data:new FormData($("#f1")[0]),	
				contentType:false,	
				processData:false,	
				success:function(fb){	
					if(fb.match('insert'))	
					{
						success_msg('Specialization added successfully please wait');
						setInterval(function(){ window.location.href='specialization'; }, 4000);	
					}
					else if(fb.match('already_exists'))
						error_msg('This Specialization Already exists ');
					else
						error_msg('Specialization not added');
				}		
			})	
		}	
	});		
	$('#sp_update').click(function(){	
	name = $('#name').val();
	if(name=='')
		error_msg('Enter specialization');
	else 	
	{
		$.ajax({				
		type:'POST',		
		url:'update_data',
		data:new FormData($("#f2")[0]),			
		contentType:false,			
		processData:false,			
		success:function(fb){		
		if(fb.match('update'))			
		{
			success_msg('Secialization updated successfully please wait');
			setInterval(function(){ window.location.href="specialization"; }, 4000);		
		}	
		else
			error_msg('Specialization not updated');
		}	
		})
	}
	});	
	$('#qua_add').click(function(){	
	var name=$('#name1').val();	
		if(name=='')	
			error_msg('Enter qualification');	
		else
		{
			$.ajax({
				type:'POST',
				url:'add/qualification',
				data:new FormData($("#f1")[0]),	
				contentType:false,	
				processData:false,		
				success:function(fb){	
					if(fb.match('insert'))		
					{
					   success_msg('Qualification added successfully please wait');
					   setInterval(function(){ window.location.href='qualification'; }, 4000);		
					}
					else if(fb.match('already_exists'))
						error_msg('This Qualification Already exists ');
					else	
					   error_msg('Qualification not added');				   
				}			
			  })		
		}	
			});	
		$('#qua_update').click(function(){	
		name=$('#name').val();	
		if(name=='')		
		{
			error_msg('Enter qualification');
		}		
		else 	
		{	
			$.ajax({		
			type:'POST',	
			url:'update_data',
			data:new FormData($("#f2")[0]),		
			contentType:false,				
			processData:false,				
			success:function(fb){	
				if(fb.match('update'))		
				{		
					success_msg('Qualification updated successfully please wait');
					setInterval(function(){ window.location.href="qualification"; }, 4000);	
				}	
				else
					error_msg('Qualification not updated');	
				}	
				})
		}
	});
	$('#jobrol_add').click(function(){
		var name=$('#name1').val();	
		if(name=='')	
			 error_msg('Enter Job Role');	
	    else 	
	    { 		
			 $.ajax({	
			 type:'POST',
			 url:'add/job_role',	
			 data:new FormData($("#f1")[0]),	
			 contentType:false,		
			 processData:false,	
			 success:function(fb){	
				if(fb.match('insert'))		
				{		
						setInterval(function(){ window.location.href='job_role'; }, 4000);
						success_msg('Job role added successfully please wait');
				}
				else if(fb.match('already_exists'))
						error_msg('This Job Role Already exists ');
				else	
						error_msg('Job role not added');											
			 }			
		    })		
		}	
	});
	$('#jobrol_update').click(function(){	
	name = $('#name').val();
		if(name=='')
				error_msg('Enter job role');	
		else 	
		{
			$.ajax({			
			type:'POST',		
			url:'update_data',	
			data:new FormData($("#f2")[0]),		
			contentType:false,			
			processData:false,			
			success:function(fb){	
			if(fb.match('update'))		
			{						
				success_msg('Job role updated successfully please wait');
				setInterval(function(){ window.location.href="job_role"; }, 4000);
			}			
			else
				error_msg('Job role not updated');
			}			
		   })	
		}
	});	
	$('#add_jobtype').click(function(){	
		var name=$('#name1').val();		
		if(name=='')	
			error_msg('Enter job type');	
		else 
		{	
			$.ajax({
				type:'POST',
				url:'add/job_types',
				data:new FormData($("#f1")[0]),	
				contentType:false,	
				processData:false,	
				success:function(fb){
						if(fb.match('insert'))	
						{				
							success_msg('Job type added successfully please wait');							
							setInterval(function(){ window.location.href='job_types'; }, 4000);	
						}	
						else if(fb.match('already_exists'))
						error_msg('This Job Type Already exists ');
						else
							  error_msg('Job type not added');									
				}		
				})		
		}	
	});	
	$('#job_type_update').click(function(){		
	name = $('#name').val();
	if(name=='')
			error_msg('Enter job type');
	else 	
	{
		$.ajax({	
		type:'POST',
		url:'update_data',
		data:new FormData($("#f2")[0]),
		contentType:false,	
		processData:false,	
		success:function(fb){	
		if(fb.match('update'))	
		{
				success_msg('Job type updated successfully please wait');
				setInterval(function(){ window.location.href="job_types"; }, 4000);
		}	
		else
				error_msg('Job type not updated');					
		}			
		})
	}						
	});	
	$('#add_desi').click(function(){
		var name=$('#name1').val();
		if(name=='')
			error_msg('Enter designation');
		else 	
		{			
			$.ajax({				
			type:'POST',
			url:'add/designation',
			data:new FormData($("#f1")[0]),	
			contentType:false,	
			processData:false,	
			success:function(fb){
				if(fb.match('insert'))	
				{	
					success_msg('Designation added successfully please wait');
					setInterval(function(){ window.location.href='designation'; }, 4000);	
				}	
				else if(fb.match('already_exists'))
						error_msg('This Designation Already exists ');
				else	
					error_msg('Designation not added');
			}			
			})		
		}
	});		
	$('#up_desi').click(function(){	
	var name=$('#name').val();
		if(name=='')
				error_msg('Enter designation');
		else 	
		{	
			$.ajax({		
			type:'POST',		
			url:'update_data',	
			data:new FormData($("#f2")[0]),			
			contentType:false,			
			processData:false,	
			success:function(fb){		
			if(fb.match('update'))	
			{
				success_msg('Designation updated successfully please wait');			
				setInterval(function(){ window.location.href="designation"; }, 4000);	
			}		
			else	
				error_msg('Designation not updated');
			}		
			})
		}
   });	
	$('#exp_add').click(function(){	
	var name=$('#name1').val();	
		if(name=='')
			error_msg('Enter experience');
		else 		
		{		
			$.ajax({		
			type:'POST',		
			url:'add/experience',	
			data:new FormData($("#f1")[0]),		
			contentType:false,				
			processData:false,				
			success:function(fb){			
			if(fb.match('insert'))			
			{		
				success_msg('Experience added successfully please wait');				
				setInterval(function(){ window.location.href='experience'; }, 4000);	
			}
			else if(fb.match('already_exists'))
						error_msg('This Experience Already exists ');
			else			
				error_msg('Experience not added');		
			}				
			})		
		}	
	});	
	$('#exp_update').click(function(){
	name=$('#name').val();	
	if(name=='')		
		error_msg('Enter experience');		
	else 	
	{	
		$.ajax({		
		type:'POST',	
		url:'update_data',
		data:new FormData($("#f2")[0]),		
		contentType:false,		
		processData:false,		
		success:function(fb){	
		if(fb.match('update'))	
		{
				success_msg('Experience updated successfully please wait');
				setInterval(function(){ window.location.href="experience"; }, 4000);	
		}		
		else	
				error_msg('Experience not updated');		
	}			
	})
	}
	});	
	//$('#Recurring_div').show();	
	$('#month_disp').hide();	
	$('#portal_revenuemodel').change(function(){	
	var data=$(this).val();		
	if(data.match('Recurring'))	
	{		
		$('#month_disp').show();	
	}	
	else	
	{		
		$('#month_disp').hide();	
	}	
	});
	
	$('#select_type').click(function(){	
	var data=$("input[name='select_type']:checked").val();	
	if(data.match('Recurring'))		
	{			
		$('#one_time_div').hide();	
		$('#Recurring_div').show();			
	}	
	});		
	$('#select_type1').click(function(){
		var data=$("input[name='select_type']:checked").val();	
		if(data.match('One_Time_Payment'))		
		{			
			$('#Recurring_div').hide();		
			$('#one_time_div').show();		
		}	
	});	
	$('#re_update').click(function(){			
		$.ajax({	
		type:'POST',	
		url:'revenue',	
		data:new FormData($("#f3")[0]),	
		contentType:false,	
		processData:false,		
		success:function(fb){	
			if(fb.match('Update'))	
				success_msg('Revenue plan updated successfully');
			else if(fb.match('not'))
				error_msg('Select plan type');
			else			
				error_msg('Revenue plan not updated');				
		}			
		})		
	});
	$('#plan_add').click(function(){
		var name=$('#name').val();
		var amount_usd=$('#amount_usd').val();
		var amount_inr=$('#amount_inr').val();
		var description=$('#description').val();
		var plan_duration_type=$('#plan_duration_type').val();
		var plan_duration_count=$('#plan_duration_count').val();
		if(name=="")
				error_msg('Enter  plan name');
		else if(amount_usd=="")
				error_msg('Enter  plan USD amount');
		else if(amount_inr=="")
				error_msg('Enter plan INR amount');
		else if(description=="")
				error_msg('Enter plan description');
		else if(!$.isNumeric(amount_inr))
			   error_msg('INR amount only numeric value allow');
		else if(!$.isNumeric(amount_usd))
			   error_msg('USD amount only numeric value allow');
		else if(plan_duration_count=="Select")
				error_msg("Select Plan Duration Count");
		else if(plan_duration_type=="Select")
				error_msg("Select Plan Duration Type");
		else 
		{
			$.ajax({	
					type:'POST',
					url:'create_plane',	
					data:new FormData($("#plane_add")[0]),	
					contentType:false,	
					processData:false,			
					success:function(fb){	
					if(fb.match('add'))	
					{
						success_msg('Plan created please wait');
						setInterval(function(){ window.location.href="plans"; }, 4000);
						
					}
					else if(fb.match('Yes'))
					{
						error_msg('This plane already exists');
					}
					else			
					{
						error_msg('Plan not created');
					}
				}	
			})	
		}
	});
	$('#update1').click(function(){
		$.ajax({	
				type:'POST',
				url:'revenue2',	
				data:new FormData($("#one_f")[0]),	
				contentType:false,	
				processData:false,			
				success:function(fb){				
			    if(fb.match('Update'))	
					success_msg('Revenue plan updated successfully');
				else if(fb.match('not'))
					error_msg('Select plan type');					
				else				
					error_msg('Revenue plan not updated');
				}	
		})	
	});
	//Revenue Model Strart
	$('#month_disp').hide();	
	$('#portal_revenuemodel').change(function(){	
		var data=$(this).val();		
		if(data.match('Recurring'))	
		{		
			$('#month_disp').show();	
		}	
		else	
		{		
			$('#month_disp').hide();	
		}	
	});
//	$('#Recurring_div').hide();	
	//$('#one_time_div').hide();	
	
	$('#select_type').click(function(){	
		var data=$("input[name='select_type']:checked").val();	
		if(data.match('Recurring'))		
		{			
			$('#one_time_div').hide();	
			$('#Recurring_div').show();			
		}	
	});	
	
	$('.p1').click(function(){	
		var data=$("input[name='condation']:checked").val();	
		if(data.match('number_job_post'))		
		{			
			$("#re_number_of_resume").attr("disabled","true");  
			$("#re_num_of_job").removeAttr("disabled");						
		}
		else if(data.match('num_of_resume_download'))
		{
			$("#re_num_of_job").attr("disabled","true");
			$("#re_number_of_resume").removeAttr("disabled");
		}
		else 
		{
			$("#re_number_of_resume").removeAttr("disabled");
			$("#re_num_of_job").removeAttr("disabled");
		}
	});

	/*$('.p2').click(function(){	
	var data=$("input[name='condation']:checked").val();	
	alert(data)
	if(data.match('number_job_post'))		
		{			
			$("#one_number_of_resume").attr("disabled","true");  
			$("#one_num_of_job").removeAttr("disabled");						
		}
		else if(data.match('num_of_resume_download'))
		{
			$("#one_num_of_job").attr("disabled","true");
			$("#one_number_of_resume").removeAttr("disabled");
		}
		else 
		{
			$("#one_number_of_resume").removeAttr("disabled"); 
			$("#one_num_of_job").removeAttr("disabled");
		}
	});	*/				

	
	$('#select_type1').click(function(){
			var data=$("input[name='select_type']:checked").val();	
			if(data.match('One_Time_Payment'))		
			{			
				$('#Recurring_div').hide();		
				$('#one_time_div').show();		
			}	
		});	
	$('#re_update').click(function(){		
		$.ajax({	
		type:'POST',	
		url:'revenue',	
		data:new FormData($("#f3")[0]),	
		contentType:false,	
		processData:false,		
		success:function(fb){	
			if(fb.match('Update'))		
				success_msg('Revenue plan updated');
			else if(fb.match('not'))	
				error_msg('Select plan type');
			else				
				error_msg('Revenue plan not updated');				
		}			
		})		
	});
	//Revenue Model End
	$('#recruiter_div').hide();
});	


function update_rec(id)
{
	$.post('recruiter_data_fetch',{'id':id},function(fb){
		$('#update_rec_popup').fadeIn();
		$('#data_disp').html(fb);
		$('.close').click(function(){
			$('#update_rec_popup').hide();
		});
	})
}
function update_location(id,text1,text2,text3)
{
		$('#update_location_popup').fadeIn();
		$('#l_id').val(id);
		$('#name').val(text1);
		$('#state').val(text2);
		$('#locality').val(text3);
		$('#tbl_name').val('location');
		$('.close').click(function(){
			$('#update_location_popup').hide();
		});
}

function update_aofs(id,text1)
{
	$('#update_areaofsector_popup').fadeIn();
		$('#l_id').val(id);
		$('#name').val(text1);
		$('#tbl_name').val('area_of_sectors');
		$('.close').click(function(){
			$('#update_areaofsector_popup').hide();
		});
}
function update_spaci(id,text1)
{
	$('#update_specialization_popup').fadeIn();
		$('#l_id').val(id);
		$('#name').val(text1);
		$('#tbl_name').val('qualification');
		$('.close').click(function(){
			$('#update_specialization_popup').hide();
		});
}
function update_qualification(id,text1,text2)
{
	$('#update_areaofsector_popup').fadeIn();
		$('#l_id').val(id);
		$('#name').val(text1);
		$('#type').val(text2);
		$('#tbl_name').val('qualification');
		$('.close').click(function(){
			$('#update_areaofsector_popup').hide();
	});
}
function update_jroll(id,text1)
{
	$('#update_jobrole_popup').fadeIn();
		$('#l_id').val(id);
		$('#name').val(text1);
		$('#tbl_name').val('job_role');
		$('.close').click(function(){
			$('#update_jobrole_popup').hide();
		});
}
function update_job_type(id,text1)
{
	$('#update_jobtype_popup').fadeIn();
		$('#l_id').val(id);
		$('#name').val(text1);
		$('#tbl_name').val('job_types');
		$('.close').click(function(){
			$('#update_jobtype_popup').hide();
		});
}
function location_status(id)
{
	var status1=$('#location'+id).val();
	$.post('status_change/location',{'id':id,'status1':status1},function(fb){
		if(fb.match('Update'))
			success_msg('Status changed');
		else 
			error_msg('Status not updated');
	});
	setTimeout(function(){ $('.msg').removeClass('open_alert hs_success hs_error'); }, 3000);
	setTimeout(function(){ $('.msg1').removeClass('open_alert hs_success hs_error'); }, 3000);
}


function desi_status(id)
{
	var status1=$('#desi'+id).val();
	$.post('status_change/designation',{'id':id,'status1':status1},function(fb){
		if(fb.match('Update'))
			success_msg('Status changed');
		else 
			error_msg('Status not updated');
	});
	setTimeout(function(){ $('.msg').removeClass('open_alert hs_success hs_error'); }, 3000);
	setTimeout(function(){ $('.msg1').removeClass('open_alert hs_success hs_error'); }, 3000);
}
function sp_status(id)
{
	var status1=$('#sp'+id).val();
	$.post('status_change/specialization',{'id':id,'status1':status1},function(fb){
		if(fb.match('Update'))
			success_msg('Status changed');
		else 
			error_msg('Status not updated');
	});
	setTimeout(function(){ $('.msg').removeClass('open_alert hs_success hs_error'); }, 3000);
	setTimeout(function(){ $('.msg1').removeClass('open_alert hs_success hs_error'); }, 3000);
}
function qua_status(id)
{
	var status1=$('#qua'+id).val();
	$.post('status_change/qualification',{'id':id,'status1':status1},function(fb){
		if(fb.match('Update'))
			success_msg('Status changed');
		else 
			error_msg('Status not updated');
	});
	setTimeout(function(){ $('.msg').removeClass('open_alert hs_success hs_error'); }, 3000);
	setTimeout(function(){ $('.msg1').removeClass('open_alert hs_success hs_error'); }, 3000);
}
function jrole_status(id)
{
	var status1=$('#jrole'+id).val();
	$.post('status_change/job_role',{'id':id,'status1':status1},function(fb){
		if(fb.match('Update'))
			success_msg('Status changed');
		else 
			error_msg('Status not updated');
	});
	setTimeout(function(){ $('.msg').removeClass('open_alert hs_success hs_error'); }, 3000);
	setTimeout(function(){ $('.msg1').removeClass('open_alert hs_success hs_error'); }, 3000);
}
 function exp_status(id)
{
	var status1=$('#exp'+id).val();
	$.post('status_change/experience',{'id':id,'status1':status1},function(fb){
		if(fb.match('Update'))
			success_msg('Status changed');
		else 
			error_msg('Status not updated');
	});
	setTimeout(function(){ $('.msg').removeClass('open_alert hs_success hs_error'); }, 3000);
	setTimeout(function(){ $('.msg1').removeClass('open_alert hs_success hs_error'); }, 3000);
}
function jtype_status(id)
{
	var status1=$('#jtype'+id).val();
	$.post('status_change/job_types',{'id':id,'status1':status1},function(fb){
		if(fb.match('Update'))
			success_msg('Status changed');
		else 
			error_msg('Status not updated');
	});
	setTimeout(function(){ $('.msg').removeClass('open_alert hs_success hs_error'); }, 3000);
	setTimeout(function(){ $('.msg1').removeClass('open_alert hs_success hs_error'); }, 3000);
}
function plane_status(id)
{
	var status1=$('#plane'+id).val();
	$.post('status_change/jp_plans',{'id':id,'status1':status1},function(fb){
		if(fb.match('Update'))
		success_msg('Status changed');
	else 
		error_msg('Status not updated');
	});
	setTimeout(function(){ $('.msg').removeClass('open_alert hs_success hs_error'); }, 3000);
	setTimeout(function(){ $('.msg1').removeClass('open_alert hs_success hs_error'); }, 3000);
}
function footer_link_status(id)
{
	var status1=$('#footer_link'+id).val();
	$.post('status_change/jp_setting_footer',{'id':id,'status1':status1},function(fb){
		if(fb.match('Update'))
			success_msg('Status changed');
		else 
			error_msg('Status not updated');
	});
	setTimeout(function(){ $('.msg').removeClass('open_alert hs_success hs_error'); }, 3000);
	setTimeout(function(){ $('.msg1').removeClass('open_alert hs_success hs_error'); }, 3000);
}
function recruiter_status(id)
{
	var status1=$('#recruiter'+id).val();
	$.post('status_change/recruiter',{'id':id,'status1':status1},function(fb){
		if(fb.match('Update'))
			success_msg('Status changed');
		else 
			error_msg('Status not updated');
	});
	setTimeout(function(){ $('.msg').removeClass('open_alert hs_success hs_error'); }, 3000);
	setTimeout(function(){ $('.msg1').removeClass('open_alert hs_success hs_error'); }, 3000);
}
function seeker_status(id)
{
	var status1=$('#seeker'+id).val();
	$.post('status_change/seeker',{'id':id,'status1':status1},function(fb){
		if(fb.match('Update'))
			success_msg('Status changed');
		else 
			error_msg('Status not updated');
	});
	setTimeout(function(){ $('.msg').removeClass('open_alert hs_success hs_error'); }, 3000);
	setTimeout(function(){ $('.msg1').removeClass('open_alert hs_success hs_error'); }, 3000);
}	
function aofs(id)
{
	var status1=$('#aofs'+id).val();
	$.post('status_change/area_of_sectors',{'id':id,'status1':status1},function(fb){
		if(fb.match('Update'))
			success_msg('Status changed');
		else 
			error_msg('Status not updated');
	});
	setTimeout(function(){ $('.msg').removeClass('open_alert hs_success hs_error'); }, 3000);
	setTimeout(function(){ $('.msg1').removeClass('open_alert hs_success hs_error'); }, 3000);
}
function update_desi(id,text1)
{
	$('#update_desi_popup').fadeIn();
		$('#l_id').val(id);
		$('#name').val(text1);
		$('#tbl_name').val('designation');
		$('.close').click(function(){
			$('#update_desi_popup').hide();
		});
}
function update_exp(id,text1)
{
	$('#update_exp_popup').fadeIn();
		$('#l_id').val(id);
		$('#name').val(text1);
		$('#tbl_name').val('experience');
		$('.close').click(function(){
			$('#update_exp_popup').hide();
		});
}
function update_seeker(id,name,mno,email)
{
	$('#update_seeker_popup').fadeIn();
		$('#l_id').val(id);
		$('#us_name').val(name);
		$('#us_mno').val(mno);
		$('#us_email').val(email);
		$('.close').click(function(){
			$('#update_seeker_popup').hide();
		});
}
function update_footer_link(id)
{
	$.post('footer_update',{'id':id},function(fb){
		$('#update_footer_link_popup').fadeIn();
		$('#data_disp').html(fb);
		$('.close').click(function(){
			$('#update_footer_link_popup').hide();
		});
	})
}
function seeker_update()
{
	var name=$('#us_name').val();
	var email=$('#us_email').val();
	var mno=$('#us_mno').val();
	var mno=$('#us_current_address').val();
	if(name=='')
			error_msg('Enter name');
	else if(email=='')
			error_msg('Enter email address');
	else if(mno=='')
			error_msg('Enter mobile number');
	else
	{
		$.ajax({	
			type:'POST',
			url:'update_seeker1',	
			data:new FormData($("#update_seeker_form")[0]),	
			contentType:false,	
			processData:false,			
			success:function(fb){	
			if(fb.match('update'))	
			{
				success_msg('Seeker updated successfully please wait..');
				setInterval(function(){ window.location.href='seekers'; }, 4000);	
			}
			else			
				error_msg('Seeker not updated');
			}	
			})	
	}
}
function delete_conform(id,name)
{
	var open_pop="#delete_"+name+"_popup";
	$(open_pop).fadeIn();
	$('#disp_data').val(id);
	$('.close').click(function(){
		$(open_pop).hide();
	});
	$('#no_btn').click(function(){
		$(open_pop).hide();
	});
}

//Language start
function add_language()
{
	var language_name=$('#addnewlanguage').val();
	if(language_name=='')
		error_msg('Enter language name');
	else
	{
		$.post('add_language',{'addnewlanguage':language_name},function(data){
			if(data.match('Add'))
			{
				success_msg('Language Added successfully please wait');
				setInterval(function(){ window.location.href="language_add"; }, 3300);
			}
			else
				error_msg('Language Not Add');
		})	
	}
}
function update_language(id_web,field,data1,id_db)
{
		$('#update_language_popup').fadeIn();
			$('#id_web').val(id_web);
			$('#id_db').val(id_db);
			$('#field').val(field);
			$('#data').val(data1);
			 $('#data').attr("name",field);
			$('.close').click(function(){
				$('#update_language_popup').hide();
			});
			$('#no_btn').click(function(){
				$('#update_language_popup').hide();
			});
}
function test()
{
	alert('dfs')
}
function languageUpdate()
{
	var data=$('#data').val();
	var id_web=$('#id_web').val();
	var id_db=$('#id_db').val();
	var field=$('#field').val();
	l='#'+id_web;
	
	if(data=='')
		error_msg('Enter Text');
	else
	{
		$(l).text(data);
		$.ajax({	
				type:'POST',	
				url:'languageUpdatefinal',	
				data:new FormData($("#language_up_form")[0]),	
				contentType:false,	
				processData:false,		
				success:function(fb){	
					if(fb.match('Update'))
					{
						success_msg('Text Updated successfully');
						$('#update_language_popup').hide();
					}	
					else
					{
						error_msg('Text not updated');
					}
				}			
		})		
	}
}
function update_footer_link1()
{
	    var uf_name=$('#uf_name').val();
		var uf_link=$('#uf_link').val();
		var url_pattern=/^(http(s)?:\/\/)?(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
		if(uf_name=='')
		{
			error_msg('Enter Name  link');
		}
		else if(!url_pattern.test(uf_link))
		{
			error_msg('Enter Valid  link');
		}
		else
		{
			$.ajax({
				type:'POST',
				url:'footer_link',
				data:new FormData($("#update_footer_form")[0]),
				contentType:false,
				processData:false,
				success:function(fb){
					if(fb.match('update'))
					{							
							success_msg('Footer link updated');
							window.location.href="website_setting";
					}
					else
					{
							error_msg('Footer link not updated');
					}
				}
			});
		}
}
function update_plan(id)
{
	$.post('update_plan',{'id':id},function(fb){
		$('#update_plan_popup').fadeIn();
		$('#data_disp1').html(fb);
		$('.close').click(function(){
			$('#update_plan_popup').hide();
		});
	})
}
function plan_up()
{
	var up_name=$('#up_name').val();
	var up_amount_usd=$('#up_amount_usd').val();
	var up_amount_inr=$('#up_amount_inr').val();
	var up_description=$('#up_description').val();
	var plan_duration_type=$('#up_plan_duration_type').val();
	var plan_duration_count=$('#up_plan_duration_count').val();
	if(up_name=='')
		error_msg('Enter name');
	else if(up_amount_usd=='')
		error_msg('Enter USD amount');
	else if(up_amount_inr=='')
		error_msg('Enter INR amount');
	else if(up_description=='')
		error_msg('Enter description');
	else if(plan_duration_count=="Select")
				error_msg("Select Plan Duration Count");
	else if(plan_duration_type=="Select")
			error_msg("Select Plan Duration Type");
	else
	{
		$.ajax({	
			type:'POST',
			url:'update_plan1',	
			data:new FormData($("#plane_up_form")[0]),	
			contentType:false,	
			processData:false,			
			success:function(fb){	
			if(fb.match('update'))	
			{
				success_msg('Plan updated successfully please wait..');
				setInterval(function(){ window.location.href='plans'; }, 4000);
				
			}
			else			
			{		
				$('.msg').addClass('open_alert');	
				$('.msg').addClass('hs_error');		
				$(".err_msg").text('');	
				error_msg('Plan not updated');
			}
			
			}	
		})	
	}
}
function change_language()
{
	var language=$('#weblanguage_text').val();
	$.post('change_language',{'language_name':language},function(data){
		if(data.match('update'))
				success_msg('Language changed');
		else
				error_msg('Language Not changed');
	});
}
function email_setting_tab()
{
	var data=$("input[name='select_user']:checked").val();	
		if(data.match('seeker'))		
		{			
			$('#recruiter_div').hide();	
			$('#seeker_div').show();			
		}
		else if(data.match('recruiter'))		
		{			
			$('#seeker_div').hide();		
			$('#recruiter_div').show();		
		}else { }
}
function mail_setting(type)
{
	var email=$('#'+type+'_email').val();
		var veri_msg=$('#'+type+'_veri_msg').val();
		var forgot_msg=$('#'+type+'_forgot_msg').val();
		var recruiter_subject=$('#'+type+'_subject').val();
		if(email=='')
			error_msg('Enter E-Mail');
		else if(!email.match(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/))
			error_msg('Enter a valid email address');
		else if(recruiter_subject=='')
			error_msg('Enter subject');
		else if(veri_msg=='')
			error_msg('Enter verification massage');
		else if(forgot_msg=='')
			error_msg('Enter forgot password massage');
		else 
		{
			$.ajax({		
			type:'POST',	
			url:'email_credentials',	
			data:new FormData($("#"+type+"_form")[0]),	
			contentType:false,	
			processData:false,		
			success:function(fb){	
				if(fb.match('update'))
					success_msg('Credentials Updated');
				else
					error_msg('Credentials not updated');
			  }		
		   })
		}
}
function google_code_setting(type)
{
	var tbl_name='jp_'+type;
	var code=$('#'+type).val();
					$.ajax({		
					type:'POST',	
					url:'google_code',	
					data:new FormData($("#"+type+"_form")[0]),	
					contentType:false,	
					processData:false,		
					success:function(fb){		
						if(fb.match('Update'))
							success_msg('script updated');
						else
							error_msg(fb);
					}		
				})
}
function cookie_setting()
{
					$.ajax({		
					type:'POST',	
					url:'cookie_text_s',	
					data:new FormData($("#cookie_text_form")[0]),	
					contentType:false,	
					processData:false,		
					success:function(fb){		
						if(fb.match('Update'))
							success_msg('script updated');
						else
							error_msg(fb);
					}		
				})
}
function ad_save()
{
	var home_page=$("input[name='home_page']:checked").val();
    var single_page_top=$("input[name='single_page_top']:checked").val();
	var single_page_bottom=$("input[name='single_page_bottom']:checked").val();
	var both_page=$("input[name='single_page']:checked").val();
	var url_pattern=/^(http(s)?:\/\/)?(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
	if(home_page!=undefined || single_page_top!=undefined || single_page_bottom!=undefined ||  both_page!=undefined)
	{
		var link1=$('#link1').val();
		if(link1=='')
		{
			error_msg('Enter  link');
		}
		else
		{
			/*$.post('custon_add_update',{'home_page':home_page,'single_page_top':single_page_top,'single_page_bottom':single_page_bottom,'both_page':both_page,'link':link1},function(data){
				alert(data)
			});*/
			$.ajax({		
					type:'POST',	
					url:'custon_add_update',	
					data:new FormData($("#upload_c_add_form")[0]),	
					contentType:false,	
					processData:false,		
					success:function(fb){		
						/*if(fb.match('Update'))
							success_msg('script updated');
						else
							error_msg(fb);*/
						alert(fb)
					}		
				})
		}
	}
	else{
		alert('not')
	}
}
function custom_ads_create()
{
	$.ajax({		
					type:'POST',	
					url:'custon_add_update',	
					data:new FormData($("#custom_ads_form")[0]),	
					contentType:false,	
					processData:false,		
					success:function(fb){		
						if(fb.match('Update'))
						{
							success_msg('Ads updated successfully');
							window.location.href="ads_integration";
						}
						else if(fb.match('jpg_png'))
							error_msg('Please select a valid image ');
						else
							error_msg('Ads Not Updated');
					}		
			})
}
function terms_condation()
{
				var data = CKEDITOR.instances.terms_condition.getData();
				$.post('privacy_policy_set',{'tc':data,'field':'terms_condition','date_type':'terms_condition_update_date'},function(data){
					if(data.match('Update'))
						success_msg('Terms Condation Updated');
					else
						error_msg('Terms Condation Not Updated');
					
				});
}
function privacy_policy()
{
				var data = CKEDITOR.instances.privacy_policy.getData();
				$.post('privacy_policy_set',{'tc':data,'field':'privacy_policy','date_type':'privacy_policy_update_date'},function(data){
					if(data.match('Update'))
						success_msg('Privacy Policy Updated');
					else
						error_msg('Privacy Policy Not Updated');
					
				});
}
function about_us()
{
				var data = CKEDITOR.instances.about_us.getData();
				$.post('privacy_policy_set',{'tc':data,'field':'about_us'},function(data){
					if(data.match('Update'))
						success_msg('About Us Updated');
					else
						error_msg('About Us Not Updated');
					
				});
}
function update_recr()
{
	$.ajax({		
			type:'POST',	
			url:'rec_update1',	
			data:new FormData($("#update_rec_form")[0]),	
			contentType:false,	
			processData:false,		
			success:function(fb){	
				if(fb.match('Update'))
				{
					success_msg('Recruiter information  updated successfully');
					setInterval(function(){ window.location.href="/admin/recruiters"; }, 3000);
				}
				else
				{
					error_msg(fb);
				}
			}		
		})
}
/*function change_control()
{
	var data=$("input[name='condation1']:checked").val();	
	if(data.match('number_job_post'))		
		{			
			$("#one_number_of_resume").attr("disabled","true");  
			$("#one_num_of_job").removeAttr("disabled");						
		}
		else if(data.match('num_of_resume_download'))
		{
			$("#one_num_of_job").attr("disabled","true");
			$("#one_number_of_resume").removeAttr("disabled");
		}
		else 
		{
			$("#one_number_of_resume").removeAttr("disabled"); 
			$("#one_num_of_job").removeAttr("disabled");
		}
}
*/
function notification_send()
{
	var title=$('#title').val();
	var message=$('#message').val();
	if(title=='')
	{
		error_msg('Enter Title');
	}
	else if(message=='')
	{
		error_msg('Enter Message');
	}
	else 
	{
		$.ajax({		
			type:'POST',	
			url:'send_notification',	
			data:new FormData($("#notification_send_form")[0]),	
			contentType:false,	
			processData:false,		
			success:function(fb){	
				if(fb.match('Insert'))
				{
					$('#title').val('');
					$('#message').val('');
					success_msg('Message Successfully Send');
				}
				else
				{
					error_msg('Message Not Send');
				}
			}		
		})
	}
	setTimeout(function(){ $('.msg').removeClass('open_alert hs_success hs_error'); }, 3000);
	setTimeout(function(){ $('.msg1').removeClass('open_alert hs_success hs_error'); }, 3000);
	
}
function paypal_info_update()
{
	var paypal_email=$('#paypal_email').val();
	if(paypal_email=='')
		error_msg('Enter E-Mail');
	else if(!paypal_email.match(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/))
		error_msg('Enter a Valid E-Mail');
	else
	{
		$.ajax({		
			type:'POST',	
			url:'payment_method_update',	
			data:new FormData($("#paypal_form")[0]),	
			contentType:false,	
			processData:false,		
			success:function(fb){	
				if(fb.match('Insert'))
					success_msg('PayPal Information Updated');
				else
					error_msg('PayPal Information Not Updated');
			}		
		})
	}
}

function payu_info_update()
{
	var merchant_key=$('#merchant_key').val();
	var merchant_salt=$('#merchant_salt').val();
	if(merchant_key=='')
		error_msg('Enter merchant key');
	else if(merchant_salt=='')
		error_msg('Enter merchant salt');
	else
	{
		$.ajax({		
			type:'POST',	
			url:'payment_method_update',	
			data:new FormData($("#payu_form")[0]),	
			contentType:false,	
			processData:false,		
			success:function(fb){	
				if(fb.match('Insert'))
					success_msg('PayUMoney Information  Updated');
				else
					error_msg('PayUMoney Information Not Updated');
			}		
		})
	}
}
function change_control()
{
	var data=$("input[name='condation1']:checked").val();	
	if(data.match('number_job_post'))		
		{			
			$("#one_number_of_resume").attr("disabled","true");  
			$("#one_num_of_job").removeAttr("disabled");						
		}
		else if(data.match('num_of_resume_download'))
		{
			$("#one_num_of_job").attr("disabled","true");
			$("#one_number_of_resume").removeAttr("disabled");
		}
		else 
		{
			$("#one_number_of_resume").removeAttr("disabled"); 
			$("#one_num_of_job").removeAttr("disabled");
		}
		
}
function change_control1()
{
	var data=$("input[name='condation11']:checked").val();	
	if(data.match('number_job_post'))		
		{			
			$("#one_number_of_resume1").attr("disabled","true");  
			$("#one_num_of_job1").removeAttr("disabled");						
		}
		else if(data.match('num_of_resume_download'))
		{
			$("#one_num_of_job1").attr("disabled","true");
			$("#one_number_of_resume1").removeAttr("disabled");
		}
		else 
		{
			$("#one_number_of_resume1").removeAttr("disabled"); 
			$("#one_num_of_job1").removeAttr("disabled");
		}
		
}
function social_login_seting_update()
{
	var google_client_id=$('#google_client_id').val();
	var google_client_secret=$('#google_client_secret').val();
	if(google_client_id=='')
		error_msg('Enter Google Client ID');
	else if(google_client_secret=='')
		error_msg('Enter Google Client Secret')
	else
	{
		$.ajax({		
			type:'POST',	
			url:'google_login_information',	
			data:new FormData($("#google_login_form")[0]),	
			contentType:false,	
			processData:false,		
			success:function(fb){	
				if(fb.match('Insert'))
					success_msg('Google Login Information Updated');
				else
					error_msg('Google Login Information Not Updated');
			}		
		})
	}
}

