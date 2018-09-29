function enter(id,p)
{
	$.get("getmember.php?id="+id,
		function(d,e){
			var j=JSON.parse(d);
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
		});


}