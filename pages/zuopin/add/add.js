Page({
    data:{
        zuopin:{}
    },
    methods:{
        doSubmit(){
            axios.post("api/zuopin.php/zuopin/add",this.zuopin);
        }
    },
    methods:{
		doSubmit(){
			axios.post("api/zuopin.php/zuopin/add?id="+ this.$route.query.id,this.zuopin)
			.then(() => {
				this.layer.confirm("添加成功",{btn:["关闭"]});
			});
			}
	}
});