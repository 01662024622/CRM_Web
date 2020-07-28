

@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://rawgit.com/adrotec/knockout-file-bindings/master/knockout-file-bindings.css">

<style type="text/css" media="screen">
	.text-full-center{
		text-align: center;
		width: 100%;
		margin: 5px 0;
	}
	.text-full{
		width: 100%;
		margin: 5px 0;
	}
</style>
@endsection
@section('content')


<div class="row">
	<div class="text-full-center" style="color: #0000ff; font-size: 45px;">CÔNG TY MEDIA HÀ NỘI.</div>
	<br />
	<br />
	<div class="text-full-center" style="font-size: 30px; margin: 0 0 30px 0"> Chuyên Cung Cấp Dịch vụ Tại Khu Trung Cư Thành Phố Hà Nội</div>
	<br> 
	<br> <br> 
	<div class="container">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.3610386875616!2d105.8388463148825!3d20.978159986025894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac44b4462d8b%3A0x62b5dc2db42ee0e1!2zMTAwMSBHaeG6o2kgUGjDs25nLCDEkOG7i25oIEPDtG5nLCBIb8OgbmcgTWFpLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1590342670208!5m2!1svi!2s" width="800" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</div>
	<div class="container">

		<br>
		<br>
		<br>
		<br>
		<div class="text-full-center" style="color: #0000ff; font-size: 45px;">Phản Ánh</div>
		<form>
  <div class="form-group">
  	<div class="form-group">
    <label for="exampleFormControlTextarea1">Nội Dung</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Gửi</button>
</form>
	</div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/main/orders.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.1.0/knockout-min.js"></script>
<script src="https://rawgit.com/adrotec/knockout-file-bindings/master/knockout-file-bindings.js"></script>

@endsection