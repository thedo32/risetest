<?php
class Mwisata extends CI_Model {

    public function __construct() {
        parent::__construct();
       
        $this->load->database();  // Load the database library
    }

    // Add news to the database
    public function add_wisata($data) {
        return $this->db->insert('wisata', $data);
    }

    // Get news by ID
     public function get_wisata($id) {
        $query = $this->db->get_where('wisata', array('id' => $id));
        return $query->row(); // Fetch the row as an object
    }

	// Get news by slug
     public function get_wisata_view($slug) {
		$query = $this->db->get_where('wisata', array('slug' => $slug));
        return $query->row(); // Fetch the row as an object
    }

    // Update news in the database
    public function edit_wisata($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('wisata', $data);
    }

    // Delete news from the database
    public function delete_wisata($id) {
        $this->db->where('id', $id);
        return $this->db->delete('wisata');
    }

    // Get total number of news
    public function get_total_wisata() {
        return $this->db->count_all('wisata');
    }

    // Get news with pagination
    public function get_wisata_wisata($limit, $offset) {
		$this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('wisata');
        return $query->result_array();
    }

	
}
