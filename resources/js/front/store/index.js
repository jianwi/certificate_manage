import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        page_size: 10,
        certificates: [],
        current_page: 1,
        total: undefined,
        filter_key: 'code',
        filter_value: undefined,
    },
    mutations: {
        SetPageSize(state, {page_size}) {

            // console.log('设置page_size:' + page_size)
            state.page_size = page_size
        },
        SetCertificates(state, {certificates}) {
            state.certificates = certificates
        },
        SetCurrentPage(state, {current_page}) {
            state.current_page = current_page
        },
        SetTotal(state, {total}) {
            state.total = total
        },
        SetFilterKey(state,{ filter_key }){
            state.filter_key = filter_key
        },
        SetFilterValue(state,{ filter_value }){
            state.filter_value = filter_value
        },
        CancelFilterValue(state){
            state.filter_value = undefined
        }
    },
    actions: {
        Update({commit, state}, app) {
            let params = {
                'page': state.current_page,
                'per_page': state.page_size
            }

            if('undefined' != typeof state.filter_value) {
                Vue.set(params, 'filter[' + state.filter_key + ']', state.filter_value)

                // console.log('现在给params 添加了filter')
            }

            app.$http.get(app.$url + '/certificates', params).then(res => {
                commit('SetCertificates', {certificates: res.data.data})
                commit('SetTotal', {total: res.data.meta.total})

            })
        }
    }
})

export default store
