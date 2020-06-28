//LOADING DYNAMIC DATA FROM DATABASE


$('.tablesData').DataTable({
    "ajax": "ajax/datatable-product_ajax.php",
    "defender": true,
    "retrieve": true,
    "processing": true,
});