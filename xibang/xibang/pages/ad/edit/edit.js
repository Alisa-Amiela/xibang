Page({
	data:{
//		临时存储点
		ad:[]
	},
	created(){
		//发起请求向数据接口获取数据
		axios.get("/pages/ad/edit/edit.json").then(response => {
			this.ad = response.data;
		});
	}
});