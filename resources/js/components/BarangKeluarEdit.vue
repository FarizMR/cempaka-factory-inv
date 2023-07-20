<template>
    <div class="content-header">
        <div class="container-fluid">
            <h1>Edit Transaksi Barang Keluar</h1>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header"></div>
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
                    <form @submit.prevent="submitForm">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2" for="tanggal"
                                >Tanggal:</label
                            >
                            <div class="col-sm-10">
                                <input
                                    type="date"
                                    id="tanggal"
                                    v-model="tanggal"
                                    class="form-control form-control-sm"
                                />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                class="col-form-label col-sm-2"
                                for="konsumen"
                                >Konsumen:</label
                            >
                            <div class="col-sm-10">
                                <select
                                    id="konsumen"
                                    v-model="selectedKonsumen"
                                    class="form-control form-control-sm"
                                >
                                    <option
                                        v-for="konsumen in konsumenOptions"
                                        :value="konsumen.id"
                                        :key="konsumen.id"
                                    >
                                        {{ konsumen.nama }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-2" for="barang"
                                >Barang:</label
                            >
                            <div class="col-sm-10">
                                <select
                                    id="barang"
                                    v-model="selectedBarang"
                                    class="form-control form-control-sm"
                                >
                                    <option
                                        v-for="barang in barangOptions"
                                        :value="barang.id"
                                        :key="barang.id"
                                    >
                                        {{ barang.nama }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="satuan">Satuan:</label>
                            <button
                                type="button"
                                @click="addSatuan"
                                class="btn btn-sm btn-outline-success"
                            >
                                Tambah Satuan
                            </button>
                            <div class="row">
                                <div
                                    class="col-sm-6"
                                    v-for="(item, index) in satuanItems"
                                    :key="index"
                                >
                                    <input
                                        type="number"
                                        class="form-control my-1"
                                        v-model="item.jumlahSatuan"
                                        placeholder="Jumlah"
                                    />
                                    <select
                                        v-model="item.selectedSatuan"
                                        class="form-control my-1"
                                    >
                                        <option
                                            v-for="satuan in satuanOptions"
                                            :value="satuan.id"
                                            :key="satuan.id"
                                        >
                                            {{ satuan.nama }}
                                        </option>
                                    </select>
                                    <button
                                        @click="removeSatuan(index)"
                                        class="btn btn-sm btn-danger my-2"
                                        type="button"
                                    >
                                        <i class="fa fa-eraser"></i> Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button
                                type="submit"
                                class="btn btn-success float-right"
                            >
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Tambah Transaksi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { useRoute } from "vue-router";
import sw from '../toast.js'

export default {
    data() {
        return {
            id: null,
            tanggal: null,
            selectedKonsumen: null,
            selectedBarang: null,
            konsumenOptions: [],
            barangOptions: [],
            satuanOptions: [],
            satuanItems: [],
            loading: false,
        };
    },
    setup() {
        const route = useRoute();
        return {
            id: route.params.id,
        };
    },
    async mounted() {
        this.loading = true;
        try {
            // Fetch konsumen options from API
            const konsumenResponse = await axios.get("/api/figur/konsumen");
            this.konsumenOptions = konsumenResponse.data;

            // Fetch barang options from API
            const barangResponse = await axios
                .get("/api/jenis-barang")
                .then((response) => {
                    return response.data;
                });
            this.barangOptions = barangResponse.data;

            // Fetch satuan options from API
            const satuanResponse = await axios
                .get("/api/satuan")
                .then((response) => {
                    return response.data;
                });
            this.satuanOptions = satuanResponse.data;
        } catch (e) {
            console.log(e);
        }

        this.barang_transaksi();
    },
    methods: {
        async barang_transaksi() {
            try {
                await axios
                    .get(`/api/barang-keluar/${this.id}`)
                    .then(({ data }) => {
                        this.barangKeluars = data;

                        this.id = this.barangKeluars.id;
                        this.tanggal = this.barangKeluars.tanggal;
                        this.selectedKonsumen = this.barangKeluars.konsumen_id;
                        this.selectedBarang =
                            this.barangKeluars.jenis_barang_id;

                        this.barangKeluars.jumlah_barang_keluar.forEach(
                            (item) => {
                                this.satuanItems.push({
                                    jumlahSatuan: item.jumlah,
                                    selectedSatuan: item.satuan_id,
                                });
                            }
                        );

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
        addSatuan() {
            this.satuanItems.push({ selectedSatuan: null });
        },
        removeSatuan(index) {
            this.satuanItems.splice(index, 1);
        },
        async submitForm() {
            try {
                const response = await axios.put(
                    `/api/barang-keluar/${this.id}`,
                    {
                        tanggal: this.tanggal,
                        konsumen_id: this.selectedKonsumen,
                        barang_id: this.selectedBarang,
                        jumlah_barang_keluar: this.satuanItems.map((item) => {
                            return {
                                jumlah: item.jumlahSatuan,
                                satuan_id: item.selectedSatuan,
                            };
                        }),
                    }
                );

                sw.toast("Data berhasil diubah");
                this.$router.push("/barang-keluar");
            } catch (e) {
                console.error(e);
            }
        },
    },
};
</script>
