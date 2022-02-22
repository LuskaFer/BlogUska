<!DOCTYPE html>
<html lang="pt-br">

<head>
    
<!-- imports head -->
<?php $this->load->view('imports/imports-site'); ?>
<script type="text/javascript" src="<?= base_url('assets/js/tester.js') ?>"></script>

<!-- imports head -->
<style>
 #resultado{
     color: yellow;
 }   

</style>
</head>
    
<body onload="calcular()">

        <!-- Conteudo da pagina  -->
        <!-- Page Header-->
        <header class="masthead" style="background-image:url('<?= base_url('assets/img/home-bg.jpg')?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1> - Luskafer - </h1>
                            <span class="subheading">Uma quantidade significativa de biruleibes e tudo mais que eu quiser...</span>
                            
                            <h2> - TESTADOR DE JS COM VALOR DINAMICO - </h2>
                            <select onchange="calcular();" name="cars" id="num2">
                                <option value="0">A vista no debito</option>
                                <option value="6">Parcelado ate 6x</option>
                                <option value="7">Parcelado mais de 6x</option>

                            </select>
                            <h1>
                                Valor final do curso é R$:
                                    <span id="resultado"></span>
                                </h1>

                            <!-- <h1>"O valor do curso é: " <span type="text"  id="num1"></span></h1> -->
                            <!-- <input type="text" id="num1" onchange="calcular();" /> -->
                            <!-- <input type="text" id="num2" onchange="calcular();" /> -->
                            <span id="resultado"></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Conteudo da pagina  -->








<!-- imports head -->
<?php $this->load->view('imports/imports-recursos-site'); ?>
<!-- imports head -->


    
</body>

</html>
