function enter(id,level){
	$.get("getuser.php?p="+p,function(d,e){
		var r=JSON.parse(d);
		if(r.level<level)
		{
			var msg="{\"msg\":\""+level+"lv-access\"}";
			window.parent.postMessage(msg,"*");
		}else{
			location.href="roomdetail.php?id="+id+"&phone="+p;
		}
	});
	
}