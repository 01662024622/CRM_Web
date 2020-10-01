
$().ready(function() {
  $("#add-form").validate({
    rules: {
      note: {
        maxlength: 500,
      }
    },
    messages: {
      note: {
        maxlength: "Phản ánh của bạn quá dài",
      }

    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
