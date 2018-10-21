var file_path = null;
var my = null;
var t=null;


function iapinit(){
  store.verbosity = 0;
  store.error(function(error) {
      alert('ERROR ' + error.code + ': ' + error.message);
  });
  store.register({
    id: 'femytalk.heart.30000',
    alias: "30000",
    type: store.CONSUMABLE
  });
  store.register({
    id: 'femytalk.heart.50000',
    alias: "50000",
    type: store.CONSUMABLE
  });
  store.register({
    id: 'femytalk.heart.80000',
    alias: "80000",
    type: store.CONSUMABLE
  });
  
  store.ready(function() {
      //alert("STORE READY");  // This does get called
  });
  /*
  store.when("product").updated(function(p){
      render(p)
  });*/
  store.refresh();
}


//var buyid='';
function iapOrder(id){
    store.order(id);
    store.when(id).approved(function (product) {
        product.finish();
        //alert("Purchase Successful");
        var heart=0;
        //alert(id);
        if(id=="femytalk.heart.30000")heart=100;
        else if(id=="femytalk.heart.50000")heart=200;
        else if(id=="femytalk.heart.80000")heart=400;
        $.post("http://kirino16.cafe24.com/setheartplus.php",{
            p:my,
            heart:heart
        },function(d,e){
            halert("결제가 완료되었습니다.");    
        });
    });
}

/** 카메라 혹은 갤러리 호출 */
function takePicture(source) {

    file_path = null;
 
    // 메모리를 점유하고 있는 이전 데이터를 삭제한다.
    navigator.camera.cleanup();
 
    navigator.camera.getPicture(
        // 사진 가져오기에 성공한 경우 호출될 함수
        function(choice) {
            // 사진파일의 경로를 전역변수에 보관한다.
            file_path = choice;
            // Cordova의 WebView가 이미지를 캐시하는 것을 방지하기 위하여 파일 경로 뒤에 timestamp를 덧붙인다.
            if (file_path.lastIndexOf('?') < 0) {
                file_path += "?" + new Date().getTime();
            }
            
            $("#selphoto").modal('toggle');


            file_upload();

            //var msg="{\"url\":\""+file_path+"\"}";
 			//document.getElementById("ifr").contentWindow.postMessage(msg,"*");
            
            
        },
        // 사진 가져오기에 실패한 경우 호출될 함수
        function(message) {
            alert('Failed because: ' + message);
        },
        // 카메라,갤러리 호출 옵션
        {
            destinationType: Camera.DestinationType.FILE_URI, // 리턴타입 형식(파일경로)
            encodingType: Camera.EncodingType.JPEG, // 이미지 형식
            quality: 50, // 퀄리티 (0~100)
            sourceType: source, // 카메라 or 갤러리 설정
            allowEdit: false, // 가져오기 완료 후 편집 여부
            correctOrientation: true // 카메라를 세로로 촬영한 경우 이미지 방향을 회전시킴
        }
    );
}

function alertclose(){
	$("#alert").modal('toggle');
}

function halert(msg){
	$("#alert-msg").html(msg);
    $("#alertbtn").click();
}

