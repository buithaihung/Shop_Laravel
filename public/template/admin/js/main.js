$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url) {
    if(confirm('Xoá mục này?')) {
        $.ajax({
            url: url,
            datatype: 'JSON',
            data: {id},
            type: 'DELETE',
            success: function(result) {
                if(result.error == false) {
                    alert(result.message)
                    location.reload();
                } else {
                    alert('Có lỗi xảy ra');
                }
            }
        });
    }
}


// Up Load File

$('#upload').change(function () {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: "JSON",
        data: form,
        url: '/admin/upload/services',
        success: function (results) {
            console.log(results);
        }
    });
});
