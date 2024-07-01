<?php
class Common_model extends CI_Model
{
	function l_f1($data1)
   {
	   if($data1=='')
	   {
			  $q=$this->db->query('select * from job_post');
			 return $q->result();
	   }
	   $q=$this->db->query('select * from job_post where '.$data1);
	   return $q->result();
	   
   }
   function l_f($data1,$ofsat='',$start='')
   {
	   if($data1=='')
	   {
			  $q=$this->db->query('select * from job_post');
			 return $q->result();
	   }
	   $q=$this->db->query('select * from job_post where '.$data1.'LIMIT '.$ofsat.' OFFSET '.$start);
	   return $q->result();
	   
   }
   function language_change($tbl_name,$select_field,$select_field2,$data='',$w_field='')
   {
	   if($data=='')
	   {
		   $query=$this->db->select([$select_field,$select_field2])->from($tbl_name)->get();
		   return $query->result();
	   }
	   else
	   {
		   $query=$this->db->select([$select_field,$select_field2])->from($tbl_name)->where($w_field,$data)->get();
		   return $query->result();
	   }
   }
  function fetch_details($tbl_name,$limit, $start,$data='',$w_data='')
  {
    if($w_data=='')
	{
	$output = '';
    $this->db->select("*");
    $this->db->from($tbl_name);
    $this->db->limit($limit, $start);
	$this->db->order_by("id","desc");
    $query = $this->db->get();
	return $query->result();
	}
	else
	{
			$this->db->select("*");
			$this->db->from($tbl_name);
			$this->db->where($w_data,$data);
			$this->db->limit($limit, $start);
			$this->db->order_by("id","desc");
			$query = $this->db->get();
			$res= $query->result();
			if(!empty($res))
			{
				return $res;
			}
			else
			{
				return "data not found";
			}
	}
 }
 
 
	//Signup 
	public function signUp($data,$mno,$email,$name)
	{
		$q=$this->db->select(['email'])->from($name)->where('email',$email)->get();
		$q2=$this->db->select(['mno'])->from($name)->where('mno',$mno)->get();
		if($q->row())
		{
			return "eyes"; //email exixts
		}
		else if($q2->row())
		{
			return "myes"; //mobile  exists
		}
		else 
		{
		return $this->db->insert($name,$data);
		}
	}
	//Login
	function login($email,$ps,$name)
	{
		$q=$this->db->select('*')->from($name)->where('email',$email)->where('ps',$ps)->get();
		return $q->row();
	}
	
	
	//Data Insert
	public function insert($tbl_name,$data)
	 {
		 return $this->db->insert($tbl_name,$data);
	 }
	 //Data Select
	 function select($tbl_name,$data='',$field1='',$field2='',$field3='')
	 {
		 if($field1=="")
		 {
			$query=$this->db->get($tbl_name);
		    return $query->result(); 
		 }
		 else
		 {
			 $query=$this->db->select('*')->from($tbl_name)->where($field1,$data)->get();
		     $qres= $query->num_rows();
				if($qres>0)
				{
					if($qres==1)
					{
						if($field1=='status')
						{
							return $query->result();
						}
						else 
						{
							return $query->row();
						}
						
					}
					else
					{
					    return $query->result();
					}
				}
				else
				{
					if($field1=="r_id")
					{
						return 0;
					}
					else
					{
					$q=$this->db->select('*')->from($tbl_name)->where($field2,$data)->get();
					return $qres= $q->result();
					}
				}
			 
			 return $query->result();
		 }
		 
	 }
	 function search_filter($tbl_name,$data='',$field1='',$field2='',$field3='',$field4='',$field5='')
	 {
		
			 $query=$this->db->select('*')->from($tbl_name)->like($field1,$data)->get();
		     $qres= $query->num_rows();
				if($qres>0)
				{
					
					    return $query->result();
				}
				else
				{
					$q=$this->db->select('*')->from('job_post')->like($field2,$data)->get();
					$f2=$q->num_rows();
					if($f2>0)
					{
						return $qres= $q->result();
					}
					else
					{
							$q=$this->db->select('*')->from('job_post')->like($field3,$data)->get();
							$f3=$q->num_rows();
							if($f3>0)
							{
								return $qres= $q->result();
							}
							else
							{
								$q=$this->db->select('*')->from('job_post')->like($field4,$data)->get();
								$f4=$q->num_rows();
								if($f4>0)
								{
									return $qres= $q->result();
								}
								else
								{
										$q=$this->db->select('*')->from('job_post')->like($field5,$data)->get();
											return $qres= $q->result();
									
								}
								
							}
					}
				}
		 
	 } 
	 

	
	 function rec_select($tbl_name,$data,$field)
	 {
		 $query=$this->db->select('*')->from($tbl_name)->like($field,$data)->get();
		 return $query->result();
	 }
	  function my_applied_job($tbl_name,$data,$field)
	 {
		 $query=$this->db->select('*')->from($tbl_name)->where($field,$data)->get();
		 return $query->row();
	 }
	 function job_applay_status_check($tbl_name,$data1,$data2,$field1,$field2)
	 {
		 $q=$this->db->select('*')->from($tbl_name)->where($field1,$data1)->where($field2,$data2)->get();
		 return $q->num_rows();
	 }
	 //Data Update
	 function updateData($tbl_name,$data,$where_data,$field)
	 {
		 $this->db->where($field,$where_data);
		 return $this->db->update($tbl_name,$data);
	 }
	 function v($mno,$a,$name)
	{
		$this->db->where('mno',$mno);
		return $this->db->update($name,$a);
	}
	function row_count($tbl_name,$data='',$field1='',$field2='',$field3='')
	{
		if(empty($field1))
		{
			$q=$this->db->get($tbl_name);
			return $q->num_rows();
		}
		else
		{
			$this->db->select("*");
			$this->db->from($tbl_name);
			$this->db->like($field1,$data);
			$q=$this->db->get();
			if($field1=='r_id')
			{
				return $q->num_rows();
			}
			else if($field1=='recruiter')
			{
				return $q->num_rows();
			}
			else
			{
			if($q->num_rows()>0)
			{
				return $q->num_rows();
			}
			else
			{
					$this->db->select("*");
					$this->db->from($tbl_name);
					$this->db->like($field2,$data);
					$q=$this->db->get();
					if($q->num_rows()>0)
					{
						return $q->num_rows();
					}
					else
					{
							$this->db->select("*");
							$this->db->from($tbl_name);
							$this->db->like($field3,$data);
							$q=$this->db->get();
							return $q->num_rows();
					}
			}
			}
		}
			
	}
	function num_r($q)
	{
		$q=$this->db->query('select * from job_post where '.$q);
		return $q->num_rows();
	}
	function delete($tbl_name,$data,$field)
	{
		$this->db->where($field,$data);
		return $this->db->delete($tbl_name);
	}
	
function search_text($limit, $start,$tbl_name,$data,$field1,$field2,$field3)
  {
    $output = '';
    $this->db->select("*");
    $this->db->from($tbl_name);
	$this->db->like($field1,$data);
    $this->db->limit($limit, $start);
    $query = $this->db->get();
   $num_r=$query->num_rows();
   if($num_r>0)
   {
		return $query->result();
   }
   else
   {
		$this->db->select("*");
		$this->db->from($tbl_name);
		$this->db->like($field2,$data);
		$this->db->limit($limit, $start);
		$query = $this->db->get();
	   $num_r=$query->num_rows();
	   if($num_r>0)
	   {
			return $query->result();
	   }
	   else
	   {
		    $this->db->select("*");
			$this->db->from($tbl_name);
			$this->db->like($field3,$data);
			$this->db->limit($limit, $start);
			$query = $this->db->get();
		    return $query->result();
	   }
   }
 }
 function search_text_s($tbl_name,$data,$field1,$field2,$field3)
  {
    $output = '';
    $this->db->select("*");
    $this->db->from($tbl_name);
	$this->db->like($field1,$data);
    $query = $this->db->get();
   $num_r=$query->num_rows();
   if($num_r>0)
   {
		return $query->result();
   }
   else
   {
		$this->db->select("*");
		$this->db->from($tbl_name);
		$this->db->like($field2,$data);
		$query = $this->db->get();
	   $num_r=$query->num_rows();
	   if($num_r>0)
	   {
			return $query->result();
	   }
	   else
	   {
		    $this->db->select("*");
			$this->db->from($tbl_name);
			$this->db->like($field3,$data);
			$query = $this->db->get();
		    return $query->result();
	   }
   }
 }
 function search_text2($tbl_name,$data,$field1,$field2,$field3,$field4='')
  {
    $output = '';
    $this->db->select("*");
    $this->db->from($tbl_name);
	$this->db->like($field1,$data);
    $query = $this->db->get();
   $num_r=$query->num_rows();
   if($num_r>0)
   {
		return $query->result();
   }
   else
   {
		$this->db->select("*");
		$this->db->from($tbl_name);
		$this->db->like($field2,$data);
		$query = $this->db->get();
	   $num_r=$query->num_rows();
	   if($num_r>0)
	   {
			return $query->result();
	   }
	   else
	   {
		    $this->db->select("*");
			$this->db->from($tbl_name);
			$this->db->like($field3,$data);
			$query = $this->db->get();
			$num_r=$query->num_rows();
		    // return $query->result();
	   }
	   if($num_r>0 || $field4='' )
	   {
			return $query->result();
	   }
	   else
	   {
		    $this->db->select("*");
			$this->db->from($tbl_name);
			$this->db->like($field4,$data);
			$query = $this->db->get();
			$num_r=$query->num_rows();
		    return $query->result();
	   }

   }
 }
function download_count($tbl_name,$r_data,$r_field,$s_data='',$s_field='',$job_data='',$job_field='')
{
	if($s_data=='')
	{
			$q=$this->db->select('*')->from($tbl_name)->where($r_field,$r_data)->get();
			return $q->num_rows();
	}
	else if($job_data=='')
	{
			$q=$this->db->select('*')->from($tbl_name)->where($r_field,$r_data)->where($s_field,$s_data)->get();
	        return $q->num_rows();
	}
	else
	{
		$q=$this->db->select('*')->from($tbl_name)->where($r_field,$r_data)->where($s_field,$s_data)->where($job_field,$job_data)->get();
	    return $q->num_rows();
	}
}
function count_num($tbl_name,$data,$wdata)
{
	$job_type_count=$this->db->select('*')->from($tbl_name)->where($wdata,$data)->get();
	return $job_type_count->num_rows();
}
function alter_table($tbl_name,$data)
{
	$query="ALTER TABLE ".$tbl_name." ADD ".$data." VARCHAR(250)";
	$res=$this->db->query($query);
	if($res)
	{
		return "Add";
	}
	else
	{
			return "not add";
	}
}
function col_drop($tbl_name,$col_name)
{
	$q="ALTER TABLE ".$tbl_name." DROP ".$col_name;
	$res=$this->db->query($q);
	if($res)
	{
	     return "delete";
	}
	else
	{
			return "not Delete";
	}
}
}
?>