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


    </div>

</template>

<script>
    export default {
        computed:{
            certificates(){
                return this.$store.state.certificates
            }
        },
        created: function () {
           this.$store.dispatch('Init',this)
        }
    }
</script>

<style scoped>

</style>
