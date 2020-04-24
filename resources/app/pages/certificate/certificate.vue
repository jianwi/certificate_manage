<template>
	<view class="content">
		<view class="text-area">
			<rich-text :nodes="certificate"></rich-text>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				certificate: ''
			}
		},
		onLoad() {
			uni.request({
				url: 'https://zs.jialidun.vip/api/v1/certificates/27BA59F4',
				success: (res) => {

					let template = res.data.data.template
					let texts = res.data.data.text
					let origin_key = template.match(/\$\{[^}]+\}/g)

					for (let i of origin_key) {
						let striped_key = i.replace(/[${}]/g, "")
						template = template.replace(i, texts[striped_key])
					}
					template = template.replace(/background-image: url\('/, "background-image: url('" + this.$url)
					this.certificate = template
				}
			})
		},
		methods: {

		}
	}
</script>

<style>
	
</style>
