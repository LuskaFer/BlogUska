<!DOCTYPE html>
<html lang="pt-br">

<head>
    
<!-- imports head -->
<?php $this->load->view('imports/imports-site'); ?>
<!-- imports head -->
   
</head>
    
    <body>

        <!-- Conteudo da pagina  -->
          <!-- Page Header-->
        <header class="masthead" style="background-image: url('<?= base_url('assets/img/contact-bg.jpg')?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Me envie um email. ;)</h1>
                            <span class="subheading">Mande qualquer email para testar a configuração do servidor de email</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
            <div class="wrapper_l">
                                <h2>Preencha:</h2>
                            <?php 
                                if($formerror):
                                    echo '<p>'.$formerror.'</p>';
                                endif;
                                echo form_open('pagina/contato');
                                echo form_label('Seu nome:', 'nome');
                                echo form_input('nome', set_value('nome')); 
                                echo form_label('Seu email:', 'email');
                                echo form_input('email', set_value('email'));
                                echo form_label('Assunto:', 'assunto');
                                echo form_input('assunto', set_value('assunto'));
                                echo form_label('Mensagem:', 'mensagem');
                                echo form_textarea('mensagem', set_value('mensagem'));
                                echo form_submit('enviar', 'Envia mensagem ', array('class' => 'botao'));
                                echo form_close();
                            ?>

            </div>                        
        <!-- Main Content-->
        <!-- Conteudo da pagina  -->


<!-- imports head -->
<?php $this->load->view('imports/imports-recursos-site'); ?>
<!-- imports head -->
    
</body>
    
</html>
