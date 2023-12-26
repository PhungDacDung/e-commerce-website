$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function loadMore(){
    const page = $('#page').val();
    $.ajax({
        url:'/services/loadProduct',
        method:'post',
        datatype:'JSON',
        data:{page:page},
        success : function(result){
            console.log(result);
        },
        error : function(xhr,status,error){

            console.log(error);
        }
    });
    console.log(page);
}