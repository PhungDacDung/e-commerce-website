 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
}); 

function removeRow(id,url){
    if(confirm('Bạn có chắc chắn muốn xóa không?')){
        $.ajax({
            type:'DELETE',
            datatype:'JSON',
            data:{id},
            url:url,
            success:function (result){
                if(result.error == false){
                    alert(result.message);
                    location.reload();
                }else{
                    alert('Xóa không thành công. Hãy thử lại');
                }
            }
        })
    }
}

/* Upload File */
/* $('#upload').change(function(){
    const form = new FormData();
    form.append('file',$(this)[0].files[0]);

    $.ajax({
        processData:false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url :'/admin/upload/services',
        success:function($result){
                console.log($result);
        }
    });

    console.log('123');
}); */

/* 
$('.quickView').on('click',function($data){

    var name = $('#name').val();
    $.ajax({
        url:'main.blade.php',
        type:"POST",
        data:form,
        success:function(result){
            
            console.log(result);
        }
    });

    console.log($data);
}); */

/* $('#quickVeiw').click(function(){
    console.log(123456);
}); */

/* function quickView(){
    
    console.log(123456);
    alert('hello');
}
 */

