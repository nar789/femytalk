function enter(id,p)
{
	$.get("getban.php?id="+id,function(d,e){
		var r=JSON.parse(d);
		for(var i=0;i<r.length;i++){
			if(r[i]==p){
				var msg="{\"msg\":\"i-am-ban\"}";
				window.parent.postMessage(msg,"*");
				return;
			}
		}


		$.get("getmember.php?id="+id,
			function(d,e){
				var j=JSON.parse(d);
				var members={};
				for(var i=0;i<j.length;i++)
				{
					members[j[i].phone]=j[i].cnt;
				}
				var enter_check=members[p]===undefined;
				if(enter_check){
					a={};
					a.phone=p;
					a.cnt=0;
					a.color=Math.floor(Math.random() * 10) + 1;
					j.push(a);
					var member=JSON.stringify(j);

					$.get("addmember.php?id="+id+"&member="+member,
						function(d,e){ 
							var msg="{\"msg\":\"go-chat\",\"id\":"+id+"}";
							window.parent.postMessage(msg,"*");

						});
				}else{
					var msg="{\"msg\":\"go-chat\",\"id\":"+id+"}";
					window.parent.postMessage(msg,"*");				
				}
			});

	});
	


}