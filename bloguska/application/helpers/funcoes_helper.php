<?php 
defined('BASEPATH') OR exit('No direct script acess allowed');

if(!function_exists('set_msg')):
    //seta uma mensagem via session para ser lidada posteriormente 
    function set_msg($msg=NULL){
        $bloguska = & get_instance();
        $bloguska->session->set_userdata('aviso', $msg);
    }
endif;

if(!function_exists('get_msg')):
    //retorna uma mensagem definida pela funcao set_msg
    function get_msg($destroy=TRUE){
        $bloguska = & get_instance();
        $retorno = $bloguska->session->userdata('aviso');
        if($destroy) $bloguska->session->unset_userdata('aviso');
        return $retorno;

    }
endif;

if(!function_exists('verifica_login')):
    //verifica se o usuario esta logado, caso negativo redireciona pra outra pagina
    function verifica_login($redirect='setup/login'){
        $bloguska = & get_instance();
        if($bloguska->session->userdata('logged') != TRUE):
            set_msg('<p>Acesso proibido seu hasker !!! >:I Faça login para acessar.</p>');
            redirect($redirect, 'refresh');
        endif;
        
    }
endif;

if(!function_exists('config_upload')):
    //define configs de upload imagem/arquivo
    function config_upload($path='./assets/uploads', $types='jpg|jpeg|png', $size=5120){
        $config['upload_path'] = $path;
        $config['allowed_types'] = $types;
        $config['max_size'] = $size;
        return $config;    
    }
endif;

if(!function_exists('to_db')):
    //cdofica o html para salvar banc de dados
    function to_db($string=NULL){
        return htmlentities($string);
    } 
endif;

if(!function_exists('to_html')):
    //decodfica o html e remove barras invertida do conteúdo
    function to_html($string=NULL){
        return html_entity_decode($string);
    } 
endif;

if(!function_exists('resumo_post')):
   // gera um texto parcial
    function resumo_post($string=NULL, $tamanho=100){
        $string = to_html($string);
        $string = strip_tags($string);
        $string = substr($string, 0, $tamanho);
        return $string;
    } 
endif;