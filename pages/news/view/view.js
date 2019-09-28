Page({
	data:{
		news:{}
	},
	created(){
		axios.get("api/news.php/news/view?id="+ this.$route.query.id).then(response => {
			this.news = response.data;
		});
	}
});
