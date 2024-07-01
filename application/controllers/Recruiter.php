<?php
class Recruiter extends CI_controller
{
	public $language_data_a=10;
	public $default_languag=1;
	public $user_header1=1;
	function __construct()
	{
		parent::__construct();
		$s1=$this->session->userdata('recruiter');
		$this->email=$s1;
		$this->load->library('form_validation');
		if(!isset($s1))
		{
			$url = 'home/login';
			echo'
			<script>
			window.location.href = "'.base_url().$url.'";
			</script>
			';
		}
	}
	function index()
	{
		$this->language_fatch('recruiter_home');
		$data['controller']=$this;
		$this->load->view('recruiter_home',$data);
	}
	function pagination()
    {
		  $s1=$this->session->userdata('recruiter');
		  $this->load->model("Common_model");
		  $this->load->library("pagination");
		  $config = array();
		  $config["base_url"] = "#";
		  $config["total_rows"] = $this->Common_model->row_count('job_post',$s1,'r_id');
		  $config["per_page"] = 6;
		  $config["uri_segment"] = 3;
		  $config["use_page_numbers"] = TRUE;
		  $config["full_tag_open"] = '<ul style="background:white" class="pagination pagination-lg">';
		  $config["full_tag_close"] = '</ul>';
		  $config["first_tag_open"] = '<li>';
		  $config["first_tag_close"] = '</li>';
		  $config["last_tag_open"] = '<li>';
		  $config["last_tag_close"] = '</li>';
		  $config['next_link'] = '&gt;';
		  $config["next_tag_open"] = '<li>';
		  $config["next_tag_close"] = '</li>';
		  $config["prev_link"] = "&lt;";
		  $config["prev_tag_open"] = "<li>";
		  $config["prev_tag_close"] = "</li>";
		  $config["cur_tag_open"] = "<li class='active'><a href='#'>";
		  $config["cur_tag_close"] = "</a></li>";
		  $config["num_tag_open"] = "<li>";
		  $config["num_tag_close"] = "</li>";
		  $config["num_links"] = 1;
		  $config['first_link'] = false;
		  $config['last_link'] = false;
		  $this->pagination->initialize($config);
		  $page = $this->uri->segment(3);
		  $start = ($page - 1) * $config["per_page"];
		  $s1=$this->session->userdata('recruiter');
		  $sres=$this->Common_model->fetch_details('job_post',$config["per_page"], $start,$s1,'r_id');
		  $link = $this->pagination->create_links();
		  $this->language_fatch('recruiter_home');
		  $data['controller']=$this;
		  $data['sres']=$sres;
		  $data['link']=$link;
		  $this->load->view('module/my_jobs',$data);
	 } 
	function user_jobSingle($id='')
	{
		if($id!='')
		{
			$s1=$this->session->userdata('recruiter');
			$job_info=$this->Common_model->select('job_post',$id,'id');
			$r_id = $job_info->r_id;
			$res2 = $this->Common_model->select('recruiter',$r_id,'email');
			$check_status=$this->Common_model->job_applay_status_check('jp_applay_job',$id,$s1,'job_id','s_email');   //Job Applay Status Check
			$this->language_fatch('job_post_page');
	        $data['controller']=$this;
	         $data['r1']=$job_info;
			 $data['res0']=$res2;
			if($check_status>0)
			{
				$data['status']='yes';
				$this->load->view('rec_jobSingle',$data);
			}
			else
			{
				$data['status']='no';
				$this->load->view('rec_jobSingle',$data);
			}
		}
	}
	function applied_user($job_id)
	{
		$data=$this->Common_model->select('jp_applay_job');
			$arr_info=array();
			foreach($data as $data1)
			{
				if($data1->job_id==$job_id)
				{
					$arr_info[]=$data1->s_email;
				}
			}
			$seeker_info=array();
				foreach($arr_info as $data1)
				{
					$seeker_info[]=$this->Common_model->select('seeker',$data1,'email');	
				}
		  $this->language_fatch('recruiter_home');
		  $data['controller']=$this;
		  $data['job_id']=$job_id;
		if($seeker_info)
		{
			$data['seeker_info']=$seeker_info;
		  $this->load->view('applied_user',$data);
		}
		else
		{
			 $this->load->view('applied_user',$data);
		}
	}
	//Page Open
	function post_jobs()
	{
		$s1=$this->session->userdata('recruiter');
		$loc=array();
		$job_types=array();
		$q=array();
		$experience=array();
		$designation=array();
		$aofs=array();
		$spec=array();
		$job_count=$this->Common_model->count_num('job_types','Active','status');
		$location_count=$this->Common_model->count_num('location','Active','status');
		$qualification_count=$this->Common_model->count_num('qualification','Active','status');
		$exp_count=$this->Common_model->count_num('experience','Active','status');
		$desi_count=$this->Common_model->count_num('designation','Active','status');
		$aofs_count=$this->Common_model->count_num('area_of_sectors','Active','status');
		$job_r_count=$this->Common_model->count_num('job_role','Active','status');
		$sp_count = $this->Common_model->count_num('specialization','Active','status');
		$language=$this->Common_model->select('jp_language_name');
		$qualification_type=$this->Common_model->select('qualification_type');
		if($location_count>0)
		{
			// $loc=$this->Common_model->select('location','Active','status'); 
			
		$this->db->select('state');
		$this->db->from('location');
		$this->db->where('status','Active');
		$this->db->group_by('state');
		$loc = $this->db->get()->result();
		
		//Left Menu Value
		} 
		if($job_count>0)
		{
			$job_types=$this->Common_model->select('job_types','Active','status'); 	 //Left Menu Value
		} 
		if($qualification_count>0)
		{
			$q=$this->Common_model->select('qualification','Active','status');   //Left Menu Value
		} 
		if($exp_count>0)
		{
			$experience=$this->Common_model->select('experience','Active','status');   			 //Left Menu Value
		}  
		if($desi_count>0)
		{
			$designation=$this->Common_model->select('designation','Active','status');   			 //Left Menu Value
		}
		if($aofs_count>0)
		{
			$aofs=$this->Common_model->select('area_of_sectors','Active','status');  			 //Left Menu Value
		}
		if($sp_count>0)
		{
			$spec=$this->Common_model->select('specialization','Active','status');   			 //Left Menu Value
		}

		
		$pay_count=$this->Common_model->select('recruiter',$s1,'email');
		$pay_count2=$pay_count->pay_count;
		$skill = $this->Common_model->select('skills','Active','status');   			 //Left Menu Value
		$jbrole=$this->Common_model->select('job_role','Active','status');   			 //Left Menu Value
		$qualification_type=$this->Common_model->select('qualification_type');   			 //Left Menu Value
		$benefit=$this->Common_model->select('benefit');   			 //Left Menu Value
		$notice_period=$this->Common_model->select('notice_period');   			 //Left Menu Value
		$preferred_shift=$this->Common_model->select('preferred_shift');   			 //Left Menu Value
		$sp=$this->Common_model->select('specialization');


		$this->language_fatch('job_post_page');
		$this->language_fatch_v('validation');
	    $data['controller']=$this;
	    $data['pay_count2']=$pay_count2;
	    $data['language']=$language;
	    $data['notice_period']=$notice_period;
	    $data['preferred_shift']=$preferred_shift;
	    $data['benefit']=$benefit;
	    $data['qualification_type']=$qualification_type;
		$data['q']=$q;
		$data['loc']=$loc;
		$data['job_types']=$job_types;
		$data['spec']=$spec;
		$data['aofs']=$aofs;
		$data['designation']=$designation;
		$data['experience']=$experience;
		$data['skill']=$skill;
		$data['job_r']=$jbrole;
		$data['specialization']=$sp;
		$this->load->view('recruiter_post_job',$data);
	}



