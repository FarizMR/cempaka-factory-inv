<template>
    <div class="content-header">
        <div class="container-fluid">
            <h1>Satuan</h1>
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
                                    <th>Nama satuan</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody v-if="
                                    satuans &&
                                    satuans.data &&
                                    satuans.data.length > 0
                                ">
                                <tr v-for="(sat, index) in satuans.data" :key="index">
                                    <td>{{ sat.nama }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-info" @click="editData(sat.id)" title="Edit Data">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" @click="hapusData(sat.id)" title="Hapus Data">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
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

    <!-- Modal Add -->
    <div class="modal fade" tabindex="-1" role="dialog" ref="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form @submit.prevent="submitForm">
                    <div class="modal-header">
                        <h5 class="modal-title text-bold">Tambah Satuan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Satuan:</label>
                            <input type="text" class="form-control" id="nama" v-model="nama" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-success">
                            Simpan
                        </button>
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
                        <h5 class="modal-title text-bold">Edit Satuan</h5>
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
                                <label for="nama">Nama Satuan:</label>
                                <input type="text" class="form-control" name="nama" v-model="namaEdit" required />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeEditModal">
                            Batal
                        </button>
                        <button @click="submitEdit" type="submit" class="btn btn-success">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import DataTable from "datatables.net-vue3";
    import DataTablesCore from "datatables.net";
    import sw from "../toast.js";

    DataTable.use(DataTablesCore);

    let api = "/api/satuan";

    export default {
        name: "satuans",
        data() {
            return {
                satuans: {
                    type: Object,
                    default: null,
                },
                namaEdit: "",
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
                            this.satuans = data;
                            console.log(this.satuans);
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
                let formData = new FormData();
                formData.append("nama", this.nama);

                axios
                    .post(api, formData)
                    .then(({ data }) => {
                        this.list();
                        this.closeModal();

                        sw.toast("Data berhasil ditambahkan");

                        this.nama = "";
                    })
                    .catch(({ response }) => {
                        sw.toast("Data gagal ditambahkan");
                    });
            },
            async editData(id) {
                this.$refs.editModal.classList.add("show");
                this.$refs.editModal.style.display = "block";

                this.loading2 = true;

                let getDataApi = "/api/satuan/" + id;

                try {
                    await axios
                        .get(getDataApi)
                        .then(({ data }) => {
                            this.satuan = data;

                            this.idEdit = data.id;
                            this.namaEdit = data.nama;

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
                this.idEdit, (this.namaEdit = "");

                this.$refs.editModal.classList.remove("show");
                this.$refs.editModal.style.display = "none";
            },
            submitEdit() {
                let data = {
                    id: this.idEdit,
                    nama: this.namaEdit,
                };

                let editApi = "/api/satuan/" + this.idEdit;

                axios
                    .put(editApi, data)
                    .then(({ data }) => {
                        console.log(data);
                        this.closeEditModal();

                        sw.toast("Berhasil mengubah data");

                        this.list();
                    })
                    .catch(({ response }) => {
                        console.log(response);
                    });
            },
            async hapusData(id) {
                const confirmed = await sw.alertDelete();

                if (confirmed) {
                    console.log("Hapus data dengan id: " + id);
                    let hapusApi = "/api/satuan/" + id;

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
            },
        },
    };

    console.log("GET Request " + api);
</script>