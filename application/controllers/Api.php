<?php
class Api extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Common_model');
		
	}


	
	function  index()
	{
		$this->load->view('admin/api_details');
	}
	
	
	function all_job()
	{
		$job=$this->Common_model->select('job_post');
		if($job)
		{
			$job2=array(
			'staus'=>'true',
			'message'=>'Success',
			'data'=>$job,
			);
			$json_job=json_encode($job2);
			echo $json_job;
		}
		else
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'job not Found',
			'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
	}
	
   ///////////////////////// job type //////////////////////////
   function job_type()
	{
		$job = 	$this->db->get_where('job_types',['status'=>'Active'])->result();
		if($job)
		{
			$job2=array(
			'staus'=>'true',
			'message'=>'Success',
			'data'=>$job,
			);
			$json_job=json_encode($job2);
			echo $json_job;
		}
		else
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'job Type not Found',
			'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
	}
	
   function qualification()
	{
		$qualification = 	$this->db->get_where('qualification',['type'=>$this->input->post('type')])->result();
		if($qualification)
		{
			$job2=array(
			'staus'=>'true',
			'message'=>'Success',
			'data'=>$qualification,
			);
			$json_job=json_encode($job2);
			echo $json_job;
		}
		else
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'job Type not Found',
			'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
	}


	function city()
	{
		$id = $this->input->post('id');
		
		$this->db->select('name');
		$this->db->from('location');
		$this->db->where('state',$id);
		$this->db->group_by('name');
		$data = $this->db->get()->result();

		$j_arr=array(
			'staus'=>'success',
			'message'=>'Successfully',
			'data'=>$data,
		);

		$json_job=json_encode($j_arr);
		echo $json_job;
	}


	
	function locality()
	{
		$id = $this->input->post('id');

		$this->db->select('locality');
		$this->db->from('location');
		$this->db->where('name',$id);
		$this->db->group_by('locality');
		$data = $this->db->get()->result();

		$j_arr=array(
			'staus'=>'success',
			'message'=>'Successfully',
			'data'=>$data,
		);

		$json_job=json_encode($j_arr);
		echo $json_job;
	}




//   function qualification()
// 	{

// 		$job = 	$this->db->get_where('qualification',['status'=>'Active'])->result();
		
