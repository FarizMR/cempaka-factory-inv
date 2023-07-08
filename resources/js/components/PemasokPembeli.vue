<template>
    <div class="content-header">
        <div class="container-fluid">
            <h1>
                Pemasok-pembeli
            </h1>
        </div>
    </div>
    <div class="content">
        <div class="card">

            <div class="card-header">
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
                                    <th>Pemasok</th>
                                    <th>Konsumen</th>
                                </tr>
                            </thead>
                            <tbody v-if="figurs && figurs.data && figurs.data.length > 0">
                                <tr v-for="(fg,index) in figurs.data" :key="index">
                                    <td>{{ fg.nama }}</td>
                                    <td>
                                        <span v-if="fg.isPemasok" class="badge badge-pill badge-success">&#x00A0;</span>
                                    </td>

                                    <td>
                                        <span v-if="fg.isKonsumen" class="badge badge-pill badge-success">&#x00A0;</span>
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
</template>

<script>
    import DataTable from 'datatables.net-vue3';
    import DataTablesCore from 'datatables.net';

    DataTable.use(DataTablesCore);

    let api = '/api/figur'

    export default {
        name: "figurs",
        data() {
            return {
                figurs: {
                    type: Object,
                    default: null
                },
                loading: true,
            }
        },
        mounted() {
            this.list()
        },
        methods: {
            async list() {
                try {
                    this.loading = true;

                    await axios.get(api).then(({ data }) => {
                        this.figurs = data
                        console.log(this.figurs)
                    }).catch(({ response }) => {
                        console.error(response)
                    })

                    this.loading = false;
                } catch(e)  {
                    console.error(e)
                }
            }
        }
    }

    console.log("GET Request " + api)
</script>

<style scoped>
    .pagination {
        margin-bottom: 0;
    }
</style>