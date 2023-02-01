<?php $pagina = 'Banner'; ?>

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
                    <div class="card ">
                        <div class="card-header pb-0">
                            <h6 class="float-start">Lista de Banners</h6>
                            <div class="text-end mb-2">
                                <a href="banner_form.php" class="btn bg-gradient-dark mb-0 px-3 btn-sm" title="Adicionar">
                                    <i class="fa fa-plus me-1"></i>ADD BANNER
                                </a>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Banner</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" width="15%">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $query = $con->query('CALL Proc_S_Banner');
                                        while ($res = $query->fetch(PDO::FETCH_OBJ)) { ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <img style="width:100% ;" src="assets/img/banner/<?= $res->Imagem ?>" alt="">
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a href="banner_form.php?IDBanner=<?= $res->IDBanner ?>" class="btn bg-gradient-info mb-0  btn-sm" title="Editar"><i class="fa-solid fa-pen-to-square font-13"></i></a>
                                                    <button class="btn bg-gradient-danger mb-0  btn-sm" title="Excluir" onclick="destroy(<?= $res->IDBanner ?>)"><i class="fa-solid fa-trash font-13"></i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>
    <?php include 'js.php'; ?>

    <script>
        function destroy(IDBanner) {
            Swal.fire({
                title: 'Deseja DELETAR este Banner ?',
                text: '',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, Deletar',
                cancelButtonText: 'Não, Cancelar',
                closeOnConfirm: true,
                closeOnCancel: true
            }).then((result) => {
                if (result.value) {
                    $.post('assets/ajax/banner.php?option=delete', {
                        IDBanner: IDBanner
                    }).done(function() {
                        location.reload();
                    });
                }
            })
        }
        
    </script>

</body>

</html>