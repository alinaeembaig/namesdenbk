<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RefferralOperationsHandler extends CI_Model
{
	function __construct(){
		parent::__construct();
        $this->load->database();
        $this->load->model('DatabaseOperationsHandler', 'database');
		$this->load->model('CommonOperationsHandler', 'common');
		$this->load->model('EmailOperationsHandler', 'email_op');
	}

    public function load_refferers_listings($sales_count = '1'){
        $this->db->select('* ,tu.firstname as firstname, tu.date as date, COUNT(tp.user_id) as eligible_count , tu.referrer as referrer , tur.firstname as reffererName');
        $this->db->from('tbl_users tu');
        $this->db->join('tbl_purchases tp', 'tu.user_id = tp.user_id');
        $this->db->join('tbl_users tur', 'tu.referrer = tur.user_id' , 'left');
        $this->db->where('tu.user_status = "2"');
        $this->db->where('tu.user_id != tu.referrer');
        $this->db->where('tu.referrer != "0"');
        $this->db->where('tu.referrer not in (select tr.user_id from tbl_refferal as tr WHERE tr.status = "1" OR tr.status = "2")');
        $this->db->group_by('tu.referrer');
        $this->db->having('COUNT(tp.user_id) > '.$this->db->escape($sales_count));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function load_refferers_listings_userwise($sales_count = '1' ,$user_id){
        $this->db->select('* ,tu.user_id as user_group,tu.firstname as firstname, tu.date as date, COUNT(tp.user_id) as eligible_count , tu.referrer as referrer , tur.firstname as reffererName');
        $this->db->from('tbl_users tu');
        $this->db->join('tbl_purchases tp', 'tu.user_id = tp.user_id');
        $this->db->join('tbl_users tur', 'tu.referrer = tur.user_id' , 'left');
        $this->db->where('tu.user_status = "2"');
        $this->db->where('tu.user_id != tu.referrer');
        $this->db->where('tu.referrer != "0"');
        $this->db->where('tu.referrer', $user_id);
        $this->db->where('tu.user_status', 2);
        $this->db->where('tu.referrer not in (select tr.user_id from tbl_refferal as tr WHERE tr.status = "1" OR tr.status = "2")');
        $this->db->group_by('tu.referrer');
        $this->db->having('COUNT(tp.user_id) > '.$this->db->escape($sales_count));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function load_admin_pending_payments($status = 0){
        $this->db->select('*,tr.user_id as user_group,tur.firstname as firstname,tup.firstname as userGroupname ');
        $this->db->from('tbl_refferal tr');
        $this->db->join('tbl_users tur', 'tr.refer = tur.user_id' , 'left');
        $this->db->join('tbl_users tup', 'tr.user_id = tup.user_id' , 'left');
        $this->db->where('tr.status', $status);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function load_user_payments($user_id){
        $this->db->select('*,tr.user_id as user_group,tur.firstname as userGroupname ');
        $this->db->from('tbl_refferal tr');
        $this->db->join('tbl_users tur', 'tr.refer = tur.user_id' , 'left');
        $this->db->where('tr.user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function load_total_pending_payments($user_id){
        $this->db->select('*, SUM(payment_amount) as totalAmount');
        $this->db->from('tbl_refferal');
        $this->db->where('user_id', $user_id);
        $this->db->where('status', 0);
        $query = $this->db->get();
        return $query->result_array()[0]['totalAmount'];
    }

    public function create_refferal_eligable_record($data , $payment_amount){

        foreach ($data as $row) {
         $data = array(
            'user_id' =>$row['user_id'],
            'refer'=>$row['user_group'],
            'eligible_count' => $row['eligible_count'],
            'status' => 0,
            'payment_amount' => $payment_amount
        );

        $records = $this->database->_get_row_data('tbl_refferal', $data);

        if(!count($records) > 0){
           $this->database->_insert_to_table('tbl_refferal',$data); 
        }
        else
        {
            $this->database->_update_to_DB('tbl_refferal', $data , $records[0]['id']);
        }
    }
 }
        
}