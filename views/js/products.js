//LOADING DYNAMIC DATA FROM DATABASE


$('.tablesData').DataTable({
    "ajax": "ajax/datatable-product_ajax.php",
    "defender": true,
    "retrieve": true,
    "processing": true,
});

$('#newCategory').change(function(){
    var idCategory = $(this).val();

    var data = new FormData();
    data.append("idCategory", idCategory);

    $.ajax({

        url:"ajax/products_ajax.php",
        method:"post",
        data:data,
        cache:false,
        contentType:false,
        processData:false,
        dataType:"json",
        success:function(response){

            if(!response){
                var newCode = idCategory+"01";
                $("#newCode").val(newCode);
            }else{
                var newCode = Number(response["code"]) + 1;
                $("#newCode").val(newCode);
            }

            
        }
    });
});