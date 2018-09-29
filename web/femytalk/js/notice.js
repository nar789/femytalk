var selno=-1;

function content(no) {

	for(var i=1;i<=4;i++)
	{
		$("#content"+i).css("display","none");
	}
	if(selno!=no){
		$("#content"+no).css("display","block");
		selno=no;
	}else
		selno=-1;
}