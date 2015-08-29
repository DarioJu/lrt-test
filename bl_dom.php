<?php include('header.php'); ?>
<?php include('chart_functions.php'); ?>

<h2>BLdom bar chart</h2>
<?php
$chart = new Chart;

$result = $chart->bl_dom_ranges();

$link_arr = $chart->bl_dom();

$less_thousand = array();
$less_tenthousand = array();
$less_hundredthousand = array();
$more_hundredthousand = array();

foreach ($link_arr as $num) {
    if ($num < 1000) {
        $less_thousand[] = $num; 
    }
    else if ($num < 10000) {
        $less_tenthousand[] = $num;
    }
    else if ($num < 100000) {
        $less_hundredthousand[] = $num;
    }
    else if ($num > 100000) {
        $more_hundredthousand[] = $num;
    }
}

             ?>
<svg id="visualisation" width="1000" height="500"></svg>

<script>
InitChart();

function InitChart() {

  var barData = [
    <?php  
    foreach ($result as $key => $value) {
    echo "{ 'x': '".$key."', ";
    echo "'y': ".$value."},";
    }
    ?>
    {
    'x': '< 1,000',
    'y': <?php echo count($less_thousand); ?>
  },
          
    {
    'x': '< 10,000',
    'y': <?php echo count($less_tenthousand); ?>
  },
    {
    'x': '< 100,000',
    'y': <?php echo count($less_hundredthousand); ?>
  },
          
   {
    'x': '> 100,000',
    'y': <?php echo count($more_hundredthousand); ?>
  },

  ];

  var vis = d3.select('#visualisation'),
    WIDTH = 1000,
    HEIGHT = 500,
    MARGINS = {
      top: 20,
      right: 20,
      bottom: 20,
      left: 50
    },
    xRange = d3.scale.ordinal().rangeRoundBands([MARGINS.left, WIDTH - MARGINS.right], 0.1).domain(barData.map(function (d) {
      return d.x;
    })),


    yRange = d3.scale.linear().range([HEIGHT - MARGINS.top, MARGINS.bottom]).domain([0,
      d3.max(barData, function (d) {
        return d.y;
      })
    ]),

    xAxis = d3.svg.axis()
      .scale(xRange)
      .tickSize(5)
      .tickSubdivide(true),

    yAxis = d3.svg.axis()
      .scale(yRange)
      .tickSize(5)
      .orient("left")
      .tickSubdivide(true);


  vis.append('svg:g')
    .attr('class', 'x axis')
    .attr('transform', 'translate(0,' + (HEIGHT - MARGINS.bottom) + ')')
    .call(xAxis);

  vis.append('svg:g')
    .attr('class', 'y axis')
    .attr('transform', 'translate(' + (MARGINS.left) + ',0)')
    .call(yAxis);

  vis.selectAll('rect')
    .data(barData)
    .enter()
    .append('rect')
    .attr('x', function (d) {
      return xRange(d.x);
    })
    .attr('y', function (d) {
      return yRange(d.y);
    })
    .attr('width', xRange.rangeBand())
    .attr('height', function (d) {
      return ((HEIGHT - MARGINS.bottom) - yRange(d.y));
    })
    .attr('fill', 'grey')
    .on('mouseover',function(d){
      d3.select(this)
        .attr('fill','blue');
    })
    .on('mouseout',function(d){
      d3.select(this)
        .attr('fill','grey');
    });

}
</script>


<?php include('footer.php'); ?>