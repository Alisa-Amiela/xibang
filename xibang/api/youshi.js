const{server,excel} = require("@douzhi/database");

server()
.whenApi("/youshi")
.dataReady(()=>excel("database/youshi").findAll())
.response();

//查询单挑记录
server()
.whenApi("/youshi/view")
.dataReady(request => excel("database/youshi").findByPk(request.get("id")))
.response();
//添加记录
server()
.whenApi("/youshi/add")
.dataReady(request => excel("database/youshi").create(request.get()))
.response();
server()
.whenApi("/youshi")
.dataReady(()=>excel("database/youshi").findAll({
	orderBy:{
		id:"desc"
	}
})
)
.response();
// 更新记录
server()
.whenApi("/youshi/edit")
.dataReady(request => excel("database/youshi").update(request.get(),{
	where:{
		id:request.get("id")
	}
})
)
.response();
// 删除记录
server()
.whenApi("/youshi/delete")
.dataReady(request => excel("database/youshi").delete({
	where:{
		id:request.get("id")
	}
})
)
.response();