<nav id="sidebarMenu" class=" collapse d-lg-block sidebar collapse" >
    <div class="text-center mb-5">
        <a class=" navbar-brand text-white " href="#"><h2>UbharaNews</h2></a>
    </div>

    <div class="position-sticky sidebarHeight ">
        <div class="list-group list-group-flush mx-3 mt-4 ">
            <ul 
            class="navbar-nav justify-content-center flex-grow-1 pe-1 "
            > 
            <hr>
                <li class="nav-item ">
                <a  class="nav-link d-flex gap-2" href="<?php echo base_url('/admin/dashboard-admin') ?>">
                    <span class="material-symbols-rounded">
                    dashboard
                    </span> 
                Beranda </a>
                </li>
            <hr>
                <li class="nav-item">
                <a class="nav-link d-flex gap-2" href="<?php echo base_url('/admin/data-berita') ?>">
                    <span class="material-symbols-rounded">
                    newspaper
                    </span>
                    Data Berita
                </a>
                </li>           
            <hr>
                <li class="nav-item">
                <a class="nav-link d-flex gap-2" href="<?php echo base_url('/admin/data-admin') ?>">
                    <span class="material-symbols-rounded">
                    manage_accounts
                    </span>
                Data Admin</a>
                </li>
            <hr>
                <li class="nav-item">
                <a class="nav-link d-flex gap-2" href="<?php echo base_url('/admin/data-ulasan') ?>">
                    <span class="material-symbols-rounded">
                        comment
                    </span>
                Data Ulasan</a>
                </li>
            <hr>       
                <li class="nav-item">
                <a class="nav-link d-flex gap-2" href="<?php echo base_url('/admin/data-kategori') ?>">
                    <span class="material-symbols-rounded">
                    category
                    </span>
                    Kategori
                </a>
                </li>
            <hr>
            </ul> 
        </div>
    </div>
    
    <div class="position-sticky bottom-0 start-50 ">
        <div class="list-group list-group-flush mx-3 mt-4 ">
            <ul 
            class="navbar-nav justify-content-center flex-grow-1 "
            > 
            <hr>
                <li class="nav-item ">
                <a data-bs-toggle="modal" data-bs-target="#logoutModal" class="btn nav-link d-flex gap-2"> 
                    <span class="material-symbols-rounded">
                    logout
                    </span> 
                    Keluar
                </a>
                </li>
            <hr>
            </ul> 
        </div>
    </div>
</nav>
</header>
<!-- Modal Logout-->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Keluar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Apakah Anda yakin ingin keluar?
        </div>
        <div class="modal-footer">
            <a href="<?php echo base_url('/admin') ?>" class="btn btn-success">Ya</a>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
        </div>
    </div>
</div>
</div>

