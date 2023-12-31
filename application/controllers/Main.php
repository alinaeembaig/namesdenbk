<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include("./vendor/autoload.php"); 

use Iodev\Whois\Factory;
use Carbon\Carbon;

class Main extends CI_Controller {

	private static $data = array();

	function __construct() {
		parent::__construct();
		$this->load->helper(array('helperssl'));
		$this->load->library ('Mcarbon'); 
		$this->load->model('chat/ChatOperationsHandler', 'chat');
		$this->load->model('DatabaseOperationsHandler', 'database');
		$this->load->model('CommonOperationsHandler', 'common');
		$this->load->model('EmailOperationsHandler', 'email_op');

		self::$data['languages']			=	$this->database->load_all_languages();
		self::$data['default_currency']		=	$this->common->getCurrency($this->database->_get_single_data('tbl_currencies',array('default_status'=>'1'),'currency'),'symbol');
		self::$data['userdata'] 			= 	$this->database->getUserData($this->session->userdata('user_id'));
		self::$data['selectedLanguage'] 	= 	$this->common->is_language();
		self::$data['language'] 			= 	$this->database->_get_single_data('tbl_languages',array('status'=>1,'default_status'=>1),'language_code');
		self::$data['listingCount']			= 	$this->database->_count_listings_user_wise();
		self::$data['messageCount']			= 	$this->chat->get_unviewed_msg($this->session->userdata('user_id'));
		self::$data['imagesData']			=	$this->database->_get_row_data('tbl_siteimages',array('id'=>1));
		self::$data['announcements']        =   $this->database->_get_row_data('tbl_announcement',array('status'=>1));
		self::$data['payments']             =   $this->database->_get_row_data('tbl_payment_settings',array('status'=>1));
		self::$data['settings']             =   $this->database->_get_row_data('tbl_settings',array('id'=>1));
		self::$data['pages']                =   $this->database->_get_row_data('tbl_pages',array('page_visibility_status'=>1));
		self::$data['ads']                	=   $this->database->_get_row_data('tbl_ads',array('id'=>1));
		self::$data['token'] 				= 	$this->security->get_csrf_hash();
		self::$data['platforms']   	 		=   $this->database->_get_row_data('tbl_platforms',array('type'=>'listing','status'=>1));
		self::$data['options']              =   $this->database->_get_row_data('tbl_platforms',array('type'=>'option','status'=>1));
		self::$data['homepage']            	=   $this->database->_get_row_data('tbl_homepage_setup',array('id'=>1));
		self::$data['l_format']				=   $this->database->_get_single_data('tbl_languages',array('status'=>1,'language'=>$this->common->is_language()),'l_format');

		if(in_array("website",array_column(self::$data['platforms'], 'platform'))){
			self::$data['categoriesData']		=	$this->database->_count_listings_categories_wise();
		}

		if(self::$data['settings'][0]['ssl_enable'] === '1'){
			force_ssl();
		}
	}

	public function index(){
		if(!empty($this->session->userdata('user_id')) && $this->session->userdata('user_level') == 1){
		}
		$this->home();
	}


	/*Homepage*/
	public function home(){
		$data = self::$data;
		$data['sponsoredAds']		= 	$this->database->_get_specific_listing();
		$data['slider_name']		= 	'featured-slider';
		$data['endingSoon']			=   $this->database->_get_auction_ending_soon('',array('app','account'));
		$data['domainlist']			=   $this->partition($this->database->_get_row_data('tbl_listings',array('listing_type'=>'domain','status'=>1),30,'',true),3);
		$data['featuredPosts']		= 	$this->database->_fetch_blog_posts(RESULTS_PER_BLOG,0,false,'views');
		$data['featuredDomains']	=	$this->database->_get_selected_listing_types('date',0,RESULTS_PER_HOMEPAGE,array('tbl_listings.listing_type'=>'domain'));
		$data['soldDomains']		=	$this->database->_get_selected_listing_types('date',1,RESULTS_PER_HOMEPAGE,array('tbl_listings.listing_type'=>'domain'));
		$data['auctionedDomains']	=	$this->database->_get_selected_listing_types('date',0,RESULTS_PER_HOMEPAGE,array('tbl_listings.listing_type'=>'domain','listing_option'=>'auction'));
		$data['featuredApps']		=	$this->database->_get_selected_listing_types('date',0,RESULTS_PER_HOMEPAGE,array('tbl_listings.listing_type'=>'app'),'');
		$data['featuredWebsites']	=	$this->database->_get_selected_listing_types('date',0,RESULTS_PER_HOMEPAGE,array('tbl_listings.listing_type'=>'website'),'');
		$data['featuredAmazonstores']=	$this->database->_get_selected_listing_types('date',0,RESULTS_PER_HOMEPAGE,array('tbl_listings.listing_type'=>'amazonstore'),'');
		$data['featuredAccounts']	=	$this->database->_get_telegram_data(array(),RESULTS_ACCOUNT_HOMEPAGE,false,0);
		$data['recentlyAdded'] 	    = 	$this->database->_get_selected_listing_types('date','',4);
		$data['editorsPicked'] 	    = 	$this->database->_get_selected_listing_types('date','',4,array(''));
		// echo '<pre>';
		// print_r($data['featuredDomains']); //working
		// print_r($data['featuredApps']); //not working
		// print_r($data['featuredWebsites']); //working
		// print_r($data['featuredAmazonstores']); //not working
		// print_r($data['featuredAccounts']);
		// die;
		$data = html_escape($this->security->xss_clean($data));
		$data['ads']                =   $this->database->_get_row_data('tbl_ads',array('id'=>1));
		$this->load->view('main/home',$data);
	}

	/*Contact Page*/
	public function contact(){
		$this->load->library('session');
		$this->load->helper('captcha');

		$data = self::$data;
		$data = html_escape($this->security->xss_clean($data));

		$config = array(
			'img_path'      => 'assets/captcha/',
			'img_url'       =>  base_url() .'assets/captcha/',
			'img_height' 	=> 30,
			'word_length' 	=> 5,
			'img_width'     => '150',
			'font_size' 	=> 18,
			'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

			'colors'        => array(
				'background' => array(255, 255, 255),
				'border' => array(255, 255, 255),
				'text' => array(0, 0, 0),
				'grid' => array(255, 40, 40)
			)
		);

		$cap = create_captcha($config);
		$this->session->unset_userdata('valuecaptchaCode');
		$this->session->set_userdata('valuecaptchaCode', $captcha['word']);
		$data['captchaImg'] = $cap['image'];
		$this->load->view('main/contact',$data);
	}

	/*Not found Page*/
	public function pageNotFound(){
		$this->load->view('main/404');
	}

	/*Offers Page*/
	public function offers($page=0){
		$data = self::$data;
		$data['offers'] 			= 	$this->database->_get_offers_data(array('tbl_listings.listing_option'=>'classified'),RESULTS_PER_PAGE,false,$page);
		$data = html_escape($this->security->xss_clean($data));
		$data['links'] 				=	$this->offer_pagination_loader(array('tbl_listings.listing_option'=>'classified'),$page);
		$data['ads']                =   $this->database->_get_row_data('tbl_ads',array('id'=>1));
		$this->load->view('main/offers',$data);
	}

	/* Offers pagination*/
	public function offers_pag($type,$page){
		$page = intval($page);
		$data = self::$data;
		if(!empty($type)){
			switch ($type) {
				case 'tab-all':
				$data['offers'] 		= $this->database->_get_offers_data(array('tbl_listings.listing_option'=>'classified'),RESULTS_PER_PAGE,false,$page);
				$data 					= html_escape($this->security->xss_clean($data));
				$data["links"] 			= $this->offer_pagination_loader(array('tbl_listings.listing_option'=>'classified'),$page);
				break;
				case 'tab-websites':
				$data['offers'] 		= $this->database->_get_offers_data(array('tbl_listings.listing_option'=>'classified','tbl_listings.listing_type'=>'website'),RESULTS_PER_PAGE,false,$page);
				$data 					= html_escape($this->security->xss_clean($data));
				$data["links"] 			= $this->offer_pagination_loader(array('tbl_listings.listing_option'=>'classified','tbl_listings.listing_type'=>'website'),$page);
				break;
				case 'tab-domains':
				$data['offers'] 		= $this->database->_get_offers_data(array('tbl_listings.listing_option'=>'classified','tbl_listings.listing_type'=>'domain'),RESULTS_PER_PAGE,false,$page);
				$data 					= html_escape($this->security->xss_clean($data));
				$data["links"] 			= $this->offer_pagination_loader(array('tbl_listings.listing_option'=>'classified','tbl_listings.listing_type'=>'domain'),$page);	
				break;
				default:
				return ;
			}
		}

		$response 			= $this->load->view('main/add-ons/offers-table', $data, TRUE);
		$data['response'] 	= $response;
		$data['token'] 		= $this->security->get_csrf_hash();
		header('Content-Type: application/json');
		exit(json_encode($data));
	}


