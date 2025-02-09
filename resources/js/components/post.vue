<template>
    <div>
        <h1>Post Index Component</h1>
    </div>
</template>

<script>
export default {
    name: "PostIndexController",
    mounted() {
        this.onStart()
    },
    methods: {
        onStart() {
            axios.get('/api/post')
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
