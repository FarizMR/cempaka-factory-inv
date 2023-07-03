<template>
    <div class="content-header">
        <div class="container-fluid">
            <h1>
                Jenis Barang
            </h1>
        </div>
    </div>
    <div class="content">
        <div class="card">

            <div class="card-header">
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody v-if="jenisBarangs && jenisBarangs.data && jenisBarangs.data.length > 0">
                            <tr v-for="(jb,index) in jenisBarangs.data" :key="index">
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

    export default {
        name:"jenisBarangs",
        data(){
            return {
                jenisBarangs:{
                    type:Object,
                    default:null
                }
            }
        },
        mounted(){
            this.list()
        },
        methods:{
            async list(){
                await axios.get(`/api/jenis-barang`).then(({data})=>{
                    this.jenisBarangs = data
                }).catch(({ response })=>{
                    console.error(response)
                })
            }
        }
    }
</script>

<style scoped>
    .pagination{
        margin-bottom: 0;
    }
</style>