function file_upload(){

	if (file_path == null) {
        alert("선택된 사진이 없습니다.");
        return false;
    }

     /** 파일경로로부터 이름만 추출한다. */
    var name = file_path.substring(file_path.lastIndexOf('/') + 1);
    // 안드로이드는 파일이름 뒤에 ?123234234 형식의 내용이 붙어 오는 경우가 있으므로,
    // 이 경우 ? 이하 내용을 잘라버린다.
    var p = name.toLowerCase().lastIndexOf('?');
    if (p > -1) {
        name = name.substring(0, p);
    }
 
    // 안드로이드는 확장자가 없는 경우가 있으므로, 이 경우 확장자를 강제로 추가한다.
    if (name.toLowerCase().lastIndexOf('.') < 0) {
        name += '.jpg';
    }
 
    /** 업로드 옵션 */
    var options = new FileUploadOptions();
    // <input type='file' name='photo' > 과 같은 원리
    options.fileKey = "file";
    // 서버에 인식시킬 파일의 이름
    options.fileName = name;
    // 서버에 인식시킬 파일의 종류
    options.mimeType = 'image/jpeg';
    // 파일의 원본 데이터를 비교하지 않는다.
    options.chunkedMode = false;
    // 전송후 통신 종료 예약
    options.headers = { Connection: "close" };
    // 파일과 함께 전송할 TEXT 데이터
    options.params = { 'memo': 'hello world' };
 
    /** 파일 전송 객체 생성 */
    var ft = new FileTransfer();
 
    /** 업로드를 수행한다.(전송할 파일 경로, 서버 주소, 성공콜백, 실패콜백, 옵션) */
    ft.upload(file_path, "http://kirino16.cafe24.com/upload.php", 
        function(response) {
            // HTTP 결과코드 받기
            if (response.responseCode !== 200) {
                alert('업로드에 실패했습니다.' + response.response);
                return false;
            }
 
 			var msg="{\"url\":\""+response.response+"\"}";
 			document.getElementById("ifr").contentWindow.postMessage(msg,"*");
            
        },
        function(error) {
            if (error.code == FileTransferError.FILE_NOT_FOUND_ERR) {
            alert("file " + error.source + " not found");
            } else if (error.code == FileTransferError.INVALID_URL_ERR) {
            alert("url " + error.target + " invalid");
            } else if (error.code == FileTransferError.CONNECTION_ERR) {
            alert("connection error");
            } else {
            alert("unknown error");
            }
        }, options);

}

function getmsg(e){
	var r=JSON.parse(e.data);
	if(r.msg=="photo"){
		$("#selphotobtn").click();
	}
	else if(r.msg=="name-check-success"){
		halert("중복확인이 완료되었습니다.");
	}
	else if(r.msg=="name-check-fail"){
		halert("동일한 닉네임이 존재해 사용할 수 없습니다.");
	}
	else if(r.msg=="name-check-none"){
		halert("닉네임 중복확인이 필요합니다.");
	}
	else if(r.msg=="photo-none"){
		halert("프로필 사진을 선택해주세요.");
	}
	else if(r.msg=="user-save-success"){
		halert("회원가입이 완료되었습니다.");
	}
    else if(r.msg=="user-update-success"){
        halert("회원정보 수정이 완료되었습니다.");
    }
    else if(r.msg=="add-friend-fail"){
        halert("이미 친구추가된 페미입니다.");
    }
    else if(r.msg=="i-am-ban"){
        halert("방장에 의한 강퇴로 참여하실 수 없습니다.");
    }
    else if(r.msg=="ban-complete"){
        halert("강퇴를 완료하였습니다.");
    }
    else if(r.msg=="ban-only-king"){
        halert("방장만 강퇴를 할 수 있습니다.");
    }
    else if(r.msg=="declare-complete"){
        halert("신고하기가 완료되었습니다.");
    }
    else if(r.msg=="add-friend-success"){
        halert("친구추가가 완료되었습니다.");
    }
    else if(r.msg=="remove-friend-success"){
        halert("친구삭제가 완료되었습니다.");
    }
    else if(r.msg=="buy-complete"){
        halert("결제가 완료되었습니다.");
    }
    else if(r.msg=="board-insert-success"){
        halert("게시글 작성이 완료되었습니다.");
    }
    else if(r.msg=="board-update-success"){
        halert("게시글 수정이 완료되었습니다.");
    }
    else if(r.msg=="board-delete-success"){
        halert("게시글 삭제가 완료되었습니다.");
    }
    else if(r.msg=="comment-insert-success"){
        halert("댓글 작성이 완료되었습니다.");
    }
    else if(r.msg=="comment-delete-success"){
        halert("댓글 삭제가 완료되었습니다.");
    }
    else if(r.msg=="1lv-access"){
        halert("1Lv 이상부터 접근이 가능합니다.");
    }
    else if(r.msg=="2lv-access"){
        halert("2Lv 이상부터 접근이 가능합니다.");
    }
    else if(r.msg=="3lv-access"){
        halert("3Lv 이상부터 접근이 가능합니다.");
    }
    else if(r.msg=="create-chat-success"){
        halert("방만들기가 완료되었습니다.");
        $("#ifr").attr("src","http://kirino16.cafe24.com/chat.php?id="+r.id+"&p="+my);
    }
    else if(r.msg=="go-chat"){
        $("#ifr").attr("src","http://kirino16.cafe24.com/chat.php?id="+r.id+"&p="+my);
    }
    else if(r.msg=="go-board-detail"){
        $("#ifr").attr("src","http://kirino16.cafe24.com/board_detail.php?id="+r.id+"&p="+my);
    }
    else if(r.msg=="go-board-create"){
        $("#ifr").attr("src","http://kirino16.cafe24.com/board_detail.php?p="+my);
    }
    else if(r.msg=="get-phone"){
        var msg="{\"phone\":\""+my+"\"}";
        document.getElementById("ifr").contentWindow.postMessage(msg,"*");
    }
    else if(r.msg=="get-token"){
        var msg="{\"token\":\""+t+"\"}";
        document.getElementById("ifr").contentWindow.postMessage(msg,"*");   
    }
    else if(r.msg=="go-home"){
        $("#ifr").attr("src","http://kirino16.cafe24.com/index.php");   
    }
    else if(r.msg=="img-view"){
        PhotoViewer.show(r.url, '');
    }
    else if(r.msg=="invite-chat"){
        $("#invite-title").html(r.name+"님의 채팅요청");
        $("#invite-accept").attr("onclick","invite("+r.id+")");
        $("#invitebtn").click();
    }
    else if(r.msg=="iap")
    {
        iapOrder(r.id);
    }
}

