<template>
    <div class="content-header">
        <div class="container-fluid">
            <h1>Barang Keluar</h1>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-sm btn-success float-right" @click="redirretTambah">
                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah
                </button>
            </div>

            <div class="card-body">
                <div v-if="loading">
                    <div class="spinner-border text-secondary text-sm" role="status">
                        <span class="sr-only">Memuat ...</span>
                    </div>
                </div>
                <div v-else>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Konsumen</th>
                                    <th>Barang</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody v-if="
                  barangKeluars &&
                  barangKeluars.data &&
                  barangKeluars.data.length > 0
                ">
                                <tr v-for="(bk, index) in barangKeluars.data" :key="index">
                                    <td>{{ bk.tanggal }}</td>
                                    <td>{{ bk.konsumen }}</td>
                                    <td>{{ bk.jenis_barang }}</td>
                                    <td>{{ bk.jumlah }}</td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td align="center" colspan="3">Data tidak ditemukan</td>
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

    DataTable.use(DataTablesCore);

    let api = "/api/barang-keluar";

    export default {
        name: "barangKeluars",
        data() {
            return {
                barangKeluars: {
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
                            this.barangKeluars = data;
                            console.log(this.barangKeluars);
                        })
                        .catch(({ response }) => {
                            console.error(response);
                        });

                    this.loading = false;
                } catch (e) {
                    console.error(e);
                }
            },
            redirretTambah() {
                this.$router.push({ name: "dashboard.barang-keluar.tambah" });
            },
        },
    };

    console.log("GET Request " + api);
</script>