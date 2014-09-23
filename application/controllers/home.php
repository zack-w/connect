<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Home extends MY_Controller {

		public function index() {
			self::header();
			$this->load->view('home');
			self::footer();
		}
		
		public function login() {
			self::header();
			$this->load->view('home');
			self::footer();
		}
		
	}
	