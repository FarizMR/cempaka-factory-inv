<template>
    <div class="content-header">
        <div class="container-fluid">
            <h1>Pemasok-pembeli</h1>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header">
                <button
                    type="button"
                    class="btn btn-sm btn-success float-right"
                    @click="openAddModal"
                >
                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah
                </button>
            </div>

            <div class="card-body">
                <div v-if="loading1">
                    <div
                        class="spinner-border text-secondary text-sm"
                        role="status"
                    >
                        <span class="sr-only">Memuat ...</span>
                    </div>
                </div>
                <div v-else>
                    <div class="table-responsive">
                        <table id="dt" class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th style="width: 10%">Pemasok</th>
                                    <th style="width: 10%">Konsumen</th>
                                    <th style="width: 10%"></th>
                                </tr>
                            </thead>
                            <tbody
                                v-if="
                                    figurs &&
                                    figurs.data &&
                                    figurs.data.length > 0
                                "
                            >
                                <tr
                                    v-for="(fg, index) in figurs.data"
                                    :key="index"
                                >
                                    <td>{{ fg.nama }}</td>
                                    <td>
                                        <span
                                            v-if="fg.isPemasok"
                                            style="
                                                font-weight: bolder;
                                                color: green;
                                            "
                                            >&#10003;</span
                                        >
                                    </td>

                                    <td>
                                        <span
                                            v-if="fg.isKonsumen"
                                            style="
                                                font-weight: bolder;
                                                color: green;
                                            "
                                            >&#10003;</span
                                        >
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button
                                                class="btn btn-sm btn-info"
                                                @click="editData(fg.id)"
                                            >
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button
                                                class="btn btn-sm btn-danger"
                                                @click="hapusData(fg.id)"
                                            >
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

    <!-- Add modal -->
    <div class="modal fade" tabindex="-1" role="dialog" ref="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form @submit.prevent="submitForm">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Pemasok-Pembeli</h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                            @click="closeModal"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="nama"
                                v-model="nama"
                                required
                            />
                        </div>

                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="isPemasok"
                                v-model="isPemasok"
                            />
                            <label class="form-check-label" for="isPemasok"
                                >Pemasok</label
                            >
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="isKonsumen"
                                v-model="isKonsumen"
                            />
                            <label class="form-check-label" for="isKonsumen"
                                >Konsumen</label
                            >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                            @click="closeModal"
                        >
                            Batal
                        </button>
                        <button
                            type="submit"
                            class="btn btn-success"
                            @click="saveData"
                        >
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit modal -->
    <div class="modal fade" tabindex="-1" role="dialog" ref="editModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form @submit.prevent="">
                    <div class="modal-header">
                        <h5 class="modal-title text-bold">
                            Edit Pemasok/Pembeli
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                            @click="closeEditModal"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div v-if="loading2">
                            <div
                                class="spinner-border text-secondary text-sm"
                                role="status"
                            >
                                <span class="sr-only">Memuat ...</span>
                            </div>
                        </div>
                        <div v-else>
                            <input type="hidden" name="id" v-model="idEdit" />

                            <div class="form-group">
                                <label for="nama">Nama Barang:</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="nama"
                                    v-model="namaEdit"
                                    required
                                />
                            </div>

                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="isPemasokEdit"
                                    v-model="isPemasokEdit"
                                />
                                <label class="form-check-label" for="isPemasok"
                                    >Pemasok</label
                                >
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="isKonsumenEdit"
                                    v-model="isKonsumenEdit"
                                />
                                <label class="form-check-label" for="isKonsumen"
                                    >Konsumen</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                            @click="closeEditModal"
                        >
                            Batal
                        </button>
                        <button
                            @click="submitEdit"
                            type="submit"
                            class="btn btn-success"
                        >
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
import axios from "axios";
import "datatables.net-dt/css/jquery.dataTables.css";
import $ from "jquery";
import sw from "../toast.js";

DataTable.use(DataTablesCore);

let api = "/api/figur";

export default {
    name: "figurs",
    data() {
        return {
            figurs: {
                type: Object,
                default: null,
            },
            loading1: true,
            loading2: true,
            dataTable: null,
            isPemasokEdit: false,
            isKonsumenEdit: false,
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
                        this.figurs = data;
                        console.log(this.figurs);
                    })
                    .catch(({ response }) => {
                        console.error(response);
                    });

                this.loading1 = false;
                this.initializeDataTable();
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
        initializeDataTable() {
            $(this.$el).find("#dt").DataTable({
                ordering: true,
                searching: true,
            });
        },
        submitForm() {
            let data = {
                nama: this.nama,
                isPemasok: this.isPemasok,
                isKonsumen: this.isKonsumen,
            };

            axios
                .post(api, data)
                .then(({ data }) => {
                    this.closeModal();
                    this.list();

                    sw.toast("Data berhasil ditambahkan");
                })
                .catch(({ response }) => {
                    console.error(response);
                    sw.toast("Data gagal ditambahkan");
                });
        },
        async editData(id) {
            this.$refs.editModal.classList.add("show");
            this.$refs.editModal.style.display = "block";

            this.loading2 = true;

            let getDataApi = "/api/figur/" + id;

            try {
                await axios
                    .get(getDataApi)
                    .then(({ data }) => {
                        this.figur = data;

                        console.log(this.figur);

                        this.idEdit = data.id;
                        this.namaEdit = data.nama;

                        if (data.isPemasok == 1) {
                            this.isPemasokEdit = true;
                        }
                        if (data.isKonsumen == 1) {
                            this.isKonsumenEdit = true;
                        }
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
            this.figur = null;

            this.idEdit = null;
            this.namaEdit = null;
            this.isPemasokEdit = false;
            this.isKonsumenEdit = false;

            this.$refs.editModal.classList.remove("show");
            this.$refs.editModal.style.display = "none";
        },
        submitEdit() {
            let data = {
                id: this.idEdit,
                nama: this.namaEdit,
                isPemasok: this.isPemasokEdit,
                isKonsumen: this.isKonsumenEdit,
            };

            let editApi = "/api/figur/" + this.idEdit;

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
                let hapusApi = "/api/figur/" + id;

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
