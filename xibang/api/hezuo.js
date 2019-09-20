const{server,excel} = require("@douzhi/database");

server()
.whenApi("/hezuo")
.dataReady(()=>excel("database/hezuo").findAll())
.response();

//查询单挑记录
server()
.whenApi("/hezuo/view")
.dataReady(request => excel("database/hezuo").findByPk(request.get("id")))
.response();
//添加记录
server()
.whenApi("/hezuo/add")
.dataReady(request => excel("database/hezuo").create(request.get()))
.response();
// 降序
server()
.whenApi("/hezuo")
.dataReady(()=>excel("database/hezuo").findAll({
	orderBy:{
		id:"desc"
	}
})
)
.response();
// 更新记录
server()
.whenApi("/hezuo/edit")
.dataReady(request => excel("database/hezuo").update(request.get(),{
	where:{
		id:request.get("id")
	}
})
)
.response();
// 删除记录
server()
.whenApi("/hezuo/delete")
.dataReady(request => excel("database/hezuo").delete({
	where:{
		id:request.get("id")
	}
})
)
.response();