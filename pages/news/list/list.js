Page({
	data:{
//		临时存储点
		news:[]
	},
	created(){
		//发起请求向数据接口获取数据
		axios.get("api/news.php/news").then(response => {
			this.news = response.data;
			// 重载表格
			this.$nextTick(() => {
				layui.use("table",()=>{
					layui.table.init("dz-table");
				});
			});
		});
	}
});