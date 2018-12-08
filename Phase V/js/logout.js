function log(){
	var url = window.location.href;
	var d = new Date();
	d.setTime(d.getTime()+(5*1000)); // 5 seconds
	var expires = "expires=" + d.toUTCString();
	document.cookie = "last="+url+";"+expires+";path=/";
}
