<?php

	//파일이 있는지 없는지 체크
	if($_FILES['file']['error'] > 0) {

		switch ($_FILES['file']['error']){

			case 1 : echo "php.ini 파일의 upload_max_filesize 설정값을 초과";
				break;
			case 2 : echo "Form에서 설정된 MAX_FILE_SIZE 설정값을 초과";
				break;
			case 3 : echo "파일 일부만 업로드 됨";
				break;
			case 4 : echo "업로드된 파일이 없음";
				break;
			case 5 : echo "사용가능한 임시폴더가 없음";
				break;
			case 6 : echo "디스크에 저장할수 없음";
				break;
			case 7 : echo "파일 업로드가 중지됨";
				break;
			default : echo "시스템 오류";
				break;
		}
	}

	if($_FILES['file']['size'] > 25242880) {
		echo "업로드 용량 초과";
	}
	$imagecheck = array('jpg','jpeg','gif','png','bmp');//확장자 체크
	$imgpath = pathinfo($_FILES['file']['name']);//이미지 파일명 체크
	
	$imgext = strtolower($imgpath['extension']);//확장자가 대문자라면 소문자로 처리
	
	
	if(!in_array($imgext, $imagecheck)){
		echo "업로드가 불가한 확장자 입니다.";
	}
	
	$imagecheck2 = array('image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png', 'image/gif','image/bmp','image/pjpeg');
	if(!in_array($_FILES['file']['type'], $imagecheck2)) {
		exit("지정된 이미지만 허용됩니다.");
	}

	$img_size = getimagesize($_FILES['file']['tmp_name']);
		do{
		$time = explode(' ',microtime());
		$fileName = $time[1].substr($time[0],2,6).'.'.strtoupper($imgext);
		$filePath = '../files/';
		}while($result->num_rows > 0); 

		//db에 저장할 정보 가져옴 

	$upload_filename = $fileName;
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	//echo "".$filePath.$upload_filename;

	//if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath.$upload_filename)) {
	if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath.$upload_filename)) {
			}// 실질적으로 업로드 시키는 구문


	echo "var url=\"http://kirino16.cafe24.com/files/".$upload_filename."\";";
?>
	<script>
		<?php
			echo "var url=\"http://kirino16.cafe24.com/files/".$upload_filename."\";";
		?>
		var msg="{\"url\":\""+url+"\"}";
		window.parent.postMessage(msg,"*");
	</script>