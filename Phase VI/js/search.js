var helpers = ["Search by keywords in title",
"Search by genre of music",
"Search by style of dance",
"Search by user that uploaded video",
"Hover over a text box for help"]

function messages(adviceNumber){
  document.getElementById("adviceBox").value = helpers[adviceNumber];
}

function valid(){
	var a = document.forms["myForm"]["title"];
	var b = document.forms["myForm"]["genre"];
	var c = document.forms["myForm"]["style"];
	var d = document.forms["myForm"]["author"];
	if (a.value == "" && b.value == "" && c.value == "" && d.value ==""){
		window.alert("At least one criteria must be filled out!");
		return false;
	}
	else{
		if (a.value == ""){
			a.disabled = true;
		}
		if (d.value == ""){
			d.disabled = true;
		}
	}
}
