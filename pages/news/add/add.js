Page({
    data:{
        news:{}
    },
    methods:{
        doSubmit(){
            axios.post("api/news.php/news/add",this.news);
        }
    },
    methods:{
		doSubmit(){
			axios.post("api/news.php/news/add?id="+ this.$route.query.id,this.news)
			.then(() => {
				this.layer.confirm("添加成功",{btn:["关闭"]});
			});
			}
	}
});