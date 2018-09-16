var phone = null;
var ls=null;
var ready_finish=false;

function menuclick(id){
	if(!ready_finish)return false;

	for(var i=1;i<=5;i++){
		$("#i"+i).attr("src","img/mainmenu_off_0"+i+".png");
	}
	$("#i"+id).attr("src","img/mainmenu_on_0"+id+".png");
	if(id==1){
		$("#ifr").attr("src","home.php");
	}else if(id==2){
		$("#ifr").attr("src","femy.php?phone="+phone);
	}else if(id==3){
		$("#ifr").attr("src","my.php?phone="+phone);
	}else if(id==4){
		$("#ifr").attr("src","pan.php");
	}else if(id==5){
		$("#ifr").attr("src","mkroom.php");
	}
}


window.onload=init();

function init(){
	window.addEventListener("message",getmsg,false);
	var msg="{\"msg\":\"get-phone\"}";
	window.parent.postMessage(msg,"*");
}

function start_update_loginstate(){
	ls=setInterval(()=>{
		$.get("updateloginstate.php?phone="+phone,function(d,e){ready_finish=true;});
	},1000);
}


function getmsg(e){
	var r=JSON.parse(e.data);
	if(r.phone)
	{
		phone=r.phone;
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


}