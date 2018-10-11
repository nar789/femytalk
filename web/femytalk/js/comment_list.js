window.onload=init();
function init() {
	$.get("getcomment.php?bid="+bid,function(d,e){
		var r=JSON.parse(d);
		for(var i=0;i<r.length;i++)
		{
			$.get("getuser.php?p="+r[i].writer,function(d,e){
				var j=JSON.parse(d);
				var txt=j.name;
				var txt2=" ("+j.sex+", "+j.age+", "+j.upto+")";
				$(".info"+j.phone).text(txt);
				$(".info2"+j.phone).text(txt2);
				$(".img"+j.phone).attr("src",j.img);
			});
			$("#time"+i).text(r[i].time);
			$("#content"+i).text(r[i].content);
		}
	});
	
	
}

function del(id){
	$.get("setcomment.php?id="+id,function(d,e){
		if(d=="success"){
			$("#c-g"+id).remove();
			var msg="{\"msg\":\"comment-delete-success\"}";
			window.parent.postMessage(msg,"*");
		}
	});
}