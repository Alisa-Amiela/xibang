Page({
	data:{
		ad:{}
	},
	created(){
		axios.get("api/ad.php/ad/view?id="+ this.$route.query.id).then(response => {
			this.ad = response.data;
		});
	}
});
