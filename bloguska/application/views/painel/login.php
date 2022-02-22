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
            <div class="logo"> <img src="<?= base_url('assets/img/iconefogo.png')?>" alt=""> </div>
            <div class="text-center mt-4 name"> Luskaferland </div>
                
            
            
            <form class="p-5 mt-5" method="post" id="backbala">
            <h2><?php echo $h2; ?></h2>
                <?php 

                    if($msg = get_msg()):
                       echo '<div class="msg-box2">'.$msg.'</div>'; 
                    endif;
                    echo form_open();
                    echo form_label('<h3>User:</h3>', 'login');
                    echo form_input('login', set_value('login'), array('autofocus' => 'autofocus'));
                    echo form_label('<h3>Senha:</h3>', 'senha');
                    echo form_password('senha');
                    echo form_submit('enviar', 'Fazer login', array('class' => 'botao'));
                    echo form_close();

                ?>
            </form>
            <div class="text-center fs-6"> <a href="#">Esqueceu a senha?</a> ou <a href="#">Criar User</a> </div>
        </div>
        <!-- Conteudo da pagina  -->
    
    </body>

<!-- imports head -->
<?php $this->load->view('imports/imports-recursos'); ?>
<!-- imports head -->

    
</html>