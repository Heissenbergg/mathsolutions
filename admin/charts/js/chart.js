var humidityAveragePerDays = new Array(0,100, 31, 45, 37, 45, 66, 55, 48 ,65 ,48 ,56, 15, 80, 46, 16, 37,100, 59, 77, 30, 77, 100);


function createGraph(wrapperID, canvasName){
    //wrapper details
    var wrapper = document.getElementById(wrapperID);
    var wrapperWidth = wrapper.clientWidth;
    var wrapperHeight = wrapper.clientHeight;
    
    
    //Now we are about to crate canvas
    var canvas = document.createElement('canvas');
    canvas.id = canvasName;
    canvas.className = 'classofcanvas';
    canvas.style.position = 'absolute';
    canvas.style.left = '50px';
    canvas.style.bottom = '50px';
    canvas.width = wrapperWidth - 100;
    canvas.height = wrapperHeight - 150;
    wrapper.appendChild(canvas);
    
    
    draw(canvas, humidityAveragePerDays.length - 1, humidityAveragePerDays, 0, 100);
}


function draw(canvas, xAxisScale, values, yFrom, yTo){
    
    var canv = canvas.getContext("2d");
    var newCanv = canvas.getContext("2d");
    var firstPoint = [];
    firstPoint.push({
        x:0,
        y:canvas.height
    });
    
    canv.beginPath();
    
    var defaultSize = scale(xAxisScale,canvas.width, 1);
    var lastXCoord = 0;
    for(var i=0; i<values.length;i++){
        var xcanv = scale(xAxisScale ,canvas.width, i);
        var ycanv = getReverseNumber(canvas.height, scale(100, canvas.height - 50, values[i]))
        //Copy for fill
        lastXCoord = xcanv;
        
        //console.log("x = " + xHum + "y = " + yHum);
        canv.moveTo(firstPoint.x, firstPoint.y);
        canv.lineTo(xcanv, ycanv);
        
        //newCanv.arc(xcanv,ycanv,2,2,2*Math.PI);
    }
    //newCanv.arc(50,50,2,2,2*Math.PI);
    canv.stroke();
    
    
    
    canv.fillStyle = 'rgba(0,191,243,0.1)';
    
    canv.lineTo(lastXCoord, canvas.height); // bottom-right
    canv.lineTo(0, canvas.height); // bottom-left
    canv.fill(); // will close the path for us
    canv.closePath();
    
    //Draw dots
    
    var lastXCoord = 0;
    for(var i=0; i<values.length;i++){
        var xcanv = scale(xAxisScale ,canvas.width, i);
        var ycanv = getReverseNumber(canvas.height, scale(100, canvas.height - 50, values[i]))
        
        lastXCoord = xcanv;
        
        canv.beginPath();    
        newCanv.arc(xcanv,ycanv,2,0,2*Math.PI);
        canv.fillStyle = '#000';
        canv.fill();
        canv.stroke();
        canv.closePath();
    }
    
    //x and y axis scale and values
    
    //for x axis
    var canvasBottomWrapper = document.getElementById("xAxis" + canvas.id);
    var canvasLeftWrapper = document.getElementById("yAxis" + canvas.id);
    canvasBottomWrapper.innerHTML = '';
    canvasLeftWrapper.innerHTML = ''; 
    
    var averagePoint = parseInt(values.length / 6);

    //for y axis
    var spanOfValues = yTo - yFrom;
    var averagePointForY = parseInt(spanOfValues / 5);
    var currentValue = yTo;
    var currentPosition = 0;

    for(var i=0; i<6;i++){
        var pY = document.createElement('p');
        pY.innerHTML = currentValue;
        pY.style.top = (currentPosition - 10) + 'px';
        canvasLeftWrapper.appendChild(pY);
        
        
        currentValue-=averagePointForY;
        currentPosition+=parseInt((canvas.height - 50) / 5);
    }
    
    for(var i=0; i<values.length;i++){
        if(i % averagePoint == 0){
            var xCoord = scale(xAxisScale ,canvas.width, i);
        
            //x coordinate
            var pX = document.createElement('p');
            pX.innerHTML = i+1;
            pX.style.left = (xCoord - 12) + 'px';
            canvasBottomWrapper.appendChild(pX);
        }
        
        
    }
    
}


function scale(f1, f2, value){
    return f2/f1 * value;
}


function scaleX(f1, f2){
    return f2/f1;
}


function getReverseNumber(range, number){
    return range - number;
}

function getRandomNumber(max){
    return Math.floor((Math.random() * max));
}

function mouseOver() {
    console.log("weee");
}


Element.prototype.remove = function() {
    this.parentElement.removeChild(this);
}
NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
    for(var i = this.length - 1; i >= 0; i--) {
        if(this[i] && this[i].parentElement) {
            this[i].parentElement.removeChild(this[i]);
        }
    }
}