Page({
	data:{
//		临时存储点
		ads:[]
	},
	created(){
		//发起请求向数据接口获取数据
		axios.get("api/ad.php/ad").then(response => {
			this.ads = response.data;
			// 重载表格
			this.$nextTick(() => {
				layui.use("table",()=>{
					layui.table.init("dz-table");
				});
			});
		});
	}
});