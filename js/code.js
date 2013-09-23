console.log("Hi");

/**https://github.com/ccampbell/mousetrap
* Konami Code */
Mousetrap.bind(['u u'], function(e) {
	console.log("Code Activated");

	/*Elements to Variables */

	var carousel = document.getElementById('myCarousel');

	var langButtons = document.querySelectorAll(".span4");

	var title = document.querySelector(".featurette-heading");

	var navbar = document.querySelector(".navbar");

	var footer = document.querySelector("footer");

	var divider = document.querySelector(".featurette-divider");


           
    /*Remove Elements*/ 
    carousel.parentNode.removeChild(carousel);
    for(var i=0; i<langButtons.length; i++){
    	langButtons[i].parentNode.removeChild(langButtons[i]);
    }
    title.parentNode.removeChild(title);
    navbar.parentNode.removeChild(navbar);
    footer.parentNode.removeChild(footer);
    divider.parentNode.removeChild(divider);

    /*Create Elements*/
	var matrix = document.createElement('img');
	matrix.src = 'http://shpintv.com/images/2013/03/the_matrix_1080p-HD-Wallpaper.jpg';
	matrix.setAttribute('width', '100%');
	matrix.setAttribute('height', '100%');
	matrix.alt = 'Matrix';

	var title=document.createElement("p");
	var text = document.createTextNode("Welcome to the Matrix");
	title.appendChild(text);
	title.style.textAlign = "center";


	// We append the image to the body.
	document.body.appendChild(matrix);

	// Append the title the current class row
	document.querySelector(".row").appendChild(title);
   

   //Trip to Punta Cana - Code on the plane 

   
   
   function ror(){
   for(var i=0; i<=100; i++){
   		console.log("Function ror" + i);
   		return i;
   }
	}
   console.log(ror());

   
   /* Not used Code */
   /*
   var div = document.createElement("div");
        div.innerHTML = "Activated";
   
   	document.querySelector(".row").appendChild(div);
    .appendChild(text);
    */


      });
