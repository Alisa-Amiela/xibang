Page({
	data:{
		member:{}
	},
	created(){
		axios.get("api/index.php/member/view?id="+ this.$route.query.id).then(response => {
			this.member = response.data;
		});
	}
});
