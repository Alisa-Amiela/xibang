const{server,excel} = require("@douzhi/database");

server()
.whenApi("/zuopin")
.dataReady(()=>excel("database/zuopin").findAll())
.response();
//查询单挑记录
server()
.whenApi("/zuopin/view")
.dataReady(request => excel("database/zuopin").findByPk(request.get("id")))
.response();
//添加记录
server()
.whenApi("/zuopin/add")
.dataReady(request => excel("database/zuopin").create(request.get()))
.response();
server()
.whenApi("/zuopin")
.dataReady(()=>excel("database/zuopin").findAll({
	orderBy:{
		id:"desc"
	}
})
)
.response();
// 更新记录
server()
.whenApi("/zuopin/edit")
.dataReady(request => excel("database/zuopin").update(request.get(),{
	where:{
		id:request.get("id")
	}
})
)
.response();
// 删除记录
server()
.whenApi("/zuopin/delete")
.dataReady(request => excel("database/zuopin").delete({
	where:{
		id:request.get("id")
	}
})
)
.response();