<?php
class Model_workdesc extends CI_Model {
	
	function __construct() {
		parent:: __construct();
		date_default_timezone_set('Asia/Kolkata');
		
	}
	
	public function add_work_desc(){

		$work_desc = $this->input->post('work_desc');
        $server = $_SERVER['REMOTE_ADDR'];
        $date_time = date('Y-m-d H:i:s');
        
        $insertdata = array(
                    'dw_type'=> $work_desc,
                    'created_ip' => $server,
                    'created_datetime' => $date_time
        );
        
        $this->db->insert('gmt_desc_work', $insertdata);
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
    	$this->db->from('gmt_desc_work');
    	$this->db->where('dw_status', $status);
    	$query = $this->db->get();
    	$result_data = $query->result_array();
    	return $result_data;
	}

	public function remove_work_desc($c_id){
		$server = $_SERVER['REMOTE_ADDR'];
        $date_time = date('Y-m-d H:i:s');
        
        $datas=array('dw_status'=>'2',
                    'modified_datetime'=>$date_time,
                    'modified_ip'=>$server
                );
        $this->db->where('dw_id',$c_id);
        $this->db->update('gmt_desc_work',$datas);
        $result_row = $this->db->affected_rows();
        if ($result_row) {
        	return true;
        } else {
        	return false;
        }
	}
}	
?>