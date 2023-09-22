<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('max_execution_time', 0);

class Captcha extends CI_Controller {

	function __construct() {
		parent::__construct();
    	$this->load->library('session');
    	$this->load->helper('captcha');
    }

	public function refresh()
    {
        $config = array(
            'img_path'      => 'assets/captcha/',
        	'img_url'       =>  base_url() .'assets/captcha/',
            'img_height' => 30,
            'word_length' => 5,
            'img_width'     => '150',
            'font_size' => 16,
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
        	)
        );

        $captcha = create_captcha($config);
        $this->session->unset_userdata('valuecaptchaCode');
        $this->session->set_userdata('valuecaptchaCode', $captcha['word']);
        exit($captcha['image']);
    }

}