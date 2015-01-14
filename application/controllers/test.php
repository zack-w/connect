<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Test extends MY_Controller {
		
		public function index() {
			self::header();
			
			// If they aren't logged in, make them
			if( $this->User->ActiveUser == false ) {
				redirect('/login', 'refresh');
			}
			
			$qid = ( $this->User->ActiveUser->Progress + 1 );
			
			// Load the question & view
			$QuestionData = $this->Question->get( $qid );
			
			if( $QuestionData == false ) {
				get_instance()->load->view( 'test_complete' );
			} else {
				$Options = $this->Option->getQuestionOptions( $qid );
				
				get_instance()->load->view( 'test', array(
					"question" => $QuestionData,
					"options" => $Options,
					"numq" => $this->Question->numQuestions
				) );
			}
			
			// Load the footer
			self::footer();
		}
		
	}
	