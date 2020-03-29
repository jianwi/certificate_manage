<template>
    <div>
        <el-table
            :data="certificates"
            stripe
            primary
            @row-click="handleRowClick"
        >

            <el-table-column
                header-align="center"
                min-width="80"
                fixed
                align="center"
                prop="name"
                label="获奖单位/个人">
            </el-table-column>

            <el-table-column
                prop="code"
                align="center"
                min-width="100"
                label="证书编码">
            </el-table-column>

            <el-table-column
                header-align="center"
                min-width="235"
                align="center"
                prop="activity"
                label="活动名称"
            >
            </el-table-column>



            <el-table-column
                header-align="center"
                align="center"
                min-width="100"
                prop="award"
                label="奖项"
            >
            </el-table-column>

            <el-table-column
                header-align="center"
                align="center"
                min-width="100"
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
