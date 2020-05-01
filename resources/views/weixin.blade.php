<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>证书查询</title>
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcdn.net/ajax/libs/vue/2.6.11/vue.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/axios/0.19.2/axios.min.js"></script>
</head>
<style>
    #container {
        background: #f8f8f8;
        min-height: 100vh;
        margin: 1%;
        width: 98%;
        border: 10px #e0bb8f double;
    }

    #search_box {
        border: 0;
        border-bottom: 2px black solid;
        width: 100px;
        background: transparent;
    }

    #text {
        text-indent: 2em;
    }
</style>
<body style="background: white">
<div id="container" class="container p-2">
    <div class="text-center">
        <img style="width: 58px" class="img-sm" src="images/gold.png">
    </div>
    <div class="text-center mt-1 font-weight-bolder">
        <p class="h2">
            荣誉证书
        </p>
        <p style="font-size: 0.75em">CERTIFICATE OF HONOR</p>
    </div>
    <div id="app">
        <p class="mt-5">
            优秀的<input v-model="name" class="text-center" id="search_box"> 同学:
        </p>
        <p class="my-4" id="text" v-show="!failMessage">
            系统检测到您过于优秀,特此为您颁发了大量证书.请您前来领取.
        </p>
        <p v-show="failMessage" class="my-4 text-center">
            系统没有找到您的证书哦...
            <br>
            是不是名字写错了?
        </p>
        <p class="text-center" v-show="!certificates">
            <button class="btn btn-success" @click="search">一键查询</button>
        </p>
        <div id="certificates_table" v-show="certificates">

            <div class="alert alert-success" v-text="message" v-show="message">

            </div>
            <table class="w-100 table table-responsive table-hover">
                <thead>
                <tr class="text-center">
                    <td>活动名称</td>
                    <td>姓名</td>
                </tr>
                </thead>
                <tr v-for="certificate in certificates"
                    @click.stop="toCertificte(certificate.code)"
                >
                    <td
                        style="
                            max-width: 120px;
                            overflow: auto;
                            white-space: nowrap;"
                        v-text="certificate.activity"></td>
                    <td v-text="certificate.name"
                        style="
                            white-space: nowrap;"
                    >
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script>
    let app = new Vue({
        el: '#app',
        data: {
            name: '',
            certificates: null,
            message: ''  ,
            failMessage: false
        },
        methods: {
            search() {
                if (this.name == "") return
                axios.get('{{ config('app.url') }}' + '/api/v1/certificates?page=1&per_page=30&filter[name]=' + this.name).then(res => {
                    console.log(res);
                    window.data = res.data.data;
                    if (data.length == 0) {

                        this.failMessage = true
                    } else {
                        this.message = '您曾获得以下证书';
                        this.failMessage = false
                        this.certificates = res.data.data
                    }

                })
            },
            toCertificte(code) {
                console.log(code)
                location.href = '{{ config('app.url')  }}' + '/#/info/' + code
            }
        }
    })
</script>
</body>
</html>
