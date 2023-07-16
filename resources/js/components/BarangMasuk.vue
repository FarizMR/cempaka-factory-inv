<template>
    <div class="content-header">
        <div class="container-fluid">
            <h1>Barang Masuk</h1>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <button
                    type="button"
                    class="btn btn-sm btn-success float-right"
                    @click="redirrectTambah"
                >
                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah
                </button>
            </div>

            <div class="card-body">
                <div v-if="loading">
                    <div
                        class="spinner-border text-secondary text-sm"
                        role="status"
                    >
                        <span class="sr-only">Memuat ...</span>
                    </div>
                </div>
                <div v-else>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Pemasok</th>
                                    <th>Barang</th>
                                    <th>Jumlah</th>
                                    <th style="width: 10%"></th>
                                </tr>
                            </thead>
                            <tbody
                                v-if="
                                    barangMasuks &&
                                    barangMasuks.data &&
                                    barangMasuks.data.length > 0
                                "
                            >
                                <tr
                                    v-for="(bm, index) in barangMasuks.data"
                                    :key="index"
                                >
                                    <td>{{ bm.tanggal }}</td>
                                    <td>{{ bm.pemasok }}</td>
                                    <td>{{ bm.jenis_barang }}</td>
                                    <td>{{ bm.jumlah }}</td>
                                    <td>
                                        <button
                                            class="btn btn-sm btn-info"
                                            title="Edit Data"
                                            @click="redirrectEdit(bm.id)"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button
                                            class="btn btn-sm btn-danger"
                                            title="Hapus Data"
                                            @click="hapusData(bm.id)"
                                        >
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td align="center" colspan="3">
                                        Data tidak ditemukan
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <bootstrap-4-datatable :columns="columns" :data="rows" :filter="filter" :per-page="perPage"></bootstrap-4-datatable> -->
                <!-- <bootstrap-4-datatable-pager v-model="page" type="abbreviated"></bootstrap-4-datatable-pager> -->
            </div>
        </div>
    </div>
</template>

<script>
import DataTable from "datatables.net-vue3";
import DataTablesCore from "datatables.net";
import sw from '../toast.js'

DataTable.use(DataTablesCore);

let api = "/api/view-table/barang-masuk";

export default {
    name: "barangMasuks",
    data() {
        return {
            barangMasuks: {
                type: Object,
                default: null,
            },
            loading: true,
        };
    },
    mounted() {
        this.list();
    },
    methods: {
        async list() {
            try {
                this.loading = true;

                await axios
                    .get(api)
                    .then(({ data }) => {
                        this.barangMasuks = data;
                        console.log(this.barangMasuks);
                    })
                    .catch(({ response }) => {
                        console.error(response);
                    });

                this.loading = false;
            } catch (e) {
                console.error(e);
            }
        },
        redirrectTambah() {
            this.$router.push({ name: "dashboard.barang-masuk.tambah" });
        },
        redirrectEdit(id) {
            this.$router.push({
                name: "dashboard.barang-masuk.edit",
                params: { id: id },
            });
        },
        async hapusData(id) {
            const confirmed = await sw.alertDelete();

            if (confirmed) {
                console.log("Hapus data dengan id: " + id);
                let hapusApi = "/api/barang-masuk/" + id;

                axios
                    .delete(hapusApi)
                    .then(({ data }) => {
                        console.log(data);

                        sw.toast("Berhasil menghapus data");

                        this.list();
                    })
                    .catch(({ response }) => {
                        console.log(response);
                    });
            } else {
                console.log("masuk bawah");
            }

            console.log("xx:", confirmed);
        }
    },
};

console.log("GET Request " + api);
</script>
