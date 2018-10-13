window.onload=checkban();
var cnt={};
var color={};
var textcolor=["#000000","#ae90d4","#1bd194","#ff5926","#265cff","#ff26ff","#ff5754","#15293b","#153b30","#ffff52","#ff54e3"];
var banp="";
var seli=-1;
var amiking=false;

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
	$.get("showchatmember.php?id="+id,function(d,e){
		$("#showchatmember").html("");
		$("#showchatmember").html(d);
	});	
}

function back(){
	var msg="{\"msg\":\"go-home\"}";
	window.parent.postMessage(msg,"*");
}

function comparedata(){
	$.get("getmember.php?id="+id,function(d,e){
		c=JSON.parse(d);
		if(c[0].phone==p)amiking=true;
		else amiking=false;
		var outlist=[];
		for(var i=0;i<c.length;i++){
			if(c[i].phone==p)continue;
			$.get("checkchatstate.php?id="+id+"&p="+c[i].phone+"&idx="+i,function(d,e){
				var r=JSON.parse(d);
				if(r.ret=="success"){

					var enter_check=cnt[r.p]===undefined;
					if(enter_check){
						$.get("getmsg.php?p="+r.p,function(d,e){
							var data=JSON.parse(d);
							showenter(data.name);
						});
						loaddata();
					}
					else if(cnt[r.p]!=c[r.idx].cnt)
					{
						cnt[r.p]=c[r.idx].cnt;
						getmsg(r.p);
					}		

				}else{
					$.get("getmsg.php?p="+r.p,function(d,e){
						var data=JSON.parse(d);
						showexit(data.name);
					});
					//outlist.push(r.idx);
					c.splice(r.idx,1);
					var cstr=JSON.stringify(c);
					$.get("addmember.php?id="+id+"&member="+cstr,function(d,e){ loaddata(); });
				}
			});
		}//for

		

		//getoutmemeber.php //아웃멤버 정보추고 새로 db업데이트 아웃표시 후에 loaddata
	});	
}

//loaddata할때마다 멤버표시 바뀌기


function sendmsg(){

	var msg=$("#msg").val();
	$("#msg").val("");
	showmymsg(mynick,msg,color[p]);
	$.get("sendmsg.php?id="+id+"&p="+p+"&msg="+msg,function(d,e){

	});
}

function sendimg(url){
	var msg=url;
	showmymsg(mynick,msg,color[p]);
	$.get("sendmsg.php?id="+id+"&p="+p+"&msg="+msg,function(d,e){

	});	
}

function showmymsg(nick,msg,color){
	var k=$("#chat").html();
	var imgchat=false;
	if(msg.indexOf("http")>=0){
		imgchat=true;
		msg="<img src=\""+msg+"\" style=\"width:100px;height:100px;\" onclick=\"showimg('"+msg+"')\">";
	}
	var a="";
	if(imgchat)
	{
		a="<div class='mt-1 msg' style='height:100px;'><div class='my-name' style='background-color:"+textcolor[color]+";'>"+nick+"&nbsp;\>\>&nbsp;</div><div class='ml-2 my-msg' style='color:"+textcolor[color]+";'>"+msg+"</div></div>";
	}
	else
		a="<div class='mt-1 msg' style='height:35px;'><div class='my-name' style='background-color:"+textcolor[color]+";'>"+nick+"&nbsp;\>\>&nbsp;</div><div class='ml-2 my-msg' style='color:"+textcolor[color]+";'>"+msg+"</div></div>";
	$("#chat").html(k+a);
	movescroll();
}

