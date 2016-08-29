<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* All about vehicle
*/
class Vehicle extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata()){
			redirect(site_url('admin/welcome'));
		}
		$this->load->model('admin/Model_vehicle');
	}

	public function add_vehicle(){
		if($_POST){

			$this->form_validation->set_rules('vehicle_type', 'Vehicle Type', 'trim|required');
			$base_path1 = "uploads/vehicle/";
			
			$config['upload_path'] = $base_path1;
	        $config['allowed_types'] = 'png|PNG|JPG|jpg|JPEG|jpeg';
	        $config['max_size'] = '512';
	        $config['file_name'] = $_FILES['vehicle_img']['name'];
	        $config['remove_spaces'] = TRUE;
	        
	        $this->load->library('upload', $config);

			if ($this->form_validation->run() == TRUE) {
				if($_FILES['vehicle_img']['name']){
	                //echo 'upload';
	                $this->upload->do_upload('vehicle_img');
	                $data = $this->upload->data();
	                //print_r($data);exit();
	                $imgdata = $data['file_name'];
	                
	                $ret = $this->Model_vehicle->add_vehicle($imgdata);
	            
	                if($ret=='true'){
			        	
			        	$data['view_data'] = $this->Model_vehicle->select_all();
						$this->session->set_flashdata("message", "<div class='alert alert-success'>Information added Successfully.</div>");
						$data['user_id_admin']=$this->session->userdata('user_id_admin');
						$this->load->view('admin/header', $data);
						$this->load->view('admin/add_vehicle');
						$this->load->view('admin/footer');
	                }else{
	                	$this->session->set_flashdata("message", "<div class='alert alert-danger'>Something went wrong while inserting in database.</div>");
						$err=base64_encode('error');
						redirect(site_url('admin/vehicle/add_vehicle').'?msg='.$err);
	                }
	            }/*else{
	                $imgdata = '';
	                $ret['other_details'] = $this->Model_vehicle->add_vehicle($vehicle_type);
	                
	                $msg = array('msg' => 'Information added Successfully.');
	                redirect('vendor_form');
	            }*/

			} else {
				$this->session->set_flashdata("message", "<div class='alert alert-danger'>Please Fill all fields.</div>");
				$err=base64_encode('error');
				redirect(site_url('admin/vehicle/add_vehicle').'?msg='.$err);
			}
		}else{
			$data['view_data'] = $this->Model_vehicle->select_all();
			$data['user_id_admin']=$this->session->userdata('user_id_admin');
			$this->load->view('admin/header', $data);
			$this->load->view('admin/add_vehicle');
			$this->load->view('admin/footer');
		}
	}

	public function remove_vehicle($vehicle_id){
		$result = $this->Model_vehicle->remove_vehicle($vehicle_id);
		if ($result='true') {
			$this->session->set_flashdata("message", "<div class='alert alert-success'>Information Removed Successfully.</div>");
			$data['user_id_admin']=$this->session->userdata('user_id_admin');
			redirect(site_url('admin/vehicle/add_vehicle'));
		} else {
			$this->session->set_flashdata("message", "<div class='alert alert-danger'>Something went wrong while inserting in database.</div>");
			$err=base64_encode('error');
			redirect(site_url('admin/vehicle/add_vehicle').'?msg='.$err);
		}
		
	}
}
?>