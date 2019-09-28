Page({
    data:{
        singles:[]
    },
    created(){
        axios.get("api/index.php/single").then(response => {
            this.singles = response.data;
            this.$nextTick(() => {
				layui.use("table",()=>{
					layui.table.init("dz-table");
				});
			});
        });
    }
});