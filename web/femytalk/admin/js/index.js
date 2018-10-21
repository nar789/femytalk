function init() {
	var winh=$(window).height();
	$("#ifr").css("height",winh+"px");
	$("#nav").css("height",winh+"px");
}

function m(i){
	if(i==1)
	{
		$("#ifr").attr("src","user.php");
	}else if(i==2) $("#ifr").attr("src","heart.php");
	else if(i==3) $("#ifr").attr("src","notice.php");
	else if(i==4) $("#ifr").attr("src","board_list.php");
	//else if(i==4) $("#ifr").attr("src","chat.php");
	

}

window.onload=init();