<template>
    <el-card class="box-card">
        <div slot="header" class="header">
            <span>Project List</span>
            <el-button size="small" type="primary" @click="reset">Reset Filters</el-button>
        </div>

        <div class="filter-row">
            <el-input v-model="params.query" size="small" placeholder="Search by Name" class="filter-item" @input="index()" />
            <div class="filter-item">
                <span class="filter-label">Price:</span>
                <el-slider v-model="params.price" range show-stops :max="1000000" :step="10000" @change="index()" />
            </div>
            <div class="filter-item">
                <span class="filter-label">Bedrooms:</span>
                <el-input-number v-model="params.bedrooms" :min="1" :max="10" size="small" @change="index()" />
                <el-button type="primary" :icon="Close" circle size="small" @click="reset_field('bedrooms')" />
            </div>
            <div class="filter-item">
                <span class="filter-label">Bathrooms:</span>
                <el-input-number v-model="params.bathrooms" :min="1" :max="10" size="small" @change="index()" />
                <el-button type="primary" :icon="Close" circle size="small" @click="reset_field('bathrooms')" />
            </div>
            <div class="filter-item">
                <span class="filter-label">Storeys:</span>
                <el-input-number v-model="params.storeys" :min="1" :max="10" size="small" @change="index()" />
                <el-button type="primary" :icon="Close" circle size="small" @click="reset_field('storeys')" />
            </div>
            <div class="filter-item">
                <span class="filter-label">Garages:</span>
                <el-input-number v-model="params.garages" :min="1" :max="10" size="small" @change="index()" />
                <el-button type="primary" :icon="Close" circle size="small" @click="reset_field('garages')" />
            </div>
        </div>

        <el-table :data="projects" style="width: 100%;" v-if="projects && projects.length">
            <el-table-column prop="id" label="Id" width="80" />
            <el-table-column prop="name" label="Name" />
            <el-table-column prop="price" label="Price" />
            <el-table-column prop="bedrooms" label="Bedrooms" />
            <el-table-column prop="bathrooms" label="Bathrooms" />
            <el-table-column prop="storeys" label="Storeys" />
            <el-table-column prop="garages" label="Garages" />
        </el-table>

        <div v-else class="empty-state">
            <el-empty description="Project list is empty" />
        </div>
    </el-card>
</template>

<script>
import * as config from '@/components/helpers/api_configs.js'
import { Close } from '@element-plus/icons-vue'
export default {
    name: 'Index Project Component',
    computed: {
        Close() {
            return Close
        },
    },
    data() {
        return {
            name: 'Index Project Component',
            default_data: {},
            projects: [],
            params: {
                page_limit: 20,
                page: 1,
                query: '',
                price: [0, 1000000],
                bedrooms: null,
                bathrooms: null,
                storeys: null,
                garages: null,
            },
            errors: {},
        }
    },
    methods: {
        reset() {
            this.params = {
                page_limit: 20,
                page: 1,
                query: '',
                price: [0, 1000000],
                bedrooms: null,
                bathrooms: null,
                storeys: null,
                garages: null,
            }
            this.index()
        },
        reset_field($name) {
            this.params[$name] = null;
            this.index();
        },
        index() {
            axios.get(config.apiPath + 'projects', { params: this.params })
                .then(response => {
                    this.projects = response.data.data.projects
                    this.$message.success(response.data.message)
                })
                .catch(error => {
                    this.projects = []
                    this.errors = error.errors || {}
                })
        },
    },
    mounted() {
        this.index()
    },
}
</script>

<style scoped>

</style>
