import Vue from 'vue';
import router from "./router";
import store from "./store"
import App from "./App";
import api from "./http/api";
import http from "./http/http";

import {
    Pagination,
    Input,
    Select,
    Option,
    Button,
    Table,
    TableColumn,
    Row,
    Col,
    Loading,
    Card
} from 'element-ui';

import 'element-ui/lib/theme-chalk/index.css';

Vue.use(Pagination)
Vue.use(Input)
Vue.use(Select)
Vue.use(Option)
Vue.use(Button)
Vue.use(Table)
Vue.use(TableColumn)
Vue.use(Row)
Vue.use(Col)
Vue.use(Loading)
Vue.use(Card)

// 后端地址
Vue.prototype.$url = APP_URL + '/api/v1'

// 对后端接口 使用全局注册
Vue.prototype.$api = api;

// 对请求方式进行全局注册

Vue.prototype.$http = http
new Vue({
    router,
    store,
    render: h => h(App)
}).$mount("#app")
