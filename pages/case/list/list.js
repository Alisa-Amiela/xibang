Page({
	data:{
//		临时存储点
		items:[]
	},
	created(){
		//发起请求向数据接口获取数据
		axios.get("api/case.php/case").then(response => {
			this.items = response.data;
			// 重载表格
			this.$nextTick(() => {
				layui.use("table",()=>{
					layui.table.init("dz-table");
				});
			});
		});
	}
});