<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* All about Work Description
*/
class WorkDesc extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata()){
			redirect(site_url('admin/welcome'));
		}
		$this->load->model('admin/model_workdesc');
	}

	public function add_work_desc(){
		if($_POST){

			$this->form_validation->set_rules('work_desc', 'Work Description', 'trim|required');
			
			if ($this->form_validation->run() == TRUE) {
				    
	                $ret = $this->model_workdesc->add_work_desc();
	            
	                if($ret=='true'){
			        	
			        	$data['view_data'] = $this->model_workdesc->select_all();
						$this->session->set_flashdata("message", "<div class='alert alert-success'>Information added Successfully.</div>");
						$s_data['user_id_admin']=$this->session->userdata('user_id_admin');
						$this->load->view('admin/header', $s_data);
						$this->load->view('admin/work_desc', $data);
						$this->load->view('admin/footer');
	                }else{
	                	$this->session->set_flashdata("message", "<div class='alert alert-danger'>Something went wrong while inserting in database.</div>");
						$err=base64_encode('error');
						redirect(site_url('admin/WorkDesc/add_work_desc').'?msg='.$err);
	                }
	            
			} else {
				$this->session->set_flashdata("message", "<div class='alert alert-danger'>Please Fill all fields.</div>");
				$err=base64_encode('error');
				redirect(site_url('admin/WorkDesc/add_work_desc').'?msg='.$err);
			}
		}else{
			$data['view_data'] = $this->model_workdesc->select_all();
			$s_data['user_id_admin']=$this->session->userdata('user_id_admin');
			$this->load->view('admin/header', $s_data);
			$this->load->view('admin/work_desc', $data);
			$this->load->view('admin/footer');
		}
	}

	public function remove_work_desc($company_id){
		$result = $this->model_workdesc->remove_work_desc($company_id);
		if ($result='true') {
			$this->session->set_flashdata("message", "<div class='alert alert-success'>Information Removed Successfully.</div>");
			$data['user_id_admin']=$this->session->userdata('user_id_admin');
			redirect(site_url('admin/WorkDesc/add_work_desc'));
		} else {
			$this->session->set_flashdata("message", "<div class='alert alert-danger'>Something went wrong while inserting in database.</div>");
			$err=base64_encode('error');
			redirect(site_url('admin/WorkDesc/add_work_desc').'?msg='.$err);
		}
		
	}
}
?>