	/*Auctions Page*/
	public function auctions($page=0){
		$data = self::$data;
		$data['auctions'] 			= 	$this->database->_get_auction_data(array('tbl_listings.listing_option'=>'auction'),RESULTS_PER_PAGE,false,false,$page);
		$data = html_escape($this->security->xss_clean($data));
		$data['links'] 				=	$this->auction_pagination_loader(array('tbl_listings.listing_option'=>'auction'),$page);
		$data['ads']                =   $this->database->_get_row_data('tbl_ads',array('id'=>1));
		$this->load->view('main/auctions',$data);
	}

	/* Auctions pagination*/
	public function auction_pag($type,$page){
		$page = intval($page);
		$data = self::$data;
		if(!empty($type)){
			switch ($type) {
				case 'tab-all':
				$data['auctions'] 		= $this->database->_get_auction_data(array('tbl_listings.listing_option'=>'auction'),RESULTS_PER_PAGE,false,false,$page);
				$data 					= html_escape($this->security->xss_clean($data));
				$data["links"] 			= $this->auction_pagination_loader(array('tbl_listings.listing_option'=>'auction'),$page);
				break;
				case 'tab-ending':
				$data['auctions'] 		= $this->database->_get_auction_data(array('tbl_listings.listing_option'=>'auction'),RESULTS_PER_PAGE,true,false,$page,'',true);
				$data 					= html_escape($this->security->xss_clean($data));
				$data["links"] 			= $this->auction_pagination_loader(array('tbl_listings.listing_option'=>'auction'),$page,true);
				break;
				case 'tab-sold':
				$data['auctions'] 		= $this->database->_get_auction_data(array('tbl_listings.sold_status'=>'1'),RESULTS_PER_PAGE,false,false,$page);
				$data 					= html_escape($this->security->xss_clean($data));
				$data["links"] 			= $this->auction_pagination_loader(array('tbl_listings.sold_status'=>'1'),$page);	
				break;
				default:
				return ;
			}
		}

		$response 			= $this->load->view('main/add-ons/auctions-table', $data, TRUE);
		$data['response'] 	= $response;
		$data['token'] 		= $this->security->get_csrf_hash();
		header('Content-Type: application/json');
		exit(json_encode($data));
	}

	/*Checkout Page*/
	public function checkout($type,$id){
		$data = self::$data;
		$data['error']   =   $this->session->userdata('error');
		$this->session->unset_userdata('error');
		$this->session->set_userdata('url',current_url());
		$this->common->is_logged();

		$data['name'] 			= '';
		$data['amount'] 		= '';
		$data['fee'] 			= 0;
		$data['currency'] 		= $data['default_currency'];
		$data['percentage'] 	= $data['settings'][0]['processing_fee'];
		$data['total'] 			= '';
		$data['stripePubKey'] 	=  $this->database->_get_single_data('tbl_payment_settings',array('paymentgateway_id'=>'Stripe','status'=>1),'password');

		if(!empty($type)){
			switch ($type) {
				case 'buynow':
				$data['listing_data']=	$this->database->_get_row_data('tbl_listings',array('id'=>$id),'',true);
				if(!empty($data['listing_data'])) {
					$data['type'] 			= 'buynow';
					$data['id'] 			= $id;
					$data['name'] 			= $data['listing_data'][0]['website_BusinessName'];
					$data['amount'] 		= $data['listing_data'][0]['website_buynowprice'];
					if(!empty($data['percentage']) && $data['percentage'] > 0){
						$data['fee'] 		= (floatval($data['amount']) * (floatval($data['percentage']))) / 100;
					}
					$data['currency'] 		= $data['default_currency'];
					$data['total'] 			= floatval($data['amount']) + floatval($data['fee']);
					$data['owner_id'] 		= $data['listing_data'][0]['user_id'];
					$data['seller_email'] 	= $this->database->_get_single_data('tbl_users',array('user_id'=>$data['owner_id']),'escrow_email');
				}
				break;
				case 'contract':
				$data['contract']			=	$this->database->_get_contract($id);
				if(!empty($data['contract'])) {
					$data['listing_data']	=	$this->database->_get_row_data('tbl_listings',array('id'=>$data['contract'][0]['listing_id']),'',true);
					$data['type'] 			= 'contract';
					$data['id'] 			= $data['contract'][0]['listing_id'];
					$data['name'] 			= 'CONTRACT NO'.'-'.'('.'#'.$data['contract'][0]['contract_id'].')';

					if($data['contract'][0]['type'] === 'bid'){
						$data['biddata']	= 	$this->database->_get_bid($data['contract'][0]['bid_id']);
					}

					if($data['contract'][0]['type'] === 'offer'){
						$data['biddata']	= 	$this->database->_get_offer($data['contract'][0]['bid_id']);
					}

					$data['amount'] 		= $data['biddata'][0]['bid_amount'];
					if(!empty($data['percentage']) && $data['percentage'] > 0){
						$data['fee'] 		= (floatval($data['amount']) * (floatval($data['percentage']))) / 100;
					}
					$data['currency'] 		= $data['default_currency'];
					$data['total'] 			= floatval($data['amount']) + floatval($data['fee']);
					$data['contract_id'] 	= $data['contract'][0]['id'];
					$data['owner_id'] 		= $data['contract'][0]['owner_id'];
					$data['seller_email'] 	= $this->database->_get_single_data('tbl_users',array('user_id'=>$data['owner_id']),'escrow_email');
				}
				break;
				default:
				return ;
			}
		}

		$data = html_escape($this->security->xss_clean($data));
		$this->load->view('main/checkout',$data);
	}

	/*validate discount coupons*/
	public function validate_discount_code(){
		return $this->database->discount_coupons();
	}

	/*view page*/
	public function view_page($id){
		$data = self::$data;
		$data['page']			= $this->database->_get_row_data('tbl_pages',array('page_id'=>$id,'page_visibility_status'=>1),'',false,array('txt_page_url_slug'=>urldecode($id)));
		$data['sponsoredAds']	= $this->database->_get_specific_listing();
		$data['slider_name']	= 'featured-slider-page';
		if(!empty($data['page'])){
			$this->load->view('main/page',$data);
			return;
		}
		$this->pageNotFound();
	}


	/*view page*/
	public function view_blog($id){
		$data = self::$data;
		$data['blog']			= $this->database->_get_row_data('tbl_blog',array('id'=>$id,'status'=>1),'',false,array('slug'=>urldecode($id)));
		$data['sponsoredAds']	= $this->database->_get_specific_listing();
		$data['ownerData']		= $this->database->getUserData(1);
		$data['trendingPosts']	= $this->database->_fetch_blog_posts(RESULTS_PER_BLOG,0,false,'views');
		$data['comment_section']= 'blog';
		$data['slider_name']	= 'featured-slider-page';
		if(!empty($data['blog'])){
			$data['nextPost']		= $this->database->_fetch_most_recent($data['blog'][0]['id'],'max');
			$data['prevPost']		= $this->database->_fetch_most_recent($data['blog'][0]['id'],'min');
			$data['comments']		= $this->database->_get_comments($data['blog'][0]['id'],'blog');
			$this->database->_views_counter($data['blog'][0]['id'],'tbl_blog');
			$this->load->view('main/blog-post',$data);
			return;
		}
		$this->pageNotFound();
	}

	/*view page*/
	public function blog($page=0){
		$data = self::$data;
		$data['blogs']			= $this->database->_fetch_blog_posts(RESULTS_PER_BLOG,$page,false,'date');
		$data['sponsoredAds']	= $this->database->_get_specific_listing();
		$data['featuredPosts']	= $this->database->_fetch_blog_posts(RESULTS_PER_BLOG,0,false,'views');
		$data['trendingPosts']	= $this->database->_fetch_blog_posts(RESULTS_PER_BLOG,0,false,'views');
		$data['ownerData']		= $this->database->getUserData(1);
		$data = html_escape($this->security->xss_clean($data));
		$data["links"] 			= $this->blog_pagination_loader($page);
		$data['ads']            = $this->database->_get_row_data('tbl_ads',array('id'=>1));
		$this->load->view('main/blog',$data);
		return;
	}

	/*Blog Next/Prev*/
	public function blog_nextprev($id,$type){
		$data['nextPost']		= $this->database->_fetch_most_recent($id,$type);
		$data['prevPost']		= $this->database->_fetch_most_recent($id,$type);

		$data 					= html_escape($this->security->xss_clean($data));
		$response 				= $this->load->view('main/add-ons/next-post', $data, TRUE);
		$output['response'] 	= $response;
		$output['token'] 		= $this->security->get_csrf_hash();
		header('Content-Type: application/json');
		exit(json_encode($output));
	}

