<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="brand-link">
        <span class="brand-text font-weight-bold">
            CempakaInv
        </span>
    </div>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <router-link to="/" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Beranda
                        </p>
                    </router-link>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <router-link to="/jenis-barang" active-class="active" class="nav-link">
                                <i class="fas fa-box nav-icon"></i>
                                <p>Jenis Barang</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/pemasok-pembeli" active-class="active" class="nav-link">
                                <i class="fas fa-users-cog nav-icon"></i>
                                <p>Pemasok/Pembeli</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/satuan" active-class="active" class="nav-link">
                                <i class="fas fa-ruler nav-icon"></i>
                                <p>Satuan</p>
                            </router-link>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>
