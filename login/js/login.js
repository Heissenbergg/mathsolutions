function login(){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    
    
    var xml = new XMLHttpRequest();
    xml.open('POST', 'login/createSession.php', true);
    
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        var response = this.responseText;
	        if(response == 2) alert("Pogrešna šifra. Molimo pokušajte ponovo!");
	        else if(response == 1) window.location = 'admin/';
	    	//console.log(this.responseText);	
	    }
	};
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xml.send("username="+username+"&password="+password);
    
}