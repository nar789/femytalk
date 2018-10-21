function update(id) {

	var sex=$("#sex"+id).val();
	var age=$("#age"+id).val();
	var region=$("#region"+id).val();
	var upto=$("#upto"+id).val();
	var level=$("#level"+id).val();
	var heart=$("#heart"+id).val();


	$.post("updateuser.php",{
		id:id,
		sex:sex,
		age:age,
		region:region,
		upto:upto,
		level:level,
		heart:heart
	},function(d,e){
		if(d=="success")
		{
			alert("수정이 완료되었습니다.");
			location.reload();
		}
	});
}

function del(id){
	$.post("deleteuser.php",{
		id:id
	},function(d,e){
		if(d=="success")
		{
			alert("삭제가 완료되었습니다.");
			location.reload();
		}
	});
}