<template>
    <div class="common-layout">
        <el-container>
            <el-header>Header</el-header>
            <el-container>
                <el-aside width="200px">
                    <Aside />
                </el-aside>
                <el-container>
                    <el-main>
                        <router-view />
                    </el-main>
                    <el-footer>Footer</el-footer>
                </el-container>
            </el-container>
        </el-container>
    </div>
</template>

<script>
import Aside from './layouts/aside.vue'

export default {
    name: 'Main template component',
    data() {
        return {
            name: 'Main template component',
            errors: {},
        }
    },
    components: {
        Aside,
    },
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
