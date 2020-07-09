<?php

require_once "../../controllers/sales_controller.php";
require_once "../../models/sales_model.php";
require_once "../../controllers/customers_controller.php";
require_once "../../models/customers_model.php";
require_once "../../controllers/users_controller.php";
require_once "../../models/users_model.php";

$report = new ControllerSales();
$report -> ctrDownloadReport();