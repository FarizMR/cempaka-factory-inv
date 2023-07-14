<template>
    <div>
        <h1>Barang Masuk Edit</h1>
        <p>{{ id }}</p>
    </div>
</template>

<script>
    import axios from 'axios';
    import { useRoute } from 'vue-router';

    export default {
        setup() {
            const route = useRoute();
            return {
                id: route.params.id,
            };
        }
    }
</script>