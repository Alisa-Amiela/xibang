Page({
	data:{
		zuopin:{}
	},
	created(){
		axios.get("api/zuopin.php/zuopin/view?id="+ this.$route.query.id).then(response => {
			this.zuopin = response.data;
		});
	}
});
