Page({
	data:{
//		临时存储点
		ads:[]
	},
	created(){
		//发起请求向数据接口获取数据
		axios.get("/pages/ad/list/list.json").then(response => {
			this.ads = response.data;
		});
	}
});