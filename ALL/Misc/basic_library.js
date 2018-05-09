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

// locate an element and add text to the end of what is already being displayed in it

function addText (id, text) {
    var current = getText (id);
    var newText = current + text;
    setText (id, newText);
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
			alert ("The element with id: " + id + " does not contain a style property: " + property);
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
}
