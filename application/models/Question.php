<?php
	
	/* This model will represent a question in the system. */
	
	class Question extends CI_Model {
		
		// This is a constant for consistency
		public $numQuestions = 4;
		
		function __construct() {
			parent::__construct();
		}
		
		function get( $qid ) {
			if( $qid > $this->Question->numQuestions ) {
				return false;
			}
			
			$this->db->where( "ID", $qid );
			$query = $this->db->get( "cnct_questions" );
			return array_pop( $query->result() );
		}
	}

?>