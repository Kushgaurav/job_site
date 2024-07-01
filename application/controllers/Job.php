<?php
class Job extends CI_Controller
{
	public $language_data_a=10;
	public $default_languag=1;
	public $user_header1=1;
	public $diff_language=0;
	public $diff_language_menu=0;
	public $language_data_a_v=10;
	public $default_languag_v=1;
	public $user_header1_v=1;
	public function a()
	{
		echo "fd";
	}
	function user_jobSingle($id='')
	{
		if($id!='')
		{
			$custom_ads=array();
			$email=$this->session->userdata('seeker');
			$job_info=$this->Common_model->select('job_post',$id,'id');  													  //Job Detail
			$r_id = $job_info->r_id;
			$id = $job_info->id;
			if(!empty($email)){
			    			$rec_info = $this->Common_model->select('recruiter',$r_id,'email');    											   //org_detail
			}
			

			$check_status=$this->Common_model->job_applay_status_check('jp_applay_job',$id,$email,'job_id','s_email');   //Job Applay Status Check
			$custom_adds_count=$this->Common_model->count_num('jp_custom_ads','Active','status');
			if($custom_adds_count>0)
			{
				$custom_ads=$this->Common_model->select('jp_custom_ads','Active','status');
			}
			$this->language_fatch('single_job');
		        $data['controller']=$this;
				$data['r1']=$job_info;
				$data['res0']=$rec_info;
				$data['r1']=$job_info;
				$data['custom_ads']=$custom_ads;
			if($check_status>0)
			{
				$data['status']='yes';
				$this->load->view('user_jobSingle',$data);
			}
			else
			{
				$data['status']='no';
				$this->load->view('user_jobSingle',$data);
			}
		}
	}
	function language_fatch($page_name)
	{
		//$req_data=$this->input->post('req_data');
		$res=$this->Common_model->select('jp_setting','2','id');
		$language=$res->language;
	    $data=$this->Common_model->language_change('jp_language',$language,'language_key',$page_name,'language_type');
		$data1=$this->Common_model->language_change('jp_language',$language,'language_key','menu_header','language_type');
		$this->default_languag=$language;
		$this->language_data_a=$data;
		$this->user_header1=$data1;
	}
	
	function set_language($key_word)
	{
		if($key_word=='login' || $key_word=='jobs' || $key_word=='applied_job' || $key_word=='profile_setting' || $key_word=='logout' || $key_word=='trem_keyword' || $key_word=='ptivcy_keyword' || $key_word=='about_keyword' || $key_word=='contect_keyword')
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
									echo $dd2->english;
								}
							}
						}
						else
						{
							echo $backup;
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
									echo $dd->english;
								}
							}
						}
						else
						{
							echo $backup;
						}
				}
				
			}
		}
	}
	function star_reating()
	{
		$rat_rating=$this->input->post('rat_rating');
		$comment=$this->input->post('comment');
		$recruiter_email=$this->input->post('recruiter_email');
		$seeker_email=$this->input->post('seeker_email');
		$data=array('rat_rating'=>$rat_rating,
					'comment'=>$comment,
					'seeker_email'=>$seeker_email,
					'recruiter_email'=>$recruiter_email,
	);
        $this->db->where(array('seeker_email'=>$seeker_email));
        $seeker_info1=$this->db->get('jp_review');
        $seeker_info=$seeker_info1->row();
        if($seeker_info)
        {
        	$res=$this->Common_model->updateData('jp_review',$data,$seeker_email,'seeker_email');
        }
        else
        {
        	$res=$this->Common_model->insert('jp_review',$data);
        }
		if($res)
			echo "insert";
		else
			echo "Not Insert";
	}
	function review_show()
	{
		$email=$this->input->post('email');
		$this->db->where(array('recruiter_email'=>$email));
		$recruiter_info=$this->db->get('jp_review');
		$recruiter_info2=$recruiter_info->result_array();
		if($recruiter_info2)
		{
			$count=$recruiter_info->num_rows();
			$sum_reating=0;
			for($i=0;$i<$count;$i++)
			{
				$reating=$recruiter_info2[$i]['rat_rating'];
				$sum_reating=$sum_reating+$reating;
			}
			$rat=intval($sum_reating/$count);
            $this->load->view('module/stars_display',['rat'=>$rat]);
		}
		else
		{
			$this->load->view('module/stars_display',['rat'=>0]);
		}
	}
}
?>