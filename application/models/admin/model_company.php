<?php
class Model_company extends CI_Model {
	
	function __construct() {
		parent:: __construct();
		date_default_timezone_set('Asia/Kolkata');
		
	}
	
	public function add_company(){

		$c_type = $this->input->post('company_type');
        $server = $_SERVER['REMOTE_ADDR'];
        $date_time = date('Y-m-d H:i:s');
        
        $insertdata = array(
                    'comp_type'=> $c_type,
                    'created_ip' => $server,
                    'created_datetime' => $date_time
        );
        
        $this->db->insert('gmt_company_type', $insertdata);
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
    	$this->db->from('gmt_company_type');
    	$this->db->where('comp_status', $status);
    	$query = $this->db->get();
    	$result_data = $query->result_array();
    	return $result_data;
	}

	public function remove_company($c_id){
		$datas=array('comp_status'=>'2');
        $this->db->where('comp_type_id',$c_id);
        $this->db->update('gmt_company_type',$datas);
        $result_row = $this->db->affected_rows();
        if ($result_row) {
        	return true;
        } else {
        	return false;
        }
	}
}	
?>