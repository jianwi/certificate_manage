import Vue from 'vue'
import App from './App'

import cuCustom from './colorui/components/cu-custom.vue'
Vue.component('cu-custom',cuCustom)

Vue.config.productionTip = false

Vue.prototype.$url = 'https://jialidun.vip'

App.mpType = 'app'

const app = new Vue({
    ...App
})
app.$mount()
