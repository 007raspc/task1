<template>
    Main page
</template>

<script>
export default {
    name: "GetIndexController",
    mounted() {
    },
    methods: {
        onStart() {
            axios.get('/api/get')
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                })
        },
    },
}
</script>

<style scoped>

</style>
