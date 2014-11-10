<?php
	
	/* This model will represent a question option in the system. */
	
	class Option extends CI_Model {
		
		function __construct() {
			parent::__construct();
		}
		
		function getQuestionOptions( $qid ) {
			$this->db->where( "QuestionID", $qid );
			$query = $this->db->get( "cnct_options" );
			return $query->result_array();
		}
		
	}

?>