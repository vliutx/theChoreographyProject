var xhr;
if (window.ActiveXObject){
	xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
else if (window.XMLHttpRequest){
	xhr = new XMLHttpRequest();
}

function ifexists(event){
	event.preventDefault();

	var id = document.getElementById("id").value;
	var title = document.getElementById("title").value;
	var genre = document.getElementById("genre").value;
	var style = document.getElementById("style").value;
	var descrip = document.getElementById("descrip").value;

	var url = "php/list.php";
	var params = "id="+escape(id)+"&title="+escape(title)+"&genre="+escape(genre)+"&style="+escape(style)+"&descrip="+escape(descrip);
	xhr.open("POST", url, true);

	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.onreadystatechange = existresponse;
	xhr.send(params);
}

function existresponse(){
	if ((xhr.readyState == 4) && (xhr.status == 200)){
		var response = xhr.responseText;

		if (response == "false"){
			window.alert("Please enter a valid video ID.");
		}
		else if (response == "taken"){
			window.alert("Someone has already listed that video.");
		}
		else if (response == "true"){
			window.alert("Item successfully Listed.")
			window.location = "item.php?id=" + id.value; //change this to item listing later?
		}
	}
}
