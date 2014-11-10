<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Test extends MY_Controller {
		
		public function index() {
			self::header();
			
			// If they aren't logged in, make them
			if( $this->User->ActiveUser == false ) {
				//redirect('/login', 'refresh');
			}
			
			$qid = 1;
			
			if( isset( $_GET[ "qid" ] ) && is_numeric( $_GET[ "qid" ] ) ) {
				$qid = intval( $_GET[ "qid" ] );
			}
			
			// Load the question & view
			$QuestionData = $this->Question->get( $qid );
			get_instance()->load->view( 'test', array( "question" => $QuestionData ) );
			
			// Load the footer
			self::footer();
		}
		
	}
	