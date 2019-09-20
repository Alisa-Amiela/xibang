const{server,excel} = require("@douzhi/database");
// 降序
server()
.whenApi("/case")
.dataReady(()=>excel("database/case").findAll({
	orderBy:{
		id:"desc"
	}
})
)
.response();
// 查看记录
server()
.whenApi("/case/view")
.dataReady(request => excel("database/case").findByPk(request.get("id")))
.response();
//添加记录
server()
.whenApi("/case/add")
.dataReady(request => excel("database/case").create(request.get()))
.response();
// 更新记录
server()
.whenApi("/case/edit")
.dataReady(request => excel("database/case").update(request.get(),{
	where:{
		id:request.get("id")
	}
})
)
.response();
// 删除记录
server()
.whenApi("/case/delete")
.dataReady(request => excel("database/case").delete({
	where:{
		id:request.get("id")
	}
})
)
.response();