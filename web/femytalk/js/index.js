var phone = null;
var ls=null;
var ready_finish=false;
var chatid=null;
var token=null;

function menuclick(id){
	if(!ready_finish)return false;

	for(var i=1;i<=5;i++){
		$("#i"+i).attr("src","img/mainmenu_off_0"+i+".png");
	}
	$("#i"+id).attr("src","img/mainmenu_on_0"+id+".png");
	if(id==1){
		$("#ifr").attr("src","home.php?phone="+phone);
	}else if(id==2){
		$("#ifr").attr("src","femy.php?phone="+phone);
	}else if(id==3){
		$("#ifr").attr("src","my.php?phone="+phone);
	}else if(id==4){
		$("#ifr").attr("src","board_list.php?p="+phone);
	}else if(id==5){
		$("#ifr").attr("src","mkroom.php?phone="+phone);
	}
}


window.onload=init();

function init(){
	
	if(back=="board_list"){
		$("#ifr").attr("src","board_list.php?p="+p);
	}
	
	window.addEventListener("message",getmsg,false);
	var msg="{\"msg\":\"get-phone\"}";
	window.parent.postMessage(msg,"*");
	var ifr=document.getElementById("ifr");
	var winh=$(window).height();
	h=parseInt(winh)-181;
	ifr.style.height=h+'px';
	
}

function getheartcnt(){
	$.get("getuser.php?p="+phone,function(d,e){
		var r=JSON.parse(d);
		$("#heart-cnt").html(r.heart);
	});
}


function start_update_loginstate(){
	ls=setInterval(()=>{
		$.get("updateloginstate.php?phone="+phone,function(d,e){ready_finish=true;
			getheartcnt();
			gettoken();
		});
	},1000);
}

function getpush(){

	$.get("getuser.php?p="+phone,function(d,e){
		var r=JSON.parse(d);

		if(r.push!="" && r.push!="off"){
			chatid=parseInt(r.push);
			clearpush();
			$.get("existchatroom.php?id="+chatid,function(d,e){
				if(d=="exist")
				{
					
					$.get("getmember.php?id="+chatid,function(d,e){
						
						var j2=JSON.parse(d);
						var name=j2[0].phone;
						var msg="{\"msg\":\"invite-chat\",\"id\":"+chatid+",\"name\":\""+name+"\"}";
						window.parent.postMessage(msg,"*");
					});
					
				}
			});
		}
	});
}

function clearpush(){
	$.post("setpush.php",{
		p:phone,
		push:""
	},function(d,e){});
}

function gettoken(){
	var msg="{\"msg\":\"get-token\"}";
	window.parent.postMessage(msg,"*");
}

function settoken(){
	if(phone!=null && token!=null)
	{
		$.post("settoken.php",{
			p:phone,
			token:token
		},function(d,e){
			
		});
	} 

}


function getmsg(e){
	var r=JSON.parse(e.data);
	if(r.token)
	{
		token=r.token;
		settoken();
	}
	else if(r.phone)
	{
		phone=r.phone;
		if(!back)
			$("#ifr").attr("src","home.php?phone="+phone);
		start_update_loginstate();
		setInterval(()=>{getpush();},1000);
	}
	if(r.msg=="img-view"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="add-friend-fail"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="add-friend-success"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="remove-friend-success"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="create-chat-success"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="go-home"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="go-chat"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="i-am-ban"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="board-insert-success"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="board-update-success"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="board-delete-success"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="comment-insert-success"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="comment-delete-success"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="go-board-detail"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="go-board-create"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="1lv-access"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="2lv-access"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="3lv-access"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="cant-create-chat"){
		window.parent.postMessage(e.data,"*");
	}
	if(r.msg=="cant-buy-level"){
		window.parent.postMessage(e.data,"*");
	}

}

function buyheart(){
	location.href="setting.php?go=buyheart.php";
}

function refresh(){
	document.getElementById("ifr").contentDocument.location.reload(true);
}