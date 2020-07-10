<?php

$item = null;
$value = null;
$order = "id";

$products = ProductController::ctrShowProducts($item, $value, $order);

 ?>


<div class="card card-primary">

  <div class="card-header with-border">

    <h3 class="card-title">Recently Added Products</h3>

    <div class="card-tools pull-right">

      <button type="button" class="btn btn-box-tool" data-widget="collapse">

        <i class="fa fa-minus"></i>

      </button>

      <button type="button" class="btn btn-box-tool" data-widget="remove">

        <i class="fa fa-times"></i>

      </button>

    </div>

  </div>
  
  <div class="card-body">

    <ul class="products-list product-list-in-box">

    <?php

    for($i = 0; $i < 10; $i++){

      echo '<li class="item">

        <div class="product-info">

          <a href="" class="product-title">

            '.$products[$i]["description"].'

            <span class="label label-warning pull-right">Tsh '.$products[$i]["selling_price"].'</span>

          </a>
    
       </div>

      </li>';

    }

    ?>

    </ul>

  </div>

  <div class="card-footer text-center">

    <a href="products" class="uppercase">See all products</a>
  
  </div>

</div>
