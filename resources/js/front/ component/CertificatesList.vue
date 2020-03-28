<template>
    <div>
        <el-table
            :data="certificates"
            :width="100"
            style="width: 100%"
            @row-click="handleRowClick"
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
                prop="award"
                label="奖项"
            >
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
        methods:{
            handleRowClick(event){
                // console.log(event)
                window.x = event
                this.$router.push('/info/' + event.code)
            }
        },
        created: function () {
           this.$store.dispatch('Update',this)
            this.loading = false
        }
    }
</script>

<style scoped>

</style>
