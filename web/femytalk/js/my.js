function imgclick(img) {

	var msg="{\"msg\":\"img-view\",\"url\":\""+img.src+"\"}";
	window.parent.postMessage(msg,"*");
}


function delfriend(p,f){
	$.get("addfriend.php?p="+p,function(d,e){
		var r=JSON.parse(d);
		var fail=0;
		if(!fail){
			r.splice(r.indexOf(f),1);
			var buddy=JSON.stringify(r);
			$.post("setfriend.php",{
				p:p,
				buddy:buddy
			},function(d,e){
				var msg="{\"msg\":\"remove-friend-success\"}";
				window.parent.postMessage(msg,"*");
				location.reload();
			});
		}
	});
}