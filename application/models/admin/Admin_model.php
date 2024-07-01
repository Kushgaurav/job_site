<?php
class Admin_model extends CI_Model
{
	public function login($email,$ps)
	{
		$q=$this->db->select(['uname','pass'])->from('admin')->where('uname',$email)->where('pass',$ps)->get();
		return $q->num_rows();
	}
}
?>