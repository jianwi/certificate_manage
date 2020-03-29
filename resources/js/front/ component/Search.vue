<template>
    <el-input v-model="filter_value"
              placeholder="请输入内容搜索"
              class="input-with-select big-input"
              @change="search"
    >
        <el-select v-model="filter_key"
                   slot="prepend"
                   class="el-select" placeholder="搜索类型"
                   style="min-width:135px;text-center"
        >
            <el-option
                v-for="item in filter_types"
                :key="item.value"
                :label="item.label"
                :value="item.value">
            </el-option>
        </el-select>
        <el-button
            slot="append"
            type="primary"
            icon="el-icon-search">

        </el-button>

    </el-input>
</template>

<script>

    export default {
        name: "Search",
        data() {
            return {
                filter_types: [
                    {
                        label: '活动名称',
                        value: 'activity.name'
                    },
                    {
                        label: '证书编码',
                        value: 'code'
                    },
                    {
                        label: '获奖个人/单位',
                        value: 'name'
                    },
                    {
                        label: '奖项代码',
                        value: 'award.id'
                    }
                ]
            }
        },
        computed: {
            filter_key: {
                get: function () {
                    return this.$store.state.filter_key
                },
                set: function (newValue) {
                    return this.$store.commit('filter_key', {filter_key: newValue})
                }
            },
            filter_value: {
                get: function () {
                    return this.$store.state.filter_value
                },
                set: function (newValue) {
                    return this.$store.commit('filter_value', {filter_value: newValue})
                }
            }
        }
        ,
        methods: {
            search() {
                this.$store.dispatch("Update", this)
            }
        }
    }
</script>

<style scoped>

</style>