	/*Blog pagination*/
	public function blog_pagination($page){
		$data['blogs']			= $this->database->_fetch_blog_posts(RESULTS_PER_BLOG,$page,false,'date');
		$data 					= html_escape($this->security->xss_clean($data));
		$data["links"] 			= $this->blog_pagination_loader($page);
		$response 				= $this->load->view('main/add-ons/single-blog', $data, TRUE);
		$output['response'] 	= $response;
		$output['token'] 		= $this->security->get_csrf_hash();
		header('Content-Type: application/json');
		exit(json_encode($output));
	}

	/*Ad Post/ Listing*/
	public function adpost(){
		$data = self::$data;
		$this->session->unset_userdata('FormValues');
		$data['user_id']						=	$this->common->is_logged();
		$data['verifiedGA']						=	"";
		$data['FormValues'] 					= 	"";
		$data['reportData'] 					= 	"";

		$data = html_escape($this->security->xss_clean($data));
		$this->load->view('main/adpost',$data);
	}

	/*search page*/
	public function search($type='',$page=0,$searchterm=''){
		$arr = '';
		$data = self::$data;
		$data['platform_list']					= $this->database->_get_row_data('tbl_platform_list',array('status'=>1));
		if(!empty($this->input->post('searchterm')) || !empty($this->input->post('listing_type'))){
			$arr = array();
			$arr['business_registeredCountry']	= 	'';
			$arr['category']					= 	'';
			$arr['searchterm']					= 	$this->input->post('searchterm');
			$arr['listing_option']				= 	'';

			$data['searchterm']					= 	$arr['searchterm'];
			$data['results']					= 	$this->database->_search_table(array('status'=>1,'tbl_listings.listing_type'=>$this->input->post('listing_type')),RESULTS_PER_SEARCH,$page,'tbl_listings.date',$arr);
			$data["searchtype"] 				= 	$this->input->post('listing_type');
			$data = html_escape($this->security->xss_clean($data));
			$data["links"] 						= 	$this->search_pagination_loader(array('status'=>1,'tbl_listings.listing_type'=>$this->input->post('listing_type')),RESULTS_PER_SEARCH,$page,'tbl_listings.date',$arr);
			$this->load->view('main/single-search',$data);
			return;
		}

		$data['results']						= 	$this->database->_search_table(array('status'=>1,'tbl_listings.listing_type'=>$type),RESULTS_PER_SEARCH,$page,'tbl_listings.date');
		$data["searchtype"] 					= 	$type;
		$data = html_escape($this->security->xss_clean($data));
		$data["links"] 							= 	$this->search_pagination_loader(array('status'=>1,'tbl_listings.listing_type'=>$type),RESULTS_PER_SEARCH,$page,'tbl_listings.date',$arr);
		$this->load->view('main/single-search',$data);
	}

	/*search page loading*/
	public function single_search($type,$page,$sort='tbl_listings.date'){

		if(!empty($this->input->post('parameters'))){
			$arr = json_decode($this->input->post('parameters'),TRUE);
		}

		if($type === 'any'){

			if(!empty($data['marketplaces'])){
				$marketArr = array_column($data['marketplaces'], 'platform');
				$key = array_search("domain",$marketArr);
				if ($key !== false) {
					unset($marketArr[$key]);
				}
			}
			else
			{
				$marketArr							= 	array('app','website','account');
			}

			$arr['in_conditions']					= 	$marketArr;

			$data['results']						= 	$this->database->_search_table(array('tbl_listings.status'=>1),RESULTS_PER_SEARCH,intval($page),$sort,$arr);
			$data 									= 	html_escape($this->security->xss_clean($data));
			$data["links"] 							= 	$this->search_pagination_loader(array('tbl_listings.status'=>1),RESULTS_PER_SEARCH,intval($page),$sort,$arr);
		}
		else
		{
			$data['results']						= 	$this->database->_search_table(array('tbl_listings.status'=>1,'tbl_listings.listing_type'=>$type),RESULTS_PER_SEARCH,intval($page),$sort,$arr);
			$data 									= 	html_escape($this->security->xss_clean($data));
			$data["links"] 							= 	$this->search_pagination_loader(array('tbl_listings.status'=>1,'tbl_listings.listing_type'=>$type),RESULTS_PER_SEARCH,intval($page),$sort,$arr);
		}

		$response 								= 	$this->load->view('main/add-ons/searched-results', $data, TRUE);
		$output['response'] 					= 	$response;
		$output['token'] 						= 	$this->security->get_csrf_hash();
		header('Content-Type: application/json');
		exit(json_encode($output));
	}

	/*category page*/
	public function category($category,$page=0){
		$data = self::$data;
		$marketArr = array();
		if(!empty($category)){
			$resultsdata						= 	$this->database->_get_row_data('tbl_categories',array('id'=>$category),'',false,array('url_slug'=>urldecode($category)));

			if(empty($resultsdata)){
				$this->pageNotFound();
				return;
			}

			$arr = array();
			$arr['business_registeredCountry']	= 	'';
			$arr['category']					= 	$resultsdata[0]['id'];
			$arr['searchterm']					= 	'';
			$arr['listing_option']				= 	'';
			$data['marketplaces']               =   $this->database->_get_row_data('tbl_platforms',array('type'=>'listing','status'=>'1'));

			if(!empty($data['marketplaces'])){
				$marketArr = array_column($data['marketplaces'], 'platform');
				$key = array_search("domain",$marketArr);
				if ($key !== false) {
					unset($marketArr[$key]);
				}
			}
			else
			{
				$marketArr						= 	array('app','website','account');
			}
			
			$arr['in_conditions']				= 	$marketArr;
			$data['marketplaces']               =	$marketArr;

			$data['results']					= 	$this->database->_search_table(array('tbl_listings.status'=>1),RESULTS_PER_SEARCH,$page,'tbl_listings.date',$arr);
			$data["category_name"] 				= 	$resultsdata[0]['c_name'];
			$data["category_id"] 				=	$resultsdata[0]['id'];
			$data["categories"] 				=	$resultsdata;
			$data = html_escape($this->security->xss_clean($data));
			$data["links"] 						= 	$this->search_pagination_loader(array('tbl_listings.status'=>1),RESULTS_PER_SEARCH,$page,'tbl_listings.date',$arr);
			$this->load->view('main/single-category',$data);
			return;
		}
		$this->pageNotFound();
	}

	/*search results pagination loader*/
	public function search_pagination_loader($data,$type,$page,$sort='tbl_listings.date',$arr){
		$config = array();
		$config["base_url"] 					= '#';
		$config["total_rows"] 					= $this->database->_search_table($data,RESULTS_PER_SEARCH,$page,$sort,$arr,true);	
		$config["per_page"] 					= RESULTS_PER_SEARCH;
		$config['use_page_numbers'] 			= TRUE;

		$config['num_tag_open'] 				= '<li class="ripple-effect">';
		$config['num_tag_close'] 				= '</li>';
		$config['cur_tag_open'] 				= '<li><a class="ripple-effect current-page">';
		$config['cur_tag_close']				= '</a></li>';
		$config['prev_tag_open'] 				= '<li class="pagination-arrow">';
		$config['prev_tag_close'] 				= '</li>';
		$config['first_tag_open'] 				= '<li class="ripple-effect">';
		$config['first_tag_close']				= '</li>';
		$config['last_tag_open'] 				= '<li class="ripple-effect">';
		$config['last_tag_close'] 				= '</li>';

		$config['prev_link'] 					= '<i class=" mdi mdi-chevron-left"></i>';
		$config['prev_tag_open'] 				= '<li class="pagination-arrow">';
		$config['prev_tag_close'] 				= '</li>';

		$config['next_link']		 			= '<i class=" mdi mdi-chevron-right"></i>';
		$config['next_tag_open'] 				= '<li class="pagination-arrow">';
		$config['next_tag_close'] 				= '</li>';

		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}

