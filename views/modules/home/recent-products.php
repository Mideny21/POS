<?php

$item = null;
$value = null;
$order = "id";

$products = ProductController::ctrShowProducts($item, $value, $order);

 ?>


<div class="card card-primary">

  <div class="card-header with-border">

    <h3 class="card-title">Recently Added Products</h3>


  </div>
  
  <div class="card-body">

    <ul class="list-group">

    <?php

    for($i = 0; $i < 10; $i++){

      echo '<li class="list-group-item">

        

        

            '.$products[$i]["description"].'

            <span class="pull-right" style="color:red;"> '.$products[$i]["selling_price"].'/=</span>

          
    
      

      </li>';

    }

    ?>

    </ul>

  </div>

  <div class="card-footer text-center">

    <a href="products" class="uppercase">See all products</a>
  
  </div>

</div>
