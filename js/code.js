console.log("Hi");



/**https://github.com/ccampbell/mousetrap
* Konami Code */
Mousetrap.bind(['u u'], function(e) {
	console.log("Code Activated");

	/*Elements to Variables */
	var carousel = document.getElementById('myCarousel');


           
    /*Remove Elements*/ 
    carousel.parentNode.removeChild(carousel);
      });