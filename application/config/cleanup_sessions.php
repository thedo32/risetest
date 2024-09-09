<?php
// Load CodeIgniter framework
$path = '/home/kopk8952/public_html/application/config'; // Adjust this path to your CodeIgniter application directory
require_once $path . 'index.php';

// Get database instance
$CI =& get_instance();
$CI->load->database();

// Run the cleanup query
$CI->db->query("DELETE FROM ci_sessions);
?>