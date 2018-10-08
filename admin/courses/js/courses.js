function saveCourse(){
    var courseName = document.getElementById("newCourse").value;
    var xml = new XMLHttpRequest();
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      	console.log(this.responseText);
	      	window.location = 'allcourses.php';
	    }
	};
	xml.open('POST', 'courses/http/insertCourse.php');
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	xml.send("courseName="+courseName);
}

var nameOfImage = '';

function uploadIcon(){
    var image = document.getElementById("uploadedIcon");
    image.style.display = 'none';
    
    var data = new FormData();
	//files.length i file[] idu za mulitple files upload
	var ins = document.getElementById('file').files.length;
	for (var x = 0; x < ins; x++) {
	    data.append("file[]", document.getElementById('file').files[x]);
	}


	var xml = new XMLHttpRequest();
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      	var image = document.getElementById("uploadedIcon");
	      	image.setAttribute("src", 'courses/lessonIcons/' + this.responseText);
	      	image.style.display = 'block';
	      	nameOfImage = this.responseText;
	    }
	};
	xml.open('POST', 'courses/http/uploadimage.php');
	//xml.setRequestHeader('Cache-Control', 'no-cache');
	xml.send(data);
}


function savePost(what){
	var courseId = parseInt(document.getElementById('courseID').innerHTML);
    var name = document.getElementById("nameOfLesson").value;
    var duration = document.getElementById("durationOfLesson").value;
    var date = document.getElementById("dateOfLesson").value;
    var location = document.getElementById("locationOfLesson").value;
    var price = document.getElementById("priceOfLesson").value;
    var shortDesc = document.getElementById("shortDescOfLesson").value;
    var teach1 = document.getElementById("teach1OfLesson").value;
    var teach2 = document.getElementById("teach2OfLesson").value;
    var teach3 = document.getElementById("teach3OfLesson").value;
    
    var xml = new XMLHttpRequest();
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      	//console.log(this.responseText);
	      	window.location = 'courseoverview.php?courseId=' + courseId;
	    }
	};
	if(!what) xml.open('POST', 'courses/http/insertlession.php');
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	xml.send("courseId="+courseId+"&nameOfImage="+nameOfImage+"&name="+name+"&duration="+duration+"&date="+date+"&location="+location+"&price="+price+"&shortDesc="+shortDesc+"&teach1="+teach1+"&teach2="+teach2+"&teach3="+teach3);
}


function deleteLession(id, courseID){
	console.log(id);
	var xml = new XMLHttpRequest();
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      	console.log(this.responseText);
			window.location = 'courseoverview.php?courseId=' + courseID;
	    }
	};
	xml.open('POST', 'courses/http/deleteLession.php');
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	xml.send("id="+parseInt(id));
}