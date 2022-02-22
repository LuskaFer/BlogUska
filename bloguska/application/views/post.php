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
        <header class="masthead" style="background-image: url('assets/img/about-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h2><?php echo $not_titulo; ?></h2>
                            <?php echo $not_descricao; ?>

                            <h1>Mais detalhes</h1>
                            <span class="subheading">Informações do Trabalho:</span>
                            <img src ="<?php echo base_url('assets/uploads/'.$not_imagem); ?>" alt="<?php echo $not_titulo; ?>" />

                        </div>
                    </div>
                </div>
            </div>
        </header>



        
<!-- imports head -->
<?php $this->load->view('imports/imports-recursos-site'); ?>
<!-- imports head -->
</body>

</html>