	/*Blog results pagination loader*/
	public function blog_pagination_loader($page){
		$config = array();
		$config["base_url"] 					= '#';
		$config["total_rows"] 					= $this->database->_fetch_blog_posts(RESULTS_PER_BLOG,$page,true);	
		$config["per_page"] 					= RESULTS_PER_BLOG;
		$config['use_page_numbers'] 			= TRUE;

		$config['num_tag_open'] 				= '<li class="ripple-effect">';
		$config['num_tag_close'] 				= '</li>';
		$config['cur_tag_open'] 				= '<li><a class="ripple-effect current-page">';
		$config['cur_tag_close']				= '</a></li>';
		$config['prev_tag_open'] 				= '<li class="pagination-arrow">';
		$config['prev_tag_close'] 				= '</li>';
		$config['first_tag_open'] 				= '<li class="ripple-effect">';
		$config['first_tag_close']				= '</li>';
		$config['last_tag_open'] 				= '<li class="ripple-effect">';
		$config['last_tag_close'] 				= '</li>';

		$config['prev_link'] 					= '<i class=" mdi mdi-chevron-left"></i>';
		$config['prev_tag_open'] 				= '<li class="pagination-arrow">';
		$config['prev_tag_close'] 				= '</li>';

		$config['next_link']		 			= '<i class=" mdi mdi-chevron-right"></i>';
		$config['next_tag_open'] 				= '<li class="pagination-arrow">';
		$config['next_tag_close'] 				= '</li>';

		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}

	/*Auction pagination loader*/
	public function auction_pagination_loader($data,$page,$ending=false){
		$config = array();
		$config["base_url"] 					= '#';
		$config["total_rows"] 					= $this->database->_get_auction_data($data,RESULTS_PER_PAGE,$ending,true,$page,'',true);
		$config["per_page"] 					= RESULTS_PER_PAGE;
		$config['use_page_numbers'] 			= TRUE;

		$config['num_tag_open'] 				= '<li class="ripple-effect">';
		$config['num_tag_close'] 				= '</li>';
		$config['cur_tag_open'] 				= '<li><a class="ripple-effect current-page">';
		$config['cur_tag_close']				= '</a></li>';
		$config['prev_tag_open'] 				= '<li class="pagination-arrow">';
		$config['prev_tag_close'] 				= '</li>';
		$config['first_tag_open'] 				= '<li class="ripple-effect">';
		$config['first_tag_close']				= '</li>';
		$config['last_tag_open'] 				= '<li class="ripple-effect">';
		$config['last_tag_close'] 				= '</li>';

		$config['prev_link'] 					= '<i class=" mdi mdi-chevron-left"></i>';
		$config['prev_tag_open'] 				= '<li class="pagination-arrow">';
		$config['prev_tag_close'] 				= '</li>';

		$config['next_link']		 			= '<i class=" mdi mdi-chevron-right"></i>';
		$config['next_tag_open'] 				= '<li class="pagination-arrow">';
		$config['next_tag_close'] 				= '</li>';

		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}

	/*Offer pagination loader*/
	public function offer_pagination_loader($data,$page){
		$config = array();
		$config["base_url"] 					= '#';
		$config["total_rows"] 					= $this->database->_get_offers_data($data,RESULTS_PER_PAGE,true,$page);
		$config["per_page"] 					= RESULTS_PER_PAGE;
		$config['use_page_numbers'] 			= TRUE;

		$config['num_tag_open'] 				= '<li class="ripple-effect">';
		$config['num_tag_close'] 				= '</li>';
		$config['cur_tag_open'] 				= '<li><a class="ripple-effect current-page">';
		$config['cur_tag_close']				= '</a></li>';
		$config['prev_tag_open'] 				= '<li class="pagination-arrow">';
		$config['prev_tag_close'] 				= '</li>';
		$config['first_tag_open'] 				= '<li class="ripple-effect">';
		$config['first_tag_close']				= '</li>';
		$config['last_tag_open'] 				= '<li class="ripple-effect">';
		$config['last_tag_close'] 				= '</li>';

		$config['prev_link'] 					= '<i class=" mdi mdi-chevron-left"></i>';
		$config['prev_tag_open'] 				= '<li class="pagination-arrow">';
		$config['prev_tag_close'] 				= '</li>';

		$config['next_link']		 			= '<i class=" mdi mdi-chevron-right"></i>';
		$config['next_tag_open'] 				= '<li class="pagination-arrow">';
		$config['next_tag_close'] 				= '</li>';

		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}

	/*profile reviews pagination*/
	public function profile_reviews($userid,$page){
		$data["profileRatings"] 				= $this->database->get_reviews($userid,"","",4,$page);
		$data 									= html_escape($this->security->xss_clean($data));
		$data["links"] 							= $this->common->reviews_pagination_loader($userid);
		$response 								= $this->load->view('main/add-ons/user_reviews', $data, TRUE);
		$output['response'] 					= $response;
		$output['token'] 						= $this->security->get_csrf_hash();
		header('Content-Type: application/json');
		exit(json_encode($output));
	}

	/*Post Reviews*/
	public function post_review(){
		$output['token']       = $this->security->get_csrf_hash();
		header('Content-Type: application/json');

		$data = array(
			'reviewer_id' => $this->session->userdata('user_id'),
			'user_id' => $this->input->post('review_user_id'),
			'review' => $this->input->post('review_msg'),
			'ratings' => $this->input->post('rating'),
			'type' => $this->input->post('review_type'),
			'status' => 1,
			'date' => date('Y-m-d H:i:s')
		);

		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('ratings', 'ratings', 'required|numeric|trim|xss_clean');
		$this->form_validation->set_rules('review', 'review', 'required|trim|xss_clean');

		if ($this->form_validation->run()) {
			$data = html_escape($this->security->xss_clean($data));
			if(!empty($this->input->post('review_id'))){
				$output['response']         = $this->database->_update_to_table('tbl_reviews',$data,array('id'=>$this->input->post('review_id')));
				exit(json_encode($output));
			}
			else
			{
				$output['response']         = $this->database->_insert_to_table('tbl_reviews',$data);
				exit(json_encode($output));
			}
		}

		$output['response']         = false;
		exit(json_encode($output));

	}
	
	/*Single Domain*/
	public function single_domain(){
		$this->load->view('main/single-domain-page');
	}

	/*Pricing Page*/
	public function pricing(){
		$data = self::$data;
		$data['website_headers']			=	$this->database->_get_row_data('tbl_listing_header',array('listing_type'=>'website','status'=>1));
		$data['domains_headers']			=	$this->database->_get_row_data('tbl_listing_header',array('listing_type'=>'domain','status'=>1));
		$data['app_headers']				=	$this->database->_get_row_data('tbl_listing_header',array('listing_type'=>'app','status'=>1));
		$data['channels_headers']			=	$this->database->_get_row_data('tbl_listing_header',array('listing_type'=>'account','status'=>1));
		$data['sponsored_headers']			=	$this->database->_get_row_data('tbl_listing_header',array('listing_type'=>'sponsored','status'=>1));

		$data = html_escape($this->security->xss_clean($data));
		$this->load->view('main/pricing',$data);
	}

