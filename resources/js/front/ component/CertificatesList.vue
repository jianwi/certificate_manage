<template>
    <div>
        <el-table
            :data="certificates"
            height="500"
            width="300"
            style="width: 100%"
        >

            <el-table-column
                prop="code"
                label="证书编码">
            </el-table-column>

            <el-table-column
                header-align="center"
                align="center"
                prop="activity"
                label="活动名称"
            >
            </el-table-column>

            <el-table-column
                header-align="center"
                align="center"
                prop="name"
                label="获奖人/组织">
            </el-table-column>

            <el-table-column
                header-align="center"
                align="center"
                prop="created_at"
                label="颁奖日期"
            >
            </el-table-column>

        </el-table>

        <el-pagination
            @size-change="handleSizeChange"
            @current-change="handleCurrentChange"
            :current-page="currentPage"
            :page-sizes="[10, 20, 30, 50]"
            :page-size="page_size"
            layout="total, sizes, prev, pager, next, jumper"
            :total="total">
        </el-pagination>

    </div>

</template>

<script>
    export default {
        data: function () {
            return {
                page_size: 10,
                certificates: [],
                currentPage: 1,
                total: undefined,
            }
        },
        methods: {
            handleSizeChange(val) {
                this.page_size = val
                this.updateList()
            },
            handleCurrentChange(val) {
                this.currentPage = val
                this.updateList()
            },
            updateList() {
                this.$http.get(this.$url + '/certificates?' + 'page=' + this.currentPage + '&per_page=' + this.page_size).then(res => {
                    this.certificates = res.data.data
                })
            }
        },
        created: function () {
            this.$http.get(this.$url + '/certificates').then(res => {
                this.certificates = res.data.data
                this.total = res.data.meta.total
            })
        }
    }
</script>

<style scoped>

</style>
