function checkForm(){
	var form = document.getElementById("SignUpForm");
	var passwordRepeatText = document.getElementById("passwordCheckText");
	var passwordText = document.getElementById("passwordText");
	var ErrorMessage = document.getElementById("error");
	form.onsubmit = function(e){
		e.preventDefault();
		// validateForm(e);
		var proceed = validateForm(e);
		if(proceed) {
			return true;
		} else {
			return false;
		}
	}
	form.onchange = function(e){
		if(e.target.type == "password"){
			ErrorMessage.style.display = "none";
			passwordRepeatText.classList.remove("highlight");
			passwordText.classList.remove("highlight");
		} 
	}
	
}



function validateForm(event){
	var isValid = true;	// assume everything is valid until proven otherwise
	var form = document.getElementById("SignUpForm");
	
	var passWord = document.getElementById("password");
	var passwordRepeat = document.getElementById("passwordCheck");
	var passwordRepeatText = document.getElementById("passwordCheckText");
	var passwordText = document.getElementById("passwordText");
	var ErrorMessage = document.getElementById("error");
	
	
	if(passWord.value != passwordRepeat.value){		// check both passWords and highlight both, if they do not match
		isValid = false;
		event.preventDefault();
		passwordText.classList.add("highlight"); 
		passwordRepeatText.classList.add("highlight");
		ErrorMessage.style.display = "block";
		ErrorMessage.innerHTML = "Error! Passwords do not match"; 
	}
	

	
	if(isValid == true){	// if form is valid
		// form.submit();
		return true;
	} else {
		return false;
	}
}



  