  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
$(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });

$('#birth_day').datepicker({
      weekStart: 1,
      daysOfWeekHighlighted: "6,0",
      autoclose: true,
      todayHighlight: true,
    });
});


$("#update-profile").submit(function (e) {
    e.preventDefault();
}).validate({
    rules: {
        phone: {
            required: true,
            minlength: 9
        },
    },
    messages: {
        phone: {
            required: "Hãy nhập họ và tên của bạn",
            minlength: "Họ và tên ít nhất phải có 5 kí tự"
        },

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
