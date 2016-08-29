<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata()){
			redirect(site_url('user'));
		}
		$this->load->model('Model_user');
	}
	public function index()
	{
		if(!$this->session->userdata()){
			redirect(site_url('user'));
		}else{
			$this->load->view('admin_login');
		}
	}
	public function welcome()
	{
		if(!$this->session->userdata()){
			redirect(site_url('user'));
		}else if($_POST){
			$email_userid = trim($this->input->post('email_userid'));
			$pass  = trim($this->input->post('password'));
			
	        $ret=$this->Model_login->login($email_userid,$pass);

	        if($ret=="true"){
	            $data1['user_id_admin']=$this->session->userdata('user_id_admin');
	            $data1['content']='';
	            //$this->load->view('admin/header');
				$this->load->view('main_admin_page',$data1);
				//$this->load->view('admin/footer');

	        }else if($ret=="false"){
		
				$this->session->set_flashdata("message", "<div class='alert alert-danger'>Member email or password doesn't match.</div>");
				$err=base64_encode('error');
				redirect(site_url('user').'?msg='.$err);
			}
		}else{
			$data1['user_id_admin']=$this->session->userdata('user_id_admin');
            //$this->load->view('admin/header',$data1);
			$this->load->view('main_admin_page',$data1);
			//$this->load->view('admin/footer');
		}

	}
	public function admin_logout()
	{
     
		$login_data = array('user_id_admin'=>'', 'logged_in_admin'=>'FALSE');
		$this->session->unset_userdata($login_data);
		$this->session->set_flashdata("message", "<div class='alert alert-success'>Logout Successfully.</div>");
		$this->session->sess_destroy();
		redirect(site_url('user'));


	}
	
}
