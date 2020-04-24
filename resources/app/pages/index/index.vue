<template>
	<view>
		<view class="cu-bar bg-blue search-form">
			<view class="search-form round">
				<text class="cuIcon-search"></text>
				<input type="text" value="" placeholder="请输入关键字" />
			</view>
			<view class="action">
				<picker mode="selector" :value="index" :range="filter_types" @change="">
					<view>{{ filter_types['index']}}</view>
				</picker>

				<text class="cuIcon-triangledownfill"></text>
			</view>
		</view>
	</view>
</template>
<script>
	export default {
		data() {
			return {
				index:'1',
				search_type: '',
				filter_types: [{
						label: '活动名称',
						value: 'activity.name'
					},
					{
						label: '证书编码',
						value: 'code'
					},
					{
						label: '获奖个人/单位',
						value: 'name'
					},
					{
						label: '奖项代码',
						value: 'award.id'
					}
				]
			}
		},
		onLoad() {

		},
		methods: {

		}
	}
</script>
