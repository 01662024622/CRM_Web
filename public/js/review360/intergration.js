
$('#apartment_id').on('change', function() {
    $('#custom').hide();
    $('#submit').prop('disabled', true);
    if ($(this).val()==0) {
        $('#submit').prop('disabled', false);
        return
    }
    $.ajax({
        url:'/review/report/'+$(this).val(),
        type: 'GET',
        success: function(response) {
            var html='<option value="0" checked>Ý kiến cải thiện chung</option>';
            for (var i = response.length - 1; i >= 0; i--) {
                html += `<option value="`+response[i]['id']+`">`+response[i]['name']+`</option>`
            }
            $('#user_id').html(html);
            $('#custom').show();
        }, error: function (xhr, ajaxOptions, thrownError) {
            toastr.error(xhr.responseJSON.message);
        },
    });
})


$('#submit').on('click', function(){
    var createForm = new FormData();
    if($('#apartment_id').val()==0){
        createForm.append('teamwork',$('input[name=teamwork]:checked').val());
    }else{
        createForm.append('teamwork',$('input[name=teamwork]:checked').val());
        createForm.append('apartment_id',$('#apartment_id').val());
        createForm.append('user_id',$('#user_id').val());
        createForm.append('note',$("#note").val());
        if ($('input.check-box:checkbox:checked').length>0) {
            var checkbox=[];
            $('input.check-box:checkbox:checked').each(function () {
                createForm.append('list[]',$(this).val());
            });

        }  
        if ($("#new-checkbox").val()!="") {
            createForm.append('newreport',$("#new-checkbox").val());
        }
    }

    $.ajax({
      url: '/review/report',
      type: 'POST',
      data: createForm,
      dataType:'json',
      async:false,
      processData: false,
      contentType: false,
      success: function(response, textStatus, request) {
        document.location.replace('/review/user/success/'+authorization);
    }, error: function (xhr, ajaxOptions, thrownError) {
      // toastr.error(thrownError);
  },       
});
})


$(':input[type="checkbox"]').change(function() {
    checkLength()
});
$('#new-checkbox-text').on('keyup',function(){
    if($(this).val()!=""){
        $('#new-checkbox').prop('checked', true);
        $('#new-checkbox').val($(this).val());
    }else{
        $('#new-checkbox').prop('checked', false);
        $('#new-checkbox').val($(this).val());
    }
    checkLength()

})
function checkLength(){
    var length = $('input.form-check-input:checkbox:checked').length;
    if (length>0) {
        $('#submit').prop('disabled', false);
    }else{
        $('#submit').prop('disabled', true);
    }
}

$('#type').on('change', function(){
    $('#review').hide();
    $('#giao-nhan').hide();
    $('#'+$(this).val()).show();
})

$('.validate-feedback').on('keyup',function(){
    var disable=false;
    $('.validate-feedback').each(function () {
        if($(this).val()==""){
            disable=true;
        }
    });
    $('#submit-feedback').prop('disabled', disable);
});

$('#submit-feedback').on('click', function(){
    var createForm = new FormData();
    createForm.append('order',$('#order-feedback').val());
    createForm.append('content',$('#content-feedback').val());
    createForm.append('note',$('#note-feedback').val());
    $.ajax({
      url: '/feedback/report',
      type: 'POST',
      data: createForm,
      dataType:'json',
      async:false,
      processData: false,
      contentType: false,
      success: function(response, textStatus, request) {
        document.location.replace('/review/user/success/'+authorization);
    }, error: function (xhr, ajaxOptions, thrownError) {
      // toastr.error(thrownError);
  },       
});
})
