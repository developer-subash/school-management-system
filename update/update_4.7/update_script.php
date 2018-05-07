<?php
	$CI = get_instance();
	$CI->load->database;
	$CI->load->dbforge();

	// add total_copies,issued_copies columns in book table
    $data = array(
    	'type' 		  => 'payumoney_merchant_key',
    	'description' => ''
    );
    $this->db->insert('settings', $data);

    $data2 = array(
    	'type' 		  => 'payumoney_salt_id',
    	'description' => ''
    );
    $this->db->insert('settings', $data2);
?>
