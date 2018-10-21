function update() {

	var init=$("#init").val();
	var r1=$("#r1").val();
	var r2=$("#r2").val();
	var r3=$("#r3").val();
	


	$.post("updateheart.php",{
		init:init,
		r1:r1,
		r2:r2,
		r3:r3
	},function(d,e){
		if(d=="success")
		{
			alert("수정이 완료되었습니다.");
			location.reload();
		}
	});
}
