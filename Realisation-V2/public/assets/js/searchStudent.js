
    $('#search').on('keyup',function(){
        $id= $("#searchID").val();

    $value=$(this).val();
    $.ajax({
    type : 'get',
    url :  "../searchStudent/"+$id,
    // url : '{{URL::to('search')}}',
    data:{'key':$value},
    success:function(data){
    $('#tbody').html(data);
    }
    });
    })
