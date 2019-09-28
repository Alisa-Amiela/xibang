Page({
	data:{
//		临时存储点
		nav:{}
	},
	created(){
		//发起请求向数据接口获取数据
		axios.get("api/nav.php/nav/view?id=" + this.$route.query.id).then(response => {
			this.nav = response.data;
		});
	},
	methods:{
		doSubmit(){
			axios.post("api/nav.php/nav/edit?id="+ this.$route.query.id,this.nav)
			.then(() => {
				this.layer.confirm("更新成功",{btn:["关闭"]});
			});
			}
	}
});