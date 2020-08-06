<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>HTAuto</title>
  <link rel="shortcut icon" href="http://www.htauto.com.vn/favicon.ico">
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">

  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
  <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
  <link rel="stylesheet" type="text/css" href="/css/intergration.css">
</head>
<body id="body">

  <br><br>
  <button type="button" class="btn btn-primary" data-toggle="modal" href='#add-modal' onclick="clearForm()">Thêm mới</button>

  <br><br>
  <table class="table table-bordered table-striped" id="users-table">
    <thead>
      <tr class="table-primary">
        <th>Ngày thăm</th>
        <th>Mã KH</th>
        <th>Tên khách</th>
        <th>Số Điện Thoại</th>
        <th>Tác vụ</th>
      </tr>
    </thead>
  </table>



  <!-- The Modal -->
  <div class="modal" id="add-modal">
    <div class="modal-dialog" style="max-width: 700px;">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Báo cáo thị trường</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form id="add-form" action="{{asset('/report/market')}}" method="POST" >
          <!-- Modal body -->
          <div class="modal-body">

            <div class="form-group">
              <label for="exampleFormControlSelect1">Ngày vào thăm</label>
              <input class="form-control" data-date-format="dd/mm/yyyy" id="date_work" name="date_work">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Khách hàng</label>
              <select class="form-control selectpicker" data-live-search="true" id="customer_id" name="customer_id">
                @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name_follow}}-{{ $customer->supplies_phone_1}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="name">Tiến trình tư vấn</label>
              <input type="text" class="form-control" id="advisory" name="advisory"  placeholder="Tiến trình tư vấn...">
            </div>
            <div class="form-group">
              <label for="name">Phản hồi của khách / Noted</label>
              <input type="text" class="form-control" id="feedback" name="feedback"  placeholder="Phản hồi của khách...">
            </div>
            <div class="form-group">
              <label for="name">Phản hồi khác</label>
              <input type="text" class="form-control" id="feedback_other" name="feedback_other"  placeholder="Phản hồi của khách...">
            </div>
            <div class="form-group">
              <label for="name">Kế hoạch phát triển</label>
              <input type="text" class="form-control" id="dev_plan" name="dev_plan"  placeholder="Kế hoạch phát triển...">
            </div>
            <div class="form-group">
              <label for="name">Phân loại khách hàng</label>
              <select class="form-control" id="type" name="type">
                <option value="Khác">Khác</option>
                <option value="Bỏ">Bỏ</option>
                <option value="Bình Thường">Bình Thường</option>
                <option value="Đang Lấy">Đang Lấy</option>
                <option value="Tiềm Năng">Tiềm Năng</option>
              </select>
            </div>
            <div class="form-group">
              <label for="name">Quy mô / loại hình KD / phân khúc</label>
              <select class="form-control" id="scale" name="scale">
                <option value="Gara vừa">Gara vừa</option>
                <option value="Cửa hàng phụ tùng">Cửa hàng phụ tùng</option>
                <option value="Đại lý lớn">Đại lý lớn</option>
                <option value="Trung cấp">Trung cấp</option>
                <option value="Cao cấp">Cao cấp</option>
              </select>
            </div>

            <div class="form-group">
              <label for="name">Sản phẩm & dịch vụ</label>
              <input type="text" class="form-control" id="service" name="service"  placeholder="Sản phẩm & dịch vụ...">
            </div>

            <div class="form-group">
              <label for="name">Thị trường xung quanh (Trục đường, quanh 100m)</label>
              <input type="text" class="form-control" id="type_market" name="type_market"  placeholder="Thị trường xung quanh...">
            </div>

            <input type="hidden" name="id" id="eid">

          </div>

          <!-- Modal footer -->
          <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary">Lưu</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $('#date_work').datepicker({
      weekStart: 1,
      daysOfWeekHighlighted: "6,0",
      autoclose: true,
      todayHighlight: true,
    });
  </script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('/js/sb-admin-2.min.js')}}"></script>
  <!-- Page level plugins -->

  <!-- Page level custom scripts -->


  
  <script src="{{asset('/js/jquery.validate.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Authorization': '{{$auth}}'
      }
    });

  </script>

  
  <script src="{{ asset('/js/main/intergration.js') }}"></script>

</body>
</html>