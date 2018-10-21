function create_notice(){
	var t=$("#title").val();
	var c=$("#content").val();
	
	$.post("insertnotice.php",{
		title:t,
		content:c
	},function(d,e){
		if(d=="success"){
			alert("추가가 완료되었습니다.");
			$("#title").val("");
			$("#title").val("");
			location.reload();
		}
	});
}

function update(id) {

	var t=$("#title"+id).val();
	var c=$("#content"+id).val();
	

	$.post("updatenotice.php",{
		id:id,
		title:t,
		content:c
	},function(d,e){
		if(d=="success")
		{
			alert("수정이 완료되었습니다.");
			location.reload();
		}
	});
}

function del(id){
	$.post("deletenotice.php",{
		id:id
	},function(d,e){
		if(d=="success")
		{
			alert("삭제가 완료되었습니다.");
			location.reload();
		}
	});
}