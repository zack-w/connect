<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Test extends MY_Controller {

		public function index() {
			self::header();
			
			// If they aren't logged in, make them
			if( $this->User->ActiveUser == false ) {
				redirect('/login', 'refresh');
			}
			
			// Load the current question
			$qid = ( $this->User->ActiveUser->Progress + 1 );
			$QuestionData = $this->Question->get( $qid );
			
			if( isset($_POST["didanswer"]) ) {
				if( $QuestionData->Type == 1 ) { 
					// Insert their answer
					$data = array(
					   'UserID' => $this->User->ActiveUser->ID,
					   'QuestionID' => $qid,
					   'OptionID' => $_POST["answer"]
					);

					$this->db->insert('cnct_answers', $data);
				} else {
					$Options = $this->Option->getQuestionOptions( $qid );
					
					foreach ($Options as $Option) {
						if ( isset( $_POST[ "answer_" . $Option[ "ID" ] ] ) ){
							$data = array(
								'UserID' => $this->User->ActiveUser->ID,
								'QuestionID' => $qid,
								'OptionID' => $Option[ "ID" ]
							);
							
							$this->db->insert('cnct_answers', $data);
						}
					}
				}
				
				// Change their progress in the DB
				$this->db->where( "ID", $this->User->ActiveUser->ID );
				$this->db->update( "cnct_users", array( "Progress" => $qid ) );
				
				// Update the current question
				$qid = $qid + 1;
				$QuestionData = $this->Question->get( $qid );
			}
			
			// Output the current question
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
	