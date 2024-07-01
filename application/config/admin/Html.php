<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Html extends CI_Controller {
	public function index(){
		$this->load->view('common/header_auth');
		$this->load->view('login');
		$this->load->view('common/footer_auth');
	}
	public function dashboard(){
		$this->load->view('common/header');
		$this->load->view('dashboard');
		$this->load->view('common/footer');
	}
	public function elements(){
		$this->load->view('common/header');
		$this->load->view('elements');
		$this->load->view('common/footer');
	}
	
	public function tables(){
		$this->load->view('common/header');
		$this->load->view('tables');
		$this->load->view('common/footer');
	}
}
