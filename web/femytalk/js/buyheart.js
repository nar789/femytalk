function buy(id){
	var iap_id=null;
	if(id==1)
	{
		iap_id="femytalk.heart.30000";
	}else if(id==2)
	{
		iap_id="femytalk.heart.50000";
	}else if(id==3)
	{
		iap_id="femytalk.heart.80000";
	}
	var msg="{\"msg\":\"iap\",\"id\":\""+iap_id+"\"}";
	window.parent.postMessage(msg,"*");

	//var msg="{\"msg\":\"buy-complete\"}";
	//window.parent.postMessage(msg,"*");
}

function buylevel(lv){
	var h=0;
	if(lv==1)h=1000;
	else if(lv==2)h=2500;
	else if(lv==3)h=5000;
	
	
	$.post("setheart.php",{
		p:p,
		heart:h
	},function(d,e){
		
		if(d=="success"){
			$.post("setlevel.php",{
				p:p,
				level:lv
			},function(d,e){
				if(d=="success"){
					var msg="{\"msg\":\"buy-complete\"}";
					window.parent.postMessage(msg,"*");					
					location.reload();
				}
			});
		}else if(d=="fail")
		{
			var msg="{\"msg\":\"cant-buy-level\"}";
			window.parent.postMessage(msg,"*");					
		}
	});
}

function getcnt(){
	$.get("getuser.php?p="+p,function(d,e){
		var r=JSON.parse(d);
		$("#heart-cnt").html(r.heart);
	});
}

function init(){
	getlevel();
	setInterval(()=>{getcnt();},1000);
}

function getlevel(){
	$.get("getuser.php?p="+p,function(d,e){
		var r=JSON.parse(d);
		if(r.level>=1)
			$("#lv1-g").remove();
		if(r.level>=2)
			$("#lv2-g").remove();
		if(r.level>=3)
			$("#lv3-g").remove();
	});	
}

window.onload=init();