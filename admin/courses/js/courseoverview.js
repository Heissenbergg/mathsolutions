function showMoreAboutCourse(id){
    hideAfterEdit();
    var allCoursesWrapper = document.getElementById("allCoursesBody");
    var allcourses = allCoursesWrapper.getElementsByClassName("moreaboutcourse");
    
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
            allcourses[i].style.height = height + "px";
            //allcoursesIconsPlus[i].style.display = 'none';
            //allcoursesIconsMinus[i].style.display = 'block';
        } 
        else{
            allcourses[i].style.height = "0px";
            //allcoursesIconsPlus[i].style.display = 'block';   
            //allcoursesIconsMinus[i].style.display = 'none';
        }
        
    }
}


function showCourseForEdit(id){
    hideAllLessonDetails();
    var allCoursesWrapper = document.getElementById("allCoursesBody");
    var allcourses = allCoursesWrapper.getElementsByClassName("moreaboutcourseEdit");
    
    for(var i=0; i<allcourses.length; i++){
        if(i == parseInt(id)){
            allcourses[i].style.height = "420px";
            //allcoursesIconsPlus[i].style.display = 'none';
            //allcoursesIconsMinus[i].style.display = 'block';
        } 
        else{
            allcourses[i].style.height = "0px";
            //allcoursesIconsPlus[i].style.display = 'block';   
            //allcoursesIconsMinus[i].style.display = 'none';
        }
        
    }
}


function editLesson(id, index){
    var name = document.getElementById("editName" + index).value;
    var duration = document.getElementById("editDuration" + index).value;
    var date = document.getElementById("editDate" + index).value;
    var location = document.getElementById("editLocation" + index).value;
    var price = document.getElementById("editPrice" + index).value;
    var description = document.getElementById("editDescription" + index).value;
    
    var xml = new XMLHttpRequest();
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      	hideAfterEdit();
	    }
	};
	xml.open('POST', 'courses/http/updateLesson.php');
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	xml.send("id="+parseInt(id)+"&name="+name+"&duration="+duration+"&date="+date+"&location="+location+"&price="+price+"&description="+description);
}

function hideAfterEdit(){
    var allCoursesWrapper = document.getElementById("allCoursesBody");
    var allcourses = allCoursesWrapper.getElementsByClassName("moreaboutcourseEdit");
    
    for(var i=0; i<allcourses.length; i++){
        allcourses[i].style.height = "0px";
    }
}

function hideAllLessonDetails(){
    var allCoursesWrapper = document.getElementById("allCoursesBody");
    var allcourses = allCoursesWrapper.getElementsByClassName("moreaboutcourse");
    
    for(var i=0; i<allcourses.length; i++){
        allcourses[i].style.height = "0px";
    }
}