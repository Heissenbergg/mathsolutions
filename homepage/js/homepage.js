var where = 50; var openIcons = 0;
function moveIcons(){
    var socialArray = new Array("sliderFacebook", "sliderYoutube", "sliderInstagram", "sliderPinterest");
    
    if(!openIcons){
        for(var i=0; i<4;i++){
            var move = document.getElementById(socialArray[i]);
            move.style.WebkitTransition = "all 0.5s";
            move.style.transition = "all 0.5s";
            
            move.style.marginRight = (where + "px");
            move.style.opacity = '1';
            where+=50;
        }
        openIcons++;
        where = 50;
    }else{
        for(var i=0; i<4;i++){
            var move = document.getElementById(socialArray[i]);
            move.style.WebkitTransition = "all 0.5s";
            move.style.transition = "all 0.5s";
            
            move.style.marginRight = "0";
            move.style.opacity = '0';
        }
        openIcons = 0;
    }
    
    return;
    
    for(var i=0; i<4;i++){
        var move = document.getElementById(socialArray[i]);
        move.style.WebkitTransition = "all 0.5s";
        move.style.transition = "all 0.5s";
        
        if (move.style.marginRight === (where + "px")) {
            move.style.marginRight = "0";
            move.style.opacity = '0';
    
        } else {
            move.style.marginRight = (where + "px");
            move.style.opacity = '1';
            where+=50;
        }
    }
}

//level 0 is basic level
var level = 0;


function setThem(where){
    var wrapperW = document.getElementById("mainPartitionRight").clientWidth;
    var basic = document.getElementById("basicLevel");
    var high = document.getElementById("highLevel");
    var trece = document.getElementById("etotimehmede");
    
    var basicHead = document.getElementById("basicLvlHead");
    var highHead = document.getElementById("hightLvlHead");
    var mehoGlava = document.getElementById("mehoGlava");
    
    if(where == 1){
        basic.style.left = '0px';
        high.style.left = wrapperW + 'px';
        trece.style.left = (2*wrapperW) + 'px';
        
        basicHead.style.borderBottom = '3px solid #00C6FF';
        highHead.style.borderBottom = '3px solid rgba(0,0,0,0.1)';
        mehoGlava.style.borderBottom = '3px solid rgba(0,0,0,0.1)';
        
        level = 0;
    }else if(where == 2){
        basic.style.left = ((-1) * wrapperW) + 'px';
        high.style.left = '0px';
        trece.style.left = (wrapperW) + 'px';
        
        basicHead.style.borderBottom = '3px solid rgba(0,0,0,0.1)';
        highHead.style.borderBottom = '3px solid #00C6FF';
        mehoGlava.style.borderBottom = '3px solid rgba(0,0,0,0.1)';
        
        level = 1;
    }else if(where == 3){
        basic.style.left = ((-2) * wrapperW) + 'px';
        high.style.left = ((-1) * wrapperW) + 'px';
        trece.style.left ='0px';
        
        basicHead.style.borderBottom = '3px solid rgba(0,0,0,0.1)';
        highHead.style.borderBottom = '3px solid rgba(0,0,0,0.1)';
        mehoGlava.style.borderBottom = '3px solid #00C6FF';
    }
    
}


var basicLvl = new Array(13,14,15,16,17,18,19,20,21,22,23,24,26,27,28,30,32,34,35,36,37);

var highLvl = new Array(43,44,45,46,47,48,49,50,51,52,53,54,56,57,58,59,61,63,64,65,66);

function getLesson(value){
    if(!level){
        window.location = "courses.php?what=6&lesson="+basicLvl[value];
    }else{
        window.location = "courses.php?what=7&lesson="+highLvl[value];
    }
}


function goto(){
    var sections = document.getElementById("mainPartition");
    window.scrollTo(0, (sections.offsetTop - 50));
}