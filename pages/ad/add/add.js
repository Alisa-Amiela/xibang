Page({
    data:{
        ad:{}
    },
    methods:{
        doSubmit(){
            axios.post("api/ad.php/ad/add",this.ad);
        }
    },
    methods:{
		doSubmit(){
			axios.post("api/ad.php/ad/add?id="+ this.$route.query.id,this.ad)
			.then(() => {
				this.layer.confirm("添加成功",{btn:["关闭"]});
			});
			}
	}
});