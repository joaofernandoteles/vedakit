<?php $pagina = 'Produto'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'head.php'; ?>
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
                            <h6 class="float-start">Cadastro de Imagem Produto</h6>
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
                                        <label for="Imagem">Imagens</label>
                                        <input type="file" class="form-control" id="Imagem" <?= isset($_GET['IDProduto']) ? $nome = 'Imagem' : $nome = 'Imagem' ?> name="<?= $nome ?>" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" id="salvar" class="btn btn-dark d-block mx-auto px-3 py-2">
                                        <i class="fa-solid fa-floppy-disk me-2"></i>SALVAR
                                    </button>
                                    <input type="hidden" name="IDImagem" id="IDImagem">
                                    <input type="hidden" name="Capa" id="Capa">
                                </div>
                            </form>
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
                var option = $('#IDImagem').val() == '' ? 'update' : 'update';

                $.ajax({
                    type: 'POST',
                    url: 'assets/ajax/imgproduto.php?option=' + option,
                    data: formData,
                    processData: false,
                    contentType: false
                }).done(function(response) {
                    window.location.href = 'produto_list.php';
                });
            }
        });

        <?php if (isset($_GET['IDImagem']) && !empty($_GET['IDImagem'])) { ?>

            $.post('assets/ajax/imgproduto.php?option=select', {
                    IDImagem: '<?= $_GET['IDImagem'] ?>'
                })
                .done(function(response) {
                    response = JSON.parse(response);

                    $('#Capa').val(response.Capa);
                    $('#IDImagem').val(response.IDImagem);
                });

        <?php } ?>
    </script>
</body>

</html>