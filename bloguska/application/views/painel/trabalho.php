<!DOCTYPE html>
<html lang="pt-br">

<head>
    
<!-- imports head -->
<?php $this->load->view('imports/imports'); ?>
<!-- imports head -->
   
</head>
   

<body>
          
            <!-- Conteudo da pagina  -->
                    <div class="wrapper_l">
                        
                        <form  method="post" id="backbala" enctype='multipart/form-data'>
                            <h2><?php echo $h2; ?></h2>
                                <?php 

                                    if($msg = get_msg()):
                                    echo '<div class="msg-box">'.$msg.'</div>'; 
                                    endif;
                                    switch ($tela):
                                        case 'listar':
                                            if(isset($trabalhos) && sizeof($trabalhos) > 0 ):
                                                ?>
                                                <table>
                                                    <thead>
                                                        <th text-align="left">Título</th>
                                                        <th text-align="right">Ações</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($trabalhos as $linha):
                                                            ?>
                                                            <tr>
                                                                <td class="titulo-trabalho"><?php echo $linha->titulo; ?></td>
                                                                <td text-align="right" class="acoes"><?php echo anchor('trabalho/editar/'.$linha->id, 'Editar'); ?> | 
                                                                    <?php echo anchor('trabalho/excluir/'.$linha->id, 'Excluir'); ?> | <?php echo anchor
                                                                    ('post/'.$linha->id, 'Ver', array('target'=> '_blank')); ?></td>
                                                            </tr>
                                                            <?php
                                                        endforeach;
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <?php
                                            else:
                                                echo '<div class="msg-box"><p>Nenhum Trabalho cadastrado!</p></div>';
                                            endif;
                                            break;
                                        case 'cadastrar': 
                                            echo form_open_multipart();
                                            echo form_label('Título:', 'titulo');
                                            echo form_input('titulo', set_value('titulo'));
                                            echo form_label('Descrição:', 'descricao');
                                            echo form_textarea('descricao', to_html(set_value('descricao')), array('class' => 'editor'));
                                            echo form_label('Imagem do Trabalho:', 'imagem');
                                            echo form_upload('imagem');
                                            echo form_submit('enviar', 'Salvar trabalho', array('class' => 'botao'));
                                            echo form_close();
                                            break;
                                        case 'editar':
                                            echo form_open_multipart();
                                            echo form_label('Título:', 'titulo');
                                            echo form_input('titulo', set_value('titulo', to_html($trabalho->titulo)));
                                            echo form_label('Descrição:', 'descricao');
                                            echo form_textarea('descricao', to_html(set_value('descricao', ($trabalho->descricao))), array('class' => 'editor'));
                                            echo form_upload('imagem');
                                            echo form_submit('enviar', 'Salvar trabalho', array('class' => 'botao'));
                                            echo '<p><small>Imagem Atual:</small><br /><img src="'.base_url('/assets/uploads/'.$trabalho->imagem).'" class="thumb-edicao" /></p>';
                                            echo form_submit('enviar', 'Modificar trabalho', array('class' => 'botao'));
                                            echo form_close();
                                            break;
                                        case 'excluir':
                                            echo form_open_multipart();
                                            echo form_label('Título:', 'titulo');
                                            echo form_input('titulo', set_value('titulo', to_html($trabalho->titulo)));
                                            echo form_label('Descrição:', 'descricao');
                                            echo form_textarea('descricao', to_html(set_value('descricao', ($trabalho->descricao))), array('class' => 'editor'));
                                            echo '<p><small>Imagem:</small><br /><img src="'.base_url('/assets/uploads/'.$trabalho->imagem).'" class="thumb-edicao" /></p>';
                                            echo form_submit('enviar', 'Excluir trabalho', array('class' => 'botao'));
                                            echo form_close();
                                            break;
                                    endswitch;                            
                                ?>
                        </form>
                    </div>                    
           <!-- Conteudo da pagina  -->
        
<!-- imports head -->
<?php $this->load->view('imports/imports-recursos'); ?>
<!-- imports head -->

</body>

</html>
