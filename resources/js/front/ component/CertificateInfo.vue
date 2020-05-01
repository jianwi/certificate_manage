<template>
    <div>
        <div ref="cer_container" class="mt-3" v-html="certificate">

        </div>
        <div class="text-center" checked="my-5" style="margin-bottom: 50px" v-show="!isPrint">
            <button class="btn btn-success" @click="print">一键打印</button>
        </div>
    </div>

</template>

<script>
    export default {
        name: "CertificateInfo",
        data() {
            return {
                certificate: "",
                isPrint: false
            }
        },
        methods:{
          print(){
              this.isPrint = true
              setTimeout(()=>{
                  window.print()
              },300)

          }
        },
        mounted() {
            this.$http.get(this.$url + '/certificates/' + this.$route.params.code,).then(res => {
                // console.log("返回的res是", res)
                let template = res.data.data.template
                let texts = res.data.data.text
                // console.log('texts 的值：', texts)
                let origin_key = template.match(/\$\{[^}]+\}/g)

                // console.log("origin_key：" + origin_key)
                for (let i of origin_key) {
                    let striped_key = i.replace(/[${}]/g, "")
                    template = template.replace(i, texts[striped_key])
                    // console.log("第" + i + "次：", template)
                }
                this.certificate = template
                // setTimeout(()=>{
                //     let cer = document.getElementById('cer')
                //     let container = this.$refs.cer_container
                //     let container_w = container.clientWidth
                //     let cer_w = cer.clientWidth
                //     console.log(cer_w)
                //     if(container_w < cer_w){
                //         let scale = Math.floor((container_w / cer_w)*100)/100
                //         cer.style.transform = 'scale('+scale+')'
                //     }
                // },100);

            })
        }
    }
</script>
<style scoped>
    @font-face {
        font-family: 'award';
        src: url('/fonts/certificate/华文行楷.ttf');
        font-style: normal;
    }
</style>
