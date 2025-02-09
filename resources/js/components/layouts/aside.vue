<template>
    <el-aside width="200px">
        <el-scrollbar>
            <el-menu>
                <el-menu-item>
                    <router-link :to="{ name: 'promo' }">Main</router-link>
                </el-menu-item>
                <el-menu-item>
                    <router-link :to="{ name: 'task.index' }">Task</router-link>
                </el-menu-item>
                <el-menu-item>
                    <router-link :to="{ name: 'settings.index' }">Settings</router-link>
                </el-menu-item>
            </el-menu>
        </el-scrollbar>
    </el-aside>
</template>

<script>
export default {
    name: "a_side"
}
</script>

<style scoped>

</style>
