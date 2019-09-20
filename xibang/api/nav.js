const{server,excel} = require("@douzhi/database");

server()
.whenApi("/nav")
.dataReady(()=>excel("database/nav").findAll())
.response();
//查询单挑记录
server()
.whenApi("/navs/view")
.dataReady(request => excel("database/nav").findByPk(request.get("id")))
.response();
//添加记录
server()
.whenApi("/navs/add")
.dataReady(request => excel("database/nav").create(request.get()))
.response();

server()
.whenApi("/nav")
.dataReady(()=>excel("database/nav").findAll({
	orderBy:{
		id:"desc"
	}
})
)
.response();
// 更新记录
server()
.whenApi("/navs/edit")
.dataReady(request => excel("database/nav").update(request.get(),{
	where:{
		id:request.get("id")
	}
})
)
.response();
// 删除记录
server()
.whenApi("/nav/delete")
.dataReady(request => excel("database/nav").delete({
	where:{
		id:request.get("id")
	}
})
)
.response();
