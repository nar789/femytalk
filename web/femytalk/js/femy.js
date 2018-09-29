

function imgclick(img) {

	var msg="{\"msg\":\"img-view\",\"url\":\""+img.src+"\"}";
	window.parent.postMessage(msg,"*");
}


function addfriend(p,f){
	$.get("addfriend.php?p="+p,function(d,e){
		var r=JSON.parse(d);
		var fail=0;
		for(var i=0;i<r.length;i++){
			if(r[i]==f){
				var msg="{\"msg\":\"add-friend-fail\"}";
				window.parent.postMessage(msg,"*");
				fail=1;
				break;
			}
		}
		if(!fail){
			r.push(f);
			var buddy=JSON.stringify(r);
			$.post("setfriend.php",{
				p:p,
				buddy:buddy
			},function(d,e){
				var msg="{\"msg\":\"add-friend-success\"}";
				window.parent.postMessage(msg,"*");
			});
		}
	});
}