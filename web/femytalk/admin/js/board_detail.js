window.onload=init();


function back(){
	//location.replace("index.php?back=board_list&p="+p);
	location.replace("board_list.php");
}

function init() {
	
	$(window).resize(function(){
		updateedit();
		movescroll();
	});
	
	var chat=document.getElementById("chat");
	var winh=$(window).height();
	h=parseInt(winh)-100-20;
	chat.style.height=h+'px';
	window.addEventListener("message",listenmsg,false);

	if(update==1)
	{
		loadupdatecontent();
		$("#write-btn").text("수정하기");
		$("#write-btn").attr("onclick","save2()");
		return;
	}
	if(id){//detail mode
		$("body").css("background-color","#f5f5f5");
		$("#chat").css("background-color","#f5f5f5");
		$("#content").css("background-color","#f5f5f5");
		$("#write-btn").css("display","none");
		$("#img-btn").css("display","none");
		$("#msg-g").css("display","block");
		loadcontent();
	}
}

function del_btn()
{
	$.post("../setboard.php",{
		id:id,
		isdel:1
	},function(d,e){
		if(d=="success"){
			var msg="{\"msg\":\"board-delete-success\"}";
			window.parent.postMessage(msg,"*");
			back();
		}
	});
}

function update_btn(){
	location.replace("board_detail.php?id="+id+"&update=1");
}


function loadupdatecontent(){
	$.get("../getboard.php?id="+id,function(d,e){
		var j=JSON.parse(d);
		var content=decodeURIComponent(j.content);
		content=unescape(content);
		$("#content").css("padding-left","30px");
		$("#content").css("padding-right","30px");
		$("#content").append(content);
	});
}

function loadcontent(){
	$.get("../getboard.php?id="+id,function(d,e){
		var j=JSON.parse(d);
		if(true)
		{
			$("#my-btn-g").css("display","inline-block");
			$("#my-btn-g").css("display","inline-block");
		}
		
		
		$.get("writer.php?p="+j.writer+"&time="+j.time,function(d,e){
			var content=decodeURIComponent(j.content);
			content=unescape(content);
			d="<div style='padding-left:30px;padding-right:30px;'>"+d+"</div>";
			$("#content").append(d);
			content="<div style='padding-left:30px;padding-right:30px;'>"+content+"</div>";
			$("#content").append(content);
			$("#content").attr("contentEditable","false");	
			updatecomment();
		});
	});
}

function updatecomment(){
	$("#comment").remove();
	$.get("comment_list.php?p="+p+"&bid="+id,function(d,e){
		var ctxt="<div id=comment style='margin-top:30px;padding-top:10px;padding-bottom:10px;background-color:#f5f5f5;'>"+d+"</div>";
		$("#content").append(ctxt);
	});
}

function updateedit(){
		var winh=$(window).height();
		h=parseInt(winh)-100-20;		
		$("#chat").height(h);
		$("#content").height(h);
}


function img(){
	var msg="{\"msg\":\"photo\"}";
	document.getElementById("ifr").contentWindow.postMessage(msg,"*");
}

function listenmsg(e){
	var r=JSON.parse(e.data);
	if(r.url){
		var imgtag="<img src='"+r.url+"' style=\"width:250px;\" onclick=\"showimg('"+r.url+"')\">";
		$("#content").append(imgtag);
	}
}

function showimg(url){
	location.href=url;
}

function movescroll(){
	var chat=document.getElementById("chat");
	chat.scrollTop=chat.scrollHeight;
}

function save(){
	var content=$("#content").html();
	content=escape(content);
	content=encodeURIComponent(content);
	$.post("setboard.php",{
		p:p,
		content:content
	},function(d,e){
		if(d=="success"){
			var msg="{\"msg\":\"board-insert-success\"}";
			window.parent.postMessage(msg,"*");
			back();
		}
	});
}
function save2(){
	var content=$("#content").html();
	content=escape(content);
	content=encodeURIComponent(content);
	$.post("../setboard.php",{
		p:p,
		content:content,
		id:id
	},function(d,e){
		if(d=="success"){
			var msg="{\"msg\":\"board-update-success\"}";
			window.parent.postMessage(msg,"*");
			location.replace("board_detail.php?p="+p+"&id="+id);
		}
	});
}

function sendmsg(){
	var m=$("#msg").val();
	$("#msg").val("");
	
	$.post("../setcomment.php",{
		p:p,
		content:m,
		bid:id
	},function(d,e){
		if(d=="success"){
			var msg="{\"msg\":\"comment-insert-success\"}";
			window.parent.postMessage(msg,"*");
			updatecomment();
		}
	});
}