var xhr;
if (window.ActiveXObject){
	xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
else if (window.XMLHttpRequest){
	xhr = new XMLHttpRequest();
}

function callServer1(event){
	event.preventDefault();

	var user = document.getElementById("user").value;
	var pass = document.getElementById('pass').value;

	var url = "php/process.php";
	var params = "page=login&user="+escape(user)+"&pass="+escape(pass);
	xhr.open("POST", url, true);

	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.onreadystatechange = response1;
	xhr.send(params);
}

function callServer2(event){
	event.preventDefault();

	var user = document.getElementById("user").value;
	var pass = document.getElementById('pass').value;
	var pass2 = document.getElementById('pass2').value;

	var regex = /^[a-zA-Z][a-zA-Z0-9]+$/;
	var passreg = /^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])[a-zA-Z0-9]+$/;

	if (user.length < 6 || user.length > 20){
		window.alert("Username must be between 6 and 20 characters long.");
	}
	else if (!regex.test(user)){
		window.alert("Username must contain only letters and numbers and cannot start with a number.");
	}
	else if (pass != pass2){
		window.alert("Passwords do not match");
	}
	else if (pass.length < 6 || pass.length > 20){
		window.alert("Password length must be between 6 and 20 characters.");
	}
	else if (!passreg.test(pass)){
		window.alert("Password must contain at least 1 uppercase letter, 1 lowercase letter, and 1 number.");
	}
	else{
		var url = "php/process.php";
		var params = "page=register&user="+escape(user)+"&pass="+escape(pass);
		xhr.open("POST", url, true);

		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.onreadystatechange = response2;
		xhr.send(params);
	}
}

function response1(){
	if ((xhr.readyState == 4) && (xhr.status == 200)){
		var response = xhr.responseText;
		if (response == "user"){
			window.alert("Username does not exist. Please try again.");
		}
		else if (response == "pass"){
			window.alert("Incorrect password. Please try again");
		}
		else if (response == "true"){
			window.alert("Login Succesful.");
			window.location = "home.php";
		}
	}
}

function response2(){
	if ((xhr.readyState == 4) && (xhr.status == 200)){
		var response = xhr.responseText;
		if (response == "user"){
			window.alert("Username is already taken.");
		}
		else if (response == "true"){
			window.alert("Registration Succesful.")
			window.location = "login.php";
		}
	}
}