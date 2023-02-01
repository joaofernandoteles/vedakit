<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main" data-color="dark">
    <div>
        <a class="navbar-brand m-0 text-center" href="produto_list.php">
            <img src="assets/img/logo.jpg" width="175" class="navbar-brand-img" alt="main_logo">
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="produto_list.php" class="nav-link <?= $pagina == 'Produto' ? 'active' : '' ?>">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-regular fa-box-open-full iconeHeader" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Produtos</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="banner_list.php" class="nav-link <?= $pagina == 'Banner' ? 'active' : '' ?>">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-sharp fa-solid fa-folder-image iconeHeader" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Banners</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="categoria_list.php" class="nav-link <?= $pagina == 'Categoria' ? 'active' : '' ?>">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-list-timeline iconeHeader" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Categoria</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="login.php" class="nav-link <?= $pagina == 'Sub Materiais' ? 'active' : '' ?>">

                    <span class="nav-link-text ms-1">TELA DE LOGIN</span>
                </a>
            </li>
        </ul>
    </div>
</aside>