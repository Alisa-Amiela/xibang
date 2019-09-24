Page({
	data:{
		item:{}
	},
	created(){
		axios.get("api/case.php/case/view?id="+ this.$route.query.id).then(response => {
			this.item = response.data;
		});
	}
});
