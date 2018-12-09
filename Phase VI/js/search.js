var helpers = ["Search by keywords in title",
"Search by genre of music",
"Search by style of dance",
"Search by user that uploaded video",
"Hover over a text box for help"]

function messages(adviceNumber){
  document.getElementById("adviceBox").value = helpers[adviceNumber];
}

function valid(){
	var a = document.forms["myForm"]["title"].value;
	var b = document.forms["myForm"]["genre"].value;
	var c = document.forms["myForm"]["style"].value;
	var d = document.forms["myForm"]["author"].value;
	if (a == "" && b == "" && c == "" && d ==""){
		window.alert("At least one criteria must be filled out!");
		return false;
	}
}
