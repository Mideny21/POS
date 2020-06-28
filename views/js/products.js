//LOADING DYNAMIC DATA FROM DATABASE

$.ajax({
    url:"ajax/datatable-product_ajax.php",
    success:function(response){
        console.log("response", response);
    }
});

$('.tablesData').DataTable({
    "ajax": "ajax/datatable-product_ajax.php"
});