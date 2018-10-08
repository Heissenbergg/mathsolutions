var whatToSign = 0;
var lessonID = 0;

var isitfuckedmove = 0;

function move(id, what = null, lessID = null){
    var wrapper = document.getElementById("mainWrapperTabsWrapper");
    var wrapperW = wrapper.clientWidth;
    
    var tabsCours = document.getElementById("tabsCourses");
    var second = document.getElementById("secondHugeTab");
    //var third = document.getElementById("thirdHugeTab");
    
    var tabsCoursOpt = document.getElementById("mainWrapperTabsWrapperHeaderOption0");
    var secondOpt = document.getElementById("mainWrapperTabsWrapperHeaderOption1");
    //var thirdOpt = document.getElementById("mainWrapperTabsWrapperHeaderOption2");
    
    var num = 350;
    var windowWidth = window.innerWidth;
    if(windowWidth > 800) num = 42;
    else if(windowWidth <=800) num = 20;
    
    
    //form
    var formName = document.getElementById("reservationName");
    
    if(id == 'courses'){
        tabsCours.style.left = num + 'px';
        second.style.left = (wrapperW + num) + 'px';
        //third.style.left = (2*wrapperW + num) + 'px';
        
        tabsCoursOpt.style.borderBottom = '3px solid #00C6FF';
        secondOpt.style.borderBottom = '0px';
        //thirdOpt.style.borderBottom = '0px';
    }else if(id == 'reservation'){
        tabsCours.style.left = (wrapperW * (-1)) + 'px';
        second.style.left = num + 'px';
        //third.style.left = (wrapperW + num) + 'px';
        
        tabsCoursOpt.style.borderBottom = '0px';
        secondOpt.style.borderBottom = '3px solid #00C6FF';
        //change form header
        if(what == 'fullCourse'){
            var extraText = '<p>Rezervacija cjelokupne nastave</p>';
            formName.innerHTML = '<h4>' + document.getElementById("fullCourseNameee").innerHTML + '</h4>' + extraText;
            whatToSign = 0;
        }else {
            formName.innerHTML = '<h4>' + what + '</h4>';
            whatToSign = 1;
            lessonID = lessID;
        }
        
        //thirdOpt.style.borderBottom = '0px';
    }else if(id == 'teachers'){
        tabsCours.style.left = (wrapperW * (-2)) + 'px';
        second.style.left = (wrapperW * (-1)) + 'px';
        third.style.left = num + 'px';
        
        tabsCoursOpt.style.borderBottom = '0px';
        secondOpt.style.borderBottom = '0px';
        thirdOpt.style.borderBottom = '3px solid #00C6FF';
    }
}



function showCourse(id){
    var allCoursesWrapper = document.getElementById("tabsCourses");
    var allcourses = allCoursesWrapper.getElementsByClassName("tabsCoursesCourseTwo");
    
    //change from + to -
    var allcoursesIconsPlus = allCoursesWrapper.getElementsByClassName("fa-plus");
    var allcoursesIconsMinus = allCoursesWrapper.getElementsByClassName("fa-minus");
    
    var height = 350;
    var windowWidth = window.innerWidth;
    if(windowWidth > 1000) height = 350;
    else if(windowWidth >800 && windowWidth <= 1000) height = 300;
    else if(windowWidth <=800) height = 600;
    
    
    for(var i=0; i<allcourses.length; i++){
        if(i == parseInt(id)){
            allcourses[i].style.height = height + "px";
            allcoursesIconsPlus[i].style.display = 'none';
            allcoursesIconsMinus[i].style.display = 'block';
        } 
        else{
            allcourses[i].style.height = "0px";
            allcoursesIconsPlus[i].style.display = 'block';   
            allcoursesIconsMinus[i].style.display = 'none';
        }
        
    }
}

function hideCourses(){
    var allCoursesWrapper = document.getElementById("tabsCourses");
    var allcourses = allCoursesWrapper.getElementsByClassName("tabsCoursesCourseTwo");
    
    //change from + to +
    var allcoursesIconsPlus = allCoursesWrapper.getElementsByClassName("fa-plus");
    var allcoursesIconsMinus = allCoursesWrapper.getElementsByClassName("fa-minus");
    
    for(var i=0; i<allcourses.length; i++){
        allcoursesIconsPlus[i].style.display = 'block';   
        allcoursesIconsMinus[i].style.display = 'none';
        allcourses[i].style.height = "0px";
    }
}



function makeReservation(){
    var name = document.getElementById("reservationNamee").value;
    var mail = document.getElementById("reservationMail").value;
    var phone = document.getElementById("reservationPhone").value;
    var parent = document.getElementById("reservationParent").value;
    var adress = document.getElementById("reservationAdress").value;
    var courseID = parseInt(document.getElementById("thisCourseUniqueID").innerHTML);
    var xml = new XMLHttpRequest();
    xml.open('POST', 'courses/http/signup.php', true);
    
    if(isitfuckedmove){
        var schoolName = document.getElementById("reservationSchool").value;
    }else{
        var schoolName = 'blank';
    }
    
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	    	if (this.readyState == 4 && this.status == 200) {
    	    	console.log(this.responseText);
    	        if(this.responseText == 12){
    	            window.location = "404.php";
    	        }else{
    	            //alert("Uspješno ste se prijavili !");
        	        move('courses');
        	        resetAll();   
    	        }
    	    }
	    }
	};
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xml.send("whatToSign="+whatToSign+"&name="+name+"&mail="+mail+"&phone="+phone+"&parent="+parent+"&adress="+adress+"&lessonID="+lessonID+"&courseID="+courseID+"&schoolName="+schoolName);   
}


function changeCourse(courseID, position){
    var xml = new XMLHttpRequest();
    console.log(courseID);
    if(parseInt(courseID) == 10){
        xml.open('POST', 'courses/http/getotherCourse.php', true);
        isitfuckedmove = 1;
    }else{
        xml.open('POST', 'courses/http/getcourse.php', true);
        isitfuckedmove = 0;  
    } 
    
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	    	document.getElementById("mainWrapperTabsWrapper").innerHTML = this.responseText;
	    	
	    	
	    	var allLinks = document.getElementById("mainWrapperMenuWrapperBody").getElementsByClassName("mainWrapperMenuWrapperCategoryValue");
	        for(var i=0; i<allLinks.length; i++){
	            if(i == parseInt(position)) allLinks[i].style.color = "#00C6FF";
	            else allLinks[i].style.color = "#333";
	        } 	
	        var width = window.innerWidth;
	        if(width < 1150) showCourseRightMenu();
	    }
	};
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xml.send("courseid="+courseID);
}


function resetAll(){
    document.getElementById("reservationNamee").value = '';
    document.getElementById("reservationMail").value = '';
    document.getElementById("reservationPhone").value = '';
    document.getElementById("reservationParent").value = '';
    document.getElementById("reservationAdress").value = '';
}

var isOpenRightCourseMenu = 0;

function showCourseRightMenu(){
    var rightMenu = document.getElementById("mainWrapperMenuWrapper");
    if(!isOpenRightCourseMenu){
        rightMenu.style.right = '0px';
        isOpenRightCourseMenu = 1;
    }else{
        rightMenu.style.right = '-320px';
        isOpenRightCourseMenu = 0;
    }
    
}