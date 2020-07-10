<?php

error_reporting(0);

if(isset($_GET["initialDate"])){

    $initialDate = $_GET["initialDate"];
    $finalDate = $_GET["finalDate"];

}else{

$initialDate = null;
$finalDate = null;

}

$answer = ControllerSales::ctrSalesDatesRange($initialDate, $finalDate);

$arrayDates = array();
$arraySales = array();
$addingMonthPayments = array();

foreach ($answer as $key => $value) {

    #We capture only year and month
	$singleDate = substr($value["Date"],0,7);

    #Introduce dates in arrayDates
	array_push($arrayDates, $singleDate);

	#We capture the sales
	$arraySales = array($singleDate => $value["totalPrice"]);

    #we add payments made in the same month
	foreach ($arraySales as $key => $value) {
		
		$addingMonthPayments[$key] += $value;
	}

}


$noRepeatDates = array_unique($arrayDates);


?>

<!--=====================================
SALES GRAPH
======================================-->


<div class="card bg-gradient-info ">
	
	<div class="card-header">

  		<h3 class="card-title">Sales Graph</h3>

	</div>

	<div class="card-body border-radius-none newSalesGraph">

		<div class="chart" id="line-chart-Sales" style="height: 250px;"></div>

  </div>

</div>

<script>
	
 var line = new Morris.Line({
    element          : 'line-chart-Sales',
    resize           : true,
    data             : [

    <?php

    if($noRepeatDates != null){

	    foreach($noRepeatDates as $key){

	    	echo "{ y: '".$key."', Sales: ".$addingMonthPayments[$key]." },";


	    }

	    echo "{y: '".$key."', Sales: ".$addingMonthPayments[$key]." }";

    }else{

       echo "{ y: '0', Sales: '0' }";

    }

    ?>

    ],
    xkey             : 'y',
    ykeys            : ['Sales'],
    labels           : ['Sales'],
    lineColors       : ['black'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : 'black',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : 'blue',
    gridTextFamily   : 'Open Sans',
    preUnits         : 'Tsh ',
    gridTextSize     : 10
  });

</script>