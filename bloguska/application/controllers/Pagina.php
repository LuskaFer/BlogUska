<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('option_model', 'option');
		$this->load->model('trabalho_model', 'trabalho');
	}

	public function index(){
		$this->load->view('home');
	}

	public function sobre(){
		$this->load->view('sobre');
	}
	
	public function jobs(){
		$this->load->view('jobs');
	}

	public function tester(){
		$this->load->view('tester');
	}

	
	public function contato(){
		$this->load->helper('form');
		$this->load->library(array('form_validation', 'email'));
		//regras de validação do formulário
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('assunto', 'Assunto', 'trim|required');
		$this->form_validation->set_rules('mensagem', 'Mensagem', 'trim|required');
		//verificador de condição
		if($this->form_validation->run() == FALSE):
			$dados['formerror'] = validation_errors();
		else:
			$dados_form = $this->input->post();
			$this->email->from($dados_form['email'], $dados_form['nome']);
			$this->email->to('ti@1234voce.com.br');
			$this->email->subject($dados_form['assunto']);
			$this->email->message($dados_form['mensagem']);
			if($this->email->send()):
				$dados['formerror'] = 'Email enviado com sucesso !';
			else:
				$dados['formerror'] = 'Xi deu ruim ;( ';
			endif;
		endif;
		$this->load->view('contato', $dados);
	}
	
	public function post(){
		if(($id = $this->uri->segment(2)) > 0):
			if($trabalho = $this->trabalho->get_single($id)):
				$dados['not_titulo'] = to_html($trabalho->titulo); 
				$dados['not_descricao'] = to_html($trabalho->descricao); 
				$dados['not_imagem'] = $trabalho ->imagem;
			else:
				$dados['not-titulo'] = 'Trabalho não encontrado....';
				$dados['not-descricao'] = 'Trabalho não encontrado com os parâmetros fornecidos...';
				$dados['not_imagem'] = ''; 
			endif;
		else:
			redirect(base_url(),'refresh');
		endif;
		$this->load->view('post', $dados);

	}

}

