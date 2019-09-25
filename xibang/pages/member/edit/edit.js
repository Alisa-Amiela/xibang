Page({
	data:{
//		临时存储点
		member:{}
	},
	created(){
		//发起请求向数据接口获取数据
		axios.get("api/index.php/member/view?id=" + this.$route.query.id).then(response => {
			this.member = response.data;
		});
	},
	methods:{
		doSubmit(){
			axios.post("api/index.php/member/edit?id="+ this.$route.query.id,this.member);
			}
	}
});