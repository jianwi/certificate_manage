<template>
    <div v-html="certificate">

    </div>
</template>

<script>
    export default {
        name: "CertificateInfo",
        data() {
            return {
                certificate: ""
            }
        },
        mounted() {
            this.$http.get(this.$url + '/certificates/' + this.$route.params.code,).then(res => {
                console.log("返回的res是", res)
                let template = res.data.data.template
                let texts = res.data.data.text
                console.log('texts 的值：', texts)
                let origin_key = template.match(/\$\{[^}]+\}/g)

                console.log("origin_key：" + origin_key)
                for (let i of origin_key) {
                    let striped_key = i.replace(/[${}]/g, "")
                    template = template.replace(i, texts[striped_key])
                    console.log("第" + i + "次：", template)
                }
                this.certificate = template

            })
        }
    }
</script>

<style scoped>

</style>