function showyoumsg(nick,msg,color){
	var k=$("#chat").html();
	var imgchat=false;
	if(msg.indexOf("http")>=0){
		imgchat=true;
		msg="<img src=\""+msg+"\" style=\"width:100px;height:100px;\" onclick=\"showimg('"+msg+"')\">";
	}
	var a="";
	if(imgchat)
	{
		a="<div class='mt-1 msg' style='height:100px;'><div class='you-name' style='color:"+textcolor[color]+";'>"+nick+"&nbsp;\>\>&nbsp;</div><div class='ml-2 you-msg' style='color:"+textcolor[color]+";'>"+msg+"</div></div>";
	}else
		a="<div class='mt-1 msg' style='height:35px;'><div class='you-name' style='color:"+textcolor[color]+";'>"+nick+"&nbsp;\>\>&nbsp;</div><div class='ml-2 you-msg' style='color:"+textcolor[color]+";'>"+msg+"</div></div>";
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

function showexit(nick){
	var k=$("#chat").html();
	var a="<div><center><div class='mt-3 mb-3 sys'>"+nick+" 님이 퇴장하셨습니다.</div></center></div>";
	$("#chat").html(k+a);
	movescroll();
}

function listenmsg(e){

	var r=JSON.parse(e.data);
	if(r.url){
		sendimg(r.url);
	}

}

function iamban(){
	var msg="{\"msg\":\"i-am-ban\"}";
	window.parent.postMessage(msg,"*");
	back();
}

function checkban(){
	
	window.addEventListener("message",listenmsg,false);
	var chat=document.getElementById("chat");
	var winh=$(window).height();
	h=parseInt(winh)-100-20;
	chat.style.height=h+'px';


	$.get("getban.php?id="+id,function(d,e){
		var r=JSON.parse(d);
		for(var i=0;i<r.length;i++)
		{
			if(r[i]==p){
				iamban();
				return;
			}
		}
		//init();
		presetting();
	});
}

function chatstate_update(){
	$.get("updatechatstate.php?id="+id+"&p="+p,function(d,e){

	});
}


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

	$.get("updatechatstate.php?id="+id+"&p="+p,function(d,e){
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
								init();

							});
					}else{
						init();
					}
				});

		});
	});
}

function presetting()
{
	enter(id,p);
}


function init(){

	loaddata();
	setInterval(()=>{comparedata();},1000);
	setInterval(()=>{chatstate_update();},1000);
	showenter(mynick);

	$("#msg").keyup(function(e){
		if(e.keyCode==13){
			sendmsg();
		}
	});
}

function showimg(url){
	var msg="{\"msg\":\"img-view\",\"url\":\""+url+"\"}";
	window.parent.postMessage(msg,"*");
}

function imgclick(){
	var msg="{\"msg\":\"photo\"}";
	window.parent.postMessage(msg,"*");
}

function plus(){
	$("#ban-g").css("display","block");
}

function plusclose(){
	$("#ban-g").css("display","none");	
}

function checkbox_click(t,i,len){
	for(var j=0;j<len;j++){
		$("#check"+j).css("visibility","hidden");	
	}
	$("#check"+i).css("visibility","visible");
	banp=t;
	seli=i;
}

function ban(){
	if(banp!="" && !amiking){
		var msg="{\"msg\":\"ban-only-king\"}";
		window.parent.postMessage(msg,"*");
		return;
	}
	if(banp!="" && seli!=0 ){
		$.get("getban.php?id="+id,function(d,e){

			var r=JSON.parse(d);
			r.push(banp);
			var msg=JSON.stringify(r);
			$.get("updateban.php?id="+id+"&ban="+msg,function(d,e){


				$.get("getmember.php?id="+id,function(d,e){
					var r=JSON.parse(d);
					var remove_i=0;
					for(var i=0;i<r.length;i++){
						if(r[i].phone==banp){remove_i=i; break;}
					}
					r.splice(remove_i,1);
					r=JSON.stringify(r);
					$.get("addmember.php?id="+id+"&member="+r,function(d,e){
						loaddata();
						$("#person"+seli).remove();
						var msg="{\"msg\":\"ban-complete\"}";
						window.parent.postMessage(msg,"*");
					});
				});

				
			});
		});
	}
}

function declare(){
	if(seli<0)return;
	var msg="{\"msg\":\"declare-complete\"}";
	window.parent.postMessage(msg,"*");
}