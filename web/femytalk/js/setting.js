var phone = null;
var ls=null;
var ready_finish=false;
var push=false;

function menuclick(id){
	if(!ready_finish)return false;

	if(id==4){
		if(!push){
			$("#i4").attr("src","img/setmenu_on_04.png");		
			push=true;
		}else{
			$("#i4").attr("src","img/setmenu_off_04.png");		
			push=false;
		}
		return;
	}

	for(var i=1;i<=3;i++){
		$("#i"+i).attr("src","img/setmenu_off_0"+i+".png");
	}
	$("#i"+id).attr("src","img/setmenu_on_0"+id+".png");
	
	if(id==1){
		$("#ifr").attr("src","notice.php");
	}else if(id==2){
		$("#ifr").attr("src","buyheart.php");
	}else if(id==3){
		location.href="join4.php?p="+phone;
	}
}


window.onload=init();

function init(){
	window.addEventListener("message",getmsg,false);
	var msg="{\"msg\":\"get-phone\"}";
	window.parent.postMessage(msg,"*");
	var ifr=document.getElementById("ifr");
	var winh=$(window).height();
	h=parseInt(winh)-181-30;
	ifr.style.height=h+'px';

	
}

function start_update_loginstate(){
	ls=setInterval(()=>{
		$.get("updateloginstate.php?phone="+phone,function(d,e){ready_finish=true;
			
		});
	},1000);
}


function getmsg(e){
	var r=JSON.parse(e.data);
	if(r.phone)
	{
		phone=r.phone;
		if(go){
			$("#ifr").attr("src",go);
			go="";
		}else
			$("#ifr").attr("src","notice.php");
		start_update_loginstate();
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
	if(r.msg=="buy-complete"){
		window.parent.postMessage(e.data,"*");
	}

}