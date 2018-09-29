function buy(){
	var msg="{\"msg\":\"buy-complete\"}";
	window.parent.postMessage(msg,"*");
}