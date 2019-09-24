const{server,excel} = require("@douzhi/database");

server()
.whenApi("/member")
.dataReady(()=>excel("database/member").findAll())
.response();

//查询单挑记录
server()
.whenApi("/members/view")
.dataReady(request => excel("database/member").findByPk(request.get("id")))
.response();
//添加记录
server()
.whenApi("/members/add")
.dataReady(request => excel("database/member").create(request.get()))
.response();
server()
.whenApi("/member")
.dataReady(()=>excel("database/member").findAll({
	orderBy:{
		id:"desc"
	}
})
)
.response();
// 更新记录
server()
.whenApi("/members/edit")
.dataReady(request => excel("database/member").update(request.get(),{
	where:{
		id:request.get("id")
	}
})
)
.response();
// 删除记录
server()
.whenApi("/member/delete")
.dataReady(request => excel("database/member").delete({
	where:{
		id:request.get("id")
	}
})
)
.response();