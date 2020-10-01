$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


var dataTable = $('#users-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        type: "GET",
        url: "/api/v1/report/review/feedback/apartment/table",
        error: function (xhr, ajaxOptions, thrownError) {
            if (xhr != null) {
                if (xhr.responseJSON != null) {
                    if (xhr.responseJSON.errors != null) {
                        if (xhr.responseJSON.errors.permission != null) {
                            location.reload();
                        }
                    }
                }
            }
        }
    },
    columns: [
    {data: 'DT_RowIndex', name: 'id'},
    {data: 'content', name: 'content'},
    {data: 'note', name: 'note'},
    {data: 'option', name: 'option'},
    {data: 'action', name: 'action'},
    ],
    oLanguage: {
        "sProcessing": "Đang xử lý...",
        "sLengthMenu": "Xem _MENU_ mục",
        "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
        "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
        "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
        "sInfoFiltered": "(được lọc từ _MAX_ mục)",
        "sInfoPostFix": "",
        "sSearch": "Tìm Kiếm: ",
        "sUrl": "",
        "oPaginate": {
            "sFirst": " Đầu ",
            "sPrevious": " Trước ",
            "sNext": " Tiếp ",
            "sLast": " Cuối "
        }
    }

});
function getInfo(id) {
    $('#eid').val(id);
}

$("#add-form").submit(function (e) {
    e.preventDefault();
}).validate({
    rules: {
        option: {
            required: true,
            minlength: 5
        },
    },
    messages: {
        option: {
            required: "Hãy nhập thông tin phản hồi",
            minlength: "Thông tin phản hồi ít nhất phải có 5 kí tự"
        },

    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $.ajax({
            url: "/review/report/"+$('#eid').val()+"/edit?option="+$("#option").val(),
            type: form.method,
            data: formData,
            dataType: 'json',
            async: false,
            processData: false,
            contentType: false,
            success: function (response) {
                setTimeout(function () {
                    toastr.success('Phản hồi thành công!');
                }, 1000);
                $("#add-modal").modal('toggle');
                dataTable.ajax.reload(null, false);
            }, error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError);
            },
        });
    }
});
