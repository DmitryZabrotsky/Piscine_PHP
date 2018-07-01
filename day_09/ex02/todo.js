var uniqueID = (function() {var id = 0; return function() { return id++; };})();

readCookie();

function addtodo() {
	var todo = prompt('Declare new TO DO:', '500 push ups till 11:42 pm');
	if (!todo) {
		return ;
	}
	var id = uniqueID();
	var newdiv = document.createElement('div');
	var textnode = document.createTextNode(todo);
	newdiv.classList.add("todo-div");
	newdiv.appendChild(textnode);
	newdiv.id = id;
	newdiv.onclick = function() {deltodo()};
	ftlist = document.getElementById('ft_list')
	ftlist.insertBefore(newdiv, ftlist.childNodes[0]);
	updateCookie(newdiv, id);
}

function deltodo() {
	var todo = event.target;
	deleteCookie(todo);
	todo.parentNode.removeChild(todo);
}

function readCookie() {
	var cookies = document.cookie;
	var arr = cookies.split(';');
	console.log(arr);
}

function updateCookie(element, id) {
	var cookie = document.cookie;
	document.cookie = id + "=" + element;
}

function deleteCookie(element) {
	var id = element.id;
	var date = new Date(0);
	document.cookie = id + "=; expires=" + date.toUTCString();
}