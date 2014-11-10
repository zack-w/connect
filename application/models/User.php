<?php
	
	/*
		Note, this model will interact with users but it WILL NOT CREATE
		AN OBJECT FOR EACH USER. It is not object oriented in the slightest
	*/
	
	/*
		User.get( firstName, DOB ) - Gets a user by their name and DOB
		User.makeAuthKey( UserID ) - Creates an auth key for the user, returns the auth key
		User.localAuth() - Looks at the person's auth key and returns the DB row for them
		User.localLogin( UserID ) - Logs the current user into the account specified
	*/
	
	class User extends CI_Model {
		
		public $ActiveUser = false;
		
		function __construct() {
			parent::__construct();
		}
		
		// Gets
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
		
		function makeAuthKey( $uid ) {
			$authKey = md5( rand() . rand() );
			$this->db->where( "ID", $uid );
			$this->db->update( "cnct_users", array( "SessionKey" => $authKey ) );
			return $authKey;
		}
		
		function localLogin( $uid ) {
			setcookie( "connect_authkey", $this->User->makeAuthKey( $uid ), time() + 3600, "/" );
			$this->User->localAuth();
		}
		
		function logout() {
			if( isset( $this->User->ActiveUser ) ) {
				$this->db->where( "ID", $this->User->ActiveUser->ID );
				$this->db->update( "cnct_users", array( "SessionKey" => "" ) );
			}
			
			setcookie( "connect_authkey", "", 0, "/" );
			redirect('/login', 'refresh');
		}
		
		function localAuth() {
			if( isset( $_COOKIE[ "connect_authkey" ] ) && strlen( $_COOKIE[ "connect_authkey" ] ) >= 30 ) {
				$this->db->where( "SessionKey", $_COOKIE[ "connect_authkey" ] );
				$queryRes = $this->db->get( "cnct_users" );
				$userArr = $queryRes->result();
				$this->ActiveUser = array_pop( $userArr );
			}
		}
		
	}
	
?>