const{server,excel} = require("@douzhi/database");

server()
.whenApi("/ad")
.dataReady(()=>excel("database/ad").findAll())
.response();
// 查看记录
server()
.whenApi("/ads/view")
.dataReady(request => excel("database/ad").findByPk(request.get("id")))
.response();
//添加记录
server()
.whenApi("/ads/add")
.dataReady(request => excel("database/ad").create(request.get()))
.response();
// 降序
server()
.whenApi("/ad")
.dataReady(()=>excel("database/ad").findAll({
	orderBy:{
		id:"desc"
	}
})
)
.response();
// 更新记录
server()
.whenApi("/ads/edit")
.dataReady(request => excel("database/ad").update(request.get(),{
	where:{
		id:request.get("id")
	}
})
)
.response();
// 删除记录
server()
.whenApi("/ad/delete")
.dataReady(request => excel("database/ad").delete({
	where:{
		id:request.get("id")
	}
})
)
.response();