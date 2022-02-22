<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trabalho extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->model('option_model', 'option');
        $this->load->model('trabalho_model', 'trabalho');
        
    }

    public function index(){
        redirect('trabalho/listar', 'refresh');
    }

    public function listar(){
        //verificar se o user ta logado como admin

        verifica_login();


        //carrega a view
        $dados['h2'] = 'Listagem de Trabalhos';
        $dados['tela'] = 'listar';
        $dados['trabalhos'] = $this->trabalho->get();
        $this->load->view('painel/trabalho', $dados);
    }

    public function cadastrar(){
        //verificar se o user ta logado como admin
        verifica_login();

        //regras de validação
        $this->form_validation->set_rules('titulo', 'TÍTULO', 'trim|required');
        $this->form_validation->set_rules('descricao', 'DESCRIÇÃO', 'trim|required');

        //verifica a validação
        if($this->form_validation->run() == FALSE):
            if(validation_errors()):
                set_msg(validation_errors());
            endif;
        else:
            $this->load->library('upload', config_upload());
            if($this->upload->do_upload('imagem')):
                //upload concluido
                $dados_upload = $this->upload->data();
                $dados_form = $this->input->post();
                $dados_insert['titulo'] = to_db($dados_form['titulo']);
                $dados_insert['descricao'] = to_db($dados_form['descricao']);
                $dados_insert['imagem'] = $dados_upload['file_name'];
                //salvar no banco de dados
                if($id = $this->trabalho->salvar($dados_insert)):
                    set_msg('<p>Trabalho registrado com sucesso! </p>');
                    redirect('trabalho/editar/'.$id, 'refresh');
                else:
                    set_msg('<p>Trabalho deu ruim no cadastro! </p>');
                endif;
            else:
                //deu ruim
                $msg = $this->upload->display_errors();
                $msg .= '<p>Permitido arquivos JPG e PNG até 5120KB</p>';
                set_msg($msg);
            endif;
        endif;

        //carrega a view
        $dados['h2'] = 'Cadastro de Trabalhos';
        $dados['tela'] = 'cadastrar';
        $this->load->view('painel/trabalho', $dados);
    }

    public function excluir(){
        //verifica login user
        verifica_login();

        //verifica se foi informado id valido 
        $id = $this->uri->segment(3);
        if($id > 0):
            //id informado, continuar processo exclusao
            if($trabalho = $this-> trabalho->get_single($id)):
                $dados['trabalho'] = $trabalho;
            else:
                set_msg('<p>Trabalho inexistente ! Escolha um trabalho para excluir.</p>');
                redirect('trabalho/listar', 'refresh');
            endif;
        else:
            set_msg('<p>Escolha um trabalho pra excluir!</p>');
            redirect('trabalho/listar', 'refresh');
        endif;
        //regras validação
        $this->form_validation->set_rules('enviar', 'ENVIAR', 'trim|required');

        //verifica a validação
        if($this->form_validation->run() == FALSE):
            if(validation_errors()):
                set_msg(validation_errors());
            endif;
        else:
            $imagem = 'assets/uploads/'.$trabalho->imagem;
            if($this->trabalho->excluir($id)):
                unlink($imagem);
                set_msg('<p>Trabalho excluído com sucesso</p>');
                redirect('trabalho/listar', 'refresh');
            else:
                set_msg('<p>Erro! Nenhum trabalho foi excluído...</p>');
            endif;
        endif;
        
        //carrega a view exclusao
        $dados['h2'] = 'Exclusão de Trabalhos';
        $dados['tela'] = 'excluir';
        $this->load->view('painel/trabalho', $dados);

    }


    public function editar(){
        //verifica login user
        verifica_login();

        //verifica se foi informado id valido 
        $id = $this->uri->segment(3);
        if($id > 0):
            //id informado, continuar processo exclusao
            if($trabalho = $this-> trabalho->get_single($id)):
                $dados['trabalho'] = $trabalho;
            else:
                set_msg('<p>Trabalho inexistente ! Escolha um trabalho para excluir.</p>');
                redirect('trabalho/listar', 'refresh');
            endif;
        else:
            set_msg('<p>Escolha um trabalho pra excluir!</p>');
            redirect('trabalho/listar', 'refresh');
        endif;
        //regras validação
        $this->form_validation->set_rules('titulo', 'TÍTULO', 'trim|required');
        $this->form_validation->set_rules('descricao', 'DESCRIÇÃO', 'trim|required');


        //verifica a validação
        if($this->form_validation->run() == FALSE):
            if(validation_errors()):
                set_msg(validation_errors());
            endif;
        else:
            //começa aq
            $this->load->library('upload', config_upload());
            if(isset($_FILES['imagem']) && $_FILES['imagem']['name'] != ''):
                //foi enviada uma img tenho q fazer upload
                if($this->upload->do_upload('imagem')):
                    //upload foi feito 
                    $imagem_antiga = 'assets/uploads/'.$trabalho->imagem;
                    $dados_upload = $this->upload->data();
                    $dados_form = $this->input->post();
                    $dados_update['titulo'] = to_db($dados_form['titulo']);
                    $dados_update['descricao'] = to_db($dados_form['descricao']);
                    $dados_update['imagem'] = $dados_upload['file_name'];
                    if($this->trabalho->salvar($dados_update)):
                        unlink($imagem_antiga);
                        set_msg('<p>Trabalho alterado com sucesso !</p>');
                        $dados['trabalho']->imagem = $dados_update['imagem'];
                    else:
                        set_msg('<p>ERRO nada foi alterado.../p>');
                    endif;
                else:
                    //erro upload
                    $msg = $this->upload->display_errors();
                    $msg .= '<p>Permitido arquivos JPG e PNG até 5120KB</p>';
                    set_msg($msg);
                endif;
            else:
                //nao foi enviado uma imagem pelo form
                $dados_form = $this->input->post(); 
                $dados_update['titulo'] = to_db($dados_form['titulo']);
                $dados_update['descricao'] = to_db($dados_form['descricao']);
                if($this->trabalho->salvar($dados_update)):
                    set_msg('<p>Trabalho alterado com sucesso !</p>');
                else:
                    set_msg('<p>ERRO nada foi alterado.../p>');
                endif;
            endif;  
        endif;    
        //carrega a view edicao
        $dados['h2'] = 'Edição de Trabalhos';
        $dados['tela'] = 'editar';
        $this->load->view('painel/trabalho', $dados);

    }

}








