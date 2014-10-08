<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Test extends MY_Controller {

		public function index() {
			self::header();
			
			$qid = 1;
			
			if( isset( $_GET[ "qid" ] ) && is_numeric( $_GET[ "qid" ] ) ) {
				$qid = intval( $_GET[ "qid" ] );
			}
			
			// Load the question & view
			$QuestionData = $this->Question->get( $qid );
			$this->load->view( 'test', array( "question" => $QuestionData ) );
			
			// Load the footer
			self::footer();
		}
		
	}
	