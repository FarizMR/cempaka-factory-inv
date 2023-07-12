<template>
    <div class="content-header">
        <div class="container-fluid">
            <h1>Jenis Barang</h1>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-sm btn-success float-right" @click="openAddModal">
                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah
                </button>
            </div>

            <div class="card-body">
                <div v-if="loading1">
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
                                    <th style="width: 10%"></th>
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
                                    <td>
                                        <button class="btn btn-sm btn-info" @click="editData(jb.id)">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </td>
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

    <!-- Modal Add -->
    <div class="modal fade" tabindex="-1" role="dialog" ref="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form @submit.prevent="submitForm">
                    <div class="modal-header">
                        <h5 class="modal-title text-bold">Tambah Jenis Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Barang:</label>
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
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" tabindex="-1" role="dialog" ref="editModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form @submit.prevent="">
                    <div class="modal-header">
                        <h5 class="modal-title text-bold">Edit Jenis Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            @click="closeEditModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div v-if="loading2">
                            <div class="spinner-border text-secondary text-sm" role="status">
                                <span class="sr-only">Memuat ...</span>
                            </div>
                        </div>
                        <div v-else>
                            <input type="hidden" name="id" v-model="idEdit" />

                            <div class="form-group">
                                <label for="nama">Nama Barang:</label>
                                <input type="text" class="form-control" name="nama" v-model="namaEdit" required />
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan:</label>
                                <textarea rows="4" class="form-control" name="keterangan" v-model="keteranganEdit" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeEditModal">
                            Batal
                        </button>
                        <button @click="submitEdit" type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import DataTable from "datatables.net-vue3";
    import DataTablesCore from "datatables.net";
    import toastAlert from "../toast.js";

    DataTable.use(DataTablesCore);

    let api = "/api/jenis-barang";

    export default {
        name: "jenisBarangs",
        data() {
            return {
                jenisBarangs: {
                    type: Object,
                    default: null,
                },
                idEdit: "",
                namaEdit: "",
                keteranganEdit: "",
                loading1: true,
                loading2: true,
            };
        },
        mounted() {
            this.list();
        },
        methods: {
            async list() {
                try {
                    this.loading1 = true;

                    await axios
                        .get(api)
                        .then(({ data }) => {
                            this.jenisBarangs = data;
                            console.log(this.jenisBarangs);
                        })
                        .catch(({ response }) => {
                            console.error(response);
                        });

                    this.loading1 = false;
                } catch (e) {
                    console.error(e);
                }
            },
            openAddModal() {
                this.$refs.myModal.classList.add("show");
                this.$refs.myModal.style.display = "block";
            },
            closeModal() {
                this.$refs.myModal.classList.remove("show");
                this.$refs.myModal.style.display = "none";
            },
            submitForm() {
                console.log("Nama:", this.nama);
                console.log("Keterangan:", this.keterangan);
            },
            async editData(id) {
                this.$refs.editModal.classList.add("show");
                this.$refs.editModal.style.display = "block";

                this.loading2 = true;

                let getDataApi = "/api/jenis-barang/" + id;

                try {
                    await axios
                        .get(getDataApi)
                        .then(({ data }) => {
                            this.barang = data;

                            this.idEdit = data.id;
                            this.namaEdit = data.nama;
                            this.keteranganEdit = data.keterangan;

                            console.log(this.barang);
                        })
                        .catch(({ response }) => {
                            console.error(response);
                        });
                } catch (e) {
                    console.error(e);
                }

                this.loading2 = false;
            },
            closeEditModal() {
                this.idEdit, this.namaEdit, (this.keteranganEdit = "");

                this.$refs.editModal.classList.remove("show");
                this.$refs.editModal.style.display = "none";
            },
            submitEdit() {
                let data = {
                    id: this.idEdit,
                    nama: this.namaEdit,
                    keterangan: this.keteranganEdit,
                };

                let editApi = "/api/jenis-barang/" + this.idEdit;

                axios
                    .put(editApi, data)
                    .then(({ data }) => {
                        console.log(data);
                        this.closeEditModal();
                        toastAlert("Berhasil mengubah data");
                        this.list();
                    })
                    .catch(({ response }) => {
                        console.error(response);
                    });
            },
        },
    };

    console.log("GET Request " + api);
</script>