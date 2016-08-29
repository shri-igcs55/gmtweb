<?php
class Model_vehicle extends CI_Model {
	
	function __construct() {
		parent:: __construct();
		date_default_timezone_set('Asia/Kolkata');
		
	}
	
	public function add_vehicle($imgdata){

		$filepath = base_url('uploads/vehicle/').$imgdata;
		//print_r($filepath);exit();
        $v_type = $this->input->post('vehicle_type');
        $filename = $imgdata;
        $server = $_SERVER['REMOTE_ADDR'];
        $date_time = date('Y-m-d H:i:s');
        
        $insertdata = array(
                    'vehicle_typ'=> $v_type,
                    'vehicle_img' => $filename,
                    'created_ip' => $server,
                    'created_datetime' => $date_time
        );
        
        $this->db->insert('gmt_vehicle', $insertdata);
        $inserted_id = $this->db->insert_id();

        if ($inserted_id) {
        	return true;
        } else {
        	return FALSE;
        }
    }

	public function select_all(){
		$status = '1';
		$this->db->select('*');
    	$this->db->from('gmt_vehicle');
    	$this->db->where('vehicle_status', $status);
    	$query = $this->db->get();
    	$result_data = $query->result_array();
    	return $result_data;
	}

	public function remove_vehicle($v_id){
		$datas=array('vehicle_status'=>'2');
        $this->db->where('vehicle_id',$v_id);
        $this->db->update('gmt_vehicle',$datas);
        $result_row = $this->db->affected_rows();
        if ($result_row) {
        	return true;
        } else {
        	return false;
        }
	}
}	
?>