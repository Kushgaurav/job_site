<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {



	public function index(){
		$this->load->view('admin/common/header_auth');
		$this->load->view('admin/login');
		$this->load->view('admin/common/footer_auth');
	}
	function signUp($name)
	{
		$data=$this->input->post();
		if(isset($data))
		{
			if($name=='recruiter')
			{
				$plan=$this->Common_model->select('jp_revenue');
				foreach($plan as $p1)
				{
					
					$data=$this->input->post();
					$plan_name=$this->input->post('plan');
					$ps=$this->input->post('ps');
					$send_detail=$this->input->post('send_detail');
					$ps1=md5($ps);
					$data['ps']=$ps1;
					$email=$this->input->post('email');
					$mno=$this->input->post('mno');
					unset($data['rps']);
					unset($data['send_detail']);
					$d1=$this->Common_model->signUp($data,$mno,$email,$name);
					$p_info=$this->Common_model->select('jp_revenue');
					$p_infi_plane='';
					foreach($p_info as $p1)
					{
						$p_infi_plane=$p1->condation;
					}
					$plan_info=$this->Common_model->select('jp_plans',$plan_name,'name');
					$p_month=$plan_info->duration;
					if($d1==1)
					{
						$d1=date('Y/m/d');
						$arr=array('pay'=>'yes',
								   'pay_date'=>$d1,
								   'show_on_reg'=>'no',
								   'month'=>$p_month,
						);
						$res=$this->Common_model->updateData('recruiter',$arr,$email,'email');
							if(!empty($send_detail))
							{
							$email_info=$this->Common_model->select('jp_setting_email','1','id');
							$to_email_address=$email;
							$subject=$email_info->recruiter_subject;
							$message="Website Link :".base_url()."\nE-Mail :".$email."\nPassword :".$ps;
							$headers = 'From:'.$email_info->recruiter_email;
							mail($to_email_address,$subject,$message,$headers);
							}
						$this->session->set_flashdata('msg', 'Added');
						echo "Ok";
					}
					else
					{
						echo $d1;
					}
						
					
				}
			}
			else 
			{
				$data=$this->input->post();
				$ps=$this->input->post('ps');
				$send_detail=$this->input->post('send_detail');
				$ps1=md5($ps);
				$data['ps']=$ps1;
				$email=$this->input->post('email');
				$mno=$this->input->post('mno');
				
				unset($data['rps']);
				unset($data['send_detail']);
				print_r($data);
				$d1=$this->Common_model->signUp($data,$mno,$email,$name);
				if($d1==1)
				{
						if(!empty($send_detail))
						{
						$email_info=$this->Common_model->select('jp_setting_email','1','id');
						$to_email_address=$email;
						$subject=$email_info->seeker_subject;
						$message="Website Link :".base_url()."\nE-Mail :".$email."\nPassword :".$ps;
						$headers = 'From:'.$email_info->seeker_email;
						mail($to_email_address,$subject,$message,$headers);
						}
					$this->session->set_flashdata('msg', 'Added');
					echo "Ok";
				}
				else
				{
					echo $d1;
				}
			}
	    }
	}


	
	public function dashboard()
	{
	  
		$this->load->view('admin/common/header');
		
		$seeker=$this->Common_model->row_count('seeker');

		$recruiter=$this->Common_model->row_count('recruiter');

		$location=$this->Common_model->row_count('location');
		$area_of_sectors=$this->Common_model->row_count('area_of_sectors');
		$specialization=$this->Common_model->row_count('specialization');
		$qualification=$this->Common_model->row_count('qualification');
		$job_role=$this->Common_model->row_count('job_role');
		$job_types=$this->Common_model->row_count('job_types');
		$designation=$this->Common_model->row_count('designation');
		
        $experience23 = $this->db->get_where('seeker',['exp'=>'Experienced'])->result();
		$experience=count($experience23);
         

        $freshcount23 = $this->db->get_where('seeker',['exp'=>'Fresher'])->result();
		$freshcount=count($freshcount23);

		$this->load->view('admin/dashboard',['freshcount'=>$freshcount,'seeker'=>$seeker,'recruiter'=>$recruiter,'location'=>$location,'area_of_sectors'=>$area_of_sectors,'specialization'=>$specialization,'qualification'=>$qualification,'job_role'=>$job_role,'job_types'=>$job_types,'designation'=>$designation,'experience'=>$experience]);
		$this->load->view('admin/common/footer');
	}





	
	function seekers()
	{
		$job_types=$this->Common_model->select('job_types');
		$industry2=$this->Common_model->select('area_of_sectors');

		$this->db->select('*');
        $this->db->from('seeker');

		$state = $_GET['state'];
		$city = $_GET['city'];
		$locality = $_GET['locality'];
		$job_type = $_GET['job_type'];
		$qualification_type = $_GET['qualification_type'];
		$qualification = $_GET['qualification'];
		$exp_typ = $_GET['exp_typ'];
		$industry = $_GET['industry'];
		
        if (!empty($state)) {
            $this->db->Like('p_locaion',$state);
        }elseif (!empty($city)) {
            $this->db->Like('city',$city);
        }elseif (!empty($locality)) {
            $this->db->Like('locality',$locality);
        }elseif (!empty($job_type)) {
            $this->db->Like('job_type',$job_type);
        }elseif (!empty($qualification_type)) {
            $this->db->Like('qua_type',$qualification_type);
        }elseif (!empty($qualification)) {
            $this->db->Like('qua',$qualification);
        }elseif (!empty($exp_typ)) {
            $this->db->Like('exp',$exp_typ);
        }elseif (!empty($industry)) {
            $this->db->Like('aofs',$industry);
        }
        $row = $this->db->get()->result();

		$this->load->view('admin/common/header');
		$this->load->view('admin/seekers',['row'=>$row,'job_types'=>$job_types,'industry'=>$industry2]);
		$this->load->view('admin/common/footer');
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


	function locationcity(){

        $id = $this->input->post('id');

        $this->db->select('name');
        $this->db->from('location');
        $this->db->where('state',$id);
		$this->db->group_by('name');
        $response12 = $this->db->get()->result();

		$j_arr=array(
			'staus'=>'true',
			'message'=>'Success',
			'data'=>$response12,
			);
		echo json_encode($j_arr);
    }


	function locationlocality(){

        $id = $this->input->post('id');

        $this->db->select('locality');
        $this->db->from('location');
        $this->db->where('name',$id);
		$this->db->group_by('locality');
        $response12 = $this->db->get()->result();

		$j_arr=array(
			'staus'=>'true',
			'message'=>'Success',
			'data'=>$response12,
			);
		echo json_encode($j_arr);
    }


	function delete_seeker()
	{
		$id=$this->input->post('id');
		if(isset($id))
		{
			$seeker_info=$this->Common_model->select('seeker',$id,'id');
			$seeker_email=$seeker_info->email;
			$applay_job_delete=$this->Common_model->delete('jp_applay_job',$seeker_email,'s_email');
			$res=$this->Common_model->delete('seeker',$id,'id');
			$this->session->set_flashdata('msg', 'Deleted');
			redirect('admin/seekers');
		}
	}



	function update_seeker($name)
	{
		$id=$this->input->post('id');
		$seeker_info=$this->Common_model->select('seeker',$id,'id');
		$this->load->view('admin/module/seeker_update_popup',['seeker_info'=>$seeker_info]);
	}



	function update_seeker1()
	{
		$data=$this->input->post();
		$email=$this->input->post('email');
		$update_res=$this->Common_model->updateData('seeker',$data,$email,'email');
		if($update_res)
		{
			echo "update";
		}
		else
		{
			echo "Not Update";
		}
	}


	
	function recruiters()
	{
	    $row=$this->Common_model->select('recruiter');	
		$plan_info=$this->Common_model->select('jp_plans');
		//$this->load->view('admin/common/header');
		$this->load->view('admin/recruiters',['row'=>$row,'plan_info'=>$plan_info]);
		//$this->load->view('admin/common/footer');
	}
	function recruiter_data_fetch()
	{
		$id=$this->input->post('id');
		if(isset($id))
		{
			$rec_info=$this->Common_model->select('recruiter',$id,'id');
			$plan=$this->Common_model->select('jp_plans');
			$this->load->view('admin/module/rec_update_pop',['rec_info'=>$rec_info,'plan'=>$plan]);
		}
		
	}

	function seeker_data_fetch()
	{
		$id=$this->input->post('id');
		
		if(isset($id))
		{
			$seeker_info=$this->db->get_where('seeker',['id'=>$id])->row();
			$location=$this->Common_model->select('location');
			$area_of_sectors=$this->db->get('area_of_sectors')->result();
			$sp=$this->db->get('specialization')->result();
			$skill=$this->db->get('skills')->result();
			$this->load->view('admin/module/seeker_update_popup',['seeker_info'=>$seeker_info,'location'=>$location,'area_of_sectors1'=>$area_of_sectors,'specialization'=>$sp,'skills'=>$skill]);
		}
		
	}



	function posted_jobs($rec_id)
	{
		$rec_info=$this->Common_model->select('recruiter',$rec_id,'id');
		$email=$rec_info->email;
		$name=$rec_info->name;
		$jobs=$this->Common_model->select('job_post',$email,'r_id');
		if($jobs)
		{
			$this->load->view('admin/posted_jobs',['jobs'=>$jobs,'name'=>$name]);
		}
		else
		{
			$this->load->view('admin/posted_jobs',['jobs'=>'','name'=>$name]);
		}
	}
	function rec_update1()
	{
		$data=$this->input->post();
		if(isset($data))
		{
			$id=$this->input->post('id');
			unset($data['id']);
			$res=$this->Common_model->updateData('recruiter',$data,$id,'id');
			$this->session->set_flashdata('msg', 'Updated');
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
	function delete_recruiters()
	{
		$id=$this->input->post('id');
		if(isset($id))
		{
			$recruiter_info=$this->Common_model->select('recruiter',$id,'id');
			$recruiter_email=$recruiter_info->email;
		    $job_post_count=$this->Common_model->row_count('job_post',$recruiter_email,'r_id');
			if($job_post_count>0)
			{
					$delete_job=$this->Common_model->delete('job_post',$recruiter_email,'r_id');
			}
			 $job_applay_count=$this->Common_model->row_count('jp_applay_job',$id,'r_id');
			if($job_applay_count>0)
			{	
				$applay_job_delete=$this->Common_model->delete('jp_applay_job',$id,'r_id');
			}
			$res=$this->Common_model->delete('recruiter',$id,'id');
			$this->session->set_flashdata('msg', 'Deleted');
			redirect('admin/recruiters');
		}
	}
	function location()
	{		

		$this->db->select('*');
        $this->db->from('location');

		$state = $_GET['state'];
		$city = $_GET['city'];
		$locality = $_GET['locality'];
		
        if (!empty($state)) {
            $this->db->Like('state',$state);
        }elseif (!empty($city)) {
            $this->db->Like('name',$city);
        }elseif (!empty($locality)) {
            $this->db->Like('locality',$locality);
        }
		
        $row = $this->db->get()->result();


		$this->load->view('admin/common/header');
		$this->load->view('admin/location',['row'=>$row]);
		$this->load->view('admin/common/footer');
	}
	function delete_location()
	{
		$id=$this->input->post('id');
		if(isset($id))
		{
			$res=$this->Common_model->delete('location',$id,'id');
			$this->session->set_flashdata('msg', 'Deleted');
			redirect('admin/location');
		}
	}
	function update($name='')
	{
		
		$id=$this->input->post('id');
		if(isset($id))
		{
			$this->session->set_flashdata('msg', 'Updated');
			$loc_data=$this->Common_model->select($name,$id,'id');
			$row=$this->Common_model->select($name);
			?>
<input type="hidden" name="id" id="d" value="<?= $loc_data->id; ?>">
<input type="hidden" name="tbl_name" value="<?= $name; ?>">
<input type="text" name="name" id="<?= $name."id"?>" class="form-control" value="<?= $loc_data->name ?>" />
<?php
		}
	}
	public function update_data()
	{
		$data=$this->input->post();
		if(isset($data))
		{
			$id=$this->input->post('id');
			$tbl_name=$this->input->post('tbl_name');
			unset($data['id']);
			unset($data['tbl_name']);
			$row=$this->Common_model->select($tbl_name);
			if($this->Common_model->updateData($tbl_name,$data,$id,'id'))
			{
				$this->session->set_flashdata('msg', 'Updated');
				echo "update";
				
			}
			else
			{
				echo "Not Update";
			}
		}		
	}
	function area_of_sectors()
	{		
		$this->load->view('admin/common/header');
		$row=$this->Common_model->select('area_of_sectors');
		$this->load->view('admin/area_of_sectors',['row'=>$row]);
		$this->load->view('admin/common/footer');
	}

	function client_logo()
	{
		$this->load->view('admin/common/header');
		$row=$this->Common_model->select('client_logo');
		$this->load->view('admin/client_logo',['row'=>$row]);
		$this->load->view('admin/common/footer');
	}

	function updatelogo(){

		$id=$this->input->post('id');
		$status1=$this->input->post('status1');
		if(isset($id))
		{
			$s1=array('status'=>$status1);
			$res=$this->db->update('client_logo',$s1,['logo_id'=>$id]);
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


	function importindustry(){

			if ($_FILES['importfile']['size'] > 0) { 

				//get the csv file 
				$file = $_FILES['importfile']['tmp_name']; 
				$handle = fopen($file,"r"); 
				//loop through the csv file and insert into database 
				do { 
					if ($data[0]) { 

                        $insertdata = ['name'=>addslashes($data[0])];
						$this->db->insert('area_of_sectors',$insertdata);
					} 
				} while ($data = fgetcsv($handle,1000,",","'")); 


				$this->session->set_flashdata('msg', 'Import Successfully');
			    redirect('admin/area_of_sectors');
			
			} else {
				$this->session->set_flashdata('msg', 'file not found');
			    redirect('admin/area_of_sectors');
			}
	
			 
	}

	function importlocation(){

		$sta = $_POST['stt'];
			$city = $_POST['city'];

		if ($_FILES['importfile']['size'] > 0) { 

			//get the csv file 
			$file = $_FILES['importfile']['tmp_name']; 
			$handle = fopen($file,"r"); 
			
			//loop through the csv file and insert into database 
			do { 
				if ($data[0]) { 

					$insertdata = [
						'state'=>trim($sta),
						'name'=>trim($city),
						'locality'=>addslashes($data[0])
					];
					$this->db->insert('location',$insertdata);
				} 
			} while ($data = fgetcsv($handle,1000,",","'")); 


			$this->session->set_flashdata('msg', 'Import Successfully');
			redirect('admin/location');
		
		} else {
			$this->session->set_flashdata('msg', 'file not found');
			redirect('admin/location');
		}	 
}


function importfuncation(){

	if ($_FILES['importfile']['size'] > 0) { 

		//get the csv file 
		$file = $_FILES['importfile']['tmp_name']; 
		$handle = fopen($file,"r"); 
		//loop through the csv file and insert into database 
		do { 
			if ($data[0]) { 

				$insertdata = [
					'name'=>addslashes($data[0]),
				];
				$this->db->insert('specialization',$insertdata);
			} 
		} while ($data = fgetcsv($handle,1000,",","'")); 


		$this->session->set_flashdata('msg', 'Import Successfully');
		redirect('admin/specialization');
	
	} else {
		$this->session->set_flashdata('msg', 'file not found');
		redirect('admin/specialization');
	}	 
}


function importqualification(){

	if ($_FILES['importfile']['size'] > 0) { 

		//get the csv file 
		$file = $_FILES['importfile']['tmp_name']; 
		$handle = fopen($file,"r"); 
		//loop through the csv file and insert into database 
		do { 
			if ($data[0]) { 

				$insertdata = [
					'name'=>addslashes($data[0]),
					'type'=>$_POST['type'],
				];
				$this->db->insert('qualification',$insertdata);
			} 
		} while ($data = fgetcsv($handle,1000,",","'")); 


		$this->session->set_flashdata('msg', 'Import Successfully');
		redirect('admin/qualification');
	
	} else {
		$this->session->set_flashdata('msg', 'file not found');
		redirect('admin/qualification');
	}	 
}



function importjob_role(){

	if ($_FILES['importfile']['size'] > 0) { 

		//get the csv file 
		$file = $_FILES['importfile']['tmp_name']; 
		$handle = fopen($file,"r"); 
		//loop through the csv file and insert into database 
		do { 
			if ($data[0]) { 

				$insertdata = [
					'name'=>addslashes($data[0]),
				];
				$this->db->insert('job_role',$insertdata);
			} 
		} while ($data = fgetcsv($handle,1000,",","'")); 

		$this->session->set_flashdata('msg', 'Import Successfully');
		redirect('admin/job_role');
	} else {
		$this->session->set_flashdata('msg', 'file not found');
		redirect('admin/job_role');
	}	 
}

function importjob_types(){

	if ($_FILES['importfile']['size'] > 0) { 

		//get the csv file 
		$file = $_FILES['importfile']['tmp_name']; 
		$handle = fopen($file,"r"); 
		//loop through the csv file and insert into database 
		do { 
			if ($data[0]) { 

				$insertdata = [
					'name'=>addslashes($data[0]),
				];
				$this->db->insert('job_types',$insertdata);
			} 
		} while ($data = fgetcsv($handle,1000,",","'")); 

		$this->session->set_flashdata('msg', 'Import Successfully');
		redirect('admin/job_types');
	} else {
		$this->session->set_flashdata('msg', 'file not found');
		redirect('admin/job_types');
	}	 
}


function importdesignation(){

	if ($_FILES['importfile']['size'] > 0) { 

		//get the csv file 
		$file = $_FILES['importfile']['tmp_name']; 
		$handle = fopen($file,"r"); 
		//loop through the csv file and insert into database 
		do { 
			if ($data[0]) { 

				$insertdata = [
					'name'=>addslashes($data[0]),
				];
				
				$this->db->insert('designation',$insertdata);
			} 
		} while ($data = fgetcsv($handle,1000,",","'")); 

		$this->session->set_flashdata('msg', 'Import Successfully');
		redirect('admin/designation');
	} else {
		$this->session->set_flashdata('msg', 'file not found');
		redirect('admin/designation');
	}	 
}


function importexperience(){

	if ($_FILES['importfile']['size'] > 0) { 

		//get the csv file 
		$file = $_FILES['importfile']['tmp_name']; 
		$handle = fopen($file,"r"); 
		//loop through the csv file and insert into database 
		do { 
			if ($data[0]) { 

				$insertdata = [
					'name'=>addslashes($data[0]),
				];
				
				$this->db->insert('experience',$insertdata);
			} 
		} while ($data = fgetcsv($handle,1000,",","'")); 

		$this->session->set_flashdata('msg', 'Import Successfully');
		redirect('admin/experience');
	} else {
		$this->session->set_flashdata('msg', 'file not found');
		redirect('admin/experience');
	}	 
}


function importSkills(){

	if ($_FILES['importfile']['size'] > 0) { 

		//get the csv file 
		$file = $_FILES['importfile']['tmp_name']; 
		$handle = fopen($file,"r"); 
		//loop through the csv file and insert into database 
		do { 
			if ($data[0]) { 

				$insertdata = [
					'name'=>addslashes($data[0]),
				];
				
				$this->db->insert('skills',$insertdata);
			} 
		} while ($data = fgetcsv($handle,1000,",","'")); 

		$this->session->set_flashdata('msg', 'Import Successfully');
		redirect('admin/skills');
	} else {
		$this->session->set_flashdata('msg', 'file not found');
		redirect('admin/skills');
	}	 
}


	function delete_aofs()
	{
		$id=$this->input->post('id');
		if($id!='')
		{
			$res=$this->Common_model->delete('area_of_sectors',$id,'id');
			$this->session->set_flashdata('msg', 'Deleted');
			redirect('admin/area_of_sectors');
		}
	}
	function specialization()
	{
		$this->load->view('admin/common/header');
		$row=$this->Common_model->select('specialization');
		$this->load->view('admin/specialization',['row'=>$row]);
		$this->load->view('admin/common/footer');
	}
	function delete_specialization()
	{
		$id=$this->input->post('id');
		if(isset($id))
		{
			$res=$this->Common_model->delete('specialization',$id,'id');
			$this->session->set_flashdata('msg', 'Deleted');
			redirect('admin/specialization');
		}
	}



	
	function qualification()
	{


		$this->db->select('qualification.*,qualification_type.name as type');
		$this->db->from('qualification');
		$this->db->join('qualification_type','qualification.type = qualification_type.id');
		$row = $this->db->get()->result();


		$qualification_type = $this->db->get('qualification_type')->result();
		
		$this->load->view('admin/common/header');
		$this->load->view('admin/qualification',['row'=>$row,'qualification_type'=>$qualification_type]);
		$this->load->view('admin/common/footer');
	}




	function delete_qualification($id='')
	{
		$id=$this->input->post('id');
		if(isset($id))
		{
			$res=$this->Common_model->delete('qualification',$id,'id');
			$this->session->set_flashdata('msg', 'Deleted');
			redirect('admin/qualification');
		}
	}
	function job_role()
	{
		$this->load->view('admin/common/header');
		$row=$this->Common_model->select('job_role');
		$this->load->view('admin/job_role',['row'=>$row]);
		$this->load->view('admin/common/footer');
	}
	function delete_job_role()
	{
		$id=$this->input->post('id');
		if(isset($id))
		{
			$res=$this->Common_model->delete('job_role',$id,'id');
			$this->session->set_flashdata('msg', 'Deleted');
			redirect('admin/job_role');
		}
	}
	function job_types()
	{
		$this->load->view('admin/common/header');
		$row=$this->Common_model->select('job_types');
		$this->load->view('admin/job_types',['row'=>$row]);
		$this->load->view('admin/common/footer');
	}
	function delete_job_type()
	{
		$id=$this->input->post('id');
		if(isset($id))
		{	
			$res=$this->Common_model->delete('job_types',$id,'id');
			$this->session->set_flashdata('msg', 'Deleted');
			redirect('admin/job_types');
		}
	}


	function designation()
	{
		$this->load->view('admin/common/header');
		$row=$this->Common_model->select('designation');
		$this->load->view('admin/designation',['row'=>$row]);
		$this->load->view('admin/common/footer');
	}


	function skills()
	{
		$this->load->view('admin/common/header');
		$row=$this->Common_model->select('skills');
		$this->load->view('admin/skills',['row'=>$row]);
		$this->load->view('admin/common/footer');
	}


	function qualification_type()
	{
		$this->load->view('admin/common/header');
		$row=$this->Common_model->select('qualification_type');
		$this->load->view('admin/qualification_types',['row'=>$row]);
		$this->load->view('admin/common/footer');
	}


	function add_qualification(){
		$post = $this->input->post();
		$this->db->insert('qualification_type',$post);
		$this->session->set_flashdata('msg', 'Created');
		redirect('admin/qualification_type');
	}

	function preferred_shift()
	{
		$this->load->view('admin/common/header');
		$row=$this->Common_model->select('preferred_shift');
		$this->load->view('admin/preferred_shift',['row'=>$row]);
		$this->load->view('admin/common/footer');
	}


	function add_preferred_shift(){
		$post = $this->input->post();
		$this->db->insert('preferred_shift',$post);
		$this->session->set_flashdata('msg', 'Created');
		redirect('admin/preferred_shift');
	}


	function updatepreferred_shift(){
		$post = $this->input->post();
		
		$this->db->update('preferred_shift',['name'=>$_POST['name']],['id'=>$_POST['id']]);
		$this->session->set_flashdata('msg', 'Updated');
		redirect('admin/preferred_shift');
	}
	function benefit()
	{
		$this->load->view('admin/common/header');
		$row=$this->Common_model->select('benefit');
		$this->load->view('admin/benefit',['row'=>$row]);
		$this->load->view('admin/common/footer');
	}


	function add_benefit(){
		$post = $this->input->post();
		$this->db->insert('benefit',$post);
		$this->session->set_flashdata('msg', 'Created');
		redirect('admin/benefit');
	}


	function updatebenefit(){
		$post = $this->input->post();
		
		$this->db->update('benefit',['name'=>$_POST['name']],['id'=>$_POST['id']]);
		$this->session->set_flashdata('msg', 'Updated');
		redirect('admin/benefit');
	}
	function notice_period()
	{
		$this->load->view('admin/common/header');
		$row=$this->Common_model->select('notice_period');
		$this->load->view('admin/notice_period',['row'=>$row]);
		$this->load->view('admin/common/footer');
	}


	function add_notice_period(){
		$post = $this->input->post();
		$this->db->insert('notice_period',$post);
		$this->session->set_flashdata('msg', 'Created');
		redirect('admin/notice_period');
	}


	function updatenotice_period(){
		$post = $this->input->post();
		
		$this->db->update('notice_period',['name'=>$_POST['name']],['id'=>$_POST['id']]);
		$this->session->set_flashdata('msg', 'Updated');
		redirect('admin/notice_period');
	}
	function updatequat(){
		$post = $this->input->post();
		
		$this->db->update('qualification_type',['name'=>$_POST['name']],['id'=>$_POST['id']]);
		$this->session->set_flashdata('msg', 'Updated');
		redirect('admin/qualification_type');
	}




	function delete_designation()
	{
		$id=$this->input->post('id');
		if(isset($id))
		{
			$res=$this->Common_model->delete('designation',$id,'id');
			$this->session->set_flashdata('msg', 'Deleted');
			redirect('admin/designation');
		}
	}

	function delete_Skills()
	{
		$id=$this->input->post('id');
		if(isset($id))
		{
			$res=$this->Common_model->delete('skills',$id,'id');
			$this->session->set_flashdata('msg', 'Deleted');
			redirect('admin/skills');
		}
	}


	function add_skills(){
       $post = $this->input->post();
	   $this->db->insert('skills', $post);
	   $this->session->set_flashdata('msg', 'Created');
	   redirect('admin/skills');
	}

	function updateskills(){

		$post = $this->input->post();
		$this->db->update('skills',['name'=>$post['name']],['id'=>$post['id']]);
		$this->session->set_flashdata('msg', 'Updated');
	   redirect('admin/skills');
	}

	function experience()
	{
			$this->load->view('admin/common/header');
			$row=$this->Common_model->select('experience');
			$this->load->view('admin/experience',['row'=>$row]);
			$this->load->view('admin/common/footer');
	}
	function delete_experience()
	{
		$id=$this->input->post('id');
		$name=$this->input->post('name');
		if(isset($id))
		{
			$res=$this->Common_model->delete('experience',$id,'id');
			$this->session->set_flashdata('msg', 'Deleted');
			$url="admin/experience";
			redirect('admin/experience');
		}
	}
	function add($name='')
	{
		$data=$this->input->post();
		if(!empty($data))
		{
			$n1=$this->input->post('name');
			$check=$this->Common_model->count_num($name,$n1,'name');
			if($check==0)
			{
				$res=$this->Common_model->insert($name,$data);
				if($res)
				{
					$this->session->set_flashdata('msg','Added');
					echo "insert";
				}
				else
				{
					echo "Not Insert";
				}
			}
			else
			{
				echo "already_exists";
			}
		}
	}
	function login()
	{
		$email=$this->input->post('email');
	    $ps=$this->input->post('ps');
		if(!empty($email))
		{
			if(!empty($this->input->post('remember')))
			{																								
				
				$em= array(
				   'name'   => 'e1',
				   'value'  => $email,
				   'expire' => '604800',
			   );
				$this->input->set_cookie($em);
				$p= array(
				   'name'   => 'p1',
				   'value'  => $ps,
				   'expire' => '604800',
			   );
				$this->input->set_cookie($p);
			}
			
			$this->load->model('admin/Admin_model');
			$r1=$this->Admin_model->login($email,$ps);
			$this->session->set_flashdata('login', 'Success');
			if($r1>0)
			{
				$this->session->set_userdata('uname',$email);
				redirect('admin/dashboard');
			}
			else
			{
				$this->session->set_flashdata('msg', 'wrong User');
				redirect('admin/');
			}
			
		}
		else
		{
		   $this->session->set_flashdata('msg1', 'fill');
		   redirect('admin/');
		}
		
	}
	function footer_link()
	{
		$data=$this->input->post();
		$id=$this->input->post('id');
		unset($data['id']);
		if(!empty($data))
		{
			$up_res=$this->Common_model->updateData('jp_setting_footer',$data,$id,'id');
			if($up_res)
			{
				echo "update";
			}
			else
			{
				echo "Not Update";
			}
		}
	}
	function footer_update()
	{
		$id=$this->input->post('id');		
		$footer_info=$this->Common_model->select('jp_setting_footer',$id,'id');
		$this->load->view('admin/module/footer_link_update_pop',['footer_info'=>$footer_info]);
	}
	function website_setting()
	{
		$res=$this->Common_model->select('jp_setting','2','id');
		$res2=$this->Common_model->select('jp_revenue','1','id');
		$admin_info=$this->Common_model->select('admin','1','id');
		$email_info=$this->Common_model->select('jp_setting_email','1','id');
		$footer_info=$this->Common_model->select('jp_setting_footer');
		$language_name=$this->Common_model->select('jp_language_name');
		$info=$this->Common_model->select('jp_setting','2','id');
        $contect=$this->Common_model->select('jp_contect','1','id'); 


		$this->load->view('admin/common/header');
		$this->load->view('admin/site_setting',['contect'=>$contect,'info'=>$info,'language_name'=>$language_name,'footer_info'=>$footer_info,'res'=>$res,'res2'=>$res2,'admin_info'=>$admin_info,'email_info'=>$email_info,'info'=>$info]);
		$this->load->view('admin/common/footer');
	}


	   function contectupdate(){
            $post = $this->input->post();
             $this->db->update('jp_contect',$post);
			 $this->session->set_flashdata('msg', 'Update success');
			redirect('admin/website_setting');
	   }

	function delete_language()
	{
	      $language_name=$this->input->post('del_language');
		  $info=$this->Common_model->select('jp_setting','2','id');
		  $l1=$info->language;
		  $arr=array('language'=>'english');
		  if($language_name=='english')
		  {
			  $this->session->set_flashdata('msg', 'deng');
			  redirect('admin/website_setting');
		  }
		  else
		  {
		  if($l1==$language_name)
		  {
			  $this->Common_model->updateData('jp_setting',$arr,'2','id');
			  $this->Common_model->delete('jp_language_name',$language_name,'name');
		      $res=$this->Common_model->col_drop('jp_language',$language_name);
			  if($res=="delete")
			  {
				  	$this->session->set_flashdata('msg', 'Deleted');
					redirect('admin/website_setting');
			  }
			  else
			  {
				  $this->session->set_flashdata('msg', 'nDeleted');
				   redirect('admin/website_setting');
			  }
		  }
		  else
		  {
			  $this->Common_model->delete('jp_language_name',$language_name,'name');
		      $res=$this->Common_model->col_drop('jp_language',$language_name);
			  if($res=="delete")
			  {
				  	$this->session->set_flashdata('msg', 'Deleted');
					redirect('admin/website_setting');
			  }
			  else
			  {
				  $this->session->set_flashdata('msg', 'nDeleted');
				   redirect('admin/website_setting');
			  }
		  }
		  }
		  
		  
	}
	function credentials_update()
	{
		$data=$this->input->post();
		if(!empty($data))
		{
			$old_ps=$this->input->post('hide_pass');
			$old_ps2=$this->input->post('old_ps');
			$uname=$this->input->post('uname');
			$uname=$this->input->post('un');
			unset($data['hide_pass']);
			unset($data['un']);
			unset($data['old_ps']);
			unset($data['cps']);
			$this->session->set_userdata('uname',$uname);
			if($old_ps!=$old_ps2)
			{
				echo "psn";
			}
			else
			{
				$update_res=$this->Common_model->updateData('admin',$data,$uname,'uname');
				if($update_res)
				{
						echo "Update";
				}
				else
				{
					echo "Not Update";
				}
			}
		}
	}
	function email_credentials()
	{
		$data=$this->input->post();
		$res=$this->Common_model->updateData('jp_setting_email',$data,'1','id');
		if($res)
		{
			echo "update";
		}
		else
		{
			echo "Credentials Not update";
		}
	}
	function meta_information()
	{
		$data=$this->input->post();
		if(!empty($data))
		{
			if($this->Common_model->updateData('jp_setting',$data,'2','id'))
			{
				echo "Insert";
			}
			else
			{
				echo "Not Insert";
			}
		}
	}
	function plans()
	{
		$this->load->view('admin/common/header');
		$plans_list=$this->Common_model->select('jp_plans');
		$this->load->view('admin/plans',['row'=>$plans_list]);
		$this->load->view('admin/common/footer');
		
	}
	function create_plane()
	{
		$data=$this->input->post();
		if(!empty($data))
		{
			$name=$this->input->post('name');
			$plan_duration_count=$this->input->post('plan_duration_count');
			$plan_duration_type=$this->input->post('plan_duration_type');
			$check_status=$this->db->select('*')->from('jp_plans')->where('name',$name)->get();
			$num_r=$check_status->num_rows();
			$duration='';
			if($num_r>0)
			{
				echo "Yes";
			}
			else 
			{
				if($plan_duration_type=="Days")
				{
						$duration=$plan_duration_count*1;
				}
				else if($plan_duration_type=="Weeks")
				{
					  $duration=$plan_duration_count*7;
				}
				else if($plan_duration_type=="Months")
				{
					  $duration=$plan_duration_count*30;
				}
				else if($plan_duration_type=="Years")
				{
						$duration=$plan_duration_count*365;
				}
				else 
				{ }
				$data['duration']=$duration;
				
				$res=$this->Common_model->insert('jp_plans',$data);
				if($res)
				{
					$this->session->set_flashdata('msg', 'Created');
					
					echo "add";
				}
				else
				{
					echo "Not Add";
				}
			}
		}
	}
	function delete_plane()
	{
		$id=$this->input->post('id');
		if(!empty($id))
		{
			$res=$this->Common_model->delete('jp_plans',$id,'id');
			$this->session->set_flashdata('msg', 'Deleted');
			redirect('admin/plans');
		}
	}
	function update_plan()
	{
		$id=$this->input->post('id');		
		$plan_info=$this->Common_model->select('jp_plans',$id,'id');
		$this->load->view('admin/module/plan_update_pop',['plan_info'=>$plan_info]);

		
	}
	function update_plan1()
	{
		$name=$this->input->post('name');
		$data=$this->input->post();
		$id=$this->input->post('id_p');
		$condation1=$this->input->post('condation11');
		unset($data['condation11']);
		unset($data['id_p']);
		$data['condation1']=$condation1;
		$plan_duration_count=$this->input->post('plan_duration_count');
		$plan_duration_type=$this->input->post('plan_duration_type');
		$duration='';
		if($plan_duration_type=="Days")
		{
				$duration=$plan_duration_count*1;
		}
		else if($plan_duration_type=="Weeks")
		{
			  $duration=$plan_duration_count*7;
		}
		else if($plan_duration_type=="Months")
		{
			  $duration=$plan_duration_count*30;
		}
		else if($plan_duration_type=="Years")
		{
				$duration=$plan_duration_count*365;
		}
		else 
		{ }
		$data['duration']=$duration;
		$update_res=$this->Common_model->updateData('jp_plans',$data,$id,'id');
		if($update_res)
		{
			echo "update";
		}
		else
		{
			echo "Not Update";
		}
	}
	function setting()
	{
		
			if(!empty($_FILES['favicon_img']['name']) || !empty($_FILES['logo_img']['name']) || !empty($_FILES['bg_img']['name']) || !empty($_FILES['contect_img']['name']) || !empty($_FILES['about_img']['name']) || !empty($_FILES['main_loder']['name']))
			{
				$fevi=$_FILES['favicon_img']['name'];

				// echo $fevi;die;
				$logo_img=$_FILES['logo_img']['name'];
				$bg_img=$_FILES['bg_img']['name'];
				$contect_img=$_FILES['contect_img']['name'];
				$about_img=$_FILES['about_img']['name'];
				$main_loder=$_FILES['main_loder']['name'];
				if(!empty($fevi))
				{
					$config['upload_path']="./uploads/setting";
					$config['allowed_types']="jpg|png|jpeg";
					$this->load->library('upload',$config);
					$this->upload->initialize($config);

					if($this->upload->do_upload('favicon_img'))
					{
						 $res1=$this->Common_model->select('jp_setting',2,'id');
						 $img=$res1->fevi;
						 if(!empty($img))
						 {
							unlink('./'.$img);
						 }
						$d1=$this->upload->data();
						$d2= $d1['file_name'];
						$d3='uploads/setting/'.$d2;
						$arr=array('fevi'=>$d3);
						if($this->Common_model->updateData('jp_setting',$arr,'2','id'))
						{
							echo "update";
						}	
						else
						{
							echo "Favicon not updated";
						}
					}
					else
					{
							echo "Favicon Only JPG And PNG File Allowed";
					}
				 }
				 if(!empty($logo_img))
				 {
					$config['upload_path']="./uploads/setting";
					$config['allowed_types']="jpg|png|jpeg";
					$this->load->library('upload',$config);
					$this->upload->initialize($config);

					if($this->upload->do_upload('logo_img'))
					{
						 $res1=$this->Common_model->select('jp_setting',2,'id');
						 $img=$res1->logo_img;
						 if(!empty($img))
						 {
							unlink('./'.$img);
						 }
						$d1=$this->upload->data();
						$d2= $d1['file_name'];
						$d3='uploads/setting/'.$d2;
						$arr=array('logo_img'=>$d3);
						if($this->Common_model->updateData('jp_setting',$arr,'2','id'))
						{
							echo "update";
						}	
						else
						{
							$this->session->set_flashdata('msg', 'nup');
							$url="admin/website_setting";
							redirect('admin/website_setting');
						}
					}
					else
					{
						echo "Logo Only JPG And PNG File Allowed";
					}
				 }
				 if(!empty($bg_img))
				 {
					 $res1=$this->Common_model->select('jp_setting',2,'id');
					 $img=$res1->bg_img;
					 /*if(!empty($img))
					 {
						unlink(base_url($img));
						
					 }*/
					$config['upload_path']="./uploads/setting";
					$config['allowed_types']="jpg|png|jpeg";
					$this->load->library('upload',$config);
					$this->upload->initialize($config);

					if($this->upload->do_upload('bg_img'))
					{	
						$d1=$this->upload->data();
						$d2= $d1['file_name'];
						$d3='uploads/setting/'.$d2;
						$arr=array('bg_img'=>$d3);
						if($this->Common_model->updateData('jp_setting',$arr,'2','id'))
						{
							echo "update";
						}	
						else
						{
							echo "Background Image Not updated";
						}
					}
					else
					{
							echo "Background Image Only JPG And PNG File Allowed";
					}
				 }
				 else if(!empty($contect_img))
				 {
					 $config['upload_path']="./uploads/setting";
					 $config['allowed_types']="jpg|png|jpeg";
					 $this->load->library('upload',$config);
					 $this->upload->initialize($config);

					 if($this->upload->do_upload('contect_img'))
					 {
						 $res1=$this->Common_model->select('jp_setting',2,'id');
						 $img=$res1->contect_img;
						 if(!empty($img))
						 {
							unlink('./'.$img);
						 }
						$d1=$this->upload->data();
						$d2= $d1['file_name'];
						$d3='uploads/setting/'.$d2;
						$arr=array('contect_img'=>$d3);
						if($this->Common_model->updateData('jp_setting',$arr,'2','id'))
						{
							echo "update";
						}	
						else
						{
							echo "Contect Us Image not updated";
						}
					 }
					 else
					 {
							echo "Contect us Image Only JPG And PNG File Allowed";
					 }
				 }
				 else if(!empty($about_img))
				 {
					 $config['upload_path']="./uploads/setting";
					 $config['allowed_types']="jpg|png|jpeg";
					 $this->load->library('upload',$config);
					 $this->upload->initialize($config);

					 if($this->upload->do_upload('about_img'))
					 {
						 $res1=$this->Common_model->select('jp_setting',2,'id');
						 $img=$res1->about_img;
						 if(!empty($img))
						 {
							unlink('./'.$img);
						 }
						$d1=$this->upload->data();
						$d2= $d1['file_name'];
						$d3='uploads/setting/'.$d2;
						$arr=array('about_img'=>$d3);
						if($this->Common_model->updateData('jp_setting',$arr,'2','id'))
						{
							echo "update";
						}	
						else
						{
							echo "About Us Image  not updated";
						}
					 }
					 else
					 {
							echo "About us Image Only JPG And PNG File Allowed";
					 }
				 }
				  else if(!empty($main_loder))
				 {
					 $config['upload_path']="./uploads/setting";
					 $config['allowed_types']="svg|png|gif";
					 $this->load->library('upload',$config);
					 $this->upload->initialize($config);

					 if($this->upload->do_upload('main_loder'))
					 {
						 $res1=$this->Common_model->select('jp_setting',2,'id');
						 $img=$res1->main_loder;
						 if(!empty($img))
						 {
							unlink('./'.$img);
						 }
						$d1=$this->upload->data();
						$d2= $d1['file_name'];
						$d3='uploads/setting/'.$d2;
						$arr=array('main_loder'=>$d3);
						if($this->Common_model->updateData('jp_setting',$arr,'2','id'))
						{
							echo "update";
						}	
						else
						{
							echo "Site Loader  not updated";
						}
					 }
					 else
					 {
							echo "Site Loader Only GIF AND SVG File Allowed";
					 }
				 }
			}
			else
			{
				echo "Please select image";
			}
	}
	function revenue()	
	{			
		$arr=$this->input->post();		
		if(!empty($arr))
		{
			if(array_key_exists('condation',$arr))
				{	
					if($arr['condation']=='number_job_post')		
					{							
						$arr['value2']="";			
									
					}		
					else if($arr['condation']=='num_of_resume_download')	
					{			
							$arr['value1']="";				
									
					}			
					else if($arr['condation']=='applay_both_condation')		
					{			
								
					}		
					else		
					{				
						echo "";			
					}
					$a=array('type1'=>'xd');
					$this->db->where('id','1');
					$res=$this->db->update('jp_revenue',$arr);
					if($res)
					{
						echo "Update";
					}
					else
					{
						echo "Not uPDATE";
					}
				}
				else		
				{		
					echo "not";	
				}
		}
	}
	
	function revenue2()	
	{	
		$arr=$this->input->post();	
		if(!empty($arr))
		{
			if(array_key_exists('condation',$arr))
			{	
				if($arr['condation']=='number_job_post')		
				{							
					$arr['value2']="";			
								
				}		
				else if($arr['condation']=='num_of_resume_download')	
				{			
					$arr['value1']="";				
									
				}			
				else if($arr['condation']=='applay_both_condation')		
				{			
								
				}		
				else		
				{				
					echo "";			
				}
				$a=array('type1'=>'xd');
				$this->db->where('id','1');
				$res=$this->db->update('jp_revenue',$arr);
				if($res)
				{
					echo "Update";
				}
				else
				{
					echo "Not uPDATE";
				}
			}
			else		
			{		
				echo "not";	
			}
		}
	}
	function google_code()
	{
		$data=$this->input->post();
		if(!empty($data))
		{
			unset($data[0]);
			$update_data_res=$this->Common_model->updateData('jp_setting',$data,'2','id');
			if($update_data_res)
			{
				echo "Update";
			}
			else
			{
				echo "Data Not Update";
			}
		}
	}
	function cookie_text_s()
	{
		$data=$this->input->post();
		if(!empty($data))
		{
			unset($data[0]);
			$update_data_res=$this->Common_model->updateData('jp_setting',$data,'2','id');
			if($update_data_res)
			{
				echo "Update";
			}
			else
			{
				echo "Data Not Update";
			}
	}
	}
	function status_change($tbl_name='')
	{
		$id=$this->input->post('id');
		$status1=$this->input->post('status1');
		if(isset($id))
		{
			$s1=array('status'=>$status1);
			$res=$this->Common_model->updateData($tbl_name,$s1,$id,'id');
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




	function logo_change($tbl_name='')
	{
		$id=$this->input->post('id');
		$status1=$this->input->post('status1');
		if(isset($id))
		{
			$s1=array('img_status'=>$status1);
			$res=$this->Common_model->updateData($tbl_name,$s1,$id,'id');
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


	//language
	function add_language()
	{
		$addnewlanguage=$this->input->post('addnewlanguage');
		$alter_res=$this->Common_model->alter_table('jp_language',$addnewlanguage);
		$data_arr=array('name'=>$addnewlanguage);
		$this->Common_model->insert('jp_language_name',$data_arr);
		if($alter_res)
		{
			echo "Add";
		} 

		else
		{
			echo "not add";
		}
		
	}
	function language_add()
	{
		$language_info=$this->Common_model->select('jp_language','home_page','language_type');
		$language_menu_info=$this->Common_model->select('jp_language','menu_header','language_type');
		$language_my_applied_job=$this->Common_model->select('jp_language','user_profile_page','language_type');
		$language_login_page=$this->Common_model->select('jp_language','login_page','language_type');
		$language_register_page=$this->Common_model->select('jp_language','register_page','language_type');
		$language_req_herder_page=$this->Common_model->select('jp_language','recruiter_header','language_type');
		$language_req_profile_page=$this->Common_model->select('jp_language','recruiter_profile_page','language_type');
		$language_recruiter_home=$this->Common_model->select('jp_language','recruiter_home','language_type');
		$language_job_post_page=$this->Common_model->select('jp_language','job_post_page','language_type');
		$language_validation_page=$this->Common_model->select('jp_language','validation','language_type');
		$language_job_single_page=$this->Common_model->select('jp_language','single_job','language_type');
		$language_my_applied_job_page=$this->Common_model->select('jp_language','my_applied_job_page','language_type');
		$language_applied_seeker_page=$this->Common_model->select('jp_language','applied_seeker','language_type');
		$language_seeker_info=$this->Common_model->select('jp_language','seeker_info','language_type');
		$language_applied_job_info=$this->Common_model->select('jp_language','applied_job_info','language_type');
		$language_revenue_plans=$this->Common_model->select('jp_language','revenue_plans','language_type');
		$language_payment=$this->Common_model->select('jp_language','payment','language_type');
		$language_term=$this->Common_model->select('jp_language','compliamce','language_type');
		$language_name=$this->Common_model->select('jp_language_name');
		$this->load->view('admin/common/header');
		$data['language_info']=$language_info;
		$data['language_name']=$language_name;
		$data['language_menu_info']=$language_menu_info;
		$data['language_my_applied_job']=$language_my_applied_job;
		$data['language_login_page']=$language_login_page;
		$data['language_register_page']=$language_register_page;
		$data['language_req_herder_page']=$language_req_herder_page;
		$data['language_req_profile_page']=$language_req_profile_page;
		$data['language_job_post_page']=$language_job_post_page;
		$data['language_job_single_page']=$language_job_single_page;
		$data['language_validation_page']=$language_validation_page;
		$data['language_my_applied_job_page']=$language_my_applied_job_page;
		$data['language_applied_seeker_page']=$language_applied_seeker_page;
		$data['language_seeker_info']=$language_seeker_info;
		$data['language_applied_job_info']=$language_applied_job_info;
		$data['language_revenue_plans']=$language_revenue_plans;
		$data['language_payment']=$language_payment;
		$data['language_term']=$language_term;
		$data['language_recruiter_home']=$language_recruiter_home;
		$this->load->view('admin/language_add',$data);
		$this->load->view('admin/common/footer');
	}
	function language_update_pop()
	{
		$id=$this->input->post('id');
		$field=$this->input->post('field');
		$res=$this->Common_model->select('jp_language',$id,'language_id');
		$update_data=$res->$field;
		$this->load->view('admin/module/language_update_pop',['name'=>$update_data,'id'=>$id,'field'=>$field]);
	}
	function languageUpdatefinal()
	{
		$data=$this->input->post();
		$id=$this->input->post('id');
		$field=$this->input->post('field');
		unset($data['id']);
		unset($data['field']);
		unset($data['id_web']);
		unset($data['id_db']);
		$res=$this->Common_model->updateData('jp_language',$data,$id,'language_id');
		if($res)
		{
			echo "Update";
		}
		else
		{
			echo "Not Update";
		}
		
	}
	function change_language()
	{
		$data=$this->input->post('language_name');
	    $arr=array('language'=>$data);
		$res=$this->Common_model->updateData('jp_setting',$arr,'2','id');
		if($res)
		{
			echo "update";
		}
		else
		{
			echo "not update";
		}
	}
	function logout()	
	{
		$this->session->unset_userdata('uname');
		$this->session->set_flashdata('logout','logout');
		$url="admin/";
		redirect('admin/');
	}
	function compliamce_pages()
	{
		$this->load->view('admin/common/header');
		$setting_info=$this->Common_model->select('jp_setting','2','id');
		$row=$this->Common_model->select('jp_contect_us');
		$this->load->view('admin/compliamce_pages',['setting_info'=>$setting_info,'row'=>$row]);
		$this->load->view('admin/common/footer');
	}
	function privacy_policy_set()
	{
		$editor_data = $this->input->post('tc');
		$field = $this->input->post('field');
		$date_type=$this->input->post('date_type');
		$arr=array();
		if($field=='terms_condition' || $field=='privacy_policy')
		{
			$arr=array($field=>$editor_data,$date_type=>date("jS  F Y "));
		}
		else
		{
			$arr=array($field=>$editor_data);
		}
		 $res=$this->Common_model->updateData('jp_setting',$arr,'2','id');
		 if($res)
		 {
			 echo "Update";
		 }
		 else
		 {
			 echo "Not Update";
		 }
		
	}
	function ads_integration()
	{
		$a=$this->db->get('jp_custom_ads');
		$ads=$a->row();
		$res=$this->Common_model->select('jp_setting','2','id');
		$data['ads']=$ads;
		$data['res']=$res;
		$this->load->view('admin/common/header');
		$this->load->view('admin/ads_integration',$data);
		$this->load->view('admin/common/footer');
	}
	function payment()
	{
		$res=$this->Common_model->select('jp_setting','2','id');
		$this->load->view('admin/common/header');
		$this->load->view('admin/payment',['res'=>$res]);
		$this->load->view('admin/common/footer');
	}
	function payment_method_update()
	{
		$data=$this->input->post();
		$res=$this->Common_model->updateData('jp_setting',$data,'2','id');
		if($res)
			echo "Insert";
		else
			echo "not insert";
	}
	function custon_add_update()
	{
		$data=$this->input->post();
		$img=$_FILES['add_img']['name'];
		$home_page=$this->input->post('home_page');
		$single_page_top=$this->input->post('single_page_top');
		$single_page_bottom=$this->input->post('single_page_bottom');
		$both_page=$this->input->post('both_page');
		$link1=$this->input->post('link1');
		if(!array_key_exists('home_page',$data))
		{
			$data['home']='no';
		}
		if(!array_key_exists('single_page_top',$data))
		{
			$data['single_page_top']='no';
		}
		if(!array_key_exists('single_page_bottom',$data))
		{
			$data['single_page_bottom']='no';
		}
		if(!array_key_exists('both_page',$data))
		{
			$data['both_page']='no';
		}
		$custom_ads_info=$this->Common_model->select('jp_custom_ads','1','id');
		$image=$custom_ads_info->add_img;
		if(empty($img))
		{
			if($image)
			{
				$res=$this->Common_model->updateData('jp_custom_ads',$data,'1','id');
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
				    $config ['allowed_types'] = 'jpg|png|jpeg'; 
					$this->load->library('upload',$config);
					if($this->upload->do_upload('add_img'))
					{
						$data1=$this->upload->data();       
						$d2= $data1['file_name'];
						$d3='uploads/ads/'.$d2;
						$data['add_img']=$d3;
						$res=$this->Common_model->updateData('jp_custom_ads',$data,'1','id');
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
						echo "jpg_png";
					}
					
			}
		}
		else
		{
			$config ['upload_path'] = './uploads/ads';
			$config ['allowed_types'] = 'jpg|png|jpeg'; 
			$this->load->library('upload',$config);
			if($this->upload->do_upload('add_img'))
			{
				$data1=$this->upload->data();       
				$d2= $data1['file_name'];
				$d3='uploads/ads/'.$d2;
				$data['add_img']=$d3;
				$res=$this->Common_model->updateData('jp_custom_ads',$data,'1','id');
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
				echo "jpg_png";
			}
		}
		/*'home_page',:home_page,'single_page_top':single_page_top,'single_page_bottom':single_page_bottom,'both_page':both_page,'link':link1*/
	} 
	function notification()
	{
		$this->load->view('admin/notification');
	}
	function send_notification()
	{
		$data=$this->input->post();
		$title=$this->input->post('title');
		$message=$this->input->post('message');
		$notification_type=$this->input->post('notification_type');
		unset($data['notification_type']);
		if(!empty($message))
		{
				$res=$this->Common_model->insert('jp_notification',$data);
				if($res)
				{
					$this->push($title,$message,$notification_type);
					echo "Insert";
				}
				else
				{
					echo "Not Insert";
				}
		}
	}
	function send_notification1 ($tokens, $message)
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
	function push($name,$desi,$type)
	{
		$res=$this->Common_model->select($type);
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
		$message_status = $this->send_notification1($t3, $message);
	}
	function transaction()
	{
		$this->load->view('admin/common/header');
		$res=$this->Common_model->select('jp_payment');
		$this->load->view('admin/transaction',['row'=>$res]);
		$this->load->view('admin/common/footer');
	}
	function social_login()
	{
		$this->load->view('admin/common/header');
		$res=$this->Common_model->select('jp_setting','2','id');
		$this->load->view('admin/social_login',['social_info'=>$res]);
		$this->load->view('admin/common/footer');
	}
	function google_login_information()
	{
		$data=$this->input->post();
		$res=$this->Common_model->updateData('jp_setting',$data,'2','id');
		if($res)
			echo "Insert";
		else
			echo "not insert";
	}
	function review()
	{
		$this->load->view('admin/common/header');
		$row=$this->Common_model->select('jp_review');
		$this->load->view('admin/review',['row'=>$row]);
		$this->load->view('admin/common/footer');
	}


	
	function update_rec_data(){

		$post = $this->input->post();

		$this->db->update('recruiter',$post,['id'=>$post['id']]);
		$this->session->set_flashdata('msg', 'Updated');
	    redirect('admin/recruiters');
	}


	function update_see_data(){

		$post = $this->input->post();
		$this->db->update('seeker',$post,['id'=>$post['id']]);
		$this->session->set_flashdata('msg', 'Updated');
	    redirect('admin/seekers');
	}


	function insertlogo(){
		            $config['upload_path']="./uploads/client_logo";
					$config['allowed_types']="jpg|png|jpeg";
					$this->load->library('upload',$config);
					$this->upload->initialize($config);
					if($this->upload->do_upload('logo'))
					{
						$d1=$this->upload->data();
						$d2= $d1['file_name'];
						$d3='uploads/client_logo/'.$d2;
						$arr=array('logo'=>$d3);

					}
					$this->db->insert('client_logo',$arr);
					$this->session->set_flashdata('msg', 'Added');
	    redirect('admin/client_logo');
	}

	function delete_clientlogo()
	{
		$id=$this->input->post('id');
		if(isset($id))
		{
			$res=$this->Common_model->delete('client_logo',$id,'logo_id');
			$this->session->set_flashdata('msg', 'Deleted');
			redirect('admin/client_logo');
		}
	}

	
}