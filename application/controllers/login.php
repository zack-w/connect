<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Login extends MY_Controller {

		public function index() {
			self::header();
			
			if( isset( $_POST[ "fname" ] ) && isset( $_POST[ "month" ] ) && isset( $_POST[ "day" ] ) ) {
				$firstName = $_POST[ "fname" ];
				$bdayDay = intval( $_POST[ "day" ] );
				$bdayMonth = intval( $_POST[ "month" ] );
				
				// You must enter at least 2 characters
				if( 2 > strlen( $firstName ) ) {
					// Load the question & view
					$this->load->view( 'login', array( "error" => "Invalid first name entered." ) );
				} else {
					$tempUser = $this->User->get( $_POST[ "fname" ], $bdayMonth . "/" . $bdayDay . "/" );
					
					if( $tempUser == false ) {
						$this->load->view( 'login', array( "error" => "You could not be found. Please enter your full legal name." ) );
					} elseif( is_numeric( $tempUser ) && $tempUser == 2 ) {
						$this->load->view( 'login', array( "error" => "Multiple people found. Please enter your full legal name." ) );
					} else {
						// Load the question & view
						$this->User->localLogin( $tempUser->ID );
						$this->load->view( 'home', array( "user" => $tempUser ) );
					}
				}
			} else {
				// Load the question & view
				$this->load->view( 'login' );
			}
			
			// Load the footer
			self::footer();
		}
		
		public function logout() {
			$this->User->logout();
			$this->index();
		}
		
	}
	