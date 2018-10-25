var check=0;
var phone=null;
function photo(){
	var msg="{\"msg\":\"photo\"}";
	window.parent.postMessage(msg,"*");
}



window.onload=init();

function init(){

	window.addEventListener("message",getmsg,false);

	load_city_name();

	if(p){
		$.get("getuser.php?p="+p,function(d,e){
			var u=JSON.parse(d);
			$("#namecheck-btn").css("display","none");
			$("#level").css("display","block");
			$("#photo").css("display","none");
			$("#plus").css("display","none");
			$("#photo2").css("display","block");
			$("#photo2").attr("src",u.img);
			$("#name").attr("disabled","disabled");
			$("#name").val(u.name);
			$("#sex").attr("disabled","disabled");
			$("#sex").val(u.sex);
			$("#level-val").html(u.level+" Lv");
			$("#age").val(u.age);
			var region=u.region.split(" ");
			$("#region1").val(region[0]);
			change_detail_city();
			$("#region2").val(region[1]);
			$("#upto").val(u.upto);
			check=1;
			phone=p;
		});
	}
}

function getmsg(e){
	var r=JSON.parse(e.data);
	if(r.phone)
	{
		phone=r.phone;
		$.post("phonecheck.php",{
			phone:phone
		},function(d,e){
			if(d!=0){
				location.replace("index.php");
			}
		})
	}

	if(r.url){
		$("#photo").css("display","none");
		$("#plus").css("display","none");
		$("#photo2").css("display","block");
		$("#photo2").attr("src",r.url);
	}
}

function namecheck(){
	var name=$("#name").val();
	$.get("namecheck.php?name="+name,function(d,s){
		if(d=="0"){
			check=1;
			var msg="{\"msg\":\"name-check-success\"}";
			window.parent.postMessage(msg,"*");
			$("#name").attr("disabled","disabled");
		}else{
			check=0;
			var msg="{\"msg\":\"name-check-fail\"}";
			window.parent.postMessage(msg,"*");
		}
	})
}

function save(){
	if(check==0){
		var msg="{\"msg\":\"name-check-none\"}";
		window.parent.postMessage(msg,"*");
		return false;
	}
	var sex=$("#sex").val();
	var name=$("#name").val();
	var age=$("#age").val();
	var age=$("#age").val();
	var r1=$("#region1").val();
	var r2=$("#region2").val();
	var upto=$("#upto").val();
	var url=$("#photo2").attr("src");
	if(url==""){
		//var msg="{\"msg\":\"photo-none\"}";
		//window.parent.postMessage(msg,"*");
		//return false;	
		url="http://kirino16.cafe24.com/img/unknown_thumbnail.png";
	}
	if(p)
	{
		$.post("updateuser.php",{
			name:name,
			sex:sex,
			age:age,
			r1:r1,
			r2:r2,
			upto:upto,
			url:url,
			phone:phone
		},function(d,s){
			if(d=="success"){
				var msg="{\"msg\":\"user-update-success\"}";
				window.parent.postMessage(msg,"*");
			}else{
				alert(d);
			}
		});
		return;
	}
	$.post("usersave.php",{
		name:name,
		sex:sex,
		age:age,
		r1:r1,
		r2:r2,
		upto:upto,
		url:url,
		phone:phone
	},function(d,s){
		if(d=="success"){
			var msg="{\"msg\":\"user-save-success\"}";
			window.parent.postMessage(msg,"*");
			location.replace("index.php");
		}else{
			alert(d);
		}
	});
}