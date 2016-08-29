<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* All about Service Type
*/
class ServiceType extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata()){
			redirect(site_url('admin/welcome'));
		}
		$this->load->model('admin/model_servicetype');
	}

	public function add_service_type(){
		if($_POST){

			$this->form_validation->set_rules('service_type', 'Service Type', 'trim|required');
			
			if ($this->form_validation->run() == TRUE) {
				    
	                $ret = $this->model_servicetype->add_service_type();
	            
	                if($ret=='true'){
			        	
			        	$data['view_data'] = $this->model_servicetype->select_all();
						$this->session->set_flashdata("message", "<div class='alert alert-success'>Information added Successfully.</div>");
						$s_data['user_id_admin']=$this->session->userdata('user_id_admin');
						$this->load->view('admin/header', $s_data);
						$this->load->view('admin/service_type', $data);
						$this->load->view('admin/footer');
	                }else{
	                	$this->session->set_flashdata("message", "<div class='alert alert-danger'>Something went wrong while inserting in database.</div>");
						$err=base64_encode('error');
						redirect(site_url('admin/ServiceType/add_service_type').'?msg='.$err);
	                }
	            
			} else {
				$this->session->set_flashdata("message", "<div class='alert alert-danger'>Please Fill all fields.</div>");
				$err=base64_encode('error');
				redirect(site_url('admin/ServiceType/add_service_type').'?msg='.$err);
			}
		}else{
			$data['view_data'] = $this->model_servicetype->select_all();
			$s_data['user_id_admin']=$this->session->userdata('user_id_admin');
			$this->load->view('admin/header', $s_data);
			$this->load->view('admin/service_type', $data);
			$this->load->view('admin/footer');
		}
	}

	public function remove_service_type($company_id){
		$result = $this->model_servicetype->remove_service_type($company_id);
		if ($result='true') {
			$this->session->set_flashdata("message", "<div class='alert alert-success'>Information Removed Successfully.</div>");
			$data['user_id_admin']=$this->session->userdata('user_id_admin');
			redirect(site_url('admin/ServiceType/add_service_type'));
		} else {
			$this->session->set_flashdata("message", "<div class='alert alert-danger'>Something went wrong while inserting in database.</div>");
			$err=base64_encode('error');
			redirect(site_url('admin/ServiceType/add_service_type').'?msg='.$err);
		}
		
	}
}
?>