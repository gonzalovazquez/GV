/* 
 * Validation.js
 * Script in charge of validating data.
 * @author: Gonzalo Vazquez
 */

console.log("Hello from Validation.js");

//Main function that runs when user presses SUBMIT and 
//returns TRUE if PASS and FALSE if errors found.

function validateForm(){
    var x = document.forms['myForm'].searchFilm;    
    if(x.value == "")
        {
            alert("Please Enter A Value");
            return false;
        }
    return true; 
}

function validateSubmit(){
    var title = document.forms['addForm'].title;
    var genre = document.forms['addForm'].genre;
    var year = document.forms['addForm'].year;
    var runtime = document.forms['addForm'].runtime;
    var director = document.forms['addForm'].director;
    var poster = document.forms['addForm'].poster;
    var plot = document.forms['addForm'].plot;

    if( title.value == "" || genre.value == "" || year.value == "" || runtime.value == "" ||
        director.value == "" || poster.value == "" || plot.value == ""){
        alert("Please enter missing value");
        console.log(title + genre + year + runtime
         + director + poster + plot);
        return false;

    }
    return true;
}