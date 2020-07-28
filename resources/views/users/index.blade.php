@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://rawgit.com/adrotec/knockout-file-bindings/master/knockout-file-bindings.css">

<style type="text/css" media="screen">
  #name-error{
    color: #5a5c69;
    font-size: 0.8rem;
    position: relative;
    line-height: 1;
    color: red
  }
  .error{
    color: #5a5c69;
    font-size: 1rem;
    position: relative;
    line-height: 1;
    color: red;
    width: 100%;
  }
  .image-product{
    width: 200px;
    height: auto;
  }
</style>
@endsection
@section('content')

<br><br>
<button type="button" class="btn btn-primary" data-toggle="modal" href='#add-modal' onclick="clearForm()">+Add New</button>

<br><br>
<table class="table table-bordered" id="users-table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Tên Người Dùng</th>
      <th>Email</th>
      <th>Số Điện Thoại</th>
      <th>Địa Chỉ</th>
      <th>Quyền Hạn</th>
      <th>Hành Động</th>
    </tr>
  </thead>
</table>


<!-- The Modal -->
<div class="modal" id="add-modal">
  <div class="modal-dialog" style="max-width: 700px;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thêm Mới Hoặc Cập Nhật</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form id="add-form" action="{{asset('/users')}}" method="POST" >
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Tên Người Dùng</label>
            <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name">
          </div>
          <div class="form-group">
            <label for="name">Email</label>
            <input type="email" class="form-control" id="email" name="email"  placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="name">SĐT</label>
            <input type="tel" class="form-control" id="phone" name="phone"  placeholder="Enter phome">
          </div>
          <div class="form-group">
            <label for="name">Phòng</label>
            <input type="tel" class="form-control" id="room" name="room"  placeholder="Enter room">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Trung Cư</label>
            <select class="form-control" id="apartment_id" name="apartment_id">
              @foreach ($apartments as $apartment)
                <option value="{{ $apartment->id }}">{{ $apartment->name}}</option>}
                option
              @endforeach
            </select>
          </div>
          <div class="form-group tag_pass">
            <label for="name">Mật Khẩu</label>
            <input type="password" class="form-control" id="password" name="password"  placeholder="Enter password">
          </div>
          <div class="form-group tag_pass">
            <label for="name">Nhập Lại Mật Khẩu</label>
            <input type="password" class="form-control" id="repassword" name="repassword"  placeholder="Enter password">
          </div>
          <input type="hidden" name="id" id="eid">

       </div>

       <!-- Modal footer -->
       <div class="modal-footer">
        
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>
</div>



@endsection

@section('js')
<script src="{{ asset('js/main/users.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.1.0/knockout-min.js"></script>
<script src="https://rawgit.com/adrotec/knockout-file-bindings/master/knockout-file-bindings.js"></script>

@endsection