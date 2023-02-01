<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-3 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <h6 class="font-weight-bolder mb-0"><?= isset($SubPagina) ? $SubPagina : $pagina ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <ul class=" ms-md-auto navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <label for="sair" class="nav-link text-body font-weight-bold px-0 m-0">
                        <span class="d-sm-inline d-none">Sair</span>
                        <i class="fa fa-sign-out ms-sm-1"></i>
                    </label>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<form method="POST" class="d-none">
    <input type="submit" name="sair" id="sair">
</form>