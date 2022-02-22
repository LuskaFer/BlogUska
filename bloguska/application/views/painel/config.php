<!DOCTYPE html>
<html lang="pt-br">
    
<head>
    
<!-- imports head -->
<?php $this->load->view('imports/imports'); ?>
<!-- imports head -->
   
</head>

    <body>
   
        <!-- Conteudo da pagina  -->
            <div class="wrapper">
                        <form class="p-3 mt-3" method="post" id="backbala">
                        <h2><?php echo $h2; ?></h2>
                            <?php 

                                if($msg = get_msg()):
                                echo '<div class="msg-box">'.$msg.'</div>'; 
                                endif;
                                echo form_open();
                                echo form_label('<h3>Nome para login:<h3>', 'login');
                                echo form_input('login', set_value('login'), array('autofocus' => 'autofocus'));
                                echo form_label('<h3>Email ADMIN:<h3>', 'email');
                                echo form_input('email', set_value('email'));
                                echo form_label('<h3>Senha: (deixe em branco para n alterar)<h3>', 'senha');
                                echo form_password('senha');
                                echo form_label('<h3>Repita a senha:<h3>', 'senha2');
                                echo form_password('senha2');
                                echo form_label('<h3>Titulo site:<h3>', 'nome_d');
                                echo form_input('nome_d', set_value('nome_d')); 
                                echo form_submit('enviar', 'Salvar dados', array('class' => 'botao'));
                                echo form_close();

                            ?>
                        </form>         
            </div>
        <!-- Conteudo da pagina  -->                          
                                
<!-- imports head -->
<?php $this->load->view('imports/imports-recursos'); ?>
<!-- imports head -->

    
</body>

</html>
