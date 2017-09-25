<?php if ( ! defined('BASEPATH')) exit('No direct access allowed');

class Facebook_model extends TI_Model {

    public function __construct() {
        parent::__construct();
        
        $this->tableName = 'customers';
        $this->primaryKey = 'customer_id';
    }

    public function checkUser($data = array()){
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where(array('email'=>$data['email']));
        $prevQuery = $this->db->get();
        $prevCheck = $prevQuery->num_rows();
        
        if($prevCheck > 0){
            $prevResult = $prevQuery->row_array();
            $data['date_modified'] = date("Y-m-d H:i:s");
            $update = $this->db->update($this->tableName,$data,array('customer_id'=>$prevResult['customer_id']));
            $userID = $prevResult['customer_id'];
        }else{
            $data['date_added'] = date("Y-m-d H:i:s");
            $data['date_modified'] = date("Y-m-d H:i:s");
            $insert = $this->db->insert($this->tableName,$data);
            $userID = $this->db->insert_id();
        }

        return $userID?$userID:FALSE;
    }
}

/* End of file Facebook_model.php */
/* Location: ./extensions/facebook_module/models/Facebook_model.php */
