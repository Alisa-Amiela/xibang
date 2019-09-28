Page({
    data:{
        single:{}
    },
    methods:{
        doSubmit(){
            axios.post("api/index.php/single/add",this.single);
        }
    },
    methods:{
		doSubmit(){
			axios.post("api/index.php/single/add?id="+ this.$route.query.id,this.single)
			.then(() => {
				this.layer.confirm("添加成功",{btn:["关闭"]});
			});
			}
	}
});