Page({
	data:{
//		临时存储点
		ad:{}
	},
	created(){
		//发起请求向数据接口获取数据
		axios.get("api/ad.php/ad/view?id=" + this.$route.query.id).then(response => {
			this.ad = response.data;
		});
	},
	methods:{
		doSubmit(){
			axios.post("api/ad.php/ad/edit?id="+ this.$route.query.id,this.ad)
			.then(() => {
				this.layer.confirm("更新成功",{btn:["关闭"]});
			});
			}
	}
});