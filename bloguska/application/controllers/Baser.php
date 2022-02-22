<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baser extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('baser');
	}

	public function login(){
		echo 'executado método login do controller e passado o parâmetro ';
		echo $this->uri->segment(3);
	}
}
