console.log("Hello from main.js");


/* An Array containing all the languages */
var listLang = [" Java", " JavaScript", " Ruby on Rails", " HTML5", " Linux",
				 " PHP", " Wordpress", " ActionScript", " Python", ""];


/* Store the variable of each button */
var elements = document.getElementsByClassName("span4");


/* Loop through each of the buttons */
for (var i = 0; i < elements.length; i++) {
  elements[i].onmouseover = function() {
      //this.querySelector('div[id="popup"]').style.display = 'block';

      /* Check to see which div is currently selected */
      if(this == elements[i,0]){
      	document.getElementById("lang").innerHTML = listLang[0];
      }else if(this == elements[i,1]){
      	document.getElementById("lang").innerHTML = listLang[1];
      }else if(this == elements[i, 2]){
      	document.getElementById("lang").innerHTML = listLang[2];
      }else if(this == elements[i,3]){
      	document.getElementById("lang").innerHTML = listLang[3];
      }else if(this == elements[i,4]){
      	document.getElementById("lang").innerHTML = listLang[4];
      }else if(this == elements[i, 5]){
      	document.getElementById("lang").innerHTML = listLang[5];
      }else if(this == elements[i,6]){
      	document.getElementById("lang").innerHTML = listLang[6];
      }else if(this == elements[i, 7]){
      	document.getElementById("lang").innerHTML = listLang[7];
      }else if(this == elements[i,8]){
      	document.getElementById("lang").innerHTML = listLang[8];
      }     
  }
  elements[i].onmouseout = function(){
      //this.querySelector('div[id="popup"]').style.display = 'none';  
      document.getElementById("lang").innerHTML = listLang[9];  
      }
}