	function edit_job_post($id='')
	{
	   
		if($id!='')
		{


	
		$this->db->select('state');
		$this->db->from('location');
		$this->db->where('status','Active');
		$this->db->group_by('state');
		$loc = $this->db->get()->result();
 

		$this->db->select('name');
		$this->db->from('location');
		$this->db->where('status','Active');
		$this->db->group_by('name');
		$name = $this->db->get()->result();


		$this->db->select('locality');
		$this->db->from('location');
		$this->db->where('status','Active');
		$this->db->group_by('locality');
		$locality = $this->db->get()->result();

			$job_types=$this->Common_model->select('job_types');
			$spec=$this->Common_model->select('specialization');
			$aofs=$this->Common_model->select('area_of_sectors');
			$designation=$this->Common_model->select('designation');
			$experience=$this->Common_model->select('experience');
			$skill = $this->Common_model->select('skills','Active','status');   			 //Left Menu Value
	    	$jbrole=$this->Common_model->select('job_role','Active','status');   			 //Left Menu Value
	        $language=$this->Common_model->select('jp_language_name');
	        $qualification_type=$this->Common_model->select('qualification_type');
			$job_post_info = $this->Common_model->select('job_post',$id,'id');
			$benefit=$this->Common_model->select('benefit');   			 //Left Menu Value
			$notice_period=$this->Common_model->select('notice_period');   		
				 //Left Menu Value
			$preferred_shift=$this->Common_model->select('preferred_shift'); 
			// print_r($job_post_info);die;
			$this->language_fatch('job_post_page');
			$this->language_fatch_v('validation');
	        $data['controller']=$this;
	         $data['job_post_info']=$job_post_info;
			 $data['q']=$q;
			 $data['loc']=$loc;
			 $data['city']=$name;
			 $data['locality']=$locality;
			 $data['jbrole']=$jbrole;
			 $data['qualification_type']=$qualification_type;
			 $data['notice_period']=$notice_period;
			 $data['preferred_shift']=$preferred_shift;
			 $data['benefit']=$benefit;
			 $data['job_types']=$job_types;
			 $data['specialization']=$spec;
			 $data['skill']=$skill;
			 $data['language']=$language;
			 $data['specialization']=$spec;
			 $data['aofs']=$aofs;
			 $data['designation']=$designation;
			 $data['experience']=$experience;


	
			
			//Left Menu Value
	   	//  print_r($job_post_info);die;
	    	$quftype=$this->Common_model->select('qualification',$job_post_info->qualification,'name');   
		
	    	$data['qualification_typevalue']=$quftype->type;
	    	$user_qualification=$this->Common_model->select('qualification_type',$quftype->type,'id');
	    	$data['user_qualification']=$user_qualification;
			$this->load->view('update_job_post',$data);
		}
	}
	function update_job_post()
	{
		$data=$this->input->post();
		if(!empty($data))
		{
			$d=$this->input->post('lasr_date_application');
			$written_test=$this->input->post('written_test');
			$group_discussion=$this->input->post('group_discussion');
			$hr_round=$this->input->post('hr_round');
			$technical_round=$this->input->post('technical_round');
			$id=$this->input->post('id');
			if(!array_key_exists("hr_round",$data))
			{
				$data['hr_round'] = 'no';
				
			}
			if(!array_key_exists("written_test",$data))
			{
				$data['written_test'] = 'no';
				
			}
			if(!array_key_exists("group_discussion",$data))
			{
				$data['group_discussion'] = 'no';
				
			}
			if(!array_key_exists("technical_round",$data))
			{
				$data['technical_round'] = 'no';
				
			}	
				unset($data['id']);
				$up_res=$this->Common_model->updateData('job_post',$data,$id,'id');
				if($up_res)
				{
					echo "update";
				}
				else
				{	
					echo "not";
					
				}
		}
	}
	function delete_job($job_id)
	{
		$res1=$this->Common_model->delete('job_post',$job_id,'id');
		$res2=$this->Common_model->delete('jp_applay_job',$job_id,'job_id');
		if($res2)
		{
			redirect('recruiter');
		}
	}
	function recruiter_profile()
	{
		$s1=$this->session->userdata('recruiter');
		$rec_info=$this->Common_model->select('recruiter',$s1,'email');
		$pay_count=$rec_info->pay_count;
		$resume_download=$this->Common_model->download_count('jp_resume_count',$s1,'recruiter',$pay_count,'pay_count');
		$job_post=$this->Common_model->download_count('job_post',$s1,'r_id',$pay_count,'pay_count');
		$plan=$rec_info->plan;
		$pay=$rec_info->pay;
		$plan_info='';
		if($pay=='yes')
		{
			$plan_info=$this->Common_model->select('jp_plans',$plan,'name');
			$jp_plan_info=$this->Common_model->select('jp_plans',$plan,'name');
			$pay_date=$rec_info->pay_date;
			$month=$rec_info->month;
			$condation1=$jp_plan_info->condation1;
						$pay_date_array=explode('/',$pay_date);
						$year1=$pay_date_array[0];
						$yaer2=$year1+$month;
						$pay_date_array2=$pay_date_array;
						$pay_date_array2[0]=$yaer2;
						//print_r($pay_date_array2);
						$last_date=implode('/',$pay_date_array2);
						$d1=date('Y/m/d');
						$d2= str_replace("/","",$d1);	
						$current_data_int_format= (int)$d2;
						 $last_date2= str_replace("/","",$last_date);
						 $last_data_int_format= (int)$last_date2;
		}
		else
		{
			$jp_plan_info='';
		}
		
		$this->language_fatch('recruiter_profile_page');
		$this->language_fatch_v('validation');
		$language=$this->Common_model->select('jp_language_name');
		$location=$this->Common_model->select('location');


		$this->db->select('state');
		$this->db->from('location');
		$this->db->where('status','Active');
		$this->db->group_by('state');
		$state = $this->db->get()->result();



		$this->db->select('name');
		$this->db->from('location');
		$this->db->where('status','Active');
		$this->db->group_by('name');
		$name = $this->db->get()->result();


		$this->db->select('locality');
		$this->db->from('location');
		$this->db->where('status','Active');
		$this->db->group_by('locality');
		$locality = $this->db->get()->result();

		$data['language']=$language;
		$data['location1']=$location;
	    $data['controller']=$this;
	    $data['r1']=$rec_info;
		$data['plan_info']=$plan_info;
		$data['resume_download']=$resume_download;
		$data['job_post']=$job_post;
		$data['jp_plan_info']=$jp_plan_info;
		$data['state']=$state;
		$data['city']=$name;
		$data['locality']=$locality;





		$this->load->view('recruiter_profile',$data);
	}
	function qualifications(){

        $type = $this->input->post('type');

        $this->db->select('id,name');
        $this->db->from('qualification');
        $this->db->where('type',$type);
        $response12 = $this->db->get()->result();

		$j_arr=array(
			'staus'=>'true',
			'message'=>'Success',
			'data'=>$response12,
			);
		echo json_encode($j_arr);
    }

	
	function seekers()
	{
		$this->language_fatch('re_seekers');

		$job_types=$this->Common_model->select('job_types');
		$industry2=$this->Common_model->select('area_of_sectors');
		$skills=$this->Common_model->select('skills');
		// print_r($skill);die;
		$shifttimings=$this->Common_model->select('preferred_shift');
		$noticeperiods=$this->Common_model->select('notice_period');
		$functions=$this->Common_model->select('specialization');
		$qualification_types=$this->Common_model->select('qualification_type');
		$language=$this->Common_model->select('jp_language_name');
		$this->db->select('*');
        $this->db->from('seeker');

		$state = $_GET['state'];
		$skname = $_GET['skname'];
		$city = $_GET['city'];
		$locality = $_GET['locality'];
		$job_type = $_GET['job_type'];
		$qualification_type = $_GET['qualification_type'];
		$qualification = $_GET['qualification'];
		$exp_typ = $_GET['exp_typ'];
		$industry = $_GET['industry'];
		$skillval = $_GET['skill'];
		$noticeperiodval = $_GET['noticeperiod'];
		$shifttimingval = $_GET['shifttiming'];
		$gender = $_GET['gender'];
		$functionval = $_GET['function'];
		$exp_year = $_GET['exp_year'];
		$experience = $_GET['experience'];
		
        if (!empty($skname)) {
            $this->db->Like('name',$skname);
        }
        if (!empty($state)) {
            $this->db->Like('p_locaion',$state);
        }
		if (!empty($city)) {
            $this->db->Like('city',$city);
        }
		if (!empty($locality)) {
            $this->db->Like('locality',$locality);
        }
		if (!empty($job_type)) {
			foreach ($job_type as $jobtype) {
				$this->db->or_like('job_type', $jobtype);
			}
			
            // $this->db->Like('job_type',$job_type);
        }
		if (!empty($qualification_type)) {
			foreach ($qualification_type as $qtype) {
				$this->db->or_like('qua_type', $qtype);
				
			}
			
            // $this->db->Like('job_type',$job_type);
        }
		if (!empty($exp_typ)) {
			foreach ($exp_typ as $etype) {
				$this->db->or_like('exp', $etype);
				if ($etype=='Experienced') {
					if (!empty($experience)) {
					$this->db->where('experience',$experience);
				}
					if (!empty($exp_year)) {
					$this->db->where('exp_year',$exp_year);
				}
			}
			}
			
            // $this->db->Like('job_type',$job_type);
        }
		
		if (!empty($qualification)) {
            $this->db->Like('qua',$qualification);
        }
		
		if (!empty($industry)) {
			foreach ($industry as $aofs) {
				$this->db->or_like('aofs', $aofs);
			}
            // $this->db->Like('aofs',$industry);
        }
        
		if (!empty($skillval)) {
			foreach ($skillval as $skillvals) {
				$this->db->or_like('skills', $skillvals);
			}
            // $this->db->Like('skills',$skillval);
        }
        
		if (!empty($noticeperiodval)) {
            // $this->db->Like('notice_period',$noticeperiodval);
			foreach ($noticeperiodval as $noticeperiodvals) {
				$this->db->or_like('notice_period', $noticeperiodvals);
			}
        }
        
		if (!empty($gender)) {
			foreach ($gender as $gn) {
				$this->db->or_like('gender', $gn);
			}
            // $this->db->Like('gender',$gender);
        }
        
		if (!empty($shifttimingval)) {
			foreach ($shifttimingval as $shifttimingvals) {
				$this->db->or_like('preferred_shift', $shifttimingvals);
			}
            // $this->db->Like('preferred_shift',$shifttimingval);
        }
        elseif (!empty($functionval)) {
            // $this->db->Like('function',$functionval);
			foreach ($functionval as $functionvals) {
				$this->db->or_like('function', $functionvals);
			}
        }
        $row = $this->db->get()->result();
		
if(empty($state)&&empty($skname)&&empty($city)&&empty($locality)&&empty($job_type)&&empty($qualification_type)&&empty($qualification)&&empty($exp_typ)&&empty($industry)&&empty($skillval)&&empty($noticeperiodval)&&empty($gender)&&empty($shifttimingval)&&empty($functionval)&&empty($experience)&&empty($exp_year)){
	$row=[];
}
	$this->load->view('re_seekers',['row'=>$row,'job_types'=>$job_types,'industry'=>$industry2,'qualification_type'=>$qualification_types,'skills'=>$skills,'function'=>$functions,'language'=>$language,'noticeperiod'=>$noticeperiods,'shifttiming'=>$shifttimings,'controller'=>$this]);

		
	}




