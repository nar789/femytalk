function buy(){
	var msg="{\"msg\":\"buy-complete\"}";
	window.parent.postMessage(msg,"*");
}

function getcnt(){
	$.get("getuser.php?p="+p,function(d,e){
		var r=JSON.parse(d);
		$("#heart-cnt").html(r.heart);
	});
}

function init(){
	setInterval(()=>{getcnt();},1000);
}

window.onload=init();