// 		if($job)
// 		{
// 			$job2=array(
// 			'staus'=>'true',
// 			'message'=>'Success',
// 			'data'=>$job,
// 			);
// 			$json_job=json_encode($job2);
// 			echo $json_job;
// 		}
// 		else
// 		{
// 			$j_arr=array(
// 			'staus'=>'false',
// 			'message'=>'job Type not Found',
// 			'data'=>'',
// 			);
// 			$json_single_job=json_encode($j_arr);
// 			echo $json_single_job;
// 		}
// 	}
	
   function location()
	{


		$this->db->select('state');
		$this->db->from('location');
		$this->db->where('status','Active');
		$this->db->group_by('state');
		$job = $this->db->get()->result();

		
		if($job)
		{
			$job2=array(
			'staus'=>'true',
			'message'=>'Success',
			'data'=>$job,
			);
			$json_job=json_encode($job2);
			echo $json_job;
		}
		else
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'not Found',
			'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
	}
	
   function area_of_sectors()
	{
		$job = 	$this->db->get_where('area_of_sectors',['status'=>'Active'])->result();
		
		if($job)
		{
			$job2=array(
			'staus'=>'true',
			'message'=>'Success',
			'data'=>$job,
			);
			$json_job=json_encode($job2);
			echo $json_job;
		}
		else
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'job Type not Found',
			'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
	}
	
	
	function password_change()
	{
		$type=$this->input->post('type');
		$email=$this->input->post('email');
		$old_ps=$this->input->post('old_ps');
		$ps=$this->input->post('ps');
		$data=$this->input->post();
		$info=$this->Common_model->select($type,$email,'email');
		$o_ps=$info->ps;
		$old_ps1=md5($old_ps);
		if($o_ps==$old_ps1)
		{ 
				$new_ps1=md5($ps);
				$to_email_address=$email;
				$subject=" Password Change Confirmation";
				$message="";
				$headers="";
				$email_info=$this->Common_model->select('jp_setting_email','1','id');
					$this->load->library('email');
					$config['mailtype'] = 'html';
					$this->email->initialize($config);
					$this->email->to($to_email_address);
					$data2=array('ps'=>$new_ps1);
					$r1=$this->Common_model->updateData($type,$data2,$email,'email');
					if($r1)
					{
						$j_arr=array(
						'staus'=>'true',
						'message'=>'password changed success',
						'data'=>'',
						);
						$json_single_job=json_encode($j_arr);
						echo $json_single_job;
					}
					else
					{
						$j_arr=array(
						'staus'=>'false',
						'message'=>'password Not change',
						'data'=>'',
						);
						$json_single_job=json_encode($j_arr);
						echo $json_single_job;
					}
		}
		else
		{
			$j_arr=array(
						'staus'=>'false',
						'message'=>'Enter right password',
						'data'=>'',
						);
						$json_single_job=json_encode($j_arr);
						echo $json_single_job;
		}
	}
	function single_job()
	{
		$id=$this->input->post('job_id');
	
		if(!empty($id))
		{
			$res=$this->Common_model->select('job_post',$id,'id');
			$r_id = $res->r_id;
			$id = $res->id;
			$org = $this->Common_model->select('recruiter',$r_id,'email');     //org_detail
			$j_arr=array(
			'staus'=>'true',
			'message'=>'Success',
			'data'=>$res,
			'recruiter'=>$org,
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
		else
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'post request is empty',
			'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
	}
	
	
	
// 	///////////////////////////////////////////////////////////////////
	function signUp()
	{
		$name=$this->input->post('type');
		$data=$this->input->post();
		unset($data['type']);
		if(!empty($data))
		{
			if($name=='recruiter')
			{
					$plan=$this->Common_model->select('jp_revenue');
					foreach($plan as $p1)
					{
						if($p1->show_on_reg=='yes')
						{
							//echo "Pay";
								$ps=$this->input->post('ps');
								$mno=$this->input->post('mno');
								$ps1=md5($ps);
								$data['ps']=$ps1;
								$email=$this->input->post('email');
								$mno=$this->input->post('mno');
								unset($data['rps']);
								$d1=$this->Common_model->signUp($data,$mno,$email,$name);
								if($d1==1)
								{

									$rcdata = $this->db->get_where('recruiter',['email'=>$email])->row();
									$this->session->set_userdata('pay_sessiion',$email);
									$this->session->set_userdata('pay_sessiion2',$ps);
									$this->session->set_userdata('pay_sessiion3',$mno);
										$email_info=$this->Common_model->select('jp_setting_email','1','id');
										$link=base_url('home/v/').$mno."/".$name;
										$this->load->library('email');
								
                                      $to = $email;
                                      $subject ='Registration Confirmed! Welcome to SCNJOB.COM';

                                      $message = "
                                                 <html>
                                                       <head>
                                                         <title>SCN.JOB</title>
                                                        </head>
                                                         <body>
                                                                   <div style='width:100%;height:100px;background:#5176E3'><br>
																   <center><img src='".base_url('uploads/setting/logo_with_text.png')."' alt='logo'></center>
																   </div>
																   <p>Dear [".$rcdata->name."],</p><br><br>
																   <p>Congratulations! Your registration with SCNJOB.COM is now confirmed, and we're thrilled to welcome you to our community of talented professionals.</p><br><br>
																   <p>Here are the details of your registration:</p><br><br>
																   <p>Email Address: ".$email."</p><br>
																   <p>Password: ".$ps."</p><br><br>
																   <p><font size='2' color='#74787E'>".$email_info->recruiter_veri_msg."</font></p><br><br>
																   <a href='".$link."' style='color:red;'>Click Here</a><br><br><br><p>
																   <font size='4' color='#74787E'>Thank you</font></p>
																   <font color='#74787E'><p>Regards,</p><p>Job Portal</p></font>
                                                         </body>
                                                  </html>";

                                      // Always set content-type when sending HTML email
                                      $headers = "MIME-Version: 1.0" . "\r\n";
                                      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                      $headers .= 'From: <'.$email_info->recruiter_email.'>' . "\r\n";

                                      mail($to,$subject,$message,$headers);
								
								
								
								
								
									$q=$this->db->select('*')->from('recruiter')->where('email',$email)->get();
									$res=$q->row();
									$j_arr=array(
									'staus'=>'true',
									'message'=>'please pay',
									'data'=>$res,
									);
									$json_signup=json_encode($j_arr);
									echo  $json_signup;
								}
								else if($d1=='eyes')
								{
									$q=$this->db->select('*')->from('recruiter')->where('email',$email)->get();
									$res=$q->row();
									if($res->pay=='no')
									{
											$j_arr=array(
											'staus'=>'true',
											'message'=>'please pay',
											'data'=>$res,
											);
											$json_signup=json_encode($j_arr);
											echo  $json_signup;
									}
									else
									{
										$j_arr=array(
											'staus'=>'false',
											'message'=>'email already exists',
											'data'=>$res,
											);
											$json_signup=json_encode($j_arr);
											echo  $json_signup;
									}
								}
								else if($d1=='myes')
								{
									$q=$this->db->select('*')->from('recruiter')->where('mno',$mno)->get();
									$res=$q->row();
										$j_arr=array(
											'staus'=>'false',
											'message'=>'mobile number already exists',
											'data'=>$res,
											);
											$json_signup=json_encode($j_arr);
											echo  $json_signup;
								}
								else
								{
									$q=$this->db->select('*')->from('recruiter')->where('email',$email)->where('mno',$mno)->get();
									$res=$q->row();
									print_r($res);
								}
							
						}
						else
						{
								$ps=$this->input->post('ps');
								$ps1=md5($ps);
								$data['ps']=$ps1;
								$email=$this->input->post('email');
								$mno=$this->input->post('mno');
								unset($data['rps']);
								$d1=$this->Common_model->signUp($data,$mno,$email,$name);
								$p_info=$this->Common_model->select('jp_revenue');
								$p_infi_plane='';
								foreach($p_info as $p1)
								{
									$p_infi_plane=$p1->condation;
								}
								if($d1==1)
								{
									$d1=date('Y/m/d');
									$arr=array('pay'=>'no',
											   'plan'=>$p_infi_plane,
											   'pay_date'=>'',
											   'show_on_reg'=>'no',
									);
									$rcdata = $this->db->get_where('recruiter',['email'=>$email])->row();
									$res=$this->Common_model->updateData('recruiter',$arr,$email,'email');
										$email_info=$this->Common_model->select('jp_setting_email','1','id');
										$link=base_url('home/v/').$mno."/".$name;
										$this->load->library('email');
					
								        $to = $email;
                                        $subject = 'Registration Confirmed! Welcome to SCNJOB.COM';

                                        $message = "<html>
                                                       <head>
                                                         <title>SCN.JOB</title>
                                                        </head>
                                                         <body>
                                                                   <div style='width:100%;height:100px;background:#5176E3'><br>
																   <center><img src='".base_url('uploads/setting/logo_with_text.png')."' alt='logo'></center>
																   </div>
																   <p>Dear [".$rcdata->name."],</p><br><br>
																   <p>Congratulations! Your registration with SCNJOB.COM is now confirmed, and we're thrilled to welcome you to our community of talented professionals.</p><br><br>
																   <p>Here are the details of your registration:</p><br><br>
																   <p>Email Address: ".$email."</p><br>
																   <p>Password: ".$ps."</p><br><br>
																   <p><font size='2' color='#74787E'>".$email_info->recruiter_veri_msg."</font></p><br><br>
																   <a href='".$link."' style='color:red;'>Click Here</a><br><br><br><p>
																   <font size='4' color='#74787E'>Thank you</font></p>
																   <font color='#74787E'><p>Regards,</p><p>Job Portal</p></font>
                                                         </body>
                                                  </html>"
										
										
										
										;
                                        
                                        // Always set content-type when sending HTML email
                                        $headers = "MIME-Version: 1.0" . "\r\n";
                                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                        // More headers
                                        $headers .= 'From: <'.$email_info->recruiter_email.'>' . "\r\n";

                                        mail($to,$subject,$message,$headers);

								
									$this->session->set_flashdata('msg','vmsg');
									$j_arr=array(
									'staus'=>'true',
									'message'=>'registor',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo  $json_signup;
								}
								else
								{
									$j_arr=array(
									'staus'=>'true',
									'message'=>'not registor',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo  $json_signup;
								}
							
						}
					}
			}
			else 
			{
				
				$ps=$this->input->post('ps');
				$ps1=md5($ps);
				$data['ps']=$ps1;
				$email=$this->input->post('email');
				$mno=$this->input->post('mno');
				unset($data['rps']);
				$d1=$this->Common_model->signUp($data,$mno,$email,$name);
				$q=$this->db->select('*')->from('recruiter')->where('email',$email)->get();
				$res=$q->row();
				if($d1==1)
				{
					$rcdata = $this->db->get_where('seeker',['email'=>$email])->row();

						$email_info=$this->Common_model->select('jp_setting_email','1','id');
						$link=base_url('home/v/').$mno."/".$name;
										$this->load->library('email');
					
								
								
								$to = $email;
$subject = 'Registration Confirmed! Welcome to SCNJOB.COM';

$message =


 
                                                      "<html>
                                                       <head>
                                                         <title>SCN.JOB</title>
                                                        </head>
                                                         <body>
                                                                   <div style='width:100%;height:100px;background:#5176E3'><br>
																   <center><img src='".base_url('uploads/setting/logo_with_text.png')."' alt='logo'></center>
																   </div>
																   <p>Dear [".$rcdata->name."],</p><br><br>
																   <p>Congratulations! Your registration with SCNJOB.COM is now confirmed, and we're thrilled to welcome you to our community of talented professionals.</p><br><br>
																   <p>Here are the details of your registration:</p><br><br>
																   <p>Email Address: ".$email."</p><br>
																   <p>Password: ".$ps."</p><br><br>
																   <p><font size='2' color='#74787E'>".$email_info->seeker_veri_msg."</font></p><br><br>
																   <a href='".$link."' style='color:red;'>Click Here</a><br><br><br><p>
																   <font size='4' color='#74787E'>Thank you</font></p>
																   <font color='#74787E'><p>Regards,</p><p>Job Portal</p></font>
                                                         </body>
                                                  </html>"

;

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$email_info->seeker_email.'>' . "\r\n";
// $headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
								
								
						$this->session->set_flashdata('msg','vmsg');
					$j_arr=array(
									'staus'=>'true',
									'message'=>'registor',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo  $json_signup;
				}
				else if($d1=='eyes')
				{
						$q=$this->db->select('*')->from('seeker')->where('email',$email)->get();
						$res=$q->row();
								$j_arr=array(
									'staus'=>'false',
									'message'=>'email already exists',
									'data'=>$res,
									);
								$json_signup=json_encode($j_arr);
								echo  $json_signup;
				}
				else if($d1=='myes')
				{
					$q=$this->db->select('*')->from('seeker')->where('mno',$mno)->get();
					$res=$q->row();
							$j_arr=array(
							'staus'=>'false',
							'message'=>'mobile number already exists',
							'data'=>$res,
							);
							$json_signup=json_encode($j_arr);
							echo  $json_signup;
				}
				else
				{
					$j_arr=array(
									'staus'=>'flase',
									'message'=>'not registor',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo  $json_signup;
				}
			}
		}
		else
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'post request is empty',
			'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
	}


	
	//seeker
function login(){
	
	   $name=$this->input->post('type');
	   $email=$this->input->post('email');
		$token=$this->input->post('token');
		$ps=$this->input->post('ps');
		$res=$this->Common_model->select('jp_setting','2','id');
		if(!empty($name))
		{
			$email=$this->input->post('email');
			$ps1=$this->input->post('ps');
			$ps=md5($ps1);
			
			$q=$this->Common_model->login($email,$ps,$name);
			if($q)
			{
				$mno=$q->mno;
				if($name=='recruiter')
				{ 
					$q->ps="r";
					$rec_info=$this->Common_model->select('recruiter',$email,'email');
					$plan=$rec_info->show_on_reg;
					if($plan=='no')
					{
						if($q->veri!="yes")
						{
							$j_arr=array(
								'staus'=>'false',
								'message'=>'please verify your email address',
								'data'=>'',
						       );
					     $json_single_job=json_encode($j_arr);
			             echo $json_single_job;
						}
						else if($q->status!='Active')
						{
							$j_arr=array(
								'staus'=>'false',
								'message'=>'Account Disabled',
								'data'=>'',
						       );
						 $json_single_job=json_encode($j_arr);
			             echo $json_single_job;
						}
						else
						{
							//$this->session->set_userdata($name,$email);
							$j_arr=array(
								'staus'=>'true',
								'message'=>'Success',
								'base_url'=>base_url(),
								'admob'=>$res->add_mob_s,
								'data'=>$q,
								);
						// $json_single_job=json_encode($j_arr);
			             //echo $json_single_job;
						 echo str_replace('null' , '"0"' , json_encode($j_arr));
											
						}	
					}
					else
					{
						$pay=$rec_info->pay;
						if($pay=='yes')
						{
								if($q->veri!="yes")
								{
									$j_arr=array(
										'staus'=>'false',
										'message'=>'please verify your email address',
										'data'=>'',
									   );
									$json_single_job=json_encode($j_arr);
			                        echo $json_single_job;
								}
								else if($q->status!='Active')
								{
									$j_arr=array(
										'staus'=>'false',
										'message'=>'Account Disabled',
										'data'=>'',
									   );
									$json_single_job=json_encode($j_arr);
			                        echo $json_single_job;
								}
								else
								{
									//$this->session->set_userdata($name,$email);
									$j_arr=array(
									'staus'=>'true',
									'message'=>'Success',
									'base_url'=>base_url(),
									'admob'=>$res->add_mob_s,
									'data'=>$q,
									);
									//$json_single_job=json_encode($j_arr);
			                        //echo $json_single_job;
									echo str_replace('null' , '"0"' , json_encode($j_arr));
								}	
						}
						else if($pay=='no')
						{
							$data=array('mobile no'=>$mno,
										'email'=>$email,
							);
							$j_arr=array(
									'staus'=>'true',
									'message'=>'please pay',
									'base_url'=>base_url(),
									'admob'=>$res->add_mob_s,
									'data'=>$q,
									);
									//$json_single_job=json_encode($j_arr);
			                        //echo $json_single_job;
									echo str_replace('null' , '"0"' , json_encode($j_arr));
							
						}
						else
						{
							$j_arr=array(
							'staus'=>'false',
							'message'=>'Wrong User',
							'data'=>'',
							);
							$json_single_job=json_encode($j_arr);
			                echo $json_single_job;
						}
					}
				}
				else
				{
					$tokrn_arr=array('token'=>$token);
					$this->Common_model->updateData('seeker',$tokrn_arr,$email,'email');
						 if($q->veri!="yes")
						 {
							$j_arr=array(
								'staus'=>'false',
								'message'=>'please verify your email address',
								'data'=>'',
						       );
							   $json_single_job=json_encode($j_arr);
			                   echo $json_single_job;
						 }
						else if($q->status!='Active')
						{
							$j_arr=array(
								'staus'=>'false',
								'message'=>'Account Disabled',
								'data'=>'',
						       );
							$json_single_job=json_encode($j_arr);
			                echo $json_single_job;
						}
						else
						{
							//$this->session->set_userdata($name,$email);
							$j_arr=array(
									'staus'=>'true',
									'message'=>'Success',
									'base_url'=>base_url(),
									'admob'=>$res->add_mob_s,
									'data'=>$q,
									);
							//$json_single_job=json_encode($j_arr);
			                //echo $json_single_job;
							echo str_replace('null' , '"0"' , json_encode($j_arr));
						}	
				}
				
					
			}
			else
			{
				$j_arr=array(
				'staus'=>'false',
				'message'=>'Wrong User',
				'data'=>'',
				);	
				$json_single_job=json_encode($j_arr);
			    echo $json_single_job;
			}
		}
		else
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'post request is empty',
			'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
	}




	
	function my_applied_job()
	{
		$email=$this->input->post('email');
		if(!empty($email))
		{
			//$my_app_job=$this->Common_model->my_applied_job('jp_applay_job',$email,'s_email');
			
			$row1=$this->db->select('*')->from('jp_applay_job')->where('s_email',$email)->get();
			$my_app_job=$row1->result();
			if($my_app_job)
			{
				$arr=array();
				foreach($my_app_job as $my_app_job1)
				{
						$job_id=$my_app_job1->job_id;
						$job_info=$this->Common_model->select('job_post',$job_id,'id');
						$arr[]=$job_info;
						
				}
				$j_arr=array(
						'staus'=>'true',
						'message'=>'Success',
						'data'=>$arr,
						);
						$json_job=json_encode($j_arr);
						echo $json_job;
			}
			else
			{
				$j_arr=array(
				'staus'=>'false',
				'message'=>'applied job not found',
				'data'=>'',
				);
				$json_job=json_encode($j_arr);
				echo $json_job;
			}
		}
		else
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'post request is empty',
			'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
		
	}
	
	//recruiter
	function myjobs()
	{
		$email=$this->input->post('email');
		if(!empty($email))
		{
			$job=$this->db->select('*')->from('job_post')->where('r_id',$email)->get();
			$myjob=$job->result();
			if(!empty($myjob))
			{
				$j_arr=array(
				'staus'=>'true',
				'message'=>'Success',
				'data'=>$myjob,
				);
				$json_single_job=json_encode($j_arr);
				echo $json_single_job;
			}
			else
			{
				$j_arr=array(
				'staus'=>'false',
				'message'=>'data_not_found',
				'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
			}
		}
		else 
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'post request is empty',
			'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
	}
	function job_edit()
	{
		$id=$this->input->post('job_id');
		if(!empty($id))
		{
			$job=$this->Common_model->select('job_post',$id,'id');
			if(!empty($job))
			{
				$j_arr=array(
				'staus'=>'true',
				'message'=>'Success',
				'data'=>$job,
				);
				$json_single_job=json_encode($j_arr);
				echo $json_single_job;
			}
			else
			{
				$j_arr=array(
				'staus'=>'false',
				'message'=>'data_not_found',
				'data'=>'',
			     );
			    $json_single_job=json_encode($j_arr);
			     echo $json_single_job;
			}
		}
		else
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'post request is empty',
			'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
	}
	function view_applied_seeker()
	{
		$job_id=$this->input->post('job_id');
		if(!empty($job_id))
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
			if(!empty($arr_info))
			{
				foreach($arr_info as $data1)
				{
					$seeker_info[]=$this->Common_model->select('seeker',$data1,'email');	
				}
				$j_arr=array(
						'staus'=>'true',
						'message'=>'Success',
						'data'=>$seeker_info,
						);
						//$json_single_job=json_encode($j_arr);
						//echo $json_single_job;
						echo str_replace('null' , '"0"' , json_encode($j_arr));
			}
			else
			{
				$j_arr=array(
						'staus'=>'false',
						'message'=>'not Found',
						'data'=>'',
						);
						$json_single_job=json_encode($j_arr);
						echo $json_single_job;
			}
		}
		else
		{
			$j_arr=array(
						'staus'=>'false',
						'message'=>'Post Request not Found',
						'data'=>'',
						);
						$json_single_job=json_encode($j_arr);
						echo $json_single_job;
		}
		
		
	}
	function applied_seeker()
	{
		$email=$this->input->post('recruiter_email');
	if(!empty($email))
		{
			$rec_data=$this->Common_model->select('recruiter',$email,'email');
			if(!empty($rec_data))
			{
				$rec_id=$rec_data->id;
				$data=$this->db->select('*')->from('jp_applay_job')->where('r_id',$rec_id)->get();
				$a_seeker=$data->result();
				$seeker_info=array();
				foreach($a_seeker as $a1)
				{
					$email=$a1->s_email;
					$s1=$this->db->select(['name','mno','email'])->from('seeker')->where('email',$email)->get();
					$seeker_info[]=$s1->row();
				}
				//$a_seeker=$this->Common_model->select('jp_applay_job',$rec_id,'r_id');
				if(!empty($a_seeker))
				{
					$j_arr=array(
					'staus'=>'true',
					'message'=>'Success',
					'data'=>$seeker_info,
					);
					$json_single_job=json_encode($j_arr);
					echo $json_single_job;
				}
				else
				{
					$j_arr=array(
					'staus'=>'false',
					'message'=>'data_not_found',
					'data'=>'',
				);
				$json_single_job=json_encode($j_arr);
				echo $json_single_job;
				}
			}
			else
			{
				$j_arr=array(
					'staus'=>'false',
					'message'=>'data_not_found',
					'data'=>'',
				);
				$json_single_job=json_encode($j_arr);
				echo $json_single_job;
			}
		}
		else
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'post request is empty',
			'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
		
	}
	function seeker_info()
	{
		$email=$this->input->post('seeker_email');
		if(!empty($email))
		{
			$s_data=$this->Common_model->select('seeker',$email,'email');
			if(!empty($s_data))
			{
				$j_arr=array(
				'staus'=>'true',
				'message'=>'Success',
				'data'=>$s_data,
				);
				// $json_single_job=json_encode($j_arr);
				// echo $json_single_job;
			}
			else
			{
				$j_arr=array(
				'staus'=>'false',
				'message'=>'data_not_found',
				'data'=>'',
			);
			// $json_single_job=json_encode($j_arr);
			// echo $json_single_job;
			}
		}
		else
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'post request is empty',
			'data'=>'',
			);
			// $json_single_job=json_encode($j_arr);
			
		}
		echo str_replace('null' , '"0"' , json_encode($j_arr));
	}
	
	function recruiter_info()
	{
		$email=$this->input->post('recruiter_email');
		if(!empty($email))
		{
			$s_data=$this->Common_model->select('recruiter',$email,'email');
			if(!empty($s_data))
			{
				$j_arr=array(
				'staus'=>'true',
				'message'=>'Success',
				'data'=>$s_data,
				);
				$json_single_job=json_encode($j_arr);
				echo $json_single_job;
			}
			else
			{
				$j_arr=array(
				'staus'=>'false',
				'message'=>'data_not_found',
				'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
			}
		}
		else
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'post request is empty',
			'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
	}
	function seeker_profile()
	{   //counter ps_reserve email all fileld for required seeker
	$res_new=$this->Common_model->select('jp_setting','2','id');
		$data=$this->input->post();
		$ps=$this->input->post('ps');
		$mno=$this->input->post('mno');
		$email=$this->input->post('email');
		unset($data['email']);
		$ps2='';
			
		if(!empty($email))
		{
		if(!empty($ps))
		{
			if(preg_match('/^[a-f0-9]{32}$/', $ps))
			{
				$ps2=$ps;
			}
			else
			{
				$ps2=md5($ps);
			}
			$data['ps']=$ps2;
		}
		else
		{
			unset($data['ps']);
		}
		
		if(empty($_FILES))
		{
			unset($data['rps']);	
					$res=$this->Common_model->updateData('seeker',$data,$email,'email');
					$seeker_info1=$this->Common_model->select('seeker',$email,'email');
					if($res)
					{
						$j_arr=array(
						'staus'=>'true',
						'base_url'=>base_url(),
						'admob'=>$res_new->add_mob_s,
						'message'=>'Success',
						'data'=>$seeker_info1,
						);
						$json_single_job=json_encode($j_arr);
						echo $json_single_job;
					}
					else
					{
						$j_arr=array(
							'staus'=>'false',
							'message'=>'not update',
							'data'=>'',
						);
						$json_single_job=json_encode($j_arr);
						echo $json_single_job;
					}
		}
		else
		{
				$seeker_info=$this->Common_model->select('seeker',$email,'email');
				$img=$seeker_info->resume;
				$config['upload_path']="./uploads/resume";
				$config['allowed_types']="pdf|docx";
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('resume'))
				{
					if(!empty($img))
					{
					unlink('./'.$img);
					}
					
					$d1=$this->upload->data();
					$d2= $d1['file_name'];
					$d3='uploads/resume/'.$d2;
					$data['resume']=$d3;
					
					unset($data['rps']);	
					$res=$this->Common_model->updateData('seeker',$data,$email,'email');
					$seeker_info1=$this->Common_model->select('seeker',$email,'email');
					if($res)
					{
						$j_arr=array(
						'staus'=>'true',
						'message'=>'Success',
						'base_url'=>base_url(),
						'admob'=>$res_new->add_mob_s,
						'data'=>$seeker_info1,
						);
						$json_single_job=json_encode($j_arr);
						echo $json_single_job;
					}
					else
					{
						$j_arr=array(
							'staus'=>'false',
							'message'=>'not update',
							'data'=>'',
						);
						$json_single_job=json_encode($j_arr);
						echo $json_single_job;
					}
				}
				else
				{
					$j_arr=array(
							'staus'=>'false',
							'message'=>'Uploaded file is not a valid resume file. Only PDF and DOC files are allowed',
							'data'=>'',
						);
						$json_single_job=json_encode($j_arr);
						echo $json_single_job;
				}
		}
		}
	}

	
	function job_post()
	{
		/*r_email */
		 $r_data=$this->Common_model->select('jp_revenue');
		$s1=$this->input->post('r_id');
		$data=$this->input->post();
		$desi=$this->input->post('designation');
		$sp=$this->input->post('specialization');
		$this->push($sp,$desi);
		// unset($data['r_id']);
		$data['post_date'] = date("jS  F Y ");
		
		if(!empty($data))
		{	
			$lasr_date_application=$this->input->post('lasr_date_application');
			if(empty($lasr_date_application))
			{
				$data['lasr_date_application']=' ';
			}

			$pay_status_check=$this->Common_model->select('recruiter',$s1,'email');

			// $this->db->get_where('recruiter',['email'=>])
			


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
									$j_arr=array(
									'staus'=>'true',
									'message'=>'success',
									'data'=>'job Post',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
								}
								else
								{
									$j_arr=array(
									'staus'=>'flase',
									'message'=>'job not post',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
								}
				}
				else
				{
					$pay_date=$pay_status_check->pay_date;
					$pay_date_array=explode('/',$pay_date);
					$year1=$pay_date_array[0];
					$yaer2=$year1+$pay_month;
					$pay_date_array2=$pay_date_array;
					$pay_date_array2[0]=$yaer2;
					//print_r($pay_date_array2);
					$last_date=implode('/',$pay_date_array2);
					$d1=date('Y/m/d');
					$d2= str_replace("/","",$d1);	
					$current_data_int_format= (int)$d2;
					 $last_date2= str_replace("/","",$last_date);
					 $last_data_int_format= (int)$last_date2;
					if($current_data_int_format>=$last_data_int_format)
					{
						$j_arr=array(
						'staus'=>'true',
						'message'=>'please pay',
						'data'=>$r_data,
						);
						$json_signup=json_encode($j_arr);
						echo  $json_signup;
					}
					else if($plan_info->value1=="ALL")
				    {
					            $res=$this->Common_model->insert('job_post',$data);
								if($res)
								{
									$j_arr=array(
									'staus'=>'true',
									'message'=>'success',
									'data'=>'job Post',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
								}
								else
								{
									$j_arr=array(
									'staus'=>'flase',
									'message'=>'job not post',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
								}
				    }
					else if($job_post_count>=$plan_info->value1)
					{
						$j_arr=array(
						'staus'=>'true',
						'message'=>'please pay',
						'data'=>$r_data,
						);
						$json_signup=json_encode($j_arr);
						echo  $json_signup;
					}
					else
					{
						$res=$this->Common_model->insert('job_post',$data);
								if($res)
								{
									$j_arr=array(
									'staus'=>'true',
									'message'=>'success',
									'data'=>'job Post',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
								}
								else
								{
									$j_arr=array(
									'staus'=>'flase',
									'message'=>'job not post',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
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
								$j_arr=array(
									'staus'=>'true',
									'message'=>'success',
									'data'=>'job Post',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
							}
							else
							{
								$j_arr=array(
									'staus'=>'flase',
									'message'=>'job not post',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
							}
						}
						else if($job_post_count>=$r_data2)
						{
							$j_arr=array(
							'staus'=>'true',
							'message'=>'please pay',
							'data'=>$r_data,
							);
							$json_signup=json_encode($j_arr);
							echo  $json_signup;
						}
						else
						{
							$res=$this->Common_model->insert('job_post',$data);
							if($res)
							{
								$j_arr=array(
									'staus'=>'true',
									'message'=>'success',
									'data'=>'job Post',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
							}
							else
							{
								$j_arr=array(
									'staus'=>'flase',
									'message'=>'job not post',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
							}
						}
				  }
				  else if($plan=="num_of_resume_download")
				  {
							$res=$this->Common_model->insert('job_post',$data);
							if($res)
							{
								$j_arr=array(
									'staus'=>'true',
									'message'=>'success',
									'data'=>'job Post',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
							}
							else
							{
								$j_arr=array(
									'staus'=>'flase',
									'message'=>'job not post',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
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
								$j_arr=array(
									'staus'=>'true',
									'message'=>'success',
									'data'=>'job Post',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
							}
							else
							{
								$j_arr=array(
									'staus'=>'flase',
									'message'=>'job not post',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
							}
					  }
					  else if($r_data3=="ALL")
					  {
						  $res=$this->Common_model->insert('job_post',$data);
							if($res)
							{
								$j_arr=array(
									'staus'=>'true',
									'message'=>'success',
									'data'=>'job Post',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
							}
							else
							{
								$j_arr=array(
									'staus'=>'flase',
									'message'=>'job not post',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
							}
					  }
					  else if($resume_count>$r_data3)
					  {
							  $j_arr=array(
								'staus'=>'true',
								'message'=>'please pay',
								'data'=>$r_data,
								);
								$json_signup=json_encode($j_arr);
								echo  $json_signup;
					  }
					  else if($job_post_count>=$r_data2)
					  {
						  $j_arr=array(
								'staus'=>'true',
								'message'=>'please pay',
								'data'=>$r_data,
								);
								$json_signup=json_encode($j_arr);
								echo  $json_signup;
					  }
					  else
					  {
						  $res=$this->Common_model->insert('job_post',$data);
							if($res)
							{
								
								$j_arr=array(
									'staus'=>'true',
									'message'=>'success',
									'data'=>'job Post',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
							}
							else
							{
								$j_arr=array(
									'staus'=>'flase',
									'message'=>'job not post',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
							}
					  }
				  }
				  else
				  {
					  $j_arr=array(
						'staus'=>'true',
						'message'=>'please pay',
						'data'=>$r_data,
						);
						$json_signup=json_encode($j_arr);
						echo  $json_signup;
				  }
				  
			}
		}
		else 
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'post request is empty',
			'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
	}
	function update_job_post()
	{
		 /*print_r($_POST);
		 die();*/
		$data=$this->input->post();
		if(!empty($data))
		{
			$d=$this->input->post('lasr_date_application');
			$written_test=$this->input->post('written_test');
			$group_discussion=$this->input->post('group_discussion');
			$hr_round=$this->input->post('hr_round');
			$technical_round=$this->input->post('technical_round');
			$id=$this->input->post('job_id');
			if(empty($written_test))
			{
				$data['written_test']='no';
			}
			if(empty($group_discussion))
			{
				$data['group_discussion']='no';
			}
			if(empty($hr_round))
			{
				$data['hr_round']='no';
			}
			if(empty($technical_round))
			{
				$data['technical_round']='no';
			}
				
				unset($data['job_id']);
				// $this->db->update('job_post',$data,['id'=>$id]);
				$up_res=$this->Common_model->updateData('job_post',$data,$id,'id');
				if($up_res)
				{
					$j_arr=array(
										'staus'=>'true',
										'message'=>'job  post Update',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
				}
				else
				{	
					$j_arr=array(
										'staus'=>'flase',
										'message'=>'job  post not update',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
					
			   }
	    }
		else
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'post request is empty',
			'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
	}
	function recruiter_pic_update()
	{
		$s1=$this->input->post('r_email');
		if(!empty($s1))
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
			$data=array('img'=>$d2);
		$res=$this->Common_model->updateData('recruiter',$data,$s1,'email');
		
		$qualification=$this->Common_model->select('qualification');
		$location=$this->Common_model->select('location');
		$area_of_sectors=$this->Common_model->select('area_of_sectors');
		$job_types=$this->Common_model->select('job_types');
		$email=$this->session->userdata('recruiter');
		
			if($res)
			{
					$j_arr=array(
									'staus'=>'true',
									'message'=>'Profile pic Update',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
			}
			else
			{
				$j_arr=array(
									'staus'=>'false',
									'message'=>'Profile pic Not Update',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
				
			}
		}
		else
		{
			$j_arr=array(
									'staus'=>'false',
									'message'=>'JPG And PNG Allow',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
		}
		}
		else
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'post request is empty',
			'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
	}
	function pro_pic_upload()
	{	
		$email=$this->input->post('s_email');
		if(!empty($email))
		{
		$res1=$this->Common_model->select('seeker',$email,'email');
		$img=$res1->img;
		
		$config['upload_path']="./uploads/user_pro_pic";
		$config['allowed_types']="*";
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
			$data=array('img'=>$d2);
		$res=$this->Common_model->updateData('seeker',$data,$email,'email');
		
		$qualification=$this->Common_model->select('qualification');
		$location=$this->Common_model->select('location');
		$area_of_sectors=$this->Common_model->select('area_of_sectors');
		$job_types=$this->Common_model->select('job_types');
		if($res)
		{
			$j_arr=array(
									'staus'=>'true',
									'message'=>'Profile pic update',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
		}
		else
		{
			
			$j_arr=array(
									'staus'=>'false',
									'message'=>'Profile pic not Update',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
		}
		}
		else
		{
				$j_arr=array(
									'staus'=>'false',
									'message'=>'only jpg and png file Allow',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
		}
		}
		else
		{
			$j_arr=array(
			'staus'=>'false',
			'message'=>'post request is empty',
			'data'=>'',
			);
			$json_single_job=json_encode($j_arr);
			echo $json_single_job;
		}
	}
	function forgot_password()
	{
		/* type emai */
		    $name=$this->input->post('type');
	        $email=$this->input->post('email');
			$data=$this->input->post();
			
			if(!empty($name) && !empty($email))
			{
			$ps=rand(50000,100000);
			$ps1=md5($ps);
			$to_email_address=$email;
				$subject="";
				$message="";
				$headers="";
				$email_info=$this->Common_model->select('jp_setting_email','1','id');
					if($name=='seeker')
					{
						$subject=' Password Change Confirmation';
						$message=$email_info->seeker_forgot_msg." ".$ps;
						$headers = 'From:'.$email_info->seeker_email;
					}
					else if($name=='recruiter')
					{
						$subject=' Password Change Confirmation';
						$message=$email_info->recruiter_forgot_msg." ".$ps;
						$headers = 'From:'.$email_info->seeker_email;
					}
				mail($to_email_address,$subject,$message,$headers);
				
			$data2=array('ps'=>$ps1);
			$r1=$this->Common_model->updateData($name,$data2,$email,'email');
			if($r1)
			{
				$j_arr=array(
									'staus'=>'true',
									'message'=>'Please check your mail',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
			}
			else
			{
				$j_arr=array(
									'staus'=>'false',
									'message'=>'email not exists',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
			}
			}
			else
			{
				$j_arr=array(
				'staus'=>'false',
				'message'=>'post request is empty',
				'data'=>'',
				);
				$json_single_job=json_encode($j_arr);
				echo $json_single_job;
			}
	}
	function search_text()
	{
		$data=$this->input->post('search_txt');	 
		if(!empty($data))
		{
			  $res=$this->Common_model->search_text_s('job_post',$data,'job_location','qualification','technology');
			  if($res)
			  {
				    $j_arr=array(
								    'staus'=>'true',
									'message'=>'success',
									'data'=>$res,
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
			  }
			  else
			  {
				  $j_arr=array(
									'staus'=>'flase',
									'message'=>'job not found',
									'data'=>'',
									);
									$json_signup=json_encode($j_arr);
									echo $json_signup;
			  }
	    }
		else
		{
				$j_arr=array(
				'staus'=>'false',
				'message'=>'post request is empty',
				'data'=>'',
				);
				$json_single_job=json_encode($j_arr);
				echo $json_single_job;
		}
	}

	function fetch()
	{
		$name=$this->input->post('keyword');
		if(!empty($name))
		{
			$res=$this->Common_model->select($name);
			if($res)
			{
				$j_arr=array(
										'staus'=>'true',
										'message'=>'success',
										'data'=>$res,
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
			}
			else
			{
				$j_arr=array(
										'staus'=>'false',
										'message'=>'Data Not Found',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
			}
		}
		else
		{
			$j_arr=array(
				'staus'=>'false',
				'message'=>'post request is empty',
				'data'=>'',
				);
				$json_single_job=json_encode($j_arr);
				echo $json_single_job;
		}
	}
	
	function recruiter_profile_update()
	{
		
		//email all required field
		 $s1=$this->input->post('email');
		$data=$this->input->post();
		if(empty($_FILES))
		{
			if(!empty($data))
			{
				$r1=$this->Common_model->select('recruiter',$s1,'email');
				$res=$this->Common_model->updateData('recruiter',$data,$s1,'email');
				if($res)
				{
					$j_arr=array(
										'staus'=>'true',
										'message'=>'success',
										'data'=>'update',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
				}
				else
				{
					$j_arr=array(
										'staus'=>'flase',
										'message'=>'not update',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
				}		
			}
			else
			{
				$j_arr=array(
				'staus'=>'false',
				'message'=>'post request is empty',
				'data'=>'',
				);
				$json_single_job=json_encode($j_arr);
				echo $json_single_job;
			}
		}
		else
		{
			$res1=$this->Common_model->select('recruiter',$s1,'email');
			$img=$res1->img;	
			$config['upload_path']="./uploads/user_pro_pic";
	    	$config['allowed_types']="*";
	    	
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
					$j_arr=array(
										'staus'=>'true',
										'message'=>'success',
										'data'=>'update',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
				}
				else
				{
					$j_arr=array(
										'staus'=>'flase',
										'message'=>'not update',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
				}		
			}
			else
			{
				$j_arr=array(
										'staus'=>'flase',
										'message'=>'only jpg and png file allow',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
			}
	    }
		
	}




	
	function user_profile_update()
	{
		
		//email all required field
		$s1=$this->input->post('email');
		$data=$this->input->post();

		$action = $this->input->post('action_type');



		if ($action == 'update') {
			
		if(empty($_FILES))
		{
			if(!empty($data))
			{

				unset($data['action_type']);

				// print_r($data);die;

				$r1=$this->Common_model->select('seeker',$s1,'email');
				$res=$this->Common_model->updateData('seeker',$data,$s1,'email');


				if($res)
				{
					$j_arr=array(
										'staus'=>'true',
										'message'=>'success',
										'data'=>'update',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
				}
				else
				{
					$j_arr=array(
										'staus'=>'flase',
										'message'=>'not update',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
				}		
			}
			else
			{
				$j_arr=array(
				'staus'=>'false',
				'message'=>'post request is empty',
				'data'=>'',
				);
				$json_single_job=json_encode($j_arr);
				echo $json_single_job;
			}
		}
		else
		{
		    
			$res1=$this->Common_model->select('seeker',$s1,'email');
			$img=$res1->resume;	
			$config['upload_path']="./uploads/resume";
			$config['allowed_types']="pdf|docx";
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
		   $this->upload->initialize($config);
			if($this->upload->do_upload('resume'))
			
			{
				if(!empty($img)){
			
				unlink('./'.$img);
				
				}
				$d1=$this->upload->data();
				$d= $d1['file_name'];
				$d3='uploads/resume/'.$d;
				$data['resume']=$d3;
				$r1=$this->Common_model->select('seeker',$s1,'email');
				$res=$this->Common_model->updateData('seeker',$data,$s1,'email');
				if($res)
				{
					$j_arr=array(
										'staus'=>'true',
										'message'=>'success',
										'data'=>'update',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
				}
				else
				{
					$j_arr=array(
										'staus'=>'flase',
										'message'=>'not update',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
				}		
			}
			else
			{
				$j_arr=array(
										'staus'=>'flase',
										'message'=>'only jpg and png file allow',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
			}
	    }

	}else {
		// create //
		if(empty($_FILES))
		{

			// $r1=$this->Common_model->select('seeker',$s1,'email');
			$r1 = $this->db->get_where('seeker',['email'=>$s1])->row();
			


			if (empty($r1)) {
					
				
				
				$res = $this->db->insert('seeker',$data);

				
				if($res)
				{
					$j_arr=array(
										'staus'=>'true',
										'message'=>'success',
										'data'=>'Create',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
				}
				else
				{
					$j_arr=array(
										'staus'=>'flase',
										'message'=>'not Create',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
				}	

			}else {
				    $j_arr=array(
					'staus'=>'flase',
					'message'=>'This email already axist try another email',
					'data'=>'',
					);
					$json_signup=json_encode($j_arr);
					echo $json_signup;
			}	
			
		}
		else
		{
		    
			$res1=$this->Common_model->select('seeker',$s1,'email');
			$img=$res1->resume;	
			$config['upload_path']="./uploads/resume";
			$config['allowed_types']="pdf|docx";
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
		    $this->upload->initialize($config);

		  if (empty($res1)) {
		
			if($this->upload->do_upload('resume')){
				if(!empty($img)){
			
				unlink('./'.$img);
				
				}
				$d1=$this->upload->data();
				$d= $d1['file_name'];
				$d3='uploads/resume/'.$d;
				$data['resume']=$d3;
				$r1=$this->Common_model->select('seeker',$s1,'email');
				$res=$this->Common_model->updateData('seeker',$data,$s1,'email');
				if($res)
				{
					$j_arr=array(
					'staus'=>'true',
					'message'=>'success',
					'data'=>'update',
					);
					$json_signup=json_encode($j_arr);
					echo $json_signup;
				}
				else
				{
					$j_arr=array(
					'staus'=>'flase',
					'message'=>'not update',
					'data'=>'',
					);
					$json_signup=json_encode($j_arr);
					echo $json_signup;
				}		
			}
			else
			{
				$j_arr=array(
				'staus'=>'flase',
				'message'=>'only jpg and png file allow',
				'data'=>'',
				);
				$json_signup=json_encode($j_arr);
				echo $json_signup;
			}
		}else {
			$j_arr=array(
			'staus'=>'flase',
			'message'=>'This email already axist try another email,',
			'data'=>'',
			);
			$json_signup=json_encode($j_arr);
			echo $json_signup;
	    }
	    }
	}
	}


	
	function fetch_all_cat()
	{
		$job_count=$this->Common_model->count_num('job_types','Active','status');
		$location_count=$this->Common_model->count_num('location','Active','status');
		$qualification_count=$this->Common_model->count_num('qualification','Active','status');
		$exp_count=$this->Common_model->count_num('experience','Active','status');
		$desi_count=$this->Common_model->count_num('designation','Active','status');
		$aofs_count=$this->Common_model->count_num('area_of_sectors','Active','status');
		$job_r_count=$this->Common_model->count_num('job_role','Active','status');
		$sp_count=$this->Common_model->count_num('specialization','Active','status');
		
		
		$location=array();
		$job_type=array();
		$qualification=array();
		$exp=array();
		$desi=array();
		$aofs=array();
		$job_r=array();
		$sp=array();
		if($location_count>0)
		{
				$location=$this->Common_model->select('location','Active','status');	 //Left Menu Value
		} 
		if($job_count>0)
		{
			$job_type=$this->Common_model->select('job_types','Active','status'); 	 //Left Menu Value
		} 
		if($qualification_count>0)
		{
			$qualification=$this->Common_model->select('qualification','Active','status');   //Left Menu Value
		} 
		if($exp_count>0)
		{
			$exp=$this->Common_model->select('experience','Active','status');   			 //Left Menu Value
		}  
		if($desi_count>0)
		{
			$desi=$this->Common_model->select('designation','Active','status');   			 //Left Menu Value
		}
		if($aofs_count>0)
		{
			$aofs=$this->Common_model->select('area_of_sectors','Active','status');   			 //Left Menu Value
		}
		if($job_r_count>0)
		{
			$job_r=$this->Common_model->select('job_role','Active','status');   			 //Left Menu Value
		}
		if($sp>0)
		{
			$sp=$this->Common_model->select('specialization','Active','status');   			 //Left Menu Value
		}
		$all_cat=array('location'=>$location,
					   'job_type'=>$job_type,
					   'qualification'=>$qualification,
					   'exp'=>$exp,
					   'desi'=>$desi,
					   'area_of_s'=>$aofs,
					   'job_role'=>$job_r,
					   'specialization'=>$sp,
		);
		$j_arr=array(
										'staus'=>'true',
										'message'=>'success',
										'data'=>$all_cat,
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
	}
	function applay_job()
	{
		$data=$this->input->post();
		$job_id=$this->input->post('job_id');
		$s_email=$this->input->post('s_email');
		$job_info=$this->Common_model->select('job_post',$job_id,'id');
		$req_id=$job_info->r_id;
		$rec_info=$this->Common_model->select('recruiter',$req_id,'email');
		$id=$rec_info->id;
		$data['r_id']=$id;
		$applyed = 	$this->db->get_where('jp_applay_job',['r_id'=>$id,'job_id'=>$job_id,'s_email'=>$s_email])->row();
		if(!empty($applyed)){
		    	$a_arr=array(
										'staus'=>'false',
										'message'=>'Already applay',
										'data'=>'',
										);
										$pri=json_encode($a_arr);
										echo $pri;
		}
		else{
		$res=$this->Common_model->insert('jp_applay_job',$data);
		
		
		
		if($res)
		{
				$a_arr=array(
										'staus'=>'true',
										'message'=>'Successfully applay',
										'data'=>'',
										);
										$pri=json_encode($a_arr);
										echo $pri;
		}
		else
		{
			$j_arr=array(
										'staus'=>'false',
										'message'=>'not applay',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
		} }
	}
	
	function wreview()
	{
		$data=$this->input->post();
		$seeker_email=$this->input->post('seeker_email');
		$recruiter_email=$this->input->post('recruiter_email');
		$rat_rating=$this->input->post('rat_rating');
		$comment=$this->input->post('comment');
		$applyed = 	$this->db->get_where('jp_review',['seeker_email'=>$seeker_email,'recruiter_email'=>$recruiter_email])->row();
		if(!empty($applyed)){
		    $whweer=['seeker_email'=> $seeker_email,'recruiter_email'=> $recruiter_email];
		 
            $this->db->update('jp_review', ['rat_rating' => $rat_rating,'comment' => $comment],$whweer);
		    
		    	$a_arr=array(
										'staus'=>'true',
										'message'=>'Update',
										'data'=>'',
										);
										$pri=json_encode($a_arr);
										echo $pri;
		}
		else{
		$res=$this->Common_model->insert('jp_review',$data);
		
		
		
		if($res)
		{
				$a_arr=array(
										'staus'=>'true',
										'message'=>'Success',
										'data'=>'',
										);
										$pri=json_encode($a_arr);
										echo $pri;
		}
		else
		{
			$j_arr=array(
										'staus'=>'false',
										'message'=>'Error',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
		} }
	}
function left_filter()
{
   
	$data=$this->input->post();
// 	print_r($data);die;
   $str="";
   $d1=$data['keyword'];
	$job_jt_q='';
	$job_loc_q='';
	$job_desi_q='';
	$job_qua_q='';
	$job_exp_q='';
	$job_data='';
	print_r($d1);
	$d1=json_decode($data['keyword']);
	$job_type1=$d1->job_type;
	$job_location1=$d1->job_location;
	$job_by_roles1=$d1->job_by_roles;
	$qualification1=$d1->qualification;
	$experience1=$d1->experience;
	$str=$str.implode(",",$job_type1);
	$str=$str.','.implode(",",$job_location1);
	$str=$str.','.implode(",",$qualification1);
	$str=$str.','.implode(",",$experience1);
	$str=$str.','.implode(",",$job_by_roles1);
	
	$s1=explode(",",$str);
	for($i=0;$i<sizeof($s1);$i++)
	{
		$exp=explode('_',$s1[$i]);
		$e1="";
		$data="";
		if(sizeof($exp)==2)
		{
			$e1=$exp[1];
			$data=$exp[0];
			sizeof($exp);
		}
		if($e1=='jt')
		{
			if($job_jt_q=='')
			{
				$job_jt_q.=" job_type  = '$data'";
			}
			else
			{
				$job_jt_q.="OR job_type = '$data'";
				$job_jt_q='('.$job_jt_q.')';
			}
	
		}
		
		if($e1=='loc')
		{
			if($job_loc_q=='')
			{
				$job_loc_q.=" job_location = '$data'";
			}
			else
			{
				$job_loc_q.="OR job_location  = '$data'";
				$job_loc_q='('.$job_loc_q.')';
			}
			
		}
		if($e1=='desi')
		{
			if($job_desi_q=='')
			{
				$job_desi_q.="designation  = '$data'";
			}
			else
			{
				$job_desi_q.=" OR designation  = '$data'";
				$job_desi_q='('.$job_desi_q.')';
			}
			
		}
		
		if($e1=='qua')
		{
			if($job_qua_q=='')
			{
					$job_qua_q.="qualification  = '$data'";
			}
			else
			{
				$job_qua_q.="OR qualification = '$data'";
				$job_qua_q='('.$job_qua_q.')';
			}
			
		}
		if($e1=='exp')
		{
			if($job_exp_q=='')
			{
				$job_exp_q.="exp  = '$data'";
			}
			else
			{
				$job_exp_q.=" OR exp  = '$data'";
				$job_exp_q='('.$job_exp_q.')';
			}
			
			
		}
	}
	if($job_jt_q!='')
			{
				$job_data=$job_jt_q;
			}
			if($job_loc_q!='')
			{
				$job_data=$job_loc_q;
			}
			if($job_desi_q!='')
			{
				$job_data=$job_desi_q;
			}
			if($job_qua_q!='')
			{
				$job_data=$job_qua_q;
			}
			if($job_exp_q!='')
			{
				$job_data=$job_exp_q;
			}
			if($job_jt_q!='' && $job_loc_q!='')
			{
				$job_data=$job_jt_q.' AND '.$job_loc_q;
			}
			if($job_jt_q!='' && $job_desi_q!='')
			{
				$job_data=$job_jt_q.' AND '.$job_desi_q;
			}
			if($job_jt_q!='' && $job_qua_q!='')
			{
				$job_data=$job_jt_q.' AND '.$job_qua_q;
			}
			if($job_jt_q!='' && $job_exp_q!='')
			{
				$job_data=$job_jt_q.' AND '.$job_exp_q;
			}
			if($job_loc_q!='' && $job_desi_q!='')
			{
				$job_data=$job_loc_q.' AND '.$job_desi_q;
			}
			if($job_loc_q!='' && $job_qua_q!='')
			{
					$job_data=$job_loc_q.' AND '.$job_qua_q;
			}
			if($job_loc_q!='' && $job_exp_q!='')
			{
				$job_data=$job_loc_q.' AND '.$job_exp_q;
			}
			if($job_desi_q!='' && $job_qua_q!='')
			{
				$job_data=$job_desi_q.' AND '.$job_qua_q;
			}
			if($job_desi_q!='' && $job_exp_q!='')
			{
				$job_data=$job_desi_q.' AND '.$job_exp_q;
			}
			if($job_jt_q!='' && $job_loc_q!='' && $job_desi_q!='')
			{
				$job_data=$job_jt_q.' AND '.$job_loc_q." AND ".$job_desi_q;
			}
			if($job_desi_q!='' && $job_qua_q!='' && $job_exp_q!='')
			{
				$job_data=$job_desi_q.' AND '.$job_qua_q." AND ".$job_exp_q;
			}
			if($job_jt_q!='' && $job_loc_q!='' && $job_qua_q!='')
			{
				$job_data=$job_jt_q.' AND '.$job_loc_q." AND ".$job_qua_q;
			}
			if($job_jt_q!='' && $job_loc_q!='' && $job_exp_q!='')
			{
				$job_data=$job_jt_q.' AND '.$job_loc_q." AND ".$job_exp_q;
			}
			if($job_jt_q!='' && $job_loc_q!='' && $job_exp_q!='' && $job_desi_q!='')
			{
				$job_data=$job_jt_q.' AND '.$job_loc_q." AND ".$job_exp_q." AND ".$job_desi_q;
			}
			if($job_jt_q!='' && $job_loc_q!='' && $job_desi_q!='' && $job_exp_q!='')
			{
				$job_data=$job_jt_q.' AND '.$job_loc_q." AND ".$job_desi_q." AND ".$job_exp_q;
			}
			if($job_loc_q!='' && $job_desi_q!='' && $job_qua_q!='' && $job_exp_q!='')
			{
				$job_data=$job_loc_q.' AND '.$job_desi_q." AND ".$job_qua_q." AND ".$job_exp_q;
			}
			if($job_jt_q!='' && $job_loc_q!=' ' && $job_desi_q!='' && $job_qua_q!='' && $job_exp_q!='')
			{
					$job_data=$job_jt_q.' AND '.$job_loc_q." AND ".$job_exp_q." AND ".$job_desi_q." AND ".$job_qua_q;
			}
		$res=$this->Common_model->l_f1($job_data);
		if($res)
		{
				if($res)
		{
				$j_arr=array(
										'staus'=>'true',
										'message'=>'success',
										'data'=>$res,
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
		}
		else
		{
			$j_arr=array(
										'staus'=>'false',
										'message'=>'data not found',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
		} 
		}
	
}


function language_name() {

	
	$res=$this->Common_model->select('jp_language_name');

	// echo $this->db->last_query();die;
	$j_arr=array(
		'staus'=>'true',
		'message'=>'success',
		'data'=>$res,
	);

	$data=json_encode($j_arr);
	echo $data;
	
}



function language()
{
	    $res=$this->Common_model->select('jp_setting','2','id');
		$language=$res->language;
	    $data=$this->Common_model->language_change('jp_language',$language,'language_key');
		$arr=array();
		
		foreach($data as $d1)
		{
			$arr[$d1->language_key]=$d1->$language;
		}
			$j_arr=array(
										'staus'=>'true',
										'message'=>'success',
										'data'=>$arr,
										);
										//$json_signup=json_encode($j_arr);
										//echo $json_signup;
										echo str_replace('null' , '"0"' , json_encode($j_arr)); 
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
		/*$tokens="dDrGVz_m4-g:APA91bG7H2oIHnMiIlcF_C5qc9vtrqkZBxLCcMh2PsvkviUun9iTV_bTYgSmC62MwMQehmv6U3PrA79ZdHbT54Te_Oq3HKXYcoWv7bHUOTQqHOV49M7FaHu1lfkIBVtVpVuQsKuWQAt9";*/
		$message = array("body" => $desi,
					"title"=>$name,
		);
		$message_status = $this->send_notification($tokens, $message);
	}
function payu_success()
{
	if(isset($_POST['mihpayid']))
	{
		$email= $this->input->post('udf1');
		//$ps= $this->session->userdata('pay_sessiion2');
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
	
		$mihpayid=$_POST['mihpayid'];
		$mode=$_POST['mode'];
		$status=$_POST['status'];
		$amount=$_POST['amount'];
		$arr=array('pay_id'=>$mihpayid,
				 'mode'=>$mode,
				 'status'=>$status,
				 'amount'=>$amount,
		);
		$res=$this->Common_model->insert('jp_payU',$arr);
		if($res)
		{
			$this->session->set_flashdata('msg', 'Update');
			$j_arr=array(
										'staus'=>'true',
										'message'=>'success',
										'data'=>'pay success',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
		}
		else 
		{
			$j_arr=array(
										'staus'=>'cancel',
										'message'=>'payment failed',
										'data'=>$res,
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
		}
   }
   else 
   {
	   $j_arr=array(
										'staus'=>'flase',
										'message'=>'post request not found',
										'data'=>$res,
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
   }
}
function payu_cancel()
{
	echo 'cancel';
	/*$j_arr=array(
										'staus'=>'flase',
										'message'=>'Payment Cancel',
										'data'=>$res,
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;*/
}

function language_fatch_v($page_name)
{
	$res=$this->Common_model->select('jp_setting','2','id');
	$language=$res->language;
	$data=$this->Common_model->language_change('jp_language',$language,'language_key',$page_name,'language_type');
	$data1=$this->Common_model->language_change('jp_language',$language,'language_key','menu_header','language_type');
	$this->default_languag_v=$language;
	$this->language_data_a_v=$data;
	$this->user_header1_v=$data1;
}
function plans()
{
    
	$plan_info=$this->Common_model->select('jp_plans');
	if($plan_info)
	{
				$j_arr=array(
										'staus'=>'true',
										'message'=>'success',
										'data'=>$plan_info,
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
	}
	else
	{
			$j_arr=array(
										'staus'=>'flase',
										'message'=>'datanot found',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
	}
}
function plans_view()
{
    	$plan_id= $this->input->post('plan_id');
    	if(empty($plan_id)){
    	    	$j_arr=array(
										'staus'=>'flase',
										'message'=>'plan_id requird',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
    	}
    	else{
    	$q=$this->db->select('*')->from('jp_plans')->where('id',$plan_id)->get();
				$res=$q->row();
	if($res)
	{
				$j_arr=array(
										'staus'=>'true',
										'message'=>'success',
										'data'=>$res,
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
	}
	else
	{
			$j_arr=array(
										'staus'=>'flase',
										'message'=>'data not found',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
	}}
}

function paypal_cancel()
	{
		$this->load->view('cancel');
	}
	function paypal_success()
	{
		   $data= $this->input->post();
		   $email= $this->input->post('email');
		   $p_id= $this->input->post('p_id');
		   $paypal= $this->session->userdata('paypal');
		   unset($data['email']);
		   unset($data['p_id']);
		   unset($data['p_id']);
		  if(isset($email))
		   {
			  $this->Common_model->updateData('recruiter',$data,$email,'email');
			$p_info=$this->Common_model->select('jp_plans',$p_id,'id');
				$p_infi_plane=$p_info->name;
				$p_infi_month=$p_info->duration;
			$d1=date('Y/m/d');
			$arr=array('pay'=>'yes',
			'pay_date'=>$d1,
			'plan'=>$p_infi_plane,
			'month'=>$p_infi_month,
			'show_on_reg'=>'yes',
			);
			$res=$this->Common_model->updateData('recruiter',$arr,$email,'email');
			if($res)
			{
				$j_arr=array(
										'staus'=>'success',
										'message'=>'payment success',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
			}
			else
			{
				$j_arr=array(
										'staus'=>'cancel',
										'message'=>'payment failed',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
			}
		  }
		  else
		  {
			 $j_arr=array(
										'staus'=>'cancel',
										'message'=>'post request not found',
										'data'=>'',
										);
										$json_signup=json_encode($j_arr);
										echo $json_signup;
		  }
		  
		
	}
	function paypal_notify()
	{
		if(isset($_POST['payer_id']))
		{
		$pd=$_POST['item_name'];
		$custom=$_POST['custom'];
		$payment_type=$_POST['payment_type'];
		$status=$_POST['payment_status'];
		$pay_amount=$_POST['mc_gross'];
		$arr=array('p_id'=>$pd,
		'custom'=>$custom,
		'payment_type'=>$payment_type,
		'status'=>$status,
		'pay_amount'=>$pay_amount,
		'c1'=>'1',
		);
		$this->Common_model->insert('jp_payment',$arr);
		}
		else
		{
				redirect('/');
		}
	}
}



//fetch_all_cat
//view_applied_seeker
//applay_job
?>