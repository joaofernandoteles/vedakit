<?php

require_once 'assets/include/config.php';

$conexao = new conexao();
$con = $conexao->conecta();

?>
<!DOCTYPE html>
<html lang="pt-br" class="h-100">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Alsite DevTeam">

    <title>VEDAKIT</title>
    <link rel="shortcut icon" href="./assets/img/logo.jpg">

    <link rel="stylesheet" href="assets/css/app.bc1a9c213d6824afeb4314c2fad55641.css">

    <link rel="stylesheet" type="text/css" href="//site-assets.fontawesome.com/releases/v6.1.2/css/all.css">


    <!-- build:css -->
    <link href="assets/css/app.css" rel="stylesheet">
    <!-- endbuild -->

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.15.8/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.8/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.8/dist/js/uikit-icons.min.js"></script>

</head>

<style>
    @media (max-width: 766px) {

        .div_produtos {
            padding: 25px !important;
        }

    }

    .div_foto {
        padding: 30px;
        height: 160px;
    }

    .div_texto {
        display: flex !important;
        width: 100% !important;
        height: 100px !important;
        flex-direction: column !important;
        justify-content: center !important;
        padding: 0px 25px;
    }

    #destaques {
        padding: 110px 0;
    }

    .div_produtos {
        padding: 10px;
    }
</style>

<body class="d-flex flex-column h-100">

    <div role="main" class="flex-shrink-0">

        <?php include 'header.php'; ?>

        <?php include 'banner.php'; ?>

    </div>

    <section id='destaques'>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="section-title text-center">
                        <h2>NOSSOS PRODUTOS</h2>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">

                <?php
                $query = $con->prepare('CALL Proc_S_Produto');
                $query->execute();
                $res = $query->fetchAll(PDO::FETCH_OBJ);
                $query->closeCursor();
                foreach ($res as $res) {
                ?>

                    <div class="col-12 col-md-3 text-center div_produtos">
                        <div class="card">
                            <div class="row card-body">
                                <div class="div_foto">
                                    <img src="./adm/assets/img/produto/<?= $res->Imagem ?>" style="height: 100%;">

                                </div>

                                <div class="div_texto">
                                    <h5><?= $res->Nome ?></h5>
                                </div>

                                <p><?= $res->Codigo ?></p>
                            </div>


                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>


    <script src="assets/js/app.bc1a9c213d6824afeb4314c2fad55641.js"></script>


    <script>

    </script>

</body>

</html>