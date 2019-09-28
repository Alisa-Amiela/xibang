Page({
    data:{
        single:{}
    },
    created(){
        axios.get("api/index.php/single/view")
    }

});