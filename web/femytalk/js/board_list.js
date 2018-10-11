window.onload=init();
function init() {
	
	$.get("getboard.php",function(d,e){
		
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
			var content=decodeURIComponent(r[i].content);
			content=unescape(content);
			//content=content.replace(/<div>/gi," ");
			//content=content.replace(/<\/div>/gi," ");
			//content=content.replace(/<br>/gi," ");
			var urls=[];
			if(content.indexOf("src=\"")>=0)
			{
				var url=content.split("src=\"");
				var u=url[1].slice(0,url[1].indexOf("\""));
				urls.push(u);
				if(url[2]){
					u=url[2].slice(0,url[2].indexOf("\""));
					urls.push(u);
				}
			}
			for(var k=0;k<urls.length;k++)
			{
				$("#imgloader"+i).append("<img style='width:150px;height:100px;margin-right:5px;margin-top:10px;' src="+urls[k]+">");
			}


			content=content.replace(/<img[^>]*>/g,"");

			//var img="<img src="+m[1]+">";
			$("#content"+i).append(content);
		}
	});
}

function cardclick(id){
	//location.href="board_detail.php?p="+p+"&id="+id;
	var msg="{\"msg\":\"go-board-detail\",\"id\":"+id+"}";
	window.parent.postMessage(msg,"*");
}

function plusclick(){
	var msg="{\"msg\":\"go-board-create\"}";
	window.parent.postMessage(msg,"*");	
}
