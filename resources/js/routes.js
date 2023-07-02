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
    }
]