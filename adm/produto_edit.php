<?php $pagina = 'Produto'; ?>

<!DOCTYPE html>
<html lang="en">

<style>
    .div_fotonoticia {
        height: 285px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .img {
        height: 231px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .img img {
        height: 100%;
    }

    .botao {
        height: 32px;
        display: flex;
        flex-direction: row;
        justify-content: center;
    }
</style>

<head>
    <?php include 'head.php'; ?>

    <link rel="stylesheet" href="../dist/ui/trumbowyg.min.css">

</head>

<body class="g-sidenav-show vh-100 bg-gray-100">
    <?php include 'header.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <?php include 'menu_topo.php'; ?>
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h6 class="float-start">Cadastro de Produtos</h6>
                            <p class="text-end m-0">
                                <a href="produto_list.php" class="btn bg-gradient-danger btn-xs py-2 px-3 m-0 icon-btn" title="Adicionar">
                                    <i class="fa fa-arrow-left me-1"></i> voltar
                                </a>
                            </p>
                        </div>
                        <div class="card-body pb-2">
                            <form id="formCadastro">
                                <div class="row">
                                    <div class="col-12 col-md-12 form-group">
                                        <label for="Nome">Nome</label>
                                        <input type="text" name="Nome" id="Nome" class="form-control" maxlength="255" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6 form-group">
                                        <label for="Codigo">Codigo</label>
                                        <input type="text" name="Codigo" id="Codigo" class="form-control" maxlength="255">
                                    </div>
                                    <div class="col-12 col-md-6 form-group">
                                        <label for="IDCategoria">Categoria</label>
                                        <select class="form-control" id="IDCategoria" name="IDCategoria" required>
                                            <option value="" style="display: none;">Selecione</option>
                                            <?php
                                            $query = $con->prepare('CALL Proc_S_Categoria');
                                            $query->execute();
                                            $res = $query->fetchAll(PDO::FETCH_OBJ);
                                            $query->closeCursor();
                                            foreach ($res as $res) {
                                            ?>
                                                <option value="<?= $res->IDCategoria ?>"><?= $res->Nome ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin: 40px 0px;">
                                    <button type="submit" id="salvar" class="btn btn-dark d-block mx-auto px-3 py-2">
                                        <i class="fa-solid fa-floppy-disk me-2"></i>SALVAR
                                    </button>
                                    <input type="hidden" name="IDProduto" id="IDProduto">
                                </div>
                            </form>

                            <div class="row" style="margin: 75px 0px;">
                                <?php
                                $query = $con->prepare('CALL Proc_S_U_ImagemProduto (:IDProduto)');
                                $query->bindValue(':IDProduto', $_GET["IDProduto"]);
                                $query->execute();
                                $res = $query->fetchAll(PDO::FETCH_OBJ);
                                $query->closeCursor();
                                foreach ($res as $res) {
                                ?>
                                    <div class="col-12 col-md-6 form-group">
                                        <div class="div_fotonoticia">
                                            <div class="img">
                                                <img src="./assets/img/produto/<?= $res->Imagem ?>" alt="">
                                            </div>
                                            <div class="botao">
                                                <a href="imgproduto_edit.php?IDImagem=<?= $res->IDImagem ?>" class="btn bg-gradient-info mb-0  btn-sm" title="Editar" style="margin-right: 5px;"><i class="fa-solid fa-pen-to-square font-13"></i></a>

                                                <?php
                                                if ($res->Capa == 1) {
                                                } else { ?>
                                                    <button class="btn bg-gradient-danger mb-0  btn-sm" title="Excluir" onclick="destroy(<?= $res->IDImagem ?>)" style="margin-left: 5px;"><i class="fa-solid fa-trash font-13"></i></button>
                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'js.php'; ?>
    <script>
        $('#formCadastro').validate({
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            errorPlacement: function() {
                return false; //REMOVER MENSAGENS
            },
            submitHandler: function(form) {
                $('#salvar').html('SALVANDO...').attr('disabled', '');

                var formData = new FormData($(form)[0]);
                var option = $('#IDProduto').val() == '' ? 'insert' : 'update';

                $.ajax({
                    type: 'POST',
                    url: 'assets/ajax/produto.php?option=' + option,
                    data: formData,
                    processData: false,
                    contentType: false
                }).done(function(response) {
                    window.location.href = 'produto_list.php';
                });
            }
        });




        function destroy(IDImagem) {
            Swal.fire({
                title: 'Deseja DELETAR esta Foto ?',
                text: '',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, Deletar',
                cancelButtonText: 'Não, Cancelar',
                closeOnConfirm: true,
                closeOnCancel: true
            }).then((result) => {
                if (result.value) {
                    $.post('assets/ajax/imgproduto.php?option=deleteimg', {
                        IDImagem: IDImagem
                    }).done(function() {
                        location.reload();
                    });
                }
            })
        }

    </script>


    <script>
        <?php if (isset($_GET['IDProduto']) && !empty($_GET['IDProduto'])) { ?>

            $.post('assets/ajax/produto.php?option=select', {
                    IDProduto: '<?= $_GET['IDProduto'] ?>'
                })
                .done(function(response) {
                    response = JSON.parse(response);

                    $('#Nome').val(response.Nome);
                    $('#Codigo').val(response.Codigo);
                    $('#IDCategoria').val(response.Categoria);
                    $('#IDProduto').val(response.IDProduto);
                });

        <?php } ?>
    </script>


</body>

</html>