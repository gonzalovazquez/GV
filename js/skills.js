$(function () {
    
        var colors = Highcharts.getOptions().colors,
            categories = ['JavaScript', 'Ruby', 'HTML5', 'Others'],
            name = 'Languages',
            data = [{
                    y: 40.20,
                    color: colors[0],
                    drilldown: {
                        name: 'JavaScript',
                        categories: ['JavaScript', 'Angular JS'],
                        data: [26.06, 14.14],
                        color: colors[0]
                    }
                }, {
                    y: 27.70,
                    color: colors[2],
                    drilldown: {
                        name: 'Ruby',
                        categories: ['Ruby', 'Rails'],
                        data: [9, 19],
                        color: colors[1]
                    }
                }, {
                    y: 17,
                    color: colors[5],
                    drilldown: {
                        name: 'HTML5',
                        categories: ['HTML5', 'CSS', 'SASS'],
                        data: [10, 5, 2],
                        color: colors[2]
                    }
                }, {
                    y: 15.1,
                    color: colors[3],
                    drilldown: {
                        name: 'Others',
                        categories: ['Java', 'PHP', 'Linux', 'Python'],
                        data: [6.1, 2.4, 5.3, 1.3],
                        color: colors[3]
                    }
                }];
    
    
        // Build the data arrays
        var browserData = [];
        var versionsData = [];
        for (var i = 0; i < data.length; i++) {
    
            // add browser data
            browserData.push({
                name: categories[i],
                y: data[i].y,
                color: data[i].color
            });
    
            // add version data
            for (var j = 0; j < data[i].drilldown.data.length; j++) {
                var brightness = 0.2 - (j / data[i].drilldown.data.length) / 5 ;
                versionsData.push({
                    name: data[i].drilldown.categories[j],
                    y: data[i].drilldown.data[j],
                    color: Highcharts.Color(data[i].color).brighten(brightness).get()
                });
            }
        }
    
        // Create the chart
        $('#piechart').highcharts({
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Programming Languages I Speak'
            },
            yAxis: {
                title: {
                    text: 'Total Languages'
                }
            },
            plotOptions: {
                pie: {
                    shadow: false,
                    center: ['50%', '50%']
                }
            },
            tooltip: {
              valueSuffix: '%'
            },
            series: [{
                name: 'Languages',
                data: browserData,
                size: '60%',
                dataLabels: {
                    formatter: function() {
                        return this.y > 5 ? this.point.name : null;
                    },
                    color: 'white',
                    distance: -30
                }
            }, {
                name: 'Frameworks',
                data: versionsData,
                size: '80%',
                innerSize: '60%',
                dataLabels: {
                    formatter: function() {
                        // display only if larger than 1
                        return this.y > 1 ? '<b>'+ this.point.name +':</b> '+ this.y +'%'  : null;
                    }
                }
            }]
        });
    });