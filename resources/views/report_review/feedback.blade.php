@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="/css/review360/intergration.css">
@endsection
@section('content')
<main class="page payment-page">
    <section class="payment-form dark">
        <br><br>
        <div class="container">
            <div class="container-form">

                <div class="products">
                    <h2 class="title">Báo Cáo</h2>
                    <div class="item">
                        <span class="price">{{Auth::user()->name}}</span>
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
                                <option value="giao-nhan">Feedback khách hàng</option>
                                <option value="san-pham">Feedback Kho</option>
                                <option value="pr">Feedback đối ngoại</option>
                                <option value="link">Lấy link feedback</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div id="review" class="report">
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

            <div id="giao-nhan" class="report">
                <div class="container-form">
                    <div class="card-details">
                        <h3 class="title">Feedback khách hàng</h3>
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

            <div id="san-pham" class="report">
                <div class="container-form">
                    <div class="card-details">
                        <h3 class="title">Chạy cửa, bỏ toa, SKU xuất nhập sai</h3>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="card-holder" class="form-label-header">Hãy chọn loại feedback mà bạn muốn*</label>
                                <select class="form-control" id="type-wh" name="type-wh">
                                    <option disabled selected value> -- Chọn -- </option>
                                    <option value="CC">Chạy cửa</option>
                                    <option value="BT">Bỏ toa</option>
                                    <option value="SKU">SKU bị xuất nhập sai</option>
                                    <option value="QC">Các lỗi sai về QC</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container-form warehouse" id="amount">
                    <div class="card-details">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="card-holder" class="form-label-header">Hãy nhập mã sản phẩm*</label>
                                <input class="text-button wh-text" type="text" name="code-product" id="code-product" placeholder="Câu trả lời của bạn">
                                <br>
                                <br>
                                <br>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="card-holder" class="form-label-header">Hãy nhập số lượng*</label>
                                <input class="text-button wh-text" type="text" name="amount-wh" id="amount-wh" placeholder="Câu trả lời của bạn">
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-form warehouse" id="quality">
                    <div class="card-details">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="card-holder" class="form-label-header" >Nội dung cần phản ánh (nếu có), có thể tích nhiều lựa chọn</label>
                                <div class="form-check">
                                    <input class="form-check-input check-box-wh" type="checkbox" value="20">
                                    <label class="form-check-label form-label" for="defaultCheck1">Không xé tem nhãn</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input check-box-wh" type="checkbox" value="21">
                                    <label class="form-check-label form-label" for="defaultCheck1">Nhận hàng không rõ nguồn gốc</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input check-box-wh" type="checkbox" value="22">
                                    <label class="form-check-label form-label" for="defaultCheck1">Hàng hỏng không báo</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input check-box-wh" type="checkbox" value="23">
                                    <label class="form-check-label form-label" for="defaultCheck1">KV LV không sạch sẽ: Bàn làm việc, giá kệ, sàn</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input check-box-wh" type="checkbox" value="24">
                                    <label class="form-check-label  form-label" for="defaultCheck1">Giấy tờ lung tung ở giá kệ, tường, bàn,…</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input check-box-wh" type="checkbox" value="25">
                                    <label class="form-check-label  form-label" for="defaultCheck1">Để hàng không đúng vị trí</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input check-box-wh" type="checkbox" value="26">
                                    <label class="form-check-label  form-label" for="defaultCheck1">Một mặt hàng để quá nhiều vị trí</label>
                                </div>

                                <div class="form-check">
                                    <label style="max-width: 30%">

                                        <label><input class="form-check-input" type="checkbox" value="" id="new-checkbox-wh" onclick="return false;"></label>
                                        <label class="form-check-label  form-label"> Mục khác:</label>
                                    </label>
                                    <label class="form-check-label  form-label" for="defaultCheck1" style="min-width: 70%">
                                        <input class="text-button" id="new-checkbox-text-wh" type="text" value="" placeholder="Câu trả lời của bạn">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-form" style="border:none; box-shadow:none;background:none">
                    <button class="btn btn-primary" type="submit" id="submit-wh" disabled>Gửi</button>
                </div>
            </div>



            <div id="pr" class="report">
                <div class="container-form">
                    <div class="card-details">
                        <h3 class="title">Feedback đối ngoại</h3>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="card-holder" class="form-label-header">Số lần không phản hồi email*</label>
                                <input class="text-button" type="number" name="amount-pr" id="amount-pr" placeholder="Câu trả lời của bạn">
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-form" style="border:none; box-shadow:none;background:none">
                    <button class="btn btn-primary" type="submit" id="submit-pr" disabled>Gửi</button>
                </div>
            </div>
            <div id="link" class="report">
                <div class="container-form">
                  <div class="card-details">
                    <h3 class="title">Lấy link feedback cho khách hàng</h3>
                    <div class="row">
                     <div class="form-group col-sm-12">
                      <label for="card-holder" class="form-label-header">Mã khách hàng*</label>
                      <input class="text-button" type="text" name="code" id="code-link" placeholder="Mã khách hàng" maxlength="24">
                      <br>
                      <br>
                      <br>
                  </div>
              </div>
          </div>
      </div>
      <div class="container-form" style="border:none; box-shadow:none;background:none">
        <button class="btn btn-primary" type="submit" id="submit-link" disabled>Gửi</button>
    </div>
</div>

<div class="container-form" style="border:none; box-shadow:none;background:none; font-size: 0.7rem">
    Báo cáo đánh giá của nhân viên công ty TNHH HTAuto
</div>

</div>
</section>
</main>

<div class="modal" id="link-modal">
  <div class="modal-dialog" style="max-width: 700px">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Link Feedback Khách Hàng</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <div class="modal-body">
       <div class="row">
          <div class="col-10" id="link">
              <input class="text-button" type="text" name="link" id="link-text">
          </div>
          <div class="col-2">
            <input type="submit" value="coppy" id="coppy-link" class="btn btn-info">
        </div>
    </div>
</div>

<!-- Modal footer -->
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
</div>

</div>
</div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/review360/intergration.js') }}"></script>
@endsection


