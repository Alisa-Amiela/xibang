Page({
    data:{
        item:{}
    },
    methods:{
        doSubmit(){
            axios.post("api/case.php/case/add",this.item);
        }
    },
    methods:{
		doSubmit(){
			axios.post("api/case.php/case/add?id="+ this.$route.query.id,this.item)
			.then(() => {
				this.layer.confirm("添加成功",{btn:["关闭"]});
			});
			}
	}
});