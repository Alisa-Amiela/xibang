Page({
	data:{
		nav:{}
	},
	created(){
		axios.get("api/nav.php/nav/view?id="+ this.$route.query.id).then(response => {
			this.nav = response.data;
		});
	}
});