function invite(chatid){
    $("#invite").modal('hide');
    $("#ifr").attr("src","http://kirino16.cafe24.com/chat.php?id="+chatid+"&p="+my);    
}

function getnumber(){
	window.plugins.sim.requestReadPermission((r)=>{
		window.plugins.sim.getSimInfo((r)=>{
			my=r.phoneNumber;
			var msg="{\"phone\":\""+r.phoneNumber+"\"}";
 			document.getElementById("ifr").contentWindow.postMessage(msg,"*");
            clearInterval(gn);
            $("#intro").animate({opacity:'0'},"slow",function(){ $("#intro").remove(); });
		}, (e)=>{
            //alert(e);
        });
	}, (e)=>{
		//alert(e);
	});
}

function onBackKeyDown() {
    // Handle the back button
    var src=$("#ifr").attr("src");
    if(src.indexOf("chat.php")>=0){
        if($("#chat").css("display")=="none")
            $("#chatbtn").click();
    }   
    else if($("#exit").css("display")=="none")
    {
        $("#exitbtn").click();
    }
}

function chatexit(){

    $("#chat").modal('hide');
    //$("#ifr").attr("src","http://kirino16.cafe24.com/index.php");
    var msg="{\"msg\":\"back\"}";
    document.getElementById("ifr").contentWindow.postMessage(msg,"*");   
}

function appexit(){
    navigator.app.exitApp();
}


var app = {
    // Application ConstructorW
    initialize: function() {
        document.addEventListener('deviceready', this.onDeviceReady.bind(this), false);
        document.addEventListener('backbutton', onBackKeyDown, false);
    },

    onDeviceReady: function() {
    	window.addEventListener("message",getmsg,false);
    	
        //release
        ///*
        gn=setInterval(()=>{getnumber();},500);
        //*/
        //debug
        /*
            my="01011112222";
            var msg="{\"phone\":\""+my+"\"}";
            document.getElementById("ifr").contentWindow.postMessage(msg,"*");
            $("#intro").animate({opacity:'0'},"slow",function(){ $("#intro").remove(); });
        */

        FCMPlugin.getToken(function(token){
                t=token; 
        });

        FCMPlugin.onNotification(function(data){
                //alert(JSON.stringify(data));
        });
        
        iapinit();
    	
    	
    	
        $("#photo_camera").click(function() {
	        takePicture(Camera.PictureSourceType.CAMERA);
	    });
	 
	    // 갤러리 버튼 이벤트 정의
	    $("#photo_library").click(function() {
	        takePicture(Camera.PictureSourceType.PHOTOLIBRARY);
	    });
    }

};

app.initialize();

