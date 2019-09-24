const{server,excel} = require("@douzhi/database");

server()
.whenApi("/news")
.dataReady(()=>excel("database/news").findAll())
.response();

//查询单挑记录
server()
.whenApi("/news/view")
.dataReady(request => excel("database/news").findByPk(request.get("id")))
.response();
//添加记录
server()
.whenApi("/news/add")
.dataReady(request => excel("database/news").create(request.get()))
.response();
server()
.whenApi("/news")
.dataReady(()=>excel("database/news").findAll({
	orderBy:{
		id:"desc"
	}
})
)
.response();
// 更新记录
server()
.whenApi("/news/edit")
.dataReady(request => excel("database/news").update(request.get(),{
	where:{
		id:request.get("id")
	}
})
)
.response();
// 删除记录
server()
.whenApi("/news/delete")
.dataReady(request => excel("database/news").delete({
	where:{
		id:request.get("id")
	}
})
)
.response();