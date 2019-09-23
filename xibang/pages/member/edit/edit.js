Page({
	data:{
//		临时存储点
		member:{}
	},
	created(){
		//发起请求向数据接口获取数据
		axios.get("pages/member/edit/edit.json").then(response => {
			this.member = response.data;
		});
	}
});