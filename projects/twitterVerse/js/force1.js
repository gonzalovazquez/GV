var width = 600,
    height = 400;

var color = d3.scale.category20();

var force = d3.layout.force()
    .charge(-320)
    .linkDistance(5)
  	.gravity(.1)
  	.distance(50)
    .size([width, height]);

var svg = d3.select("#chart").append("svg:svg")
    .attr("width", width)
    .attr("height", height);

d3.json("json/troy.json", function(json) {
 force
     .nodes(json.nodes)
     .links(json.links)
     .start();
	
  var link = svg.selectAll("line.link")
    .data(json.links)
    .enter().append("line")
    .attr("class", "link")
    .style("stroke-width", function(d) { return Math.sqrt(d.value); });
	  
// This was not working at the moment..the links nodes are not calling  

  var node = svg.selectAll("circle.node")
      .data(json.nodes)
      .enter().append("circle")
      .attr("class", "node")
      .attr("r", 4)
      .style("fill", function(d) { return color(d.group); })
      .call(force.drag);
	  
	  //-----------------------------
var text = svg.append("svg:g").selectAll("g")
    .data(force.nodes())
  	.enter().append("svg:g");

// Text Appending

text.append("svg:text")
    .attr("x", 8)
    .attr("y", ".31em")
    .text(function(d) { return d.city_name; });

	//---------------

node.append("title")
      .text(function(d) { return d.city_name });
	    


force.on("tick", function() {
   link.attr("x1", function(d) { return d.source.x; })
        .attr("y1", function(d) { return d.source.y; })
        .attr("x2", function(d) { return d.target.x; })
        .attr("y2", function(d) { return d.target.y; });

node.attr("cx", function(d) { return d.x; })
	.attr("cy", function(d) { return d.y; });
	
  text.attr("transform", function(d) {
    return "translate(" + d.x + "," + d.y + ")";
  });	

	 
  });
});
