<template>
    <div>
        <div ref="cer_container" class="mt-3" v-html="certificate">

        </div>
        <div class="w-75 m-auto" checked="my-5" style="margin-bottom: 50px" v-show="!isPrint">
            <div class="alert alert-primary text-left">
                微信不支持打印<br>
                手机端可以用谷歌浏览器打开此网页打印。（可打印为pdf）<br>
                电脑端可以用自带的 edge 浏览器打印
                <br>
                <div class="text-center p-2">
                    <button class="btn btn-success">转为图片</button>
                    <button class="btn btn-success" @click="print">打印</button>
                    <button class="btn btn-success" @click="saveToPng">保存为图片</button>
                </div>

            </div>
        </div>

    </div>

</template>

<script>
    import domtoimage from 'dom-to-image'
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
          },
          saveToPng(){
              var node = this.$refs.cer_container
              domtoimage.toJpeg(node, { quality: 1 })
                  .then(function (dataUrl) {
                      var link = document.createElement('a');
                      link.download = 'my-image-name.jpeg';
                      link.href = dataUrl;
                      link.click();
                  });
            },

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
