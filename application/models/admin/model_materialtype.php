<?php
class Model_materialtype extends CI_Model {
	
	function __construct() {
		parent:: __construct();
		date_default_timezone_set('Asia/Kolkata');
		
	}
	
	public function add_material_type(){

		$material_type = $this->input->post('material_type');
        $server = $_SERVER['REMOTE_ADDR'];
        $date_time = date('Y-m-d H:i:s');
        
        $insertdata = array(
                    'mat_type'=> $material_type,
                    'created_ip' => $server,
                    'created_datetime' => $date_time
        );
        
        $this->db->insert('gmt_material', $insertdata);
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
    	$this->db->from('gmt_material');
    	$this->db->where('mat_status', $status);
    	$query = $this->db->get();
    	$result_data = $query->result_array();
    	return $result_data;
	}

	public function remove_material_type($c_id){
		$server = $_SERVER['REMOTE_ADDR'];
        $date_time = date('Y-m-d H:i:s');
        
        $datas=array('mat_status'=>'2',
                    'modified_datetime'=>$date_time,
                    'modified_ip'=>$server
            );
        $this->db->where('mat_id',$c_id);
        $this->db->update('gmt_material',$datas);
        $result_row = $this->db->affected_rows();
        if ($result_row) {
        	return true;
        } else {
        	return false;
        }
	}
}	
?>