	public function single_item($type,$name,$id){
		$data = self::$data;
		$data['listing_data']					=	$this->database->_get_row_data('tbl_listings',array('id'=>$id,'listing_type'=>$type,'website_BusinessName'=>$name),'',true);
		$data['comment_section']				= 	'listing';
		$data['expiredStatus']					=	false;

		if($data['listing_data'][0]['listing_option']=== 'auction')
		{
			$data['auctionstatus']					= 	'invalid';
			$data['AuctionEndingDate']				=	$this->database->_get_auction_ending_date($id,'tbl_listings');
		}

		if(!empty($this->session->userdata('user_id') )){
			$data['userdata'] 						= 	$this->database->getUserData($this->session->userdata('user_id'));
		}

		if(!empty($data['listing_data'])){
			if(!$this->database->_check_listing_expiry_status($data['listing_data'][0]['id'])){
				$data['expiredStatus']				= 	true;
			}

			//if(!in_array($type, array('domain'))){
			$data['selectedcategoriesData']		=	$this->database->_get_row_data('tbl_categories',array('id'=>$data['listing_data'][0]['website_industry']));			
			//}

			if($data['listing_data'][0]['listing_option']=== 'auction')
			{

				if(!empty($data['AuctionEndingDate'][0]['ENDDATE'])) {
					$data['nofdaysleft']				=	$this->common->DateDiffCalculate($data['AuctionEndingDate'][0]['ENDDATE']);

					if ($data['nofdaysleft']['days'] >= 0 && $data['nofdaysleft']['hours'] >= 0 ) {
						$data['auctionstatus']			= 	'valid';
					}

					$data['currentPrice']					=   $this->database->_get_current_price($id,$type);
				}

				if($data['settings'][0]['hold_bidding_until_approval'] === '1'){
					$data['validBids']					=   $this->database->_get_all_bids($id,'1',$type,"","","","off");
				}
				else
				{
					$data['validBids']					=   $this->database->_get_all_bids($id,'',$type,"","","","off");
				}
			}

			if($data['listing_data'][0]['listing_option']=== 'classified')
			{

				
			}
			
			$data['domainStatics']					=	$this->AnalyticsOperationsHandler->getUsersAndPageViews($id);
			$data['comments']						=   $this->database->_get_comments($id);
			$data['domainData']						=	$this->database->_get_row_data('tbl_domains',array('id'=>$data['listing_data'][0]['domain_id']));
			$data['ownerData']						=	$this->database->getUserData($data['listing_data'][0]['user_id']);
			$data['profileRatingsAvg'] 				= 	$this->database->get_reviews($data['listing_data'][0]['user_id'],"","",'','','avg');
			
			if(in_array($type, array('domain','website'))) {
				$data['alexaRank']					=   $this->common->alexaRank('//'.$data['domainData'][0]['domain']);
			}

			if(in_array($type, array('account'))) {
				$data['platfrom']					=   $this->database->_get_row_data('tbl_platform_list',array('platfrom_domain'=>$data['listing_data'][0]['app_market'],'status'=>1));
			}

			$this->database->_views_counter($id);
			//$data = html_escape($this->security->xss_clean($data));
			$data['ads']                			=   $this->database->_get_row_data('tbl_ads',array('id'=>1));
			$data['faqs']                			=   $this->database->_get_row_data('tbl_faq',array('category'=>$type));
			$data['video']                			=   $this->database->_get_row_data('tbl_videos',array('category'=>$type));
			$data['similar']                		=   $this->database->_get_row_data('tbl_listings',array('listing_type'=>$type,'website_industry'=>$data['listing_data'][0]['website_industry']));

			/** Google Analytics **/
			$data['domainStatics']					=	$this->AnalyticsOperationsHandler->getUsersAndPageViews($id);
			$data['adsense']						=	$this->AnalyticsOperationsHandler->getAdsenseData($id);
			$data['adsenseTotal']					=	$this->AnalyticsOperationsHandler->getAdsenseData($id,"2005-01-01");
			/** Google Analytics **/

			/** Moz **/
			$data['mozAnalytics']	= "";
			if(!empty($data['settings'][0]['moz_access_id']) & !empty($data['settings'][0]['moz_api_key'])){
				$this->load->library('Moz');
				$moz = new Moz($data['settings'][0]['moz_access_id'],$data['settings'][0]['moz_api_key']);
				$data['mozAnalytics']	=  $moz->urlMetrics(array($data['domainData'][0]['domain']));
			}
			/** Moz  **/

			/** Domain Data **/
			if(in_array($type, array('domain','website'))){
				$factory = new Factory();
				$whois = $factory::get()->createWhois();
				$info = $whois->loadDomainInfo($data['domainData'][0]['domain']);

				$data['domainCreated']	 = date("Y-m-d", $info->creationDate);
				$data['domainExpires']	 = date("Y-m-d", $info->expirationDate);
				$data['domainRegistar']	 = $info->registrar;

				$created = Carbon::parse(date("Y-m-d", $info->creationDate));
				$now  = Carbon::now();

				$data['domainExpYears']	 = $created->diffInYears($now);
			}
			/** Domain Data **/

			//$this->load->view('main/single-auction',$data);
			$this->load->view('main/single-item',$data);
			return;
		}
		$this->pageNotFound();
	}

	/*Single Auction*/
	public function single_auction($type,$name,$id){
		$data = self::$data;
		$data['listing_data']					=	$this->database->_get_row_data('tbl_listings',array('id'=>$id,'listing_type'=>$type,'listing_option'=>'auction'),'',true);
		$data['comment_section']				= 	'listing';
		$data['auctionstatus']					= 	'invalid';
		$data['expiredStatus']					=	false;
		$data['AuctionEndingDate']				=	$this->database->_get_auction_ending_date($id,'tbl_listings');

		if(!empty($this->session->userdata('user_id') )){
			$data['userdata'] 						= 	$this->database->getUserData($this->session->userdata('user_id'));
		}

		if(!empty($data['listing_data'])){
			if(!$this->database->_check_listing_expiry_status($data['listing_data'][0]['id'])){
				$data['expiredStatus']				= 	true;
			}

			//if(!in_array($type, array('domain'))){
			$data['selectedcategoriesData']		=	$this->database->_get_row_data('tbl_categories',array('id'=>$data['listing_data'][0]['website_industry']));			
			//}

			if(!empty($data['AuctionEndingDate'][0]['ENDDATE'])) {
				$data['nofdaysleft']				=	$this->common->DateDiffCalculate($data['AuctionEndingDate'][0]['ENDDATE']);

				if ($data['nofdaysleft']['days'] >= 0 && $data['nofdaysleft']['hours'] >= 0 ) {
					$data['auctionstatus']			= 	'valid';
				}
			}
			
			$data['domainStatics']					=	$this->AnalyticsOperationsHandler->getUsersAndPageViews($id);
			$data['currentPrice']					=   $this->database->_get_current_price($id,$type);

			if($data['settings'][0]['hold_bidding_until_approval'] === '1'){
				$data['validBids']					=   $this->database->_get_all_bids($id,'1',$type,"","","","off");
			}
			else
			{
				$data['validBids']					=   $this->database->_get_all_bids($id,'',$type,"","","","off");
			}

			$data['comments']						=   $this->database->_get_comments($id);
			$data['domainData']						=	$this->database->_get_row_data('tbl_domains',array('id'=>$data['listing_data'][0]['domain_id']));
			$data['ownerData']						=	$this->database->getUserData($data['listing_data'][0]['user_id']);
			$data['profileRatingsAvg'] 				= 	$this->database->get_reviews($data['listing_data'][0]['user_id'],"","",'','','avg');
			
			if(in_array($type, array('domain','website'))) {
				$data['alexaRank']					=   $this->common->alexaRank('//'.$data['domainData'][0]['domain']);
			}

			if(in_array($type, array('account'))) {
				$data['platfrom']					=   $this->database->_get_row_data('tbl_platform_list',array('platfrom_domain'=>$data['listing_data'][0]['app_market'],'status'=>1));
			}

			$this->database->_views_counter($id);
			//$data = html_escape($this->security->xss_clean($data));
			$data['ads']                			=   $this->database->_get_row_data('tbl_ads',array('id'=>1));
			$data['faqs']                			=   $this->database->_get_row_data('tbl_faq',array('category'=>$type));
			$data['video']                			=   $this->database->_get_row_data('tbl_videos',array('category'=>$type));
			$data['similar']                		=   $this->database->_get_row_data('tbl_listings',array('listing_type'=>$type,'website_industry'=>$data['listing_data'][0]['website_industry']));

			/** Google Analytics **/
			$data['domainStatics']					=	$this->AnalyticsOperationsHandler->getUsersAndPageViews($id);
			$data['adsense']						=	$this->AnalyticsOperationsHandler->getAdsenseData($id);
			$data['adsenseTotal']					=	$this->AnalyticsOperationsHandler->getAdsenseData($id,"2005-01-01");
			/** Google Analytics **/

			/** Moz **/
			$data['mozAnalytics']	= "";
			if(!empty($data['settings'][0]['moz_access_id']) & !empty($data['settings'][0]['moz_api_key'])){
				$this->load->library('Moz');
				$moz = new Moz($data['settings'][0]['moz_access_id'],$data['settings'][0]['moz_api_key']);
				$data['mozAnalytics']	=  $moz->urlMetrics(array($data['domainData'][0]['domain']));
			}
			/** Moz  **/

			/** Domain Data **/
			if(in_array($type, array('domain','website'))){
				$factory = new Factory();
				$whois = $factory::get()->createWhois();
				$info = $whois->loadDomainInfo($data['domainData'][0]['domain']);

				$data['domainCreated']	 = date("Y-m-d", $info->creationDate);
				$data['domainExpires']	 = date("Y-m-d", $info->expirationDate);
				$data['domainRegistar']	 = $info->registrar;

				$created = Carbon::parse(date("Y-m-d", $info->creationDate));
				$now  = Carbon::now();

				$data['domainExpYears']	 = $created->diffInYears($now);
			}
			/** Domain Data **/

			//$this->load->view('main/single-auction',$data);
			$this->load->view('main/single-item',$data);
			return;
		}
		$this->pageNotFound();
	}

