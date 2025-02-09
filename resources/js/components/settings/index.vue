<template>
    <div class="flex flex-wrap gap-4">
        <el-card style="width: 480px" shadow="always">
            Upload database
            <el-upload
                ref="uploadRef"
                class="upload-demo"
                method="post"
                :action="link()"
                :auto-upload="false"
                accept=".csv"
                :before-upload="checkFile"
            >
                <template #trigger>
                    <el-button type="primary">select file</el-button>
                </template>

                <el-button class="ml-3" type="success" @click="submitUpload">
                    upload to server
                </el-button>

                <template #tip>
                    <div class="el-upload__tip">
                        jpg/png files with a size less than 500kb
                    </div>
                </template>
            </el-upload>
        </el-card>
        <el-card style="width: 480px" shadow="always" v-if="default_data.files">
            Update database<br>
            <el-select
                v-model="selected_file"
                placeholder="Select"
                size="large"
                style="width: 240px"
            >
                <el-option
                    v-for="(file, key) in default_data.files"
                    :key="key"
                    :label="file"
                    :value="file"
                />
            </el-select>
            <el-button type="success" @click.prevent="uploadDatabase()" :disabled="selected_file === null">Update</el-button>
        </el-card>
    </div>
</template>

<script>
import * as config from '@/components/helpers/api_configs.js'

export default {
    name: 'Settings index page',
    data() {
        return {
            name: 'Settings index page',
            default_data: {},
            selected_file: null,
            errors: {},
        }
    },
    methods: {
        checkFile(file) {
            const is_csv = file.name.toLowerCase().endsWith('.csv');
            if (!is_csv) {
                this.$message.error('Only CSV files are allowed.');
            }
            return is_csv;
        },
        submitUpload() {
            this.$refs.uploadRef.submit()
        },
        link() {
            return config.apiPath + 'helpers/upload_file'
        },
        uploadDatabase() {
            axios.post(config.apiPath + 'settings/upload', {url: this.selected_file})
                .then(response => {
                    this.$message.success(response.data.message)
                })
                .catch(error => {
                    this.errors = error.errors || {}
                })
        },
        index() {
            axios.get(config.apiPath + 'settings')
                .then(response => {
                    this.default_data = response.data.data.default_data
                })
                .catch(error => {
                    console.log(error);
                    this.$message.error(error.errors.message);
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
