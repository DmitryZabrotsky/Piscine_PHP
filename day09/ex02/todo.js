var c = document.cookie.split(';');

if (c[0]){
	var len = c.length - 1;
	for (var i = 0; i <= len; i++) {
		arr = decodeURIComponent(c[i]).split('=');

		var newdiv = document.createElement('div');
		var textnode = document.createTextNode(arr[1]);
		newdiv.classList.add("todo-div");
		newdiv.appendChild(textnode);
		newdiv.id = arr[0];
		newdiv.onclick = function() {deltodo()};
		ftlist = document.getElementById('ft_list');
		ftlist.insertBefore(newdiv, ftlist.childNodes[0]);
	}
}

function setCookie(name, value, options) {
  options = options || {};

  var expires = options.expires;

  if (typeof expires == "number" && expires) {
    var d = new Date();
    d.setTime(d.getTime() + expires * 1000);
    expires = options.expires = d;
  }
  if (expires && expires.toUTCString) {
    options.expires = expires.toUTCString();
  }

  value = encodeURIComponent(value);

  var updatedCookie = name + "=" + value;

  for (var propName in options) {
    updatedCookie += "; " + propName;
    var propValue = options[propName];
    if (propValue !== true) {
      updatedCookie += "=" + propValue;
    }
  }

  document.cookie = updatedCookie;
}

function addtodo() {
	var todo = prompt('Declare new TO DO:', '500 push ups till 11:42 pm');
	if (!todo) {
		return ;
	}
	var id = Date.now();
	var newdiv = document.createElement('div');
	var textnode = document.createTextNode(todo);
	newdiv.classList.add("todo-div");
	newdiv.appendChild(textnode);
	newdiv.id = id;
	newdiv.onclick = function() {deltodo()};
	ftlist = document.getElementById('ft_list');
	ftlist.insertBefore(newdiv, ftlist.childNodes[0]);

	setCookie(id, todo);
}

function deleteCookie(name) {
  setCookie(name, "", {
    expires: -1
  })
}

function deltodo() {
	var todo = event.target;
	todo.parentNode.removeChild(todo);
	deleteCookie(todo.id);
}















