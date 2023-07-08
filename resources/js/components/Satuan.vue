<template>
    <div class="content-header">
        <div class="container-fluid">
            <h1>
                Satuan
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
                                    <th>Nama satuan</th>
                                </tr>
                            </thead>
                            <tbody v-if="satuans && satuans.data && satuans.data.length > 0">
                                <tr v-for="(sat,index) in satuans.data" :key="index">
                                    <td>{{ sat.nama }}</td>
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

    let api = '/api/satuan'

    export default {
        name: "satuans",
        data() {
            return {
                satuans: {
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
                        this.satuans = data
                        console.log(this.satuans);
                    }).catch(({ response }) => {
                        console.error(response)
                    })
                    
                    this.loading = false;
                } catch (e) {
                    console.error(e)
                }
            }
        }
    }

    console.log("GET Request " + api);
</script>

<style scoped>
    .pagination {
        margin-bottom: 0;
    }
</style>