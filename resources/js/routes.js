import Home from './components/Home.vue';
import MasterJenisBarang from './components/JenisBarang.vue'
import MasterPemasokPembeli from './components/PemasokPembeli.vue'
import MasterSatuan from './components/Satuan.vue'

export default [
    {
        path: '/',
        name: 'dashboard.home',
        component: Home,
    },
    {
        path: '/jenis-barang',
        name: 'dashboard.jenis-barang',
        component: MasterJenisBarang,
    },
    {
        path: '/pemasok-pembeli',
        name: 'dashboard.pemasok-pembeli',
        component: MasterPemasokPembeli,
    },
    {
        path: '/satuan',
        name: 'dashboard.satuan',
        component: MasterSatuan,
    },
    {
        path: '/barang-masuk',
        name: 'dashboard.barang-masuk',
        component: () => import('./components/BarangMasuk.vue'),
    },
    {
        path: '/barang-keluar',
        name: 'dashboard.barang-keluar',
        component: () => import('./components/BarangKeluar.vue'),
    }, 
    {
        path: '/barang-masuk/tambah',
        name: 'dashboard.barang-masuk.tambah',
        component: () => import('./components/BarangMasukTambah.vue'),
    },
    {
        path: '/barang-keluar/tambah',
        name: 'dashboard.barang-keluar.tambah',
        component: () => import('./components/BarangKeluarTambah.vue'),
    },
    {
        path: '/barang-masuk/edit/:id',
        name: 'dashboard.barang-masuk.edit',
        component: () => import('./components/BarangMasukEdit.vue'),
    },
    {
        path: '/barang-keluar/edit/:id',
        name: 'dashboard.barang-keluar.edit',
        component: () => import('./components/BarangKeluarEdit.vue'),
    },
]