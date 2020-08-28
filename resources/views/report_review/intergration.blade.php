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
  <link rel="shortcut icon" href="/crop-logo.png">
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css"
  rel="stylesheet" type="text/css">

  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/review360/intergration.css">

</head>
<body>
  <main class="page payment-page">
    <section class="payment-form dark">
      <br><br>
      <div class="container">
        <div class="container-form">

          <div class="products">
            <h2 class="title">Báo Cáo</h2>
            <div class="item">
              <span class="price">{{$name}}</span>
              <p class="item-name">Họ và Tên</p>
            </div>
            <div class="item">
              <span class="price">{{$apartment}}</span>
              <p class="item-name">Phòng ban</p>
            </div>
          </div>

        </div>
        <div class="container-form">
          <div class="card-details">
            <h3 class="title">Loại đánh giá</h3>
            <div class="row">
              <div class="form-group col-sm-12">
                <label for="card-holder" class="form-label-header">Chọn thể loại feedback mà bạn muốn.</label>
                <select class="form-control" id="type" name="type">
                  <option disabled selected value> -- Chọn -- </option>
                  <option value="review">Review 360</option>
                  <option value="giao-nhan">Feedback giao nhận</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div id="review">
          <div class="container-form">
            <div class="card-details">
              <h3 class="title">Nhận Xét Chung</h3>
              <div class="row">
                <div class="form-group col-sm-12">
                  <label for="card-holder" class="form-label-header">Bạn cảm thấy thế nào về "mức độ phối hợp trong công việc" của mọi người với nhau trong công ty? *</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="teamwork" id="exampleRadios1" value="Rất tốt" checked>
                    <label class="form-check-label form-label" for="exampleRadios1">Rất tốt</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="teamwork" id="exampleRadios2" value="Tốt">
                    <label class="form-check-label form-label" for="exampleRadios2">Tốt</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="teamwork" id="exampleRadios3" value="Bình thường">
                    <label class="form-check-label form-label" for="exampleRadios2">Bình thường</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="teamwork" id="exampleRadios4" value="Chưa được tốt lắm">
                    <label class="form-check-label form-label" for="exampleRadios2">Chưa được tốt lắm</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="container-form">
            <div class="card-details">
              <h3 class="title">Phản Ánh Phòng Ban</h3>
              <div class="row">
                <div class="form-group col-sm-12">
                  <label for="card-holder" class="form-label-header">Theo bạn bộ phận/phòng/ban nào cần "cải thiện" về việc hợp tác cùng nhau trong công việc? *</label>
                  <select class="form-control" id="apartment_id" name="apartment_id">
                    <option disabled selected value> -- Chọn -- </option>
                    <option value="0">Tôi không có ý kiến</option>
                    @foreach ($apartments as $apartment)
                    <option value="{{ $apartment->id }}">{{ $apartment->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="container-form" id="custom" style="display: none;">
            <div class="card-details">
              <h3 class="title">Nội Dung Phản Ánh</h3>
              <div class="row">
                <div class="form-group col-sm-12">
                  <label for="card-holder" class="form-label-header">Tên "cá nhân" trong bộ phận cần cải thiện (nếu có). Trường hợp không nêu đích danh NV, TBP được góp ý sẽ chịu trách nhiệm</label>
                  <select class="form-control" id="user_id" name="user_id">
                    <option value="0">Ý kiến cải thiện chung</option>
                    @foreach ($apartments as $apartment)
                    <option value="{{ $apartment->id }}">{{ $apartment->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-sm-12">
                  <label for="card-holder" class="form-label-header" >Nội dung cần cải thiện (nếu có), có thể tích nhiều lựa chọn</label>
                  <div class="form-check">
                    <input class="form-check-input check-box" type="checkbox" value="1">
                    <label class="form-check-label form-label" for="defaultCheck1">Nhiệt tình trong công việc hơn nữa</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input check-box" type="checkbox" value="2">
                    <label class="form-check-label form-label" for="defaultCheck1">Cần phải linh hoạt hơn trong công việc khi có phát sinh</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input check-box" type="checkbox" value="3">
                    <label class="form-check-label form-label" for="defaultCheck1">Cần am hiểu về các phạm trù công việc khác liên quan hơn để phục vụ công việc</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input check-box" type="checkbox" value="4">
                    <label class="form-check-label form-label" for="defaultCheck1">Chậm hoàn thành công việc rất nhiều, cần hoàn thành công việc đúng hạn</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input check-box" type="checkbox" value="5">
                    <label class="form-check-label  form-label" for="defaultCheck1">Cần cải thiện việc phục vụ khách hàng, khách hàng phản hồi không tốt nhiều</label>
                  </div>

                  <div class="form-check">
                    <label style="max-width: 30%">

                      <label><input class="form-check-input" type="checkbox" value="" id="new-checkbox" onclick="return false;"></label>
                      <label class="form-check-label  form-label"> Mục khác:</label>
                    </label>
                    <label class="form-check-label  form-label" for="defaultCheck1" style="min-width: 70%">
                      <input class="text-button" id="new-checkbox-text" type="text" value="" placeholder="Câu trả lời của bạn">
                    </label>
                  </div>
                </div>

                <div class="form-group col-12">
                  <hr>
                </div>
                <div class="form-group col-sm-12">
                  <label for="card-holder" class="form-label-header" >Ghi chú (nếu có) và ghi số đơn hàng nếu là phản hồi không tốt của khách hàng</label>
                  <input class="text-button" type="text" value="" name="" placeholder="Câu trả lời của bạn" id="note">
                </div>
              </div>
            </div>
          </div>
          <div class="container-form" style="border:none; box-shadow:none;background:none">
            <button class="btn btn-primary" type="submit" id="submit" disabled>Gửi</button>
          </div>

        </div> {{-- review 360 --}}

        <div id="giao-nhan">
          <div class="container-form">
            <div class="card-details">
              <h3 class="title">Feed back giao nhận</h3>
              <div class="row">
                <div class="form-group col-sm-12">
                  <label for="card-holder" class="form-label-header">Số toa *</label>
                  <input class="text-button validate-feedback" type="text" name="order-feedback" id="order-feedback" placeholder="Câu trả lời của bạn">
                <br>
                <br>
                <br>
                </div>
                <div class="form-group col-sm-12">
                  <label for="card-holder" class="form-label-header">Nội dung khách hàng feedback *</label>
                  <input class="text-button validate-feedback" type="text" name="content-feedback" id="content-feedback" placeholder="Câu trả lời của bạn">
                <br>
                <br>
                <br>
                </div>
                <div class="form-group col-sm-12">
                  <label for="card-holder" class="form-label-header">Cá nhân góp ý (nếu có)</label>
                  <input class="text-button" type="text" name="note-feedback" id="note-feedback" placeholder="Câu trả lời của bạn">
                <br>
                <br>
                <br>
                </div>
              </div>
            </div>
          </div>
          <div class="container-form" style="border:none; box-shadow:none;background:none">
            <button class="btn btn-primary" type="submit" id="submit-feedback" disabled>Gửi</button>
          </div>
        </div>
        <div class="container-form" style="border:none; box-shadow:none;background:none; font-size: 0.7rem">
          Báo cáo đánh giá của nhân viên công ty TNHH HTAuto
        </div>

      </div>
    </section>
  </main>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
  integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
  crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
  crossorigin="anonymous"></script>


  <!-- Custom scripts for all pages-->
  <script src="{{asset('/js/sb-admin-2.min.js')}}"></script>
  <!-- Page level plugins -->

  <!-- Page level custom scripts -->


  <script src="{{asset('/js/jquery.validate.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Authorization': '{{$auth}}'
      }
    });

    var authorization = '{{$auth}}';

  </script>


  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('/js/review360/intergration.js') }}"></script>

</body>
</html>
