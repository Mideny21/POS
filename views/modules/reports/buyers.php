<?php

$item = null;
$value = null;

$sales = ControllerSales::ctrShowSales($item, $value);
$Customers = ControllerCustomers::ctrShowCustomers($item, $value);

$arrayCustomers = array();
$arrayCustomersList = array();

foreach ($sales as $key => $valueSales) {

  foreach ($Customers as $key => $valueCustomers) {

    if($valueCustomers["id"] == $valueSales["idCustomer"]){

        #We capture Customers in an array
        array_push($arrayCustomers, $valueCustomers["name"]);

        #We capture the names and net values in the same array
        $arrayCustomersList = array($valueCustomers["name"] => $valueSales["netPrice"]);

        #We add the netprice of each Customer

        foreach ($arrayCustomersList as $key => $value) {

            $addingTotalSales[$key] += $value;

         }

    }
  
  }

}

#Avoiding repeated names
$dontrepeatnames = array_unique($arrayCustomers);

?>


<!--=====================================
Customers
======================================-->

<div class="card card-warning">
	
	<div class="card-header with-border">
    
    	<h3 class="card-title">Customers</h3>
  
  	</div>

  	<div class="card-body">
  		
		<div class="chart-responsive">
			
			<div class="chart" id="bar-chart2" style="height: 300px;"></div>

		</div>

  	</div>

</div>

<script>
	
//BAR CHART
var bar = new Morris.Bar({
  element: 'bar-chart2',
  resize: true,
  data: [

  <?php
    
    foreach($dontrepeatnames as $value){

      echo "{y: '".$value."', a: '".$addingTotalSales[$value]."'},";

    }

  ?>
  ],
  barColors: ['#f6a'],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['sales'],
  preUnits: 'Tsh',
  hideHover: 'auto'
});


</script>