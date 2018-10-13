

function imgclick(img) {

	var msg="{\"msg\":\"img-view\",\"url\":\""+img.src+"\"}";
	window.parent.postMessage(msg,"*");
}

function talk11(p2){

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

	$.post("sendpush.php",{
		p1:p1,
		p2:p2
	},function(d,e){});

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



function addfriend(p,f){
	
	$.get("getuser.php?p="+p,function(d,e){
		var r=JSON.parse(d);
		if(r.level<1){
			var msg="{\"msg\":\"1lv-access\"}";
			window.parent.postMessage(msg,"*");
			return;			
		}else{
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
	});

	
}