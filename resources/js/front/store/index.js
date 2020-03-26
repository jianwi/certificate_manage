import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        page_size: 10,
        certificates: [],
        current_page: 1,
        total: undefined,
    },
    mutations:{
        SetPageSize(state,{ page_size }){
            console.log('设置page_size:'+ page_size)
            state.page_size = page_size
        },
        SetCertificates(state,{ certificates }){
            state.certificates = certificates
        },
        SetCurrentPage(state,{ current_page }){
            state.current_page = current_page
        },
        SetTotal(state,{ total }){
            state.total = total
        }
    },
    actions:{
        Init({ commit,state },app){
            app.$http.get(app.$url + '/certificates').then(res => {
                commit('SetCertificates',{certificates: res.data.data})
                commit('SetTotal',{ total: res.data.meta.total})
            })
        },
        Update({ commit,state },app){
            console.log(app)
            app.$http.get(app.$url + '/certificates?' + 'page=' + state.current_page + '&per_page=' + state.page_size).then(res => {
                commit('SetCertificates',{certificates: res.data.data})
            })
        }
    }
})

export default store
