<template>
    <el-table
        :data="certificates"
        style="width: 100%">

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
</template>

<script>
    export default {
        data: function () {
            return{
                certificates:[]
            }
        },
        created:function () {
           this.$http.get(this.$url+'/certificates').then(res=>{

               this.certificates = res.data.data
           })
        }
    }
</script>

<style scoped>

</style>
