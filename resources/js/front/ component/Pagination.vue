<template>
            <el-pagination
                @size-change="handleSizeChange"
                @current-change="handleCurrentChange"
                :current-page="current_page"
                :page-sizes="[10, 20, 30, 50]"
                :page-size="page_size"
                layout="total, sizes, prev, pager, next, jumper"
                :total="total">
            </el-pagination>
</template>

<script>
    import { mapState } from 'vuex'
    export default {
        name: "Pagination",
        computed: mapState([
            'current_page',
            'total',
            'page_size'
        ]),
        methods:{
            handleSizeChange(val){
                this.$store.commit('page_size',{ page_size:val })
                this.$store.dispatch('Update',this)

            },
            handleCurrentChange(val){
                this.$store.commit('current_page',{ current_page:val })
                this.$store.dispatch('Update',this)
            }
        }
    }
</script>

<style scoped>

</style>
