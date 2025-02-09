<template>
    <div>
        <h1>Get Index Component</h1>
        <button></button>
    </div>
</template>

<script>
export default {
    name: "GetIndexController",
    mounted() {
        this.onStart()
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
