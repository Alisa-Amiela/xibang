Page({
	data:{
//		临时存储点
		item:{}
	},
	created(){
		//发起请求向数据接口获取数据
		axios.get("api/case.php/case/view?id=" + this.$route.query.id).then(response => {
			this.item = response.data;
		});
	},
	methods:{
		doSubmit(){
			axios.post("api/case.php/case/edit?id="+ this.$route.query.id,this.item)
			.then(() => {
				this.layer.confirm("更新成功",{btn:["关闭"]});
			});
			}
	}
});