function showMoreAboutPeople(id){
    var allCoursesWrapper = document.getElementById("allCoursesBody");
    var allcourses = allCoursesWrapper.getElementsByClassName("thisCourseSigned");
    
    //change from + to -
    //var allcoursesIconsPlus = allCoursesWrapper.getElementsByClassName("fa-plus");
    //var allcoursesIconsMinus = allCoursesWrapper.getElementsByClassName("fa-minus");
    
    var height = 320;
    /*
    var windowWidth = window.innerWidth;
    if(windowWidth > 1000) height = 350;
    else if(windowWidth >800 && windowWidth <= 1000) height = 300;
    else if(windowWidth <=800) height = 600;
    */
    
    for(var i=0; i<allcourses.length; i++){
        if(i == parseInt(id)){
            allcourses[i].style.height = "auto";
            //allcoursesIconsPlus[i].style.display = 'none';
            //allcoursesIconsMinus[i].style.display = 'block';
            allcourses[i].style.border = '1px solid rgba(0,0,0,0.1)';
        } 
        else{
            allcourses[i].style.height = "0px";
            allcourses[i].style.border = 'none';
            //allcoursesIconsPlus[i].style.display = 'block';   
            //allcoursesIconsMinus[i].style.display = 'none';
        }
        
    }
}



function deleteFromCourses(id, what, courseID, index, requestsIndex){
	var xml = new XMLHttpRequest();
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      	console.log(this.responseText);
	      	if(what == 'courses'){
	      	    hideSignedFromCourse(index);
	      	    var requests = document.getElementById("totalCourseRequests");
	      	    requests.innerHTML = (parseInt(requests.innerHTML) - 1)
	      	}else if(what == 'lessons'){
	      	    hideSignedFromLesson(index);
	      	    setTotalRequests(requestsIndex);
	      	}
			//window.location = 'signedpersons.php?courseId=' + courseID;
	    }
	};
	xml.open('POST', 'courses/http/deleteSignedPerson.php');
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	xml.send("id="+parseInt(id)+"&what="+what);
}


function hideSignedFromCourse(index){
    var persons = document.getElementById("allCoursesBody").getElementsByClassName("thisCourseSignedOption2");
    for(var i=0; i<persons.length; i++){
        if(i == index) persons[i].style.display = 'none';
    }
}

function hideSignedFromLesson(index){
    var persons = document.getElementById("allCoursesBody").getElementsByClassName("thisCourseSignedOption3");
    for(var i=0; i<persons.length; i++){
        if(i == index) persons[i].style.display = 'none';
    }
}

function setTotalRequests(index){
    var requests = document.getElementById("allCoursesBody").getElementsByClassName("totalLessonsRequests");
    for(var i=0; i<requests.length; i++){
        if(i == index){
            requests[i].innerHTML = (parseInt(requests[i].innerHTML) - 1);
        }
    }
}
