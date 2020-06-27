<?php
	
require_once "controllers/template_controller.php";
require_once "controllers/users_controller.php";
require_once "controllers/categories_controller.php";
require_once "controllers/products_controller.php";
require_once "controllers/customers_controller.php";
require_once "controllers/sales_controller.php";

require_once "models/users_model.php";
require_once "models/categories_model.php";
require_once "models/products_model.php";
require_once "models/customers_model.php";
require_once "models/sales_model.php";

$template = new ControllerTemplate();
$template -> ctrTemplate();