<?php

$item = null;
$value = null;
$order = "sales";

$products = ProductController::ctrShowProducts($item, $value, $order);

$colours = array("red","green","yellow","aqua","purple","blue","cyan","magenta","orange","gold");

$salesTotal = ProductController::ctrShowAddingOfTheSales();


?>

<!--=====================================
products MÁS VENDIDOS
======================================-->

<div class="card card-danger">
	
	<div class="card-header">
  
      <h3 class="card-title">Best-selling products</h3>

    </div>

	<div class="card-body">
    
      	<div class="row">

	        <!-- <div class="col-md-7">

	 			<canvas id="pieChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

	        </div> -->

		    <div class="col-md-12">
		      	
		  	 	<ul class="list-group">

		  	 		 <?php

          	for($i = 0; $i <5; $i++){
			
          		echo '<li class="list-group-item">
						 
						 

						
						 '.$products[$i]["description"].'

						 <span class="pull-right text-'.$colours[$i].'">   
						 ' .ceil($products[$i]["sales"]*100/$salesTotal["total"]).'%
						 </span>
							
						

      				</li>';

			}

			?>


		  	 	</ul>

		    </div> 

		</div>

    </div>

    
  <div class="card-footer text-center">

    <a href="products" class="uppercase">See all products</a>
  
  </div>

</div>

<script>

  // -------------
  // - PIE CHART -
  // -------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
  var pieChart       = new Chart(pieChartCanvas, {
    type:'pie',
    data:PieData,
    options:pieOptions
  })

  var PieData        = [

  <?php

  for($i = 0; $i < 10; $i++){

  	echo "{
      value    : ".$products[$i]["sales"].",
      color    : '".$colours[$i]."',
      highlight: '".$colours[$i]."',
      label    : '".$products[$i]["description"]."'
    },";

  }
    
   ?>
  ];

  var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
 
 
  // -----------------
  // - END PIE CHART -
  // -----------------


</script>