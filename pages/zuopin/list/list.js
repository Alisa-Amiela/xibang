Page({
	data:{
//		临时存储点
		zuopin:[]
	},
	created(){
		//发起请求向数据接口获取数据
		axios.get("api/zuopin.php/zuopin").then(response => {
			this.zuopin = response.data;
			// 重载表格
			this.$nextTick(() => {
				layui.use("table",()=>{
					layui.table.init("dz-table");
				});
			});
		});
	}
});