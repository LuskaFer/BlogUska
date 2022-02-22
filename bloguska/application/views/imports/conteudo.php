   
    <!--Conteudo-->
       <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    <?php 
                    if($trabalhos = $this->trabalho->get(3)):
                        foreach($trabalhos as $linha):
                            ?>
                            <li>
                                <img src="<?php echo base_url('assets/uploads/'.$linha->imagem); ?>" alt="" />
                                <h2 class="post-title"><?php echo to_html($linha->titulo); ?></h2>
                                <p><h3 class="post-subtitle"><?php echo resumo_post($linha->descricao); ?>...</h3>
                                <a href="<?php echo base_url('post/'.$linha->id); ?>">Leia mais &raquo;</a>
                                </p>
                            </li>
                            <?php
                        endforeach;
                    else:
                        echo '<p>Nenhum trabalho cadastrado!</p>';
                    endif;
                    ?>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <!-- <div class="post-preview">
                        <a href="post.php">
                            <h2 class="post-title">a</h2>
                            <h3 class="post-subtitle">a</h3>
                        </a>
                        <p class="post-meta">
                            a
                            <a href="#!">a</a>
                            a
                        </p>
                    </div> -->
      
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="<?= base_url('arruma');?>">Mais Trabalhos →</a></div>
                </div>
            </div>
        </div>
    <!--Conteudo-->