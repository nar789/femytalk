window.onload=init();
var cnt={};
var color={};



function loaddata(){
	cnt={};color={};
	$.get("getmember.php?id="+id,function(d,e){
		r=JSON.parse(d);
		for(var i=0;i<r.length;i++)
		{
			cnt[r[i].phone]=r[i].cnt;
			color[r[i].phone]=r[i].color;
		}
	});
}

function back(){
	var msg="{\"msg\":\"go-home\"}";
	window.parent.postMessage(msg,"*");
}

function comparedata(){
	$.get("getmember.php?id="+id,function(d,e){
		c=JSON.parse(d);
		for(var i=0;i<c.length;i++){
			if(c[i].phone==p)continue;
			var enter_check=cnt[c[i].phone]===undefined;
			if(enter_check){
				$.get("getmsg.php?p="+c[i].phone,function(d,e){
					var data=JSON.parse(d);
					showenter(d.name);
				});
				loaddata();
			}
			else if(cnt[c[i].phone]!=c[i].cnt)
			{
				cnt[c[i].phone]=c[i].cnt;
				getmsg(c[i].phone);
			}
		}
	});	
}


function sendmsg(){

	var msg=$("#msg").val();
	$("#msg").val("");
	showmymsg(mynick,msg,1);
	$.get("sendmsg.php?id="+id+"&p="+p+"&msg="+msg,function(d,e){

	});
}

function showmymsg(nick,msg,color){
	var k=$("#chat").html();
	var a="<div class='mt-1 msg'><div class='my-name'>"+nick+"▶</div><div class='ml-2 my-msg'>"+msg+"</div></div>";
	$("#chat").html(k+a);
	movescroll();
}

function showyoumsg(nick,msg,color){
	var k=$("#chat").html();
	var a="<div class='mt-1 msg'><div class='you-name'>"+nick+"▶</div><div class='ml-2 you-msg'>"+msg+"</div></div>";
	$("#chat").html(k+a);
	movescroll();
}

function movescroll(){
	var chat=document.getElementById("chat");
	chat.scrollTop=chat.scrollHeight;
}

function getmsg(phone){
	
	$.get("getmsg.php?p="+phone,function(d,e){
		var data=JSON.parse(d);
		
		showyoumsg(data.name,data.msg,color[phone]);
	});
}

function showenter(nick){
	var k=$("#chat").html();
	var a="<div><center><div class='mt-3 mb-3 sys'>"+nick+" 님이 입장하셨습니다.</div></center></div>";
	$("#chat").html(k+a);
	movescroll();
}

function init(){
	var chat=document.getElementById("chat");
	var winh=$(window).height();
	h=parseInt(winh)-100-20;
	chat.style.height=h+'px';
	loaddata();
	setInterval(()=>{comparedata();},1000);
	showenter(mynick);

	$("#msg").keyup(function(e){
		if(e.keyCode==13){
			sendmsg();
		}
	});
}

