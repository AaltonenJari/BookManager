<?php
class Books_controller extends CI_Controller {
    function __construct() {
        parent::__construct();
        
        // Load the model to make it available
        // to *all* of the controller's actions
        $this->load->model('Book_model');
    }
    
    public function index($sort_by = 'Id', $sort_order = 'asc') {
        //Initialize session variables
        // Hide error messages
        unset($_SESSION['error']);
        
        $this->display($sort_by, $sort_order);
    }
    
    public function display($sort_by = 'Id', $sort_order = 'asc') {
        // Test if view page exists
        $test_url = APPPATH."/views/Books_view.php";
        if (!file_exists($test_url)) {
            show_404();
        }
        
        // Check if the sort_order parameters is in allowed range
        $sort_order_types = array('asc', 'desc');
        if (!in_array(strtolower($sort_order), $sort_order_types)) {
            $sort_by = 'asc'; // use default
        }
        
        // database fields
        $data['field_names'] = array(
            'Id',
            'Title', 
            'Author',
            'Description'
        );
        // Check if the soer_by parameter is in allowed range
        if (!in_array($sort_by, $data['field_names'])) {
            $sort_by = 'Id'; // use default
        }
        
        // Parameters back to view page
        $data['sort_by'] = $sort_by;
        $data['sort_order'] = $sort_order;
        
        $results = $this->Book_model->search($data['field_names'], $sort_by, $sort_order);
        
        $data['books'] = $results['rows'];
        $data['book_count'] = $results['num_rows'];
        
        $this->load->view('Books_view', $data);
    }
    
    public function manage_books() {
        //Hide the error message
        if(isset($_SESSION['error'])){
            unset($_SESSION['error']);
        }
        
        $Id = $this->input->post('book_id');
        $action = $this->input->post('action');
        
        switch ($action) {
            case "Save":
                $this->update($Id);
                break;
                
            case "Add":
                $this->insert();
                break;
                
            case "Delete":
                $this->delete($Id);
                break;
                
            default:
                $msg = "Tunnistamaton toiminto.";
                $this->session->set_flashdata('error', $msg);
                
                //Back to main display
                $this->display();
                break;
        } // switch
    }
    
    public function update($Id) {
        // If Id is not given, show error message in main view
        if (empty($Id)) {
            $msg = "Book is not selected. Please select one.";
            $this->session->set_flashdata('error', $msg);
            
            // Back to main display
            $this->display();
            return;
        }
        
        $update_data = array(
            'Title' => $this->input->post('book_title'),
            'Author' => $this->input->post('book_author'),
            'Description' => $this->input->post('book_description')
        );
        
        // set validation rules
        $rules = array(
            array('field' => 'book_title',
                'label' => 'Title',
                'rules' => 'callback_verify_update')
        );
        
        // check input data
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == true) {
            // Update row in the database
            $this->Book_model->update($update_data, $Id);
        }
        
        // Back to main display
        $this->display();
    }
    
    public function insert() {
        $insert_data = array(
            'Title' => $this->input->post('book_title'),
            'Author' => $this->input->post('book_author'),
            'Description' => $this->input->post('book_description')
        );
        
        // set validation rules
        $rules = array(
            array('field' => 'book_title',
                'label' => 'Title',
                'rules' => 'callback_verify_update')
        );
        
        // check input data
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == true) {
             // Add new record into database
            $this->Book_model->insert($insert_data);
        }
        
        $this->display();
    }
    
    public function verify_update()
    {
        if (empty($this->input->post('book_title'))) {
            $this->session->set_flashdata('error', 'Book Title must not be empty.');
            return false;
        }
        if (empty($this->input->post('book_author'))) {
            $this->session->set_flashdata('error', 'Book Author must not be empty.');
            return false;
        }
        return true;
    }
    
    
    public function delete($Id) {
        // If Id is not given, show error message in main view
        if (empty($Id)) {
            $msg = "Book is not selected. Please select one.";
            $this->session->set_flashdata('error', $msg);
            
            // Back to main display
            $this->display();
            return;
        }
        
        // Delete row
        $this->Book_model->delete($Id);

        // Back to main display
        $this->display();
    }
}