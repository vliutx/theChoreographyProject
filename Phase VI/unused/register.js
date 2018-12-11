function validate() {
	var userVal = document.getElementById("user").value;
	var pass = document.getElementById("pass").value;
	var pass2 = document.getElementById("pass2").value;
	var userValid = checkUser(userVal);
	var passValid = checkPass(pass, pass2);
	if (!userValid || !passValid){
		alert("Invalid credentials. Check rules and try again");
		return false;
	}
	return true;
}

function checkUser(userVal) {
	
	// acceptable characters
	var alphaL = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
	var alphaU = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
	var num = ['1', '2', '3', '4', '5', '6', '7', '8', '9'];
	
	// check user name length
	console.log(userVal.length);
	if (userVal.length < 6 || userVal.length > 10) {
		return false;
	}
	
	// check if first character is a digit
	for (i=0; i < num.length; i++) {
		if (userVal.charAt(0) == num[i]) {
			return false;
		}
	}
	
	// check if any non-letters or non-digits are used
	// loop through each character of user name
	for (i=0; i < userVal.length; i++) {	
		var isLetter = false;
		var isNum = false;
		
		// confirm that character is a letter
		for (j=0; j < alphaL.length; j++) {
			if (userVal.charAt(i) == alphaL[j] || userVal.charAt(i) == alphaU[j]) {
				isLetter = true;
			}
		}
		
		// confirm that character is a number
		for (j=0; j < num.length; j++) {
			if (userVal.charAt(i) == num[j]) {
				isNum = true;
			}
		}
		
		// return false if character is neither a letter nor number
		// if character is a letter or number, continue looping through user name string
		if (!isLetter && !isNum) {
			return false;
		}
	}
	
	return true;
}

function checkPass(pass, pass2) {
	
	// acceptable characters
	var alphaL = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
	var alphaU = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
	var num = ['1', '2', '3', '4', '5', '6', '7', '8', '9'];
	
	// check if pass1 and pass2 match
	if (pass != pass2) {
		return false;
	}
	
	console.log(pass.length);
	if (pass.length < 6 || pass.length > 10) {
		return false;
	}
	
	// check if any non-letters or non-digits are used
	// also check if at least one lowercase letter, one uppercase letter, and one digit are used
	// loop through each character of user name
	var hasLower = 0;
	var hasUpper = 0;
	var hasDigit = 0;
	
	for (i=0; i < pass.length; i++) {	
		var isLetter = false;
		var isNum = false;
		
		// confirm that character is a lowercase letter
		for (j=0; j < alphaL.length; j++) {
			if (pass.charAt(i) == alphaL[j]) {
				isLetter = true;
				hasLower++;
			}
		}
		
		// confirm that character is an uppercase letter
		for (j=0; j < alphaU.length; j++) {
			if (pass.charAt(i) == alphaU[j]) {
				isLetter = true;
				hasUpper++;
			}
		}
		
		// confirm that character is a number
		for (j=0; j < num.length; j++) {
			if (pass.charAt(i) == num[j]) {
				isNum = true;
				hasDigit++;
			}
		}
		
		// return false if character is neither a letter nor number
		// if character is a letter or number, continue looping through user name string
		if (!isLetter && !isNum) {
			return false;
		}
	}
	
	// return false if missing a lowercase letter, uppercase letter, or digit
	if (hasUpper == 0 || hasLower == 0 || hasDigit == 0) {
		return false;
	}
	
	return true;
}