window.onload=init();
function init() {
	$.get("../getuser.php?p="+p,function(d,e){
		var j=JSON.parse(d);
		var txt=j.name;
		var txt2=" ("+j.sex+", "+j.age+", "+j.upto+")";
		$("#info").text(txt);
		$("#info2").text(txt2);
		$("#img").attr("src",j.img);
	});
	$("#time").text(time);
}