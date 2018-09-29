function selrt(r){
	$("#rt1").css("background-color","#2d3540");
	$("#rt2").css("background-color","#2d3540");
	$("#rt3").css("background-color","#2d3540");
	$("#rt"+r).css("background-color","#445061");
	$("#rt").val(r);
}

function mkroom(){
	var rt=$("#rt").val();
	var name=$("#rname").val();
	$.post("createchat.php",{
		name:name,
		type:rt,
		p:p
	},(d,e)=>{ 

		var msg="{\"msg\":\"create-chat-success\",\"id\":"+d+"}";
		window.parent.postMessage(msg,"*");
	 });
}
