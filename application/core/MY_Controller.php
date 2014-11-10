<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class MY_Controller extends CI_Controller {
		
		function __construct() {
			$this->data = "";
			
			// Run the CI_Controller default constructor
			parent::__construct();
			
			// Load the helpers
			$this->load->helper('url');
			
			// Setup the database
			$this->load->database();
			
			// Load the models
			$this->load->model( 'User' );
			$this->load->model( 'Question' );
			$this->load->model( 'Option' );
			
			// Local authentication & stuff
			$this->User->localAuth();
		}
		
		public function header() {
			$this->load->view( "includes/header", $this->data );
		}
		
		public function footer() {
			$this->load->view( "includes/footer", $this->data );
		}
		
	}
