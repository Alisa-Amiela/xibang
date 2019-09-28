Page({
	data:{
//		临时存储点
		zuopin:{}
	},
	created(){
		//发起请求向数据接口获取数据
		axios.get("api/zuopin.php/zuopin/view?id=" + this.$route.query.id).then(response => {
			this.zuopin = response.data;
		});
	},
	methods:{
		doSubmit(){
			axios.post("api/zuopin.php/zuopin/edit?id="+ this.$route.query.id,this.zuopin)
			.then(() => {
				this.layer.confirm("更新成功",{btn:["关闭"]});
			});
			}
	}
});