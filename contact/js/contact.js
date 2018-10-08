function sendMail(){
    var name = document.getElementById("contactName").value;
    var mail = document.getElementById("contactMail").value;
    var msg = document.getElementById("contactMsg").value;
    
    var xml = new XMLHttpRequest();
    
    xml.open('POST', 'contact/http/sendmail.php', true);
    
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        if(this.responseText == 'Mail Sent Successfully') alert("Vaša poruka je poslana!");
	        else alert("Poruka nije poslana. Problem sa serverom. Molimo pokušajte kasnije.")
	        console.log(this.responseText);
	    }
	};
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xml.send("name="+name+"&mail="+mail+"&msg="+msg);
}