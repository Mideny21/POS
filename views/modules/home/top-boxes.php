<?php

$item = null;
$value = null;
$order = "id";

$sales = ControllerSales::ctrAddingTotalSales();

$categories = ControllerCategories::ctrShowCategories($item, $value);
$totalCategories = count($categories);

$customers = ControllerCustomers::ctrShowCustomers($item, $value);
$totalCustomers = count($customers);

$products = ProductController::ctrShowProducts($item, $value, $order);
$totalProducts = count($products);

?>



<div class="col-lg-3 col-6">

  <div class="small-box bg-info">
    
    <div class="inner">
      
      <h6>Tsh <?php echo number_format($sales["total"],2); ?></h6>

      <p>Sales</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-social-usd"></i>
    
    </div>
    
    <a href="manage-sales" class="small-box-footer">
      
      More info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>

<div class="col-lg-3 col-6">

  <div class="small-box bg-success">
    
    <div class="inner">
    
      <h6><?php echo number_format($totalCategories); ?></h6>

      <p>Categories</p>
    
    </div>
    
    <div class="icon">
    
      <i class="ion ion-clipboard"></i>
    
    </div>
    
    <a href="categories" class="small-box-footer">
      
      More info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>

<div class="col-lg-3 col-6">

  <div class="small-box bg-warning">
    
    <div class="inner">
    
      <h6><?php echo number_format($totalCustomers); ?></h6>

      <p>Customers</p>
  
    </div>
    
    <div class="icon">
    
      <i class="ion ion-person-add"></i>
    
    </div>
    
    <a href="customers" class="small-box-footer">

      More info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>

<div class="col-lg-3 col-6">

  <div class="small-box bg-danger">
  
    <div class="inner">
    
      <h6><?php echo number_format($totalProducts); ?></h6>

      <p>products</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-ios-cart"></i>
    
    </div>
    
    <a href="products" class="small-box-footer">
      
      More info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>