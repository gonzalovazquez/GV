/*
Timeline using D3.js library
Author: Gonzalo Vazquez
*/


//Global Variables
var pop = document.getElementById("pop-up");
var title = document.getElementById("pop-up-title");
var image = document.getElementById("pop-img");
var desc = document.getElementById("pop-desc");
var ifrm = document.createElement("IFRAME"); 
var newDiv = document.createElement("div");
var label_history = document.createTextNode("History");

/*Load Json file that contains all the data */
d3.json("data.json",function(dataset)
{

    /*Print out our Json object*/
    console.log(dataset);
    /*Set an array for loading the Labels and Years */
    var years = [
    {"label":"1600","y":20,"x": 220},
    {"label":"1650","y":20,"x": 420},
    {"label":"1700","y":20,"x": 660},
    {"label":"1750","y":20,"x": 880},
    {"label":"1800","y":20,"x": 1100},
    {"label":"1850","y":20,"x": 1320},
    {"label":"1900","y":20,"x": 1540},
    {"label":"1950","y":20,"x": 1760},
    {"label":"2000","y":20,"x": 1980},
    {"label":"2050","y":20,"x": 2200}];

    /*Set two global variables */
    var width = 2200;
    var height = 200;

    /*Instantiate an empty array*/
    var newScaledData = [];

    /* Set the scale for our data. This is very important because this
    is how we tell our data what is the range, and we do this by passing 
    it a range and a domain.
    In this example if we want to modify the range we just change x
    .range[x,2020]
    Example of how the scale works:
    var myScale=d3.scale.linear().domain([0,25]).range([0,100]);
    myScale(0) // 0
    myScale(25) // 100
    myScale(10) // 40
    */
    var x=d3.scale.linear().range([1150, 2020]).domain([1803,2013]);


    /* We loop through our data, in this case the date and apply the new scale,
    after we store those new numbers in the newScaledData. At the moment we are not
    using the newScaleData array but mainly using it as a debugging tool */
    for (var i = 0; i < dataset.length; i++) {
        newScaledData[i] = x(dataset[i].date);
        }

    /* Print our our new array */    
    console.log(newScaledData);




    /* Timeline */
     var timeline = d3.select("#timeline")
                .append("svg:svg")
                .attr("width", width)
                .attr("height", 200);

            // "svg:line" element requires 4 attributes (x1, y1, x2, and y2)
            // (x1,y1) are coordinates of the starting point. 
            // (x2,y2) are coordinates of the end point.
            // You also need to specify the stroke color.
            /*
            var women = timeline.append("svg:line")
                .attr("x1", 40)
                .attr("y1", 50)
                .attr("x2", width)
                .attr("y2", 50)
                .style("stroke", "rgb(91,143,34)");


             var philosophy = timeline.append("svg:line")
                            .attr("x1", 40)
                            .attr("y1", 150)
                            .attr("x2", width)
                            .attr("y2", 150)
                            .style("stroke", "rgb(83,40,79)");


            */

            var history = timeline.append("svg:line")
                .attr("x1", 40)
                .attr("y1", 100)
                .attr("x2", width)
                .attr("y2", 100)
                .style("stroke", "rgb(0,126,163)");

     //Adding Years
            var text = timeline.selectAll("text")
                       .data(years)
                       .enter()
                       .append("text");

            var textYears = text
                             .attr("x", function(d) { return d.x;})
                             .attr("y", function(d) { return d.y;})
                             .text(function(d){return(d.label)})
                             .attr("font-family", "sans-serif")
                             .attr("font-weight", "bold")
                             .attr("font-size", "15px")         
                             .attr("fill", "gray")
                             .style("position", "fixed");

   /* HISTORY LABEL */

    newDiv.appendChild(label_history);      
    //newDiv.setAttribute('style','font-size:20px');  
    newDiv.setAttribute('style','font-size:20px');  
    newDiv.style.marginTop = "-117px";
    newDiv.style.marginLeft = "38px";  
    newDiv.style.position = "fixed";
    document.body.appendChild(newDiv);                  


    //Nodes
            var nodes = timeline.selectAll("circle")
                .data(dataset)
                .enter()
                .append("a")
                .attr("xlink:href", function(d) { return d.link; })
                .append("circle")
                //.append("svg:a") // Append legend elements
                .attr("r",7)
                /* Coordinate x moves along y axis depending on year */
                //.attr("cx", function(d,i){return 40*(i+1);})
                .attr("cx",function(d) {return x(d.date);})
                .attr("cy",function(d) {return (d.y);})          
                .style("stroke", "black")
                .style("fill", function(d) {
                             var returnColor;
                             if (d.category === "Women") { 
                                returnColor = "rgb(91,143,34)";
                             }else if (d.category === "History"){
                              returnColor = "rgb(0,126,163)";
                            } else if (d.category === "Philosophy") {
                                returnColor = "rgb(83,40,79)"; }
                             return returnColor;
                          })
                .on("mouseout", function(d){d3.select(this)
                    pop.style.display = "none";
                    /*Removes iFrame*/
                    //document.body.removeChild(ifrm); 
                })
                .on("mouseover", function(d) {d3.select(this)
                    pop.style.display = "block";
                    title.style.display = "inline";
                    desc.style.display = "inline";
                    title.innerHTML = (d.keyword);
                    desc.innerHTML = (d.date); 
                    ifrm.setAttribute("src", d.link); 
                    ifrm.style.width = 720+"px"; 
                    ifrm.style.height = 600+"px"; 
                    ifrm.style.position = "fixed";
                    ifrm.style.marginTop="-60px";
                    document.body.appendChild(ifrm); 
                    console.log(pop);
                    d3.select(this)
                        .transition()         
                        .delay(0)            
                        .duration(500)
                        .attr("r", 12)
                        .style("stroke", "white")
                        .each("end", animateSecondStep);
                })
                .append("title")          
                .text(function(d){return d.keyword});

                function animateSecondStep(){
                    //pop.style.display = "hidden";
                    d3.select(this)
                        .transition()
                        .duration(500)
                        .attr("r", 7)
                        .style("stroke", "black");
                };
    })
