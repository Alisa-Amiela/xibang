Page({
	data:{
//		临时存储点
		news:{}
	},
	created(){
		//发起请求向数据接口获取数据
		axios.get("api/news.php/news/view?id=" + this.$route.query.id).then(response => {
			this.news = response.data;
		});
	},
	methods:{
		doSubmit(){
			axios.post("api/news.php/news/edit?id="+ this.$route.query.id,this.news)
			.then(() => {
				this.layer.confirm("更新成功",{btn:["关闭"]});
			});
			}
	}
});