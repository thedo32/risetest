<?php
class Wisata extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Mwisata');
        $this->load->library('pagination');
		$this->load->helper('url');

		$this->load->library('form_validation'); // Load form validation library
        $this->load->helper('form'); // Load form helper
		$this->load->helper('text'); // Load text helper
    }


	//check if user login
	/* private function check_login() {
        if (!$this->session->userdata('status') || $this->session->userdata('status') != 'login') {
            redirect('login'); // Redirect to login page if not logged in
        }
    } 
	*/


    public function add() {
        // Check if form submitted
		 
      if ($this->input->post()) {
            // Form validation rules
            $this->form_validation->set_rules('title', 'Title', 'required|is_unique[wisata.title]');
            $this->form_validation->set_rules('text', 'Text', 'required');

            // If form validation succeeds
            if ($this->form_validation->run() == TRUE) {
                // Get form data

				$slug = url_title($this->input->post('title'), 'dash', TRUE);
                $data = array(
                    'title' => $this->input->post('title'),
                    'slug' => $slug,
                    'text' => $this->input->post('text')
                );

                // Add wisata to database
                $this->Mwisata->add_wisata($data);

				// temporary notification after add success
				$this->session->set_tempdata('add_success','Berita baru berhasil ditambahkan', 15);

                // Redirect to user list page
                redirect('wisata/index');
				
            }
        }

        // Load add user view
		$this->load->view('view_header');
        $this->load->view('vaddwisata');
		$this->load->view('view_footer');
    }

    public function edit($id) {
    // Check if user id is provided
    if (!$id) {
        show_404();
    }

    // Get wisata data by id
    $wisata = $this->Mwisata->get_wisata($id);

    // If wisata not found
    if (!$wisata) {
        show_404();
    }

    // Check if form submitted
    if ($this->input->post()) {
        // Form validation rules

		if ($this->input->post('title') === $wisata->title): 
			$this->form_validation->set_rules('title', 'Title', 'required');
       	else:
		   $this->form_validation->set_rules('title', 'Title', 'required|is_unique[wisata.title]');
		endif;
		$this->form_validation->set_rules('text', 'Text', 'required');

        // If form validation succeeds

        if ($this->form_validation->run() == TRUE) {
            // Get form data
			$slug = url_title($this->input->post('title'), 'dash', TRUE);
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
				'text' => $this->input->post('text')
            );

            // Update wisata in database
            $this->Mwisata->edit_wisata($id, $data);

			// temporary notification after edit success
				$this->session->set_tempdata('edit_success','Berita berhasil diupdate', 15);

            // Redirect to wisata list page
            redirect('wisata/index');
        }
    }

    // Pass wisata data to view
    $data['wisata'] = $wisata;

    // Load edit wisata view
	$this->load->view('view_header');
    $this->load->view('veditwisata', $data);
	$this->load->view('view_footer');
}


    public function delete($id) {
        // Check if wisata id is provided
        if (!$id) {
            show_404();
        }

        // Delete wisata from database
        $this->Mwisata->delete_wisata($id);

        // Redirect to wisata list page
        redirect('wisata/index');
    }

    public function index() {

		 // $this->check_login(); // Check if wisata is logged in

    // Pagination configuration
		$config['base_url'] = base_url('wisata/index');
		$config['total_rows'] = $this->Mwisata->get_total_wisata();
		$config['per_page'] = 6;
		$config['uri_segment'] = 3;

    // Additional pagination settings for better display
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';

		$this->pagination->initialize($config);

    // Get wisata with pagination
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['wisata'] = array(); // Initialize as empty array
		$data['wisata'] = $this->Mwisata->get_wisata_wisata($config['per_page'], $page);
		// Log the fetched data for debugging
		log_message('debug', 'Fetched wisata data: ' . print_r($data['wisata'], true));


    // Load wisata list view
		$this->load->view('view_header');
		$this->load->view('vwisatalist', $data);
		$this->load->view('view_footer');
	}


	// View the wisata 
	public function view($slug = NULL){
        $data['wisata'] = $this->Mwisata->get_wisata_view($slug);

        if (empty($data['wisata']))
        {
                show_404();
        }

        // $data['title'] = $data['wisata_item']['title'];

		$this->load->view('view_header');
        $this->load->view('vwisata', $data);
		$this->load->view('view_footer');
   
	}

}
