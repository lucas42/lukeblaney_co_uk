var services = [];

$.ajax({
  url: 'http://id.bbc.co.uk/users/username.rdf',
  dataType: 'script',
  complete: function () {addService("BBC", "http://id.bbc.co.uk/users/username")},
});
$.ajax({
  url: 'https://www.facebook.com/imike3',
  dataType: 'script',
  complete: function () {addService("Facebook","http://www.facebook.com/profile.php")},
});

var xhr = $.ajax({
  url: 'https://twitter.com/account/use_phx?setting=false&format=xml',
  dataType: 'script',
  error: function () {alert("error")},
  success: function () {alert("success")},
  complete: function () {addService("Twitter")},
  statusCode: {
		404: function() {
			alert('page not found');
		},
		406: function(){alert('done');},
		401: function(){alert('401');}
	}
});
$(xhr).attr('onerror','alert');
console.log(xhr);
xhr.onerror =function() { alert("error2"); };

function addService (name, href, img) {
	var service = {};
	service.name = name;
	service.href = href;
	service.img = img;
	services.push(service);
	reloadServices();
}

function reloadServices() {
	var servicediv = $("<div id='services'/>").append("<h2>You are currently logged into:</h2>");
	var servicelist = $("<ul/>").appendTo(servicediv);
	for (ii in services) {
		var service = services[ii];
		var item = $("<li/>").css('list-style-type', 'none');
		var inner = item;
		if (service.href) inner = $("<a/>").attr('href', service.href).appendTo(item);
		inner.text(service.name);
		if (service.img) $("<img/>").attr('src', service.img).css({
			'max-height': "2em",
			margin : "0 0.5em",
			float: 'left',
			}).prependTo(inner);
		item.appendTo(servicelist);
	}
	$("#services").remove();
	$("#content").append(servicediv);
}
