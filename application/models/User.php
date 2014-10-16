<?php
	
	/*
		Note, this model will interact with users but it WILL NOT CREATE
		AN OBJECT FOR EACH USER. It is not object oriented in the slightest
	*/
	
	class User extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}
		
		function get( $fname, $dob ) {
			$this->db->like( "LOWER(FirstName)", strtolower( $fname ) );
			$this->db->like( "Birthday", $dob );
			$query = $this->db->get( "cnct_users" );
			
			if( $query->num_rows == 0 ) {
				return false;
			} elseif( $query->num_rows > 1 ){
				return 2; // "2" many results, haha
			} else {
				return array_pop( $query->result() );
			}
		}
		
		// Sets a user auth key and returns it, destroys old sessions
		function makeAuthKey( $uid ) {
			$authKey = md5( rand() . rand() );
			$this->db->update( "cnct_users", array( "SessionKey" => $authKey ) );
			return $authKey;
		}
		
	}
	
?>