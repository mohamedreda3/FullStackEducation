let formLogIn = document.querySelector('form.login');
formLogIn.onsubmit = function(e){
	e.preventDefault();
	let logInData = new FormData(formLogIn);
	var responseLogIn = "";
    var goToPanel = function goPanel(argu){  
    if(argu == "logged as teacher"){
    	return location.href = 'adminpanel/teacherpanel/'; 
    }
    if(argu == "logged as student") {
    	return location.href = 'adminpanel/studentpanel/';
    }
    };
    var responseLogIn = "logged as teacher" || "logged as student"
    xml_request_manipulate_data(logInData, 'login.php', responseLogIn, goToPanel);
}