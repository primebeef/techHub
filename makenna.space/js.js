// locate the element in the document with the speficiet id and return its contents

function getText (id) {
	var e = document.getElementById (id);
	if (e === null) {
		alert ("There is no element with the id: \""+id+ "\" in this document.");
		return null;
	}
	else {
		return e.innerHTML;
	}
}

// locate the element in the document with the specified id and change its contents to newText

function setText (id, newText) {
	var e = document.getElementById (id);
	if (e === null) {
		alert ("There is no element with the id: \""+id+ "\" in this document.");
		return false;
	}
	else {
		e.innerHTML = newText;
		return true;
	}
}

function getStyle(id, property){
	var e = document.getElementById (id);
	if (e === null) {
		alert ("There is no element with the id: \""+id+ "\" in this document.");
		return null;
	}
    var strValue = "";
   
    // non-IE
	if(window.getComputedStyle){
        strValue = getComputedStyle(e).getPropertyValue(property);
    }
	//IE
	else if (e.currentStyle){
		try {
			strValue = e.currentStyle[property];
		} 
		catch (e) {
			alert ("This element does not contain a style property: " + property);
		}
    }
         
    return strValue;
}

function setStyle(id, property, value){
	var e = document.getElementById (id);
	if (e === null) {
		alert ("There is no element with the id: \""+id+ "\" in this document.");
		return null;
	}
	var cmd = "document.getElementById('"+id+"').style."+camelCase(property)+"='"+value+"';";
	eval (cmd);
	function camelCase(str){
        return str.replace(/\-([a-z])/gi, function (match, p1){ // p1 references submatch in parentheses
            return p1.toUpperCase(); // convert first letter after "-" to uppercase
        });
   }
   return null;

}
function turnoff(where){
     setStyle(where,"visibility","hidden");
}
function turnon(where){
    setStyle(where,"visibility","visible");
}
var tick = false;
var aws;
var simple;
var first = true;
function start(){
    clearInterval(aws);
  if(first == true){
      simple = getStyle ("bar", "height"); 
    simple = parseInt(simple);
    first = false;
  }
    if(tick == false){
        tick = true;
       // alert(tick);
         move();
    }
    else if(tick == true){
        tick = false;
      //  alert(tick);
        move1();
    }
    
}

function move() {
 var nine = getStyle ("cresent", "opacity"); 
    nine = parseInt(nine);
if(nine != 0){
     
    setStyle("cresent","opacity",0);
    turnoff("catch");
     turnoff("caught");
    
}
    var x = getStyle ("bar", "height"); 
    x = parseInt(x);
//alert(x);
var y = getStyle ("plank", "height"); 
    y = parseInt(y);
//alert(y);
   
   setStyle("bar","height",x-1+"px");
   setStyle("plank","height",x-1+"px");
if(x > 0){
   aws = setTimeout(move,2);

}
if(x == 0){
    turnon('lucentwhite');
    turnon('mark');
}

}
function move1() {
     
    var x = getStyle ("bar", "height"); 
    x = parseInt(x);
//alert(x);
var y = getStyle ("plank", "height"); 
    y = parseInt(y);
//alert(y);
   
   setStyle("bar","height",x+1+"px");
   setStyle("plank","height",x+1+"px");
if(x < simple){
   aws = setTimeout(move1,2);

}
if(x == simple -1){
    setStyle("cresent","opacity",1);
    turnon("catch");
     turnon("caught");
     turnoff('lucentwhite');
     turnoff('mark');
}

}


