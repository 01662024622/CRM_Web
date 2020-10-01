$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#change-password").submit(function (e) {
    e.preventDefault();
}).validate({
    rules: {
        old_passowrd: {
            required: true,
            minlength: 8
        },
        new_passowrd: {
            required: true,
            minlength: 8
        },
        ver_passowrd: {
            required: true,
            minlength: 8,
            equalTo: "#new-passowrd"
        }
    },
    messages: {
        new_passowrd: {
            required: "Hãy nhập mật khẩu",
            minlength: "Ít nhất 8 kí tự"
        },
        new_passowrd: {
            required: "Hãy nhập mật khẩu cũ",
            minlength: "Ít nhất 8 kí tự"
        },
        ver_passowrd: {
            required: "Hãy nhập mật khẩu",
            minlength: "Ít nhất 8 kí tự",
            equalTo: "Nhập lại mật khẩu không chính xác"
        }
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        $.ajax({
            url: form.action,
            type: form.method,
            data: formData,
            dataType: 'json',
            async: false,
            processData: false,
            contentType: false,
            success: function (response) {
                setTimeout(function () {
                    if ($('#eid').val() == '') {
                        toastr.success('Thêm mới thành công!');
                    } else {
                        toastr.success('Cập nhật thành công!');
                    }
                }, 1000);
            }, error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError);
            },
        });
    }
});
