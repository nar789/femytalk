function selrt(r){
	$("#rt1").css("background-color","#2d3540");
	$("#rt2").css("background-color","#2d3540");
	$("#rt3").css("background-color","#2d3540");
	$("#rt"+r).css("background-color","#445061");
	$("#rt").val(r);
}

function mkroom(){
	
	$.get("getuser.php?p="+p,function(d,e){
		var r=JSON.parse(d);
		/*
		if(r.level<1){
			var msg="{\"msg\":\"1lv-access\"}";
			window.parent.postMessage(msg,"*");
			return;			
		}else{*/
			var rt=$("#rt").val();
			if(rt!=1 && r.level<1)
			{
				var msg="{\"msg\":\"1lv-access\"}";
				window.parent.postMessage(msg,"*");
				return;			
			}else{
				var name=$("#rname").val();
				if(name=="")return;
				var all=$("#all").is(":checked");
				if(all)all=1;
				else all=0;
				$.post("createchat.php",{
					name:name,
					type:rt,
					p:p,
					all:all
				},(d,e)=>{ 

					var msg="{\"msg\":\"create-chat-success\",\"id\":"+d+"}";
					window.parent.postMessage(msg,"*");
				 });
			}
		//}
	});

}
