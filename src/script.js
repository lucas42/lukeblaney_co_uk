(function() {
	if (top != window) {
		document.cookie='referer = ' + escape(document.referrer);
		top.location.href=window.location.href;
		return;
	}
	var referer = getCookie('referer');
	if (referer) {
		document.cookie='referer = ';
		if (referer.match(/^http:\/\/bacolicio\.us\//)) window.addEventListener('load', function() {document.body.style.background="url(http://bacolicious.s3.amazonaws.com/bacon.png)"; });
		else if (referer.match(/^http:\/\/www\.doublera\.in\/bow\//)) window.addEventListener('load', function() {document.body.style.background="url(http://www.doublera.in/rainbow.png)"; });
		else console.log(referer);
	}
})();
function getCookie(c_name){
	var i,x,y,ARRcookies=document.cookie.split(";");
	for (i=0;i<ARRcookies.length;i++) {
		x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
		y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
		x=x.replace(/^\s+|\s+$/g,"");
		if (x==c_name) return unescape(y);
	}
	return null;
}

window.addEventListener("DOMContentLoaded", function () {
	var thumbs = document.querySelectorAll('.projectthumb');
	for (var i=0, l=thumbs.length; i<l; i++) {
		thumbs[i].addEventListener("dragstart", function(event) {
			event.dataTransfer.setData("text/uri-list", this.parentNode.href.replace(/\/?#/, '/'));
		});
	}
});