	/*Single Classified*/
	public function single_offers($type,$name,$id){
		$data = self::$data;
		$data['listing_data']								=	$this->database->_get_row_data('tbl_listings',array('id'=>$id,'listing_type'=>$type,'listing_option'=>'classified'),'',true);
		$data['default_currency']							=	$data['default_currency'];
		$data['comment_section']							= 	'listing';
		$data['expiredStatus']								=	false;

		if(!empty($this->session->userdata('user_id') )){
			$data['userdata'] 						= 	$this->database->getUserData($this->session->userdata('user_id'));
		}

		if(!empty($data['listing_data'])){

			if(!$this->database->_check_listing_expiry_status($data['listing_data'][0]['id'])){
				$data['expiredStatus']				= 	true;
			}
			
			if(!in_array($type, array('domain'))){
				$data['selectedcategoriesData']		=	$this->database->_get_row_data('tbl_categories',array('id'=>$data['listing_data'][0]['website_industry']));
			}

			
			$data['domainStatics']					=	$this->AnalyticsOperationsHandler->getUsersAndPageViews($id);
			$data['comments']						=   $this->database->_get_comments($id);
			$data['domainData']						=	$this->database->_get_row_data('tbl_domains',array('id'=>$data['listing_data'][0]['domain_id']));
			$data['ownerData']						=	$this->database->getUserData($data['listing_data'][0]['user_id']);
			
			if(in_array($type, array('domain','website'))) {
				$data['alexaRank']					=   $this->common->alexaRank('//'.$data['domainData'][0]['domain']);
			}

			if(in_array($type, array('account'))) {
				$data['platfrom']					=   $this->database->_get_row_data('tbl_platform_list',array('platfrom_domain'=>$data['listing_data'][0]['app_market'],'status'=>1));
			}

			$data['profileRatingsAvg'] 				= 	$this->database->get_reviews($data['listing_data'][0]['user_id'],"","",'','','avg');
			
			$this->database->_views_counter($id);
			//$data = html_escape($this->security->xss_clean($data));
			$data['listing_data'][0]['description'] = 	$data['listing_data'][0]['description'];
			$data['ads']                			=   $this->database->_get_row_data('tbl_ads',array('id'=>1));
			$this->load->view('main/single-offers',$data);
			return;
		}

		$this->pageNotFound();
		
	}


	/*Add Bid*/
	public function add_bid(){
		$output['token']       = $this->security->get_csrf_hash();
		header('Content-Type: application/json');

		$datas = self::$data;
		$status = 0;
		if($datas['settings'][0]['allow_approvedbidder_tobid'] === '1'){
			if($this->database->_check_user_has_pending_bid('1') > 0){
				if(floatval($this->database->_get_current_price($this->input->post('bid_listing_id'),$this->input->post('bid_listing_type'))) < floatval($this->input->post('bid_amount'))){
					if($this->database->_get_highest_bid_details('1')[0]['bidder_id'] !== $this->input->post('bid_bidder_id')){
						$status = 1;
					}
					else
					{
						if($datas['settings'][0]['allow_approvedbidder_tobid'] !== 1){
							$output['response'] 	= $this->lang->line('lang_add_bid_highest_far');
							exit(json_encode($output));
						}

						$status = 1;
					}
				}
				else
				{
					$output['response'] 	= $this->lang->line('lang_add_bid_great').' '.$data['default_currency'].' '.(floatval($this->database->_get_current_price($this->input->post('bid_listing_id'),$this->input->post('bid_listing_type'))) + floatval($this->database->getSettingsData()[0]['bid_value_gap']));
					exit(json_encode($output));
				}
			}  
		}

		$data= array(
			'listing_id' =>$this->input->post('bid_listing_id'),
			'listing_type' =>$this->input->post('bid_listing_type'),
			'bidder_id' =>$this->input->post('bid_bidder_id'),
			'owner_id'=>$this->input->post('bid_owner_id'),
			'bid_amount'=>$this->input->post('bid_amount'),
			'bid_status '=>$status,
			'date'=>date('Y-m-d H:i:s')
		);

		$data = html_escape($this->security->xss_clean($data));
		if($datas['settings'][0]['hold_bidding_until_approval'] === '1'){
			if($this->database->_check_user_has_pending_bid() > 0){
				$output['response'] 	= $this->lang->line('lang_add_bid_cannot_bid');
				exit(json_encode($output));
			}

			$output['response'] 	= $this->database->_insert_to_table('tbl_bids',$data);
			if($datas['settings'][0]['email_notifications'] === '1'){
				$this->email_op->_user_email_notification('place-bid',$data);
			}
			exit(json_encode($output));
		}
		else
		{
			$data= array(
				'listing_id' =>$this->input->post('bid_listing_id'),
				'listing_type' =>$this->input->post('bid_listing_type'),
				'bidder_id' =>$this->input->post('bid_bidder_id'),
				'owner_id'=>$this->input->post('bid_owner_id'),
				'bid_amount'=>$this->input->post('bid_amount'),
				'bid_status '=>1,
				'date'=>date('Y-m-d H:i:s')
			);

			$output['response'] 	= $this->database->_insert_to_table('tbl_bids',$data);
			if($datas['settings'][0]['email_notifications'] === '1'){
				$this->email_op->_user_email_notification('place-bid',$data);
			}
			exit(json_encode($output));
		}

		$output['response'] 		= $this->lang->line('lang_add_offer_went_wrong');
		exit(json_encode($output));
	}


	/*Add Offer*/
	public function add_offer(){
		$output['token']       = $this->security->get_csrf_hash();
		header('Content-Type: application/json');

		$datas = self::$data;
		$status 				= 	0;
		$listing_data         	=   $this->database->_get_row_data('tbl_listings',array('id'=>$this->input->post('offer_listing_id'),'listing_type'=>$this->input->post('offer_listing_type')));

		if(empty($listing_data[0]['website_minimumoffer'])){
			$output['response'] 		= $this->lang->line('lang_add_offer_invalid');
			exit(json_encode($output));
		}

		if(floatval($listing_data[0]['website_minimumoffer']) < floatval ($this->input->post('offer_amount'))) {

			$data= array(
				'listing_id' =>$this->input->post('offer_listing_id'),
				'listing_type' =>$this->input->post('offer_listing_type'),
				'customer_id' =>$this->input->post('customer_id'),
				'owner_id'=>$this->input->post('listing_owner_id'),
				'offer_amount'=>$this->input->post('offer_amount'),
				'offer_msg'=>$this->input->post('offer_msg'),
				'offer_status '=>$status,
				'date'=>date('Y-m-d H:i:s')
			);

			$this->form_validation->set_data($data);
			$this->form_validation->set_rules('offer_amount', 'Offer Amount', 'required|numeric|trim|xss_clean');
			$this->form_validation->set_rules('offer_msg', 'Offer Message', 'trim|xss_clean');

			if ($this->form_validation->run()){
				$data = html_escape($this->security->xss_clean($data));
				$output['response'] 		= $this->database->_insert_to_table('tbl_offers',$data);

				if($datas['settings'][0]['email_notifications'] === '1'){
					$this->email_op->_user_email_notification('place-offer',$data);
				}

				exit(json_encode($output));
			}
			else
			{
				$output['response'] 		= $this->lang->line('lang_add_offer_great').' '.$listing_data[0]['website_minimumoffer'];
				exit(json_encode($output));
			}
		}

		$output['response'] 		= $this->lang->line('lang_add_offer_went_wrong');
		exit(json_encode($output));
	}

	/*Mark as delivered */
	public function markAsDelivered(){
		$datas = self::$data;
		$uploadProof = "";
		if (!empty($_FILES['uploadProof']['name'])) {
			if ($this->security->xss_clean($_FILES['uploadProof']['name'], TRUE) === TRUE) {
				$uploadProof = $this->upload__files('uploadProof');
			}
		}

		$this->create_history($this->input->post('contract_id'),5,html_escape($this->input->post('messagetoBuyer',true)),$uploadProof);
		$this->change_contract_status($this->input->post('contract_id'),5);
		if($datas['settings'][0]['email_notifications'] === '1'){
			$this->email_op->_user_email_notification('mark-delivered',$this->input->post('contract_id'));
		} 
		redirect($this->session->userdata('url'));
		return;
	}

	/*Mark as Accepted */
	public function markAsAccepted(){
		$datas = self::$data;
		$this->create_history($this->input->post('contract_id'),4,'','');
		$this->change_contract_status($this->input->post('contract_id'),4);
		$invoice_id = $this->database->_get_single_data('tbl_contracts',array('contract_id'=>$this->input->post('contract_id')),'invoice_id');
		$this->_change_invoice_status($invoice_id,4);
		if($this->session->userdata('user_id') === '1' && $this->session->userdata('user_level') === '0'){
			$this->database->_update_to_table('tbl_disputes',array('status'=>1), array('contract_id'=>$this->input->post('contract_id')));
		}
		if($datas['settings'][0]['email_notifications'] === '1'){
			$this->email_op->_user_email_notification('mark-accepted',$this->input->post('contract_id'));
		} 
		redirect($this->session->userdata('url'));
		return;
	}

