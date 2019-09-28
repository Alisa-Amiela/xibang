Page({
    data:{
        member:{}
    },
    methods:{
        doSubmit(){
            axios.post("api/index.php/member/add",this.member);
        }
    },
    methods:{
		doSubmit(){
			axios.post("api/index.php/member/add?id="+ this.$route.query.id,this.member)
			.then(() => {
				this.layer.confirm("添加成功",{btn:["关闭"]});
			});
			}
	}
});