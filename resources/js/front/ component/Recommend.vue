<template>
    <el-card
        class="card-box"
    >
        <!--        <p>-->
        <!--            <b>年份：</b>-->
        <!--            <el-button type="mini">2020</el-button>-->
        <!--        </p>-->
        <p>
            <b>活动：</b>
            <el-button type="mini"
                       class="item-box"
                       @click="ActivitiesAll"
            >
                全部
            </el-button>
            <el-button
                class="item-box"
                size="mini"
                v-for="(activity,index) in activities"
                :key="index"
                :data-activity-id="activity.id"
                @click.stop="ActivityClickHandle(activity.id,activity.name)"
            >
                {{ activity.name }}
            </el-button>
        </p>
        <p v-show="awards.length != 0">
            <b>奖项：</b>
            <el-button class="item-box"
                       size="mini"
                       v-for="(award,index) in awards"
                       :key="index"
                       @click="AwardClickHandle(award.id)"
            >
                {{ award.name }}
            </el-button>

        </p>
    </el-card>
</template>

<script>
    export default {
        name: "Recommend",
        data() {
            return {
                activities: [],
                awards: [],
            }
        },
        methods: {
            ActivityClickHandle(activity_id, activity_name) {

                this.$store.commit('filter_key', {
                    filter_key: 'activity.name'
                })

                this.$store.commit('filter_value', {
                    'filter_value': activity_name
                })

                this.$store.dispatch('Update', this)

                this.$http.get(this.$url + '/awards/' + activity_id).then(res => {
                    this.awards = res.data.data
                })
            },
            AwardClickHandle(award_id) {
                this.$store.commit('filter_key', {filter_key: 'award.id'})
                this.$store.commit('filter_value', {filter_value: award_id})

                this.$store.dispatch('Update', this)
            },
            ActivitiesAll(){
                this.$store.commit('CancelFilterValue')
                this.awards = []
                this.$store.dispatch('Update', this)
            }
        },
        created() {
            let loading = this.$loading({
                lock: true,
                text: '加载中，等一哈子啊',
                spinner: 'el-icon-loading',
                background: 'rgba(0, 0, 0, 0.7)'
            });

            this.$http.get(this.$url + '/activities').then(res => {
                this.activities = res.data.data
                loading.close()
            });
        }
    }
</script>

<style scoped>
    card-box {
        padding: 10px;
    }

    .item-box {
        margin: 2px 1px 2px 1px;
    }
</style>