	/* Request a Revision */
	public function requestaRivision(){
		$datas = self::$data;
		$this->create_history($this->input->post('contract_id'),6,html_escape($this->input->post('messagetoBuyer',true)),'');
		$this->change_contract_status($this->input->post('contract_id'),6);
		if($datas['settings'][0]['email_notifications'] === '1'){
			$this->email_op->_user_email_notification('mark-revision',$this->input->post('contract_id'));
		} 
		redirect($this->session->userdata('url'));
		return;
	}

	/* Cancel Contract */
	public function requestaCancel(){
		$datas = self::$data;
		$this->create_history($this->input->post('contract_id'),3,html_escape($this->input->post('messagetoBuyer',true)),'');
		$this->change_contract_status($this->input->post('contract_id'),3);
		if($datas['settings'][0]['email_notifications'] === '1'){
			$this->email_op->_user_email_notification('cancel-contract',$this->input->post('contract_id'));
		} 
		redirect($this->session->userdata('url'));
		return;
	}

	/* Cancel Contract Admin*/
	public function requestaCanceladmin(){
		$datas = self::$data;
		$this->create_history($this->input->post('contract_id'),7,'BY ADMIN : '.html_escape($this->input->post('messagetoBuyer',true)),'');
		$this->change_contract_status($this->input->post('contract_id'),7);
		$invoice_id 	= $this->database->_get_single_data('tbl_contracts',array('contract_id'=>$this->input->post('contract_id')),'invoice_id');
		$this->_change_invoice_status($invoice_id,3);
		$this->database->_update_to_table('tbl_disputes',array('status'=>1), array('contract_id'=>$this->input->post('contract_id')));
		if($datas['settings'][0]['email_notifications'] === '1'){
			$this->email_op->_user_email_notification('accept-cancel',$this->input->post('contract_id'));
		} 
		redirect($this->session->userdata('url'));
		return;
	}

	/* Cancel Contract Admin*/
	public function escrow_cancel_manual($id){
		$datas = self::$data;
		$listing_id     = $this->database->_get_row_data('tbl_contracts',array('invoice_id'=>$id,'contract_method'=>'escrow'));
		$this->change_contract_status($listing_id[0]['contract_id'],7);
		$invoice_id 	= $this->database->_get_single_data('tbl_contracts',array('contract_id'=>$listing_id[0]['contract_id']),'invoice_id');
		$this->_change_invoice_status($invoice_id,2);
		$this->database->_update_to_table('tbl_disputes',array('status'=>1), array('contract_id'=>$listing_id[0]['contract_id']));
		redirect($this->session->userdata('url'));
		return;
	}

	/* Cancel Request Accept */
	public function acceptCancelreq($contract_id){
		if(!empty($contract_id)){
			$output['token']       = $this->security->get_csrf_hash();
			header('Content-Type: application/json');
			$datas = self::$data;
			$this->create_history($contract_id,7,'','');
			$this->change_contract_status($contract_id,7);
			$invoice_id 	= $this->database->_get_single_data('tbl_contracts',array('contract_id'=>$contract_id),'invoice_id');
			$this->_change_invoice_status($invoice_id,3);
			if($datas['settings'][0]['email_notifications'] === '1'){
				$this->email_op->_user_email_notification('accept-cancel',$contract_id);
			} 
			$output['response'] 		= true;
			exit(json_encode($output)); 
			redirect($this->session->userdata('url'));
			return;
		}

		$output['response'] 		= false;
		exit(json_encode($output));
	}

	/* Cancel Request Reject */
	public function rejectCancelreq($contract_id){
		if(!empty($contract_id)){
			$datas = self::$data;
			$this->create_history($contract_id,8,'','');
			$this->change_contract_status($contract_id,8);
			if($datas['settings'][0]['email_notifications'] === '1'){
				$this->email_op->_user_email_notification('reject-cancel',$contract_id);
			}
			$output['response'] 		= true;
			exit(json_encode($output)); 
			redirect($this->session->userdata('url'));
			return;
		}

		$output['response'] 		= false;
		exit(json_encode($output));
	}

	/* Raise a dispute */
	public function raisedaDispute($contract_id){
		if(!empty($contract_id)){
			$datas = self::$data;
			$this->create_history($contract_id,9,'','');
			$this->change_contract_status($contract_id,9);
			$contract_data = $this->database->_get_row_data('tbl_opens',array('id'=>$contract_id));
			if(!empty($contract_data)){
				$this->database->_insert_to_table('tbl_disputes',array('contract_id'=>$contract_id,'seller_id'=>$contract_data[0]['owner_id'],'buyer_id'=>$contract_data[0]['customer_id'],'status'=>0));

				if($datas['settings'][0]['email_notifications'] === '1'){
					$this->email_op->_user_email_notification('raised-dispute',$contract_id);
				} 
			}
			$output['response'] 		= true;
			exit(json_encode($output)); 
			redirect($this->session->userdata('url'));
			return;
		}

		$output['response'] 		= false;
		exit(json_encode($output));
	}

	/*withdrawal request*/
	public function request_withdraw(){
		$this->database->_create_withdrawal();
	}

	/*Domains Page*/
	public function domains(){
		$data = self::$data;
		$data['sponsoredAds']		= 	$this->database->_get_specific_listing('sponsored','domain');
		$data['slider_name']		= 	'featured-slider';
		$data['slider_feat_name']	= 	'feature-active';
		$data['type']				= 	'domain';
		$data['featuredDomains']	=	$this->database->_get_selected_listing_types('date',0,RESULTS_PER_COLUMN,array('tbl_listings.listing_type'=>'domain'));
		$data['soldDomains']		=	$this->database->_get_selected_listing_types('date',1,RESULTS_PER_COLUMN,array('tbl_listings.listing_type'=>'domain'));
		$data['endingSoon']			=	$this->database->_get_auction_ending_soon('domain');
		$data = html_escape($this->security->xss_clean($data));
		$data['ads']                =   $this->database->_get_row_data('tbl_ads',array('id'=>1));
		$this->load->view('main/domains',$data);
	}

	/*Websites Page*/
	public function websites(){
		$data = self::$data;
		$data['sponsoredAds']		= 	$this->database->_get_specific_listing('sponsored','website');
		$data['slider_name']		= 	'featured-slider';
		$data['slider_feat_name']	= 	'feature-active';
		$data['type']				= 	'website';
		$data['featuredDomains']	=	$this->database->_get_selected_listing_types('date',0,RESULTS_PER_COLUMN,array('tbl_listings.listing_type'=>'website'));
		$data['soldDomains']		=	$this->database->_get_selected_listing_types('date',1,RESULTS_PER_COLUMN,array('tbl_listings.listing_type'=>'website'));
		$data['endingSoon']			=	$this->database->_get_auction_ending_soon('website');
		$data = html_escape($this->security->xss_clean($data));
		$data['ads']                =   $this->database->_get_row_data('tbl_ads',array('id'=>1));
		$this->load->view('main/websites',$data);
	}

	/*App Page*/
	public function apps(){
		$data = self::$data;
		$data['sponsoredAds']		= 	$this->database->_get_specific_listing('sponsored','app');
		$data['slider_name']		= 	'featured-slider-app';
		$data['slider_feat_name']	= 	'feature-active-app';
		$data['type']				= 	'app';
		$data['featuredDomains']	=	$this->database->_get_selected_listing_types('date',0,RESULTS_PER_COLUMN,array('tbl_listings.listing_type'=>'app'),'all');
		$data['soldDomains']		=	$this->database->_get_selected_listing_types('date',1,RESULTS_PER_COLUMN,array('tbl_listings.listing_type'=>'app'),'all');
		$data['endingSoon']			=	$this->database->_get_auction_ending_soon('app');
		$data = html_escape($this->security->xss_clean($data));
		$data['ads']                =   $this->database->_get_row_data('tbl_ads',array('id'=>1));
		$this->load->view('main/apps',$data);
	}


	/*Accounts Page*/
	public function accounts($platfrom='',$page=0){
		$data = self::$data;

		if(!empty($platfrom)){
			$this->session->set_userdata('platfrom_arr', array('extension'=>$platfrom));
			$this->session->set_userdata('platfrom', $platfrom);
		}
		else
		{
			$this->session->unset_userdata('platfrom');
			$this->session->unset_userdata('platfrom_arr');
		}

		$platfrom_arr = array();
		if(!empty($this->session->userdata('platfrom_arr'))){
			$platfrom_arr = $this->session->userdata('platfrom_arr');
		}

		$data['featuredAccounts']	= $this->database->_get_telegram_data($platfrom_arr,RESULTS_ACCOUNT_PAGE,false,0);
		$data['platform_list']		= $this->database->_get_row_data('tbl_platform_list',array('status'=>1));

		$data['type']				= 	'account';
		$data = html_escape($this->security->xss_clean($data));
		$data['ads']                =   $this->database->_get_row_data('tbl_ads',array('id'=>1));
		$data["links"] 				= 	$this->accounts_pagination_loader($platfrom_arr,$page);
		$this->load->view('main/accounts',$data);
	}

