<?php include('header.php'); ?>
<?php include('chart_functions.php'); ?>
<h2>From Url donut chart</h2>
<?php
$chart = new Chart;

$from_url = $chart->from_url();
?>

    <div id="chart_from_url"></div>

    <script>
      (function(d3) {
        'use strict';
        var dataset = [
            <?php
            foreach ($from_url as $key => $value) {
            
            echo "{ label: '".$key."', count: ".$value." }, ";
        } ?>
        ];
        var width = 960;
        var height = 960;
        var radius = Math.min(width, height) / 2;
        var donutWidth = 75;
        var legendRectSize = 18;                                  
        var legendSpacing = 4;                                    
        var color = d3.scale.category20b();
        var svg = d3.select('#chart_from_url')
          .append('svg')
          .attr('width', width)
          .attr('height', height)
          .append('g')
          .attr('transform', 'translate(' + (width / 2) + 
            ',' + (height / 2) + ')');
        var arc = d3.svg.arc()
          .innerRadius(radius - donutWidth)
          .outerRadius(radius);
        var pie = d3.layout.pie()
          .value(function(d) { return d.count; })
          .sort(null);
        var path = svg.selectAll('path')
          .data(pie(dataset))
          .enter()
          .append('path')
          .attr('d', arc)
          .attr('fill', function(d, i) { 
            return color(d.data.label);
          });
          
          var tooltip = d3.select('#chart_from_url')                           
          .append('div')                                                
          .attr('class', 'tooltip');                                    
                      
        tooltip.append('div')                                           
          .attr('class', 'label');                                      
             
        tooltip.append('div')                                           
          .attr('class', 'count');                                      
        tooltip.append('div')                                           
          .attr('class', 'percent');
          
          path.on('mouseover', function(d) {                            
            var total = d3.sum(dataset.map(function(d) {                
              return d.count;                                           
            }));                                                        
            var percent = Math.round(1000 * d.data.count / total) / 10; 
            tooltip.select('.label').html(d.data.label);                
            tooltip.select('.count').html(d.data.count);                
            tooltip.select('.percent').html(percent + '%');             
            tooltip.style('display', 'block');                          
          });                                                           
          
          path.on('mouseout', function() {                              
            tooltip.style('display', 'none');                           
          });         
        var legend = svg.selectAll('.legend')                     
          .data(color.domain())                                   
          .enter()                                                
          .append('g')                                            
          .attr('class', 'legend')                                
          .attr('transform', function(d, i) {                     
            var height = legendRectSize + legendSpacing;          
            var offset =  height * color.domain().length / 2;     
            var horz = -2 * legendRectSize;                       
            var vert = i * height - offset;                       
            return 'translate(' + horz + ',' + vert + ')';        
          });                                                     
                               
      })(window.d3);
    </script>

<?php include('footer.php'); ?>