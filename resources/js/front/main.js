import Vue from 'vue';
import router from "./router";
import store from "./store"
import App from "./App";
import api from "./http/api";
import http from "./http/http";

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
Vue.protop
Vue.use(ElementUI)

// 后端地址
Vue.prototype.$url = 'http://certificate-manage.test/api/v1'

// 对后端接口 使用全局注册
Vue.prototype.$api = api;

// 对请求方式进行全局注册

Vue.prototype.$http = http
new Vue({
    router,
    store,
    render: h => h(App)
}).$mount("#app")