	/*Accounts Pag*/
	public function accounts_pag($page=0){
		$data = self::$data;

		$platfrom_arr = array();
		if(!empty($this->session->userdata('platfrom_arr'))){
			$platfrom_arr = $this->session->userdata('platfrom_arr');
		}

		$data['featuredAccounts']	= $this->database->_get_telegram_data($platfrom_arr,RESULTS_ACCOUNT_PAGE,false,$page);
		$data["links"] 				= $this->accounts_pagination_loader($platfrom_arr,$page);
		$response 					= $this->load->view('main/add-ons/channels',$data, TRUE);
		$output['response'] 		= $response;
		$output['token'] 			= $this->security->get_csrf_hash();
		header('Content-Type: application/json');
		exit(json_encode($output));
	}

	/*Accounts Pagination loader*/
	public function accounts_pagination_loader($data=array(),$page){
		$config = array();
		$config["base_url"] 					= '#';
		$config["total_rows"] 					= $this->database->_get_telegram_data($data,RESULTS_ACCOUNT_PAGE,true,$page);
		$config["per_page"] 					= 4;
		$config['use_page_numbers'] 			= TRUE;

		$config['num_tag_open'] 				= '<li class="ripple-effect">';
		$config['num_tag_close'] 				= '</li>';
		$config['cur_tag_open'] 				= '<li><a class="ripple-effect current-page">';
		$config['cur_tag_close']				= '</a></li>';
		$config['prev_tag_open'] 				= '<li class="pagination-arrow">';
		$config['prev_tag_close'] 				= '</li>';
		$config['first_tag_open'] 				= '<li class="ripple-effect">';
		$config['first_tag_close']				= '</li>';
		$config['last_tag_open'] 				= '<li class="ripple-effect">';
		$config['last_tag_close'] 				= '</li>';

		$config['prev_link'] 					= '<i class=" mdi mdi-chevron-left"></i>';
		$config['prev_tag_open'] 				= '<li class="pagination-arrow">';
		$config['prev_tag_close'] 				= '</li>';

		$config['next_link']		 			= '<i class=" mdi mdi-chevron-right"></i>';
		$config['next_tag_open'] 				= '<li class="pagination-arrow">';
		$config['next_tag_close'] 				= '</li>';

		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}

	/*Trending Ads*/
	public function loadTrendingAds(){
		$data = self::$data;
		$data['recentlyAdded'] 					= 	$this->database->_get_selected_listing_types('date','',RESULTS_PER_HOMEPAGE);
		$data['popularAdded'] 					= 	$this->database->_get_selected_listing_types('views','',RESULTS_PER_HOMEPAGE);
		$data['soldDomains'] 					= 	$this->database->_get_selected_listing_types('date',1,RESULTS_PER_HOMEPAGE);

		$data 									= 	html_escape($this->security->xss_clean($data));
		$response								=	$this->load->view('main/add-ons/featured-domains',$data,TRUE);
		$data['response'] 						= 	$response;
		$data['token'] 							= 	$this->security->get_csrf_hash();

		header('Content-Type: application/json');
		exit(json_encode($data));
	}


	/*Load Auction Listings*/
	public function loadAuctions(){
		$data = self::$data;
		$data['auctions'] 						= 	$this->database->_get_auction_data(array('tbl_listings.listing_option'=>'auction'),AUCTION_HOMEPAGE_RESULTS,false,false,0);
		$data['ending'] 						= 	$this->database->_get_auction_data(array('tbl_listings.listing_option'=>'auction'),AUCTION_HOMEPAGE_RESULTS,true,false,0,'',true);
		$data['sold'] 							= 	$this->database->_get_auction_data(array('tbl_listings.sold_status'=>'1'),AUCTION_HOMEPAGE_RESULTS,false,false,0);

		$data 									= 	html_escape($this->security->xss_clean($data));
		$response								=	$this->load->view('main/add-ons/all-bids',$data,TRUE);
		$data['response'] 						= 	$response;
		$data['token'] 							= 	$this->security->get_csrf_hash();

		header('Content-Type: application/json');
		exit(json_encode($data));
	}

	/*Exsting listing check*/
	public function CheckListingExistsDomainWise(){
		return $this->database->CheckListingExistsDomainWise();
	}

	/*History records insertion*/
	public function create_history($contract_id,$status,$remarks,$uploads){
		$data = array(
			'status' =>$status,
			'contract_id' => $contract_id,
			'remarks' => $remarks,
			'uploads' => $uploads,
			'user' => $this->session->userdata('user_id')
		);
		$data = html_escape($this->security->xss_clean($data));
		return $this->database->_insert_to_table('tbl_history',$data);
	}

	/*Change Delivery Dates*/
	public function change_delivery_date($contract_id,$status){
		$listing    = $this->database->_get_row_data('tbl_opens',array('id'=>$contract_id,'status'=>$status));
		$data = array(
			'delivery_time' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . " + ".$listing[0]['delivery']." day"))
		);
		return $this->database->_update_to_DB('tbl_opens',$data,$contract_id);
	}

	/*Change Contract Status*/
	public function change_contract_status($contract_id,$status){
		$percentage = 0;
		if(!empty($status)){
			switch ($status) {
				case '0':
				$percentage = 0;
				break;
				case '1':
				$percentage = 10;
				break;
				case '2':
				$percentage = 10;
				break;
				case '3':
				$percentage = 20;
				break;
				case '4':
				$percentage = 100;
				break;
				case '5':
				$percentage = 75;
				break;
				case '6':
				$percentage = 60;
				break;
				case '7':
				$percentage = 100;
				break;
				case '8':
				$percentage = 75;
				break;
				case '9':
				$percentage = 80;
				break;
				default:
				return ;
			}
		}

		$data = array(
			'status' => $status,
			'date'=>date('Y-m-d H:i:s'),
			'percentage'=>$percentage
		);
		return $this->database->_update_to_DB('tbl_opens',$data,$contract_id);
	}

	/*Change invoice status*/
	public function _change_invoice_status($invoice_id,$status){
		$data = array(
			'status' => $status,
			'updated'=>date('Y-m-d H:i:s')
		);
		return $this->database->_update_to_table('tbl_invoices',$data,array('invoice_id'=>$invoice_id));
	}

	/*partition in to seperate arrays*/
	public function partition( $list, $p ) {
		$listlen = count( $list );
		$partlen = floor( $listlen / $p );
		$partrem = $listlen % $p;
		$partition = array();
		$mark = 0;
		for ($px = 0; $px < $p; $px++) {
			$incr = ($px < $partrem) ? $partlen + 1 : $partlen;
			$partition[$px] = array_slice( $list, $mark, $incr );
			$mark += $incr;
		}
		return $partition;
	}

	/*Find and mark as completed all pendings*/
	public function markAsCompletedAuto($manual=false){
		$data = $this->database->_markAsCompletedAuto();
		if(!empty($data)){
			foreach ($data as $key) {
				$this->create_history($key['contract_id'],4,'','');
				$this->change_contract_status($key['contract_id'],4);
				$invoice_id = $this->database->_get_single_data('tbl_contracts',array('contract_id'=>$key['contract_id']),'invoice_id');
				$this->_change_invoice_status($invoice_id,4);
			}
		}

		if($manual){
			return true;
		}
	}

	/*Upload Files */
	public function upload__files($nameBox){
		$this->load->library("upload");
		$this->load->helper("file");
		$config['upload_path'] = FILES_UPLOAD;
		$config['allowed_types'] = 'jpg|png|jpeg|gif|pdf';
		$config['max_size'] = 1048576;
		$this->upload->initialize($config);
		$this->upload->overwrite = false;
		if (!$this->upload->do_upload($nameBox)) {
			$error = array('error' => $this->upload->display_errors('', ''));
			if(isset($error['error'])){
				return 'N/A';
			}
		}
		else
		{
			$image_data = $this->upload->data();
			$upload_image_name = $image_data['file_name'];
			$full_path = $image_data['full_path'];
			if(isset($full_path)){
				return $upload_image_name;
			}
		} 
	}

	public function styles(){
		$data['settings'] = $this->database->_get_row_data('tbl_settings',array('id'=>1));
		$this->load->view('main/includes/custom',$data);
	}

	public function scripts(){
		$data['settings'] = $this->database->_get_row_data('tbl_settings',array('id'=>1));
		$this->load->view('main/includes/script',$data);
	}

	/*view page*/
	public function faqs(){
		$data = self::$data;
		$data['faqs']=   $this->database->_get_row_data('tbl_faq',array());
		
		$this->load->view('main/faqs',$data);
	}



}
