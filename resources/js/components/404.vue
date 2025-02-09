<template>
    <div class="common-layout">
        <el-container>
            <el-header>Header</el-header>
            <el-container>
                <el-aside width="200px">Aside</el-aside>
                <el-container>
                    <el-main>Page 404</el-main>
                    <el-footer>Footer</el-footer>
                </el-container>
            </el-container>
        </el-container>
    </div>
</template>

<script>
export default {
    name: "404 page Component",
    data() {
        return {}
    },
    methods: {},
    mounted() {
        console.log('404 page Component');
    }
}
</script>