	function recruiter_profile_update(){

		//email all required field
		$s1=$this->session->userdata('recruiter');
		$data=$this->input->post();

            $data['language']=implode(', ', $this->input->post('language'));
		$file_name=$_FILES['img']['name'];
		if(empty($file_name))
		{
			if(!empty($data))
			{
				$r1=$this->Common_model->select('recruiter',$s1,'email');
				$res=$this->Common_model->updateData('recruiter',$data,$s1,'email');
				if($res)
				{
					echo "Update";
				}
				else
				{
					echo "Not Update";
				}		
			}
		}
		else
		{
			$res1=$this->Common_model->select('recruiter',$s1,'email');
			$img=$res1->img;	
			$config['upload_path']="./uploads/user_pro_pic";
			$config['allowed_types']="jpg|jpeg|png";
			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('img'))
			{
				if(!empty($img))
				{
				if($img!="assets/images/user.svg")
				{
				unlink('./'.$img);
				}
				}
				$d1=$this->upload->data();
				$d= $d1['file_name'];
				$d2='uploads/user_pro_pic/'.$d;
				$data['img']=$d2;
				$r1=$this->Common_model->select('recruiter',$s1,'email');
				$res=$this->Common_model->updateData('recruiter',$data,$s1,'email');
				if($res)
				{
					echo "Update";
				}
				else
				{
					echo "Not Update";
				}		
			}
			else
			{
				echo "Only JPG And PNG File Allowed";
			}
	    }
		
	}
	function revenue_plans()
	{
			$this->language_fatch('revenue_plans');
		    $d1['controller']=$this;
			$plans_info=$this->Common_model->select('jp_plans','Active','status');
			$d1['plans_info']=$plans_info;
			$this->load->view('revenue_plans',$d1);
	}
	function payment($id)
	{
		    $this->language_fatch('payment');
		    $d1['controller']=$this;
			$d1['id']=$id;
		$this->load->view('pay_pal',$d1);
	}
    function paypal()
	{
		$email= $this->session->userdata('recruiter');
		$plane_id=$this->input->post('id');
		if(isset($plane_id))
		{
			$plane_id=$this->input->post('id');
			$this->session->set_userdata('p_id',$plane_id);
			$plane_data=$this->Common_model->select('jp_plans',$plane_id,'id');
			$paypal_info=$this->Common_model->select('jp_setting','2','id');
			$price=$plane_data->amount_usd;
			$id=$plane_data->id;
			$c= base_url('recruiter/paypal_cancel');
			$s= base_url('recruiter/paypal_success');
			$n= base_url('recruiter/paypal_notify');
			echo $form='<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="payuForm" name="pay_form_name">
										<input type="hidden" name="business" value="'.$paypal_info->paypal_email.'">
										<input type="hidden" name="item_name" value="'.$id.'">
										<input type="hidden" name="amount" value="'.$price.'">
										<input type="hidden" name="item_number" value="'.$email.'">
										<input type="hidden" name="no_shipping" value="1">
										<input type="hidden" name="currency_code" value="USD">
										<input type="hidden" name="cmd" value="_xclick">
										<input type="hidden" name="handling" value="0">
										<input type="hidden" name="no_note" value="1">
										<input type="hidden" name="custom" value="1">
										<input type="hidden" name="cancel_return" value="'.$c.'">
										<input type="hidden" name="return" value="'.$s.'">
										<input type="hidden" name="notify_url" value="'.$n.'">
		</form>';
		}
		else
		{
			echo "<script>window.location.href='".base_url()."'</script>";
		}
	}
	
	function paypal_cancel()
	{
		$this->language_fatch('user_profile_page');
		$this->language_fatch_v('validation');
	    $data['controller']=$this;
		$this->load->view('cancel',$data);
	}
	function paypal_success()
	{
		   $email= $this->session->userdata('recruiter');
		   $p_id= $this->session->userdata('p_id');
		   if(isset($p_id))
		   {
			    $rec_info=$this->Common_model->select('recruiter',$email,'email');
				$pay_count=$rec_info->pay_count;
				$pay_count=$pay_count+1;
				
				$p_id= $this->session->userdata('p_id');
				$p_info=$this->Common_model->select('jp_plans',$p_id,'id');
				$p_infi_plane=$p_info->name;
				$p_infi_month=$p_info->duration;
				$d1=date('Y/m/d');
				$arr=array('pay'=>'yes',
				'pay_date'=>$d1,
				'plan'=>$p_infi_plane,
				'month'=>$p_infi_month,
				'show_on_reg'=>'yes',
				'pay_count'=>$pay_count,
				);
				
				$res=$this->Common_model->updateData('recruiter',$arr,$email,'email');
			    if($res)
			    {
					$this->session->set_flashdata('msg', 'Update');
					$url="recruiter/recruiter_profile";
					echo'
					<script>
					window.location.href = "'.base_url().$url.'";
					</script>
					';
			    }
				else
				{
					echo "Fail";
				}
		  }
		  else
		  {
			  echo'
				<script>
				window.location.href = "'.base_url().'";
				</script>
				';
		  }
		
	}
	function paypal_notify()
	{
		if(isset($_POST['payer_id']))
		{
			$d1=date('Y/m/d');
			$pd=$_POST['item_name'];
			$uname=$_POST['item_number'];
			$custom=$_POST['custom'];
			$payment_type=$_POST['payment_type'];
			$status=$_POST['payment_status'];
			$pay_amount=$_POST['mc_gross'];
			$arr=array('p_id'=>$pd,
			'payment_type'=>$payment_type,
			'status'=>$status,
			'pay_amount'=>$pay_amount,
			'source'=>'Paypal',
			'pay_date'=>$d1,
			'email'=>$uname,
			);
			$this->Common_model->insert('jp_payment',$arr);
		}
		else
		{
				redirect('/');
		}
	}
	
	function job_post()
	{
	  
		$s1=$this->session->userdata('recruiter');
		$data=$this->input->post();
		$desi=$this->input->post('designation');
		$sp=$this->input->post('specialization');
		if(!empty($data))
		{	$pay_status_check=$this->Common_model->select('recruiter',$s1,'email');
			$counter=$pay_status_check->counter;
			if($counter==0)
			{
				$this->session->set_flashdata('profile_update','yes');
				echo "profile_update";
			}
			else
			{
				$this->push($sp,$desi);
				$lasr_date_application=$this->input->post('lasr_date_application');
				if(empty($lasr_date_application))
				{
					$data['lasr_date_application']=' ';
				}
				
				$pay_count=$pay_status_check->pay_count;
				$status_res=$pay_status_check->pay;
				$p1=$pay_status_check->plan;
				$pay_month=$pay_status_check->month;
				$pay_type=$pay_status_check->type;
				$plan=$pay_status_check->plan;
				$job_post_count=$this->Common_model->download_count('job_post',$s1,'r_id',$pay_count,'pay_count');
				if($status_res=='yes')
				{
					$plan_info=$this->Common_model->select('jp_plans',$plan,'name');
					if($pay_month=='one_time')
					{
						$res=$this->Common_model->insert('job_post',$data);
									if($res)
									{
										echo "Insert";
									}
									else
									{
										echo "Not INsert";
									}
					}
					else
					{
						$yaer2="";
						$pay_date=$pay_status_check->pay_date;
						$pay_date_array=explode('/',$pay_date);
						$year1=$pay_date_array[0];
						$month1=$pay_date_array[1];
						$day1=$pay_date_array[2];
						$pay_date_array2=$pay_date_array;
						$num_day=$day1+$plan_info->duration;
						$new_num_day=$num_day;
								if($num_day>30)
								{
									$new_month1=$month1+ceil($num_day/30);
									if($new_month1>12)
									{
										$new_year1=ceil($new_month1/12);
										$pay_date_array[0]=$year1+$new_year1;
									}
									else
									{
										 $pay_date_array[1]=$new_month1;
										 $new_day1=$num_day/30;
										for($i=1;$i<=intval($new_day1);$i++)
										{
											  $new_num_day=$new_num_day-30;
										}
										$pay_date_array[2]=$new_num_day;
										
									}
								}
								else
								{
									$pay_date_array[2]=$num_day;
								}	
						//print_r($pay_date_array2);
						$last_date=implode('/',$pay_date_array);
						$d1=date('Y/m/d');
						$d2= str_replace("/","",$d1);	
						$current_data_int_format= (int)$d2;
						 $last_date2= str_replace("/","",$last_date);
						 $last_data_int_format= (int)$last_date2;
						if($plan_info->value1=="ALL")
						{
									$res=$this->Common_model->insert('job_post',$data);
									if($res)
									{
										echo "Insert";
									}
									else
									{
										echo "Not INsert";
									}
						}
						else if($job_post_count>=$plan_info->value1)
						{
							echo "pay_limit";
						}
						else if($current_data_int_format>=$last_data_int_format)
						{
							echo "pay_ex";
						}
						else
						{
							$res=$this->Common_model->insert('job_post',$data);
									if($res)
									{
										echo "Insert";
									}
									else
									{
										echo "Not INsert";
									}
						}	
					}
					
				}
				else
				{
					  $plan=$pay_status_check->plan;
					  if($plan=="number_job_post")
					  {
						 $r_data=$this->Common_model->select('jp_revenue');
						  $r_data2="";
						  foreach($r_data as $rd)
						  {
							 $r_data2=$rd->value1;
						  }
							$job_post_count=$this->Common_model->row_count('job_post',$s1,'r_id');
							if($r_data2=="ALL")
							{
								$res=$this->Common_model->insert('job_post',$data);
								if($res)
								{
									echo "Insert";
								}
								else
								{
									echo "Not INsert";
								}
							}
							else if($job_post_count>=$r_data2)
							{
								echo 'pay';
							}
							else
							{
								$res=$this->Common_model->insert('job_post',$data);
								if($res)
								{
									echo "Insert";
								}
								else
								{
									echo "Not INsert";
								}
							}
					  }
					  else if($plan=="num_of_resume_download")
					  {
								$res=$this->Common_model->insert('job_post',$data);
								if($res)
								{
									echo "Insert";
								}
								else
								{
									echo "Not INsert";
								}
					  }
					  else if($plan=="applay_both_condation")
					  {
						  $r_data=$this->Common_model->select('jp_revenue');
						 $resume_count=$this->Common_model->row_count('jp_resume_count',$s1,'recruiter');
						 $job_post_count=$this->Common_model->row_count('job_post',$s1,'r_id');
						  $r_data2="";
						  $r_data3="";
						 foreach($r_data as $rd)
						  {
							 $r_data2=$rd->value1;
							 $r_data3=$rd->value2;
						  }	
						if($r_data2=="ALL")
						  {
							  $res=$this->Common_model->insert('job_post',$data);
								if($res)
								{
									echo "Insert";
								}
								else
								{
									echo "Not INsert";
								}
						  }
						  else if($r_data3=="ALL")
						  {
							  $res=$this->Common_model->insert('job_post',$data);
								if($res)
								{
									echo "Insert";
								}
								else
								{
									echo "Not INsert";
								}
						  }
						  else if($resume_count>$r_data3)
						  {
							  echo "pay";
						  }
						  else if($job_post_count>=$r_data2)
						  {
							  echo "pay";
						  }
						  else
						  {
							  $res=$this->Common_model->insert('job_post',$data);
								if($res)
								{
									echo "Insert";
								}
								else
								{
									echo "Not INsert";
								}
						  }
					  }
					  else
					  {
						  echo "Last";
					  }
					  
				}
		    }
		}
	}
	
	function applied_seeker()
	{
		$this->language_fatch('applied_seeker');
	    $data['controller']=$this;
		$this->load->view('applied_seeker',$data);
	}
	function pagination_applied_seeker()
	{
		  $s1=$this->session->userdata('recruiter');
		  $rec_id=$this->Common_model->select('recruiter',$s1,'email');
		  $id= $rec_id->id;
		  $this->load->model("Common_model");
		  $this->load->library("pagination");
		  $config = array();
		  $config["base_url"] = "#";
		  $config["total_rows"] = $this->Common_model->row_count('jp_applay_job',$id,'r_id');
		  $config["per_page"] = 10;
		  $config["uri_segment"] = 3;
		  $config["use_page_numbers"] = TRUE;
		  $config["full_tag_open"] = '<ul style="background:white" class="pagination pagination-lg">';
		  $config["full_tag_close"] = '</ul>';
		  $config["first_tag_open"] = '<li>';
		  $config["first_tag_close"] = '</li>';
		  $config["last_tag_open"] = '<li>';
		  $config["last_tag_close"] = '</li>';
		  $config['next_link'] = '&gt;';
		  $config["next_tag_open"] = '<li>';
		  $config["next_tag_close"] = '</li>';
		  $config["prev_link"] = "&lt;";
		  $config["prev_tag_open"] = "<li>";
		  $config["prev_tag_close"] = "</li>";
		  $config["cur_tag_open"] = "<li class='active'><a href='#'>";
		  $config["cur_tag_close"] = "</a></li>";
		  $config["num_tag_open"] = "<li>";
		  $config["num_tag_close"] = "</li>";
		  $config['first_link'] = false;
          $config['last_link'] = false;
		  $this->pagination->initialize($config);
		  $page = $this->uri->segment(3);
		  $start = ($page - 1) * $config["per_page"];
		  $s1=$this->session->userdata('recruiter');
		  $s1=$this->session->userdata('recruiter');
		  $rec_id = $this->Common_model->select('recruiter',$s1,'email');
		  $r_id= $rec_id->id;	
		  $applay_seeker=$this->Common_model->fetch_details('jp_applay_job',$config["per_page"], $start,$r_id,'r_id');
		  $link = $this->pagination->create_links();
		  $this->language_fatch('applied_seeker');
	      $data['controller']=$this;
		  $data['applay_seeker']=$applay_seeker;
		  $data['link']=$link;
		  $this->load->view('module/applied_seeker',$data);
	 }

	function logout()
	{
		$this->session->unset_userdata('recruiter');
		$url="home/login";
			echo'
			<script>
			window.location.href = "'.base_url().$url.'";
			</script>
			';
	}
	
	
	function seeker_informaion($id='',$job_id='')
	{
		if($id!='')
		{
			$seeker_data=$this->Common_model->select('seeker',$id,'id');
			$this->language_fatch('seeker_info');
		    $data['controller']=$this;
			$data['seeker_informaion']=$seeker_data;
			$data['job_id']=$job_id;
			$this->load->view('seeker_informaion',$data);
		}
	}
	function applied_job_information($id='')
	{
		if($id!='')
		{
		$job_information=$this->Common_model->select('job_post',$id,'id');
		$this->language_fatch('applied_job_info');
	    $data['controller']=$this;
		$data['r1']=$job_information;
		$this->load->view('applied_job_information',$data);
		}
	}
	
		function resume_download($id='',$job_id='')
		{ 
			if($id!='')
			{
				$s1=$this->session->userdata('recruiter');
				$jp_revenue=$this->Common_model->select('jp_revenue','1','id');
				$recruiter=$this->Common_model->select('recruiter',$s1,'email');
				$seeker=$this->Common_model->select('seeker',$id,'id');
				$pay_month=$recruiter->month;
				$seeker_resume=$seeker->resume;
				$pay_starus=$recruiter->pay;
				$pay_date=$recruiter->pay_date;
				$plan=$recruiter->plan;
				$payu_count_for_resume=$recruiter->pay_count;
				$seeker_email=$seeker->email;
				$d_count=$this->Common_model->download_count('jp_resume_count',$s1,'recruiter',$seeker_email,'seeker',$job_id,'job_id');
				$d_count2=$this->Common_model->download_count('jp_resume_count',$s1,'recruiter',$payu_count_for_resume,'pay_count');
				if($pay_starus=="yes")
				{
					if($pay_date=='one_time')
					{
						redirect(base_url().$seeker_resume);
					}
					else
					{
						$plan_info=$this->Common_model->select('jp_plans',$plan,'name');
						$condation=$plan_info->condation1;
						$value='';
						if($plan_info->value2=="ALL")
						{
								redirect(base_url().$seeker_resume);
						}
						else if($condation=='num_of_resume_download')
						{
							$value=$plan_info->value2;
						}
						else if($condation=='applay_both_condation')
						{
							$value=$plan_info->value2;
						}
						else 
						{
							
						}
						$pay_date=$recruiter->pay_date;
						$pay_date_array=explode('/',$pay_date);
						$year1=$pay_date_array[0];
						$month1=$pay_date_array[1];
						$day1=$pay_date_array[2];
						$yaer2=$year1+$pay_month;
						$pay_date_array2=$pay_date_array;
						
							$num_day1=$plan_info->duration;
							$num_day=$num_day1+$day1;
							$new_num_day=$num_day;
									if($num_day>30)
									{
										$new_month1=$month1+ceil($num_day/30);
										if($new_month1>12)
										{
											$new_year1=ceil($new_month1/12);
											$pay_date_array[0]=$year1+$new_year1;
										}
										else
										{
											 $pay_date_array[1]=$new_month1;
											 $new_day1=$num_day/30;
											for($i=1;$i<=intval($new_day1);$i++)
											{
												  $new_num_day=$new_num_day-30;
											}
											$pay_date_array[2]=$new_num_day;	
										}
									}
									else
									{
										$pay_date_array[2]=$num_day;
									}
						$last_date=implode('/',$pay_date_array);
						$d1=date('Y/m/d');
						$d2= str_replace("/","",$d1);	
						$current_data_int_format= (int)$d2;
						$last_date2= str_replace("/","",$last_date);
						$last_data_int_format= (int)$last_date2;
						if($current_data_int_format>=$last_data_int_format)
						{
								//echo "pay";
								$url="recruiter/applied_seeker";
							  $this->session->set_flashdata('msg','Your Plan Expired'); 
							   echo '<script>window.location.href = "'.base_url().$url.'";</script>';
						} 
						else
						{
							if($value!='')
							{
								if($d_count2>$value)
								{
											$url="recruiter/applied_seeker";
											$this->session->set_flashdata('msg','Your Resume Download Limit Over'); 
											echo '<script>window.location.href = "'.base_url().$url.'";</script>';
								}
								else 
								{
									
									$arr=array('seeker'=>$seeker_email,'recruiter'=>$s1,'pay_count'=>$payu_count_for_resume,'job_id'=>$job_id);
									  if($d_count>0)
									  {
										  redirect(base_url().$seeker_resume);
									  }
									  else
									  {
										  $this->Common_model->insert('jp_resume_count',$arr);
										  redirect(base_url().$seeker_resume);
									  }
								}
							}
							else
							{
								$arr=array('seeker'=>$seeker_email,'recruiter'=>$s1,'pay_count'=>$payu_count_for_resume,'job_id'=>$job_id);
									  if($d_count>0)
									  {
										  redirect(base_url().$seeker_resume);
									  }
									  else
									  {
										  $this->Common_model->insert('jp_resume_count',$arr);
										  redirect(base_url().$seeker_resume);
									  }
									
							}
						}
					}

				
				}
				else
				{
					$jp_revenue_plane=$this->Common_model->select('jp_revenue','1','id');
					$condation=$jp_revenue_plane->condation;
					$value2=$jp_revenue_plane->value2;
					if($condation=='num_of_resume_download')
					{
						if($d_count2>$value2)
						{
							$url="recruiter/applied_seeker";
							$this->session->set_flashdata('msg','Your Resume Download Limit Over'); 
							echo '<script>window.location.href = "'.base_url().$url.'";</script>';
						}
						else
						{
							$arr=array('seeker'=>$seeker_email,'recruiter'=>$s1,'pay_count'=>$payu_count_for_resume,'job_id'=>$job_id);
									  if($d_count>0)
									  {
										  redirect(base_url().$seeker_resume);
									  }
									  else
									  {
										  $this->Common_model->insert('jp_resume_count',$arr);
										  redirect(base_url().$seeker_resume);
									  }
						}
					}
					else 
					{
						$arr=array('seeker'=>$seeker_email,'recruiter'=>$s1,'pay_count'=>$payu_count_for_resume,'job_id'=>$job_id);
									  if($d_count>0)
									  {
										  redirect(base_url().$seeker_resume);
									  }
									  else
									  {
										  $this->Common_model->insert('jp_resume_count',$arr);
										  redirect(base_url().$seeker_resume);
									  }
					}
				}
			}
			
		}
	function payum()
	{
		 $plane_id=$this->input->post('id');
		 if(isset($plane_id))
		 {
			   $plane_data=$this->Common_model->select('jp_plans',$plane_id,'id');
			   $payu_info=$this->Common_model->select('jp_setting','2','id');
			   $price=$plane_data->amount_inr;
			    $id=$plane_data->name;
			   $s1=$this->session->userdata('recruiter');
			   $rec_data=$this->Common_model->select('recruiter',$s1,'email');
		       $MERCHANT_KEY =$payu_info->merchant_key;
			   $SALT = $payu_info->merchant_salt;
          $txnid = '10';
		  $ts_uname=$rec_data->name;;
		  $user_email=$s1;

		  $user_mobile=$rec_data->mno;
		  $finalItemAmount=$price;
		  $finalItemName=$id;
          $hash_string = $MERCHANT_KEY.'|'.$txnid.'|'.$finalItemAmount.'|'.$finalItemName.'|'.$ts_uname.'|'.$user_email.'|||||||||||'.$SALT;
          $hash = strtolower(hash('sha512', $hash_string));
          echo $formData =
                         '<form action="https://sandboxsecure.payu.in/_payment" method="post" id="payuForm1" name="payuForm1">
                          <input type="hidden" name="key" value="'.$MERCHANT_KEY.'" />
                          <input type="hidden" name="hash" value="'.$hash.'"/>
                          <input type="hidden" name="txnid" value="'.$txnid.'" />
                          <input type="hidden" name="amount" value="'.$finalItemAmount.'" />
                          <input type="hidden" name="firstname" id="firstname" value="'.$ts_uname.'" />
                          <input type="hidden" name="email" id="email" value="'.$user_email.'" />
                          <input type="hidden" name="phone" value="'.$user_mobile.'" />
                          <input type="hidden" name="productinfo" value="'.$finalItemName.'" />
                          <input type="hidden" name="surl" value="'.base_url().'recruiter/payu_success">
                          <input type="hidden" name="furl" value="'.base_url().'recruiter/payu_cancel">
                          <input type="hidden" name="curl" value="'.base_url().'recruiter/payu_cancel">
                          <input type="hidden" name="service_provider" value="payu_paisa">
						  
                         </form>';
		 }
	}
	function payu_success()
	{
		if(isset($mihpayid))
		{
		    $email= $this->session->userdata('recruiter');
			$p_info=$this->Common_model->select('jp_revenue');
			$p_infi_plane='';
			$p_infi_type='';
			$p_infi_month='';
			foreach($p_info as $p1)
			{
				$p_infi_plane=$p1->condation;
				$p_infi_type=$p1->type;
				$p_infi_month=$p1->month;
			}
			$d1=date('Y/m/d');
			$arr=array('pay'=>'yes',
			'pay_date'=>$d1,
			'plan'=>$p_infi_plane,
			'type'=>$p_infi_type,
			'month'=>$p_infi_month,
			'show_on_reg'=>'yes',
			);
			$res=$this->Common_model->updateData('recruiter',$arr,$email,'email');
		
			$mihpayid=$_POST['productinfo'];
			$mode=$_POST['mode'];
			$status=$_POST['status'];
			$amount=$_POST['amount'];
			$arr=array('p_id'=>$mihpayid,
					 '	payment_type'=>$mode,
					 'status'=>$status,
					 'pay_amount'=>$amount,
					 'source'=>'Payumoney',
					 'pay_date'=>$d1,
					 'email'=>$email,
			);
			$res=$this->Common_model->insert('jp_payment',$arr);
			if($res)
			{
				$this->session->set_flashdata('msg', 'Update');
					$url="recruiter/post_jobs";
					echo'
					<script>
					window.location.href = "'.base_url().$url.'";
					</script>
					';
			}
			else 
			{
				echo "Fail";
			}
		}
	}
	function payu_cancel()
	{
		$this->language_fatch('user_profile_page');
		$this->language_fatch_v('validation');
	    $data['controller']=$this;
		$this->load->view('cancel');
	}
	function language_change()
	{
		$req_data=$this->input->post('req_data');
		$res=$this->Common_model->select('jp_setting','2','id');
		$language=$res->language;
		$data=$this->Common_model->language_change('jp_language',$language,$req_data,'language_key');
		echo $data->$language;
	}
	function language_fatch($page_name)
	{
		//$req_data=$this->input->post('req_data');
		$res=$this->Common_model->select('jp_setting','2','id');
		$language=$res->language;
	    $data=$this->Common_model->language_change('jp_language',$language,'language_key',$page_name,'language_type');
		$data1=$this->Common_model->language_change('jp_language',$language,'language_key','recruiter_header','language_type');
		;
	    $this->diff_language=$this->Common_model->language_change('jp_language','english','language_key',$page_name,'language_type');
		$this->diff_language_menu=$this->Common_model->language_change('jp_language','english','language_key','recruiter_header','language_type');
		$this->default_languag=$language;
		$this->language_data_a=$data;
		$this->user_header1=$data1;
	}
	
	function set_language($key_word)
	{
		if($key_word=='my_jobs1' || $key_word=='post_a_job1' || $key_word=='r_logout' || $key_word=='r_profile_setting' || $key_word=='applied_seeker' || $key_word=='trem_keyword' || $key_word=='ptivcy_keyword' || $key_word=='about_keyword' || $key_word=='contect_keyword')
		{
			$data=$this->user_header1;
			$language=$this->default_languag;
			$arr_data='';
			$d=$this->diff_language;
			$d2=$this->diff_language_menu;
			foreach($data as $d1)
			{
				if($d1->language_key==$key_word)
				{
						$backup=$d1->$language;
						if(empty($backup))
						{
							foreach($d2 as $dd2)
							{
								if($dd2->language_key==$key_word)
								{
									return $dd2->english;
								}
							}
						}
						else
						{
							return $backup;
						}
				}
				
			}
		}
		else
		{
			$data=$this->language_data_a;
			$language=$this->default_languag;
			$d=$this->diff_language;
			$arr_data='';
			foreach($data as $d1)
			{
				if($d1->language_key==$key_word)
				{
						$backup=$d1->$language;
						if(empty($backup))
						{
							foreach($d as $dd)
							{
								if($dd->language_key==$key_word)
								{
									return $dd->english;
								}
							}
						}
						else
						{
							return $backup;
						}
				}
				
			}
		}
	}
	function language_fatch_v($page_name)
	{
		//$req_data=$this->input->post('req_data');
		$res=$this->Common_model->select('jp_setting','2','id');
		$language=$res->language;
	    $data=$this->Common_model->language_change('jp_language',$language,'language_key',$page_name,'language_type');
		$data1=$this->Common_model->language_change('jp_language',$language,'language_key','menu_header','language_type');
		$this->default_languag_v=$language;
		$this->language_data_a_v=$data;
		$this->user_header1_v=$data1;
	}
	function set_language_v($key_word)
	{
		if($key_word=='login' || $key_word=='jobs' || $key_word=='applied_job' || $key_word=='profile_setting' || $key_word=='logout' || $key_word=='trem_keyword' || $key_word=='ptivcy_keyword' || $key_word=='about_keyword' || $key_word=='contect_keyword' )
		{
			$data=$this->user_header1_v;
			$language=$this->default_languag_v;
			$arr_data='';
			foreach($data as $d1)
			{
				if($d1->language_key==$key_word)
				{
						return $d1->$language;
				}
				
			}
		}
		else
		{
			$data=$this->language_data_a_v;
			$language=$this->default_languag_v;
			$arr_data='';
			foreach($data as $d1)
			{
				if($d1->language_key==$key_word)
				{
						return $d1->$language;
				}
				
			}
		}
	}
	function send_notification ($tokens, $message)
	{
			$url = 'https://fcm.googleapis.com/fcm/send';
			$fields = array(
				 'registration_ids' => $tokens,
				 'notification' => $message,
				);

			$headers = array(
				'Authorization:key =AIzaSyBO6mT5A6E21y7524xYmypmbAgOwVhJkG0',
				'Content-Type: application/json'
				);

		   $ch = curl_init();
		   curl_setopt($ch, CURLOPT_URL, $url);
		   curl_setopt($ch, CURLOPT_POST, true);
		   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		   curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
		   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		   curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		   $result = curl_exec($ch);           
		   if ($result === FALSE) {
			   die('Curl failed: ' . curl_error($ch));
		   }
		   curl_close($ch);
		   return $result;
	}
	function a()
	{
		$this->push('a','b');
		/*$res=$this->Common_model->select('seeker');
		$tokens=array();
		foreach($res as $r1)
		{
			$backup=$r1->token;
			if(!empty($backup))
			{
				$tokens[]=$backup;
			}
			
		}
		echo "<pre>";
		print_r(array_unique($tokens));
		echo "</pre>";*/
	}
	function push($name,$desi)
	{
		$res=$this->Common_model->select('seeker');
		$tokens=array();
		foreach($res as $r1)
		{
			$backup=$r1->token;
			if(!empty($backup))
			{
				$tokens[]=$backup;
			}
			
		}
		$message = array("body" => $desi,
					"title"=>$name,
		);
		$t=array_unique($tokens);
		$t2=implode(" ",$t);
		$t3=explode(" ",$t2);
		$message_status = $this->send_notification($t3, $message);
	}
	function terms($id='')
	{
		$this->language_fatch('compliamce');
		$this->language_fatch_v('validation');
		$data['controller']=$this;
		$this->load->view('term_and_condition',$data);
	}
	
	function policy($id='')
	{
		$this->language_fatch('compliamce');
		$this->language_fatch_v('validation');
		$data['controller']=$this;
		$this->load->view('privacy_policy',$data);
	}
	function about($id='')
	{
		$this->language_fatch('compliamce');
		$this->language_fatch_v('validation');
		$data['controller']=$this;
		$this->load->view('about',$data);
	}
	function contact($id='')
	{
		$this->language_fatch('compliamce');
		$this->language_fatch_v('validation');
		$data['controller']=$this;
		$this->load->view('contact',$data);
	}
	function text_filter()
	{
		$data=$this->input->post('search_text');
		if(!empty($data))
		{
			 $condation=array('specialization'=>$data,'r_id'=>$this->email);
			 $q=$this->db->select('*')->from('job_post')->like($condation)->get();
			if($q->result())
			{
				$this->language_fatch('recruiter_home');
				$this->language_fatch_v('validation');
				$d1['controller']=$this;
				$d1['sres']=$q->result();
				$this->load->view('module/my_jobs',$d1);
			}
			else
			{
				 $condation=array('job_location'=>$data,'r_id'=>$this->email);
			     $q=$this->db->select('*')->from('job_post')->like($condation)->get();
				 if($q->result())
				 {
					$this->language_fatch('recruiter_home');
					$this->language_fatch_v('validation');
					$d1['controller']=$this;
					$d1['sres']=$q->result();
					$this->load->view('module/my_jobs',$d1);
				 }
				else
				{
					$condation=array('technology'=>$data,'r_id'=>$this->email);
					 $q=$this->db->select('*')->from('job_post')->like($condation)->get();
					 if($q->result())
					 {
						$this->language_fatch('recruiter_home');
						$this->language_fatch_v('validation');
						$d1['controller']=$this;
						$d1['sres']=$q->result();
						$this->load->view('module/my_jobs',$d1);
					 }
					 else
					 {
						$this->language_fatch('recruiter_home');
						$this->language_fatch_v('validation');
						$d1['controller']=$this;
						$d1['sres']='';
						$this->load->view('module/my_jobs',$d1);
					 }
				}
			}
			
		}
		else
		{
			redirect('recruiter');
		}
		
	}


	function newjobpost(){
		$post=$this->input->post();
		$insertdata = [
			'pay_count'=>$_POST['pay_count'],
			'r_id'=>$_POST['r_id'],
			'post_date'=>$_POST['post_date'],
			'designation'=>$_POST['designation'],
			'number_of_vacancies'=>$_POST['number_of_vacancies'],
			'job_type'=>$_POST['job_type'],
			'job_location'=>$_POST['state'].",".$_POST['city'].",".$_POST['locality'],
			'qualification_type'=>$_POST['qualification_type'],
			'qualification'=>$_POST['qualification'],
			'year_of_passing'=>$_POST['year_of_passing'],
			'pre_cgpa'=>$_POST['pre_cgpa'],
			'area_of_sector'=>$_POST['area_of_sector'],
			'specialization'=>$_POST['specialization'],
			'exp'=>$_POST['exp'],
			'salary_range'=>$_POST['salary_range'],
			'min'=>$_POST['min'],
			'max'=>$_POST['max'],
			'state'=>$_POST['state'],
			'city'=>$_POST['city'],
			'locality'=>$_POST['locality'],
			'notice_period'=>$_POST['notice_period'],
			'job_desc'=>$_POST['job_desc'],
			'preferred_shift'=>$_POST['preferred_shift'],
			'language'=>implode(', ', $this->input->post('language')),
			'skills'=>implode(', ', $this->input->post('skills')),
			'benefit'=>implode(', ', $this->input->post('benefit')),
		];
		
		$this->db->insert('job_post',$insertdata);
		$this->session->set_flashdata('msg', 'Added');

		redirect('recruiter');
	}





	
	function updatejobpost(){

         $post=$this->input->post();


		//  print_r($post);die;
         $id=$this->input->post('id');
         $post['language']= implode(', ', $this->input->post('language'));
         $post['skills']= implode(', ', $this->input->post('skills'));

         $res=$this->Common_model->updateData('job_post',$post,$id,'id');

		$this->session->set_flashdata('msg', 'update');

		redirect('recruiter');
	}

	
}
?>