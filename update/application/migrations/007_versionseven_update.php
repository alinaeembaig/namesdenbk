<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Versionseven_update extends CI_Migration {

	public function up()
	{
		$this->db->update('tbl_payment_settings', array('fields'=>'{"status":"Stripe status","password":"Stripe Publishable key","signature":"Stripe Secret","icon":"Stripe Icon URL","sandbox":"Sandbox Mode "}'), array('paymentgateway_id'=>'Stripe'));
	}

	public function down()
	{

	}
}