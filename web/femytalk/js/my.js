function imgclick(img) {

	var msg="{\"msg\":\"img-view\",\"url\":\""+img.src+"\"}";
	window.parent.postMessage(msg,"*");
}

function talk(p2){
	
	$.get("getuser.php?p="+p,function(d,e){
		var r=JSON.parse(d);
		if(r.level<2){
			var msg="{\"msg\":\"2lv-access\"}";
			window.parent.postMessage(msg,"*");
			return;			
		}else{
			mkroom(p,p2);
		}
	});
}

function mkroom(p1,p2){

	var rt=4;
	var name="{\"p1\":\""+p1+"\",\"p2\":\""+p2+"\"}";
	$.post("createchat.php",{
		name:name,
		type:rt,
		p:p,
		all:0
	},(d,e)=>{ 
		$.post("setpush.php",{
			p:p2,
			push:d
		},function(d,e){});
		var msg="{\"msg\":\"create-chat-success\",\"id\":"+d+"}";
		window.parent.postMessage(msg,"*");
	 });
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