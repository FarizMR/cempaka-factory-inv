<template>
    <div class="content-header">
        <div class="container-fluid">
            <h1>Jenis Barang</h1>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-sm btn-success float-right" @click="openModal">
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
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody v-if="
                                jenisBarangs &&
                                jenisBarangs.data &&
                                jenisBarangs.data.length > 0
                            ">
                                <tr v-for="(jb, index) in jenisBarangs.data" :key="index">
                                    <td>{{ jb.nama }}</td>
                                    <td>{{ jb.keterangan }}</td>
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

    <div class="modal fade" tabindex="-1" role="dialog" ref="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Jenis Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" v-model="nama" required />
                    </div>

                    <div class="form-group">
                        <label for="nama">Keterangan:</label>
                        <textarea rows="4" class="form-control" id="keterangan" v-model="keterangan" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal">
                        Batal
                    </button>
                    <button type="button" class="btn btn-primary" @click="saveData">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import DataTable from "datatables.net-vue3";
    import DataTablesCore from "datatables.net";

    DataTable.use(DataTablesCore);

    let api = "/api/jenis-barang";

    export default {
        name: "jenisBarangs",
        data() {
            return {
                figurs: {
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
                            this.jenisBarangs = data;
                            console.log(this.jenisBarangs);
                        })
                        .catch(({ response }) => {
                            console.error(response);
                        });

                    this.loading = false;
                } catch (e) {
                    console.error(e);
                }
            },
            openModal() {
                this.$refs.myModal.classList.add("show");
                this.$refs.myModal.style.display = "block";
            },
            closeModal() {
                this.$refs.myModal.classList.remove("show");
                this.$refs.myModal.style.display = "none";
            },
        },
    };

    console.log("GET Request " + api);
</script>

<style scoped>
    .pagination {
        margin-bottom: 0;
    }

    .modal-backdrop {
        background-color: rgba(0, 0, 0, 0.5);
        /* Adjust the alpha value (0.5) to control the darkness */
    }
</style>