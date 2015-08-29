<?php include('header.php'); ?>
<?php include('chart_functions.php'); ?>

<h2>Anchor text word/tag cloud chart</h2>

<?php

$chart = new Chart;

$sorted_words = $chart->anchor_text();


?>
<script>(function() {

var fill = d3.scale.category20();

var layout = d3.layout.cloud()
    .size([960, 600])
    .words([<?php
    $count = 0;
    foreach ($sorted_words as $word) {
        if ($count < 30) {
            echo '"'.$word.'", ';
        }
        else {
            break;
        }
        
        
        $count++;
    }
     ?>
      ].map(function(d) {
      return {text: d, size: 10 + Math.random() * 90, test: "haha"};
    }))
    .padding(5)
    .spiral("archimedean")
    .font("Impact")
    .fontSize(function(d) { return d.size; })
    .on("end", draw);

layout.start();

function draw(words) {
  d3.select("body").append("svg")
      .attr("width", layout.size()[0])
      .attr("height", layout.size()[1])
    .append("g")
      .attr("transform", "translate(" + layout.size()[0] / 2 + "," + layout.size()[1] / 2 + ")")
    .selectAll("text")
      .data(words)
    .enter().append("text")
      .style("font-size", function(d) { return d.size + "px"; })
      .style("font-family", "Impact")
      .style("fill", function(d, i) { return fill(i); })
      .attr("text-anchor", "middle")
      .attr("transform", function(d) {
        return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
      })
      .text(function(d) { return d.text; });
}

})();</script

<?php include('footer.php'); ?>