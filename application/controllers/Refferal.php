<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Refferal extends CI_Controller {

	private static $data = array();
	public function __construct() {
		parent::__construct();
		$this->load->model('DatabaseOperationsHandler', 'database');
		$this->load->model('CommonOperationsHandler', 'common');
		$this->load->model('RefferralOperationsHandler', 'refferalModel');  
		 

		/*Load Defaults*/
		self::$data['settings'] 						= 	$this->database->getSettingsData();
		self::$data['platforms']                        =   $this->database->_get_row_data('tbl_platforms',array('type'=>'listing','status'=>1));
		self::$data['options']                        	=   $this->database->_get_row_data('tbl_platforms',array('type'=>'option','status'=>1));
		self::$data['languages']						=	$this->database->load_all_languages();
		self::$data['default_currency']					=	$this->common->getCurrency($this->database->_get_single_data('tbl_currencies',array('default_status'=>'1'),'currency'),'symbol');
		self::$data['userdata'] 						= 	$this->database->getUserData($this->session->userdata('user_id'));
		self::$data['selectedLanguage'] 				= 	$this->common->is_language();
		self::$data['language'] 						= 	$this->database->_get_single_data('tbl_languages',array('default_status'=>1),'language_code');
		self::$data['openContracts']					= 	$this->database->_get_my_contracts();
		self::$data['closeContracts']					= 	$this->database->_get_my_contracts(false);
		self::$data['openEscrow']						= 	$this->database->_get_my_contracts(true,'escrow');
		self::$data['closeEscrow']						= 	$this->database->_get_my_contracts(false,'escrow',3);
		self::$data['listingCount']						= 	$this->database->_count_listings_user_wise('auction');
		self::$data['listingOfferCount']				= 	$this->database->_count_listings_user_wise('classified');
		self::$data['messageCount']						= 	$this->chat->get_unviewed_msg($this->session->userdata('user_id'));
		self::$data['categoriesData']					=	$this->database->_count_listings_categories_wise();
		self::$data['announcements']                    =   $this->database->_get_row_data('tbl_announcement',array('status'=>1));
		self::$data['pages']                    		=   $this->database->_get_row_data('tbl_pages',array('page_visibility_status'=>1));
		self::$data['imagesData']						=	$this->database->_get_row_data('tbl_siteimages',array('id'=>1));
		self::$data['payments']                     	=   $this->database->_get_row_data('tbl_payment_settings',array('status'=>1,'back_status'=>1));
		self::$data['paymentsOptions']                  =   $this->database->_get_row_data('tbl_payment_settings',array('status'=>1));
		self::$data['ads']                				=   $this->database->_get_row_data('tbl_ads',array('id'=>1));
		self::$data['incomlistings'] 					=  	$this->database->_get_row_data('tbl_listings',array('user_id'=>$this->session->userdata('user_id'),'status'=>0));
		self::$data['l_format']							=   $this->database->_get_single_data('tbl_languages',array('status'=>1,'language'=>$this->common->is_language()),'l_format');
		self::$data['token'] 							= 	$this->security->get_csrf_hash();

		if(self::$data['settings'][0]['ssl_enable'] === '1'){
			force_ssl();
		}    
    }

    public function load_user_dashboard(){
    	$this->common->is_logged(); 
    	$data = self::$data;

    	if(empty($data['userdata'][0]['referral_code'])){
    		if(file_exists(APPPATH.'/libraries/Referral_Module.php')){
            	$this->load->library('Referral_Module',NULL,'refferal');
            	$referral_code = $this->refferal->generate_refferal_code();
            	$this->database->_update_to_table('tbl_users',array('referral_code' => $referral_code),array('user_id'=>$this->session->userdata('user_id')));
        	}
    	}

    	$data['userdata'] 		= 	$this->database->getUserData($this->session->userdata('user_id'));

    	$data['refferals'] 		= 	$this->refferalModel->load_refferers_listings_userwise( 1 ,$this->session->userdata('user_id'));
    	$this->refferalModel->create_refferal_eligable_record( $data['refferals'] , PAYMENT_PER_REF);

    	$data['refferalsPaym'] 	=   $this->refferalModel->load_user_payments($this->session->userdata('user_id'));
    	$data['PE'] 			=   $this->refferalModel->load_total_pending_payments($this->session->userdata('user_id'));

    	$this->load->view('user/refferals',$data);
		return;
    }

    public function load_admin_dashboard(){
    	$this->common->is_logged_admin(); 
    	$data = self::$data;

    	if(empty($data['userdata'][0]['referral_code'])){
    		if(file_exists(APPPATH.'/libraries/Referral_Module.php')){
            	$this->load->library('Referral_Module',NULL,'refferal');
        	}
    	}

    	$data['userdata'] 	= 	$this->database->getUserData($this->session->userdata('user_id'));
    	$data['refferals'] 	= 	$this->database->refferalModel->load_admin_pending_payments(0);

    	$this->load->view('admin/refferals-setup',$data);
		return;
    }

    public function markAsPaid(){
    	$this->common->is_logged_admin();
    	$id = $this->input->get('id', TRUE);
    	$this->database->_update_to_DB('tbl_refferal' , array('status'=> 1) , $id);
    	redirect(base_url().'refferal/load_admin_dashboard');
    }

    public function markAsRejected(){
    	$this->common->is_logged_admin();
    	$id = $this->input->get('id', TRUE);
    	$this->database->_update_to_DB('tbl_refferal' , array('status'=> 2) , $id);
    	redirect(base_url().'refferal/load_admin_dashboard'); 
    }

    
}
