<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Versionsix_update extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'sender' => array(
                'type' => 'VARCHAR',
                'constraint' => 250,
            ),
            'recipient' => array(
                'type' => 'VARCHAR',
                'constraint' => 250,
            ),
            'timestamp' => array(
                'type' => 'DATETIME'
            ),
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_message_notifications',TRUE);

        
		$this->db->query("ALTER TABLE `tbl_listings` MODIFY `website_startingprice` FLOAT NULL");
		$this->db->query("ALTER TABLE `tbl_listings` MODIFY `website_reserveprice` FLOAT NULL");
		$this->db->query("ALTER TABLE `tbl_listings` MODIFY `website_minimumoffer` FLOAT NULL");
		$this->db->query("ALTER TABLE `tbl_listings` MODIFY `website_buynowprice` FLOAT NULL");
	}

	public function down()
	{

	}
}