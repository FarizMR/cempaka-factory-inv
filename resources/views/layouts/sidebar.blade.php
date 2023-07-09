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
                            <router-link :to="{ name: 'dashboard.jenis-barang' }" active-class="active"
                                class="nav-link">
                                <i class="fas fa-box nav-icon"></i>
                                <p>Jenis Barang</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'dashboard.pemasok-pembeli' }" active-class="active"
                                class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Pemasok/Pembeli</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'dashboard.satuan' }" active-class="active" class="nav-link">
                                <i class="fas fa-ruler nav-icon"></i>
                                <p>Satuan</p>
                            </router-link>
                        </li>
                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-exchange-alt"></i>
                        <p>
                            Transaksi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <router-link :to="{ name: 'dashboard.barang-masuk' }" active-class="active"
                                class="nav-link">
                                <i class="fas fa-arrow-right nav-icon"></i>
                                <p>Barang Masuk</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'dashboard.barang-keluar' }" active-class="active"
                                class="nav-link">
                                <i class="fas fa-arrow-left nav-icon"></i>
                                <p>Barang Keluar</p>
                            </router-link>
                        </li>
                    </ul>

                </li>
            </ul>
        </nav>

    </div>

</aside>
