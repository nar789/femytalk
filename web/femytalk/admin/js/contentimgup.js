$(document).ready(function(){
	window.addEventListener("message",listenmsg,false);
	$("#f").change(function(){
		$("#f1").submit();
	})
});

function listenmsg(e){

	var r=JSON.parse(e.data);
	if(r.msg=="photo"){
		llclick();
	}
}

function llclick(){
	$("#f").